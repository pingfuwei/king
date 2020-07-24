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
        //$goods_name = $data['goods_name'];
        $stock = $data['stock'];
        $price = $data['price'];
        $ability = $data['ability'];
        $goods = goods_stock::where('goods_id',$goods_id)->value('goods_id');
        if($goods){
            $dat = ['stock'=>$stock,'price'=>$price,'ability'=>$ability];
            $res = goods_stock::where('goods_id',$goods_id)->update($dat);
            return json_encode($data);
        }else {
            $res=goods_stock::insert($data);
        }
        if($res){
            $data = [
                'msg'=>true,
                'error'=>20000,
                'data'=>[]
            ];
        }else{
            $data = [
                'msg'=>true,
                'error'=>20001,
                'data'=>[]
            ];
        }
        return json_encode($res);exit;
        }
    public function index(){
        $goods_id = Request()->goods_id;
        $res = goods_stock::where(['is_del'=>1,'goods_id'=>$goods_id])->value('ability');
        return json_encode($res);exit;

    }
    public function del(){
        $data = goods_stock::leftjoin('shop_goods','shop_goods.goods_id','=','goods_stock.goods_id')->get();
        //var_dump($data);exit;
        $form =[];
        foreach ($data as $k=>$v){
            $arr= explode(",",$v['ability']);
            $str ="";
            $dnf ="";
            foreach ($arr as $key=>$val){
                $goods_val_id = stristr($val,":");
                $goods_val_id = ltrim($goods_val_id,":");

                $attr_id=stristr($val,":",true);
                $str .= $attr_id.",";
                $dnf .="$goods_val_id".",";
            }
            $str = rtrim($str,",");
            $arr = explode(",",$str);

            $str1 = rtrim($dnf,",");
            $arr1 = explode(",",$str1);
            $form=[];
            foreach ($arr as $key=>$val){
                $form[$arr1[$key]]=$val;
            }
            $dat=[];
            foreach ($form as $x=>$u){
                $goods_val_name = GoodsvalueModel::where('goods_val_id',$x)->get('goods_val_name');
                $attr_name = Goods_attrModel::where('attr_id',$u)->get();
                $ability=$attr_name[0]['attr_name'].":".$goods_val_name[0]['goods_val_name'];
                $dat[]=$ability;
            }
            //var_dump($dat);exit;
            $v['ability']=$dat;
        }
        return view('admin.stock.index',['data'=>$data]);
    }
    public function upd(){

    }
    public function updDo(){

    }

















































//    //执行库存ajax
//    public function stockAjax(){
//        $aa=\request()->all();
//        $aa=explode(",",$aa["aa"]);
//        $arr=[];
////        $bb=Goods_attrModel::where("attr_id",$av[0])->first();
////        $arr[$av[0]][$bb->attr_id]=$bb->attr_id;
////        $arr[$av[0]]["font"]=$bb->attr_name;
//        foreach ($aa as $k=>$v){
//            $av=explode(":",$v);
//            $bb=Goods_attrModel::where("attr_id",$av[0])->first();
//
//            $cc=GoodsvalueModel::where("goods_val_id",$av[1])->first();
////            $arr["res"]=[$cc->goods_val_id=>$cc->goods_val_name];
//            if(empty($arr["0"])){
//                $arr["0"]=[$cc->goods_val_id=>$cc->goods_val_name];
//            }else{
//                $arr["0"]["ress"][]=[$cc->goods_val_id=>$cc->goods_val_name];
//
//            }
////            if($arr["res"]){
////                $arr["res"]["ress"][]=[$cc->goods_val_id=>$cc->goods_val_name];
////            }
////            var_dump($arr);die;
////            if($arr[$av[0]]===$av[0]){
////                $arr[$av[0]][]=[$cc->goods_val_id=>$cc->goods_val_name];
////            }else{
////                $arr[$av[0]][]=[$cc->goods_val_id=>$cc->goods_val_name];
////            }
//        }
////        var_dump($arr);die;
//        return $arr;
//    }
}
