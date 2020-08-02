<?php

namespace App\Http\Controllers\index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\AdminModel\Category;
use App\AdminModel\Goods;
use App\AdminModel\brand;
use App\AdminModel\goods_stock;
use App\AdminModel\Goods_attrModel;
use App\AdminModel\GoodsvalueModel;
use Illuminate\Support\Facades\Redis;

class CateController extends Controller
{
    public function top(){
        $data = Category::where(['status'=>1,'p_id'=>0])->limit(7)->get();
        return $data;
    }
    public function list(){
      $where =[];
      $goods_id =[];  
      $cate_id = request()->cate_id;
      $brand_id = Request()->brand_id;
      $attr = request()->attr;
      $attr_where="";
      if(!empty($attr)){
          foreach ($attr as $key => $val) {
            $attr_where .= $val.":";
          } 
            $attr_where = rtrim($attr_where,":");     
      }





      if(!empty($cate_id)){
      Request()->session()->put('cate_id',$cate_id);  
      //$where[] = ['cate_id','=',$cate_id];
      $array = category::get();
      // 获取当前分类之下的子子孙孙的ID
      $cids = $this->gatCate2($array, $cate_id);
       // 获取数组中的v值
      $cate_id = array_values($cids);
      request()->session()->put('cate_id',$cids);  
      //var_dump($cids);exit;
      }

      if(empty($cate_id)){
      $cate_id = request()->session()->get('cate_id');    
      }






      if($brand_id){
      $where=[['brand_id','=',$brand_id],['is_del','=',1]];
      }


      if(($attr)){
         $data = goods_stock::where("ability","like","%$attr_where%")->get('goods_id');
          $goods_id = [];
          foreach ($data as $k => $v) {
          $goods_id[] = $v['goods_id'];          
          }
          $goods_id= array_unique($goods_id);
      }




      //根据商品分类获取商品列表
      if(empty($attr)){
        $data = Goods::where($where)->wherein('cate_id',$cate_id)->get();
      }else{
        $data = Goods::wherein('goods_id',$goods_id)->wherein('cate_id',$cate_id)->where($where)->get();  
      }

      //获取所有的分类
      $form = Category::get();
      $form1 = $this->Ancestry($form,$cate_id);
      //获取分类的子id
      $form2 = Category::where('p_id',$cate_id)->get()->toArray();
      //获取那个分类
      $form3 = Category::where('cate_id',$cate_id)->select('cate_name')->get()->toArray();
      //获取该分类下的品牌
      $arr = [];
      foreach ($data as $key => $val) {
          $arr[] = $val['brand_id'];
      }
      $arr = array_unique($arr);
      $arr1=[];
      foreach ($arr as $k => $v) {
          $arr1[] = brand::where('brand_id',$v)->get();
      }
      //获取sku
      $arr2 =[];
      foreach ($data as $k => $v) {
          $dat =  goods_stock::where('goods_id',$v['goods_id'])->get();
              foreach ($dat as $key => $value) {
                 $arr2[]=$value['ability'];
              }
      }
      $arr3=[];
      foreach ($arr2 as $key => $val) {
         $dat=explode(":",$val);
         foreach ($dat as $key => $val) {
            $str = strstr($val,",",true);
            $arr3[]=$str;
         }

      }
    $arr3 = array_unique($arr3);
    $arr4 = [];  
    foreach ($arr3 as $key => $value) {
        $arr4 [] =$dat = Goods_attrModel::where('attr_id',$value)->get();
        foreach ($arr4 as $k => $val) {
            $dat1 = GoodsvalueModel::where('attr_id',$val[0]['attr_id'])->get();
            $val[0]['data']= $dat1;
        }
    }
      if(request()->ajax()){
      return view('index.cate.show',['data'=>$data]);
      }else{
      return view('index.cate.list',['data'=>$data,'form1'=>$form1,'form2'=>$form2,'form3'=>$form3,'arr1'=>$arr1,'arr4'=>$arr4]);
      }
    }


    //面包屑
    function Ancestry($data , $pid) {
    static $ancestry = array();
    foreach($data as $key => $value) {
        if($value['cate_id'] == $pid) {
            $this->Ancestry($data , $value['p_id']);
            $ancestry[] = $value;               
        }
    }
    return $ancestry;
  }
      function gatCate2($array,$pid=0)
    {
        static $ids=[];
        $ids[$pid]=$pid;
        foreach ($array as $k => $v) {
           if ($v['p_id']==$pid) {
               $ids[$v['cate_id']]=$v['cate_id'];
               $this->gatCate2($array,$v['cate_id']);
           }
        }
        return $ids;
    }
}