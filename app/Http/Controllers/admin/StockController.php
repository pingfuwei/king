<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\StudentController;
use Illuminate\Http\Request;
use App\AdminModel\Goods_attrModel;
use App\AdminModel\GoodsvalueModel;
use App\AdminModel\goods_stock;
use App\AdminModel\Goods;
use Illuminate\Support\Facades\DB;
use phpDocumentor\Reflection\DocBlock\Tags\Var_;

class StockController extends Controller
{
    public function create(){
        $res = db::table('shop_goods')->get();
        $data = Goods_attrModel::get();
        foreach ($data as $k=>$v){
            $ret = GoodsvalueModel::where('attr_id',$v['attr_id'])->get();
            $v['data'] = $ret;
        }
        return view('admin.stock.create',['res'=>$res,'data'=>$data]);
    }
    public function createDo(){
        $data=request()->all();
        $goods_id = $data['goods_id'];
        $ability = $data['ability'];
        $goods_name = Goods::where('goods_id',$goods_id)->value('goods_name');
        //var_dump($goods_name);exit;
        $arr = [];
        foreach (array_filter($ability) as $k=>$v){
            $dat = rtrim($v,",");
            $form=explode(",",$dat);
            $arr[$k]=$form;
        }
        $data=[];
        foreach($arr as $key => $value){
            $tmp=[];
            foreach($value as $k1 => $v1){
                $str="$key:$v1";
                array_push($tmp,$str);
            }
            array_push($data,$tmp);
        }
        //var_dump($this->loop($data));
        $arr=[];
        foreach ($this->loop($data) as $k=>$v){
            $dat = explode(",",$v);
            $arr1=[];
            $str ="";
            $id ="";
            foreach ($dat as $k2=>$v2) {
                $sxz = strstr($v2, ":");
                $sxzs = ltrim($sxz, ":");
                $sx = strstr($v2, ":", true);
                //获取属性id
                $id .= $sx.",".$sxzs.":";
                $arr1['id'] = $id;
                //获取值_id
                //获取属性
                $data = Goods_attrModel::where('attr_id', $sx)->value('attr_name');
                //获取值
                $dat = GoodsvalueModel::where('goods_val_id', $sxzs)->value('goods_val_name');
                //属性和属性值拼接
                $str .= $data.$dat.":";
                //$str = rtrim($str,":");
                $arr1['ability'] = $str;
            }
            $arr[]=$arr1;
        }
        return json_encode($data=[
            'code'=>200,
            'msg'=>$goods_name,
            'data'=>$arr,
        ],JSON_UNESCAPED_UNICODE);
    }
    public function loop($arr){
        $arr1 = array();
        $result = array_shift($arr);
        while($arr2 = array_shift($arr)){
            $arr1 = $result;
            $result = array();
            foreach($arr1 as$k=>$v){
                foreach($arr2 as $k2=>$v2){
                    $result[] = $v.','.$v2;
                }
            }
        }
        return $result;
    }





    public function index(){
        $data = goods_stock::leftjoin('shop_goods','shop_goods.goods_id','=','goods_stock.goods_id')->get();
        $form=[];
        foreach ($data as $k=>$v){
            $str="";
            $form=explode(":",$v['ability']);
            foreach ($form as $key=>$val){
               $sx = strstr($val,",",true);
               $sx =Goods_attrModel::where('attr_id',$sx)->value('attr_name');
               $sxz =strstr($val,",");
               $sxz =ltrim($sxz,",");
               $sxz =GoodsvalueModel::where('goods_val_id',$sxz)->value('goods_val_name');
               $str.=$sx.$sxz;
            }
            $v['data']=$str;
            //var_dump($str);
        }
        return view("admin.stock.index",['data'=>$data]);
    }





    public function upd(){
        $goods_id = request()->goods_id;
        $ability = request()->ability;
        //var_dump($ability);
        $data=explode("|","$ability");
        $from=[];
        foreach ($data as $k=>$v){
            $from[] = explode("@",$v);
        }
        $str="";
        foreach ($from as $k=>$v){
            $data =['goods_id'=>$goods_id,'ability'=>$v[2],'stock'=>$v[1],'price'=>$v[0]];
            $str = goods_stock::insert($data);
        }
        if($str){
            $dat=[
                'code'=>200,
                'msg'=>true,
                'data'=>''
            ];
        }else{
            $dat=[
                'code'=>500,
                'msg'=>true,
                'data'=>''
            ];
        }

    }
    public function updDo(){
        //$data =goods_stock::where('')delete();
    }
}
