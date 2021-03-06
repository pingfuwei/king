<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\IndexModel\UserInfo;
use Illuminate\Http\Request;
use App\indexModel\CartScroe;
use App\indexModel\UrgeScore;
use App\indexModel\User;
use App\indexModel\UrgeMone;
use App\indexModel\OrderCart;
class IndexController extends Controller
{
    public function index(Request $request){
        $cartCount=CartScroe::count();//积分换购订单
        return view("admin.index",["cartCount"=>$cartCount]);
    }
    //积分换购订单展示
    public function list(){
        $data=CartScroe::get();
        foreach ($data as $k=>$v){
            $res=UrgeScore::where(["order"=>$v->order,"user_id"=>$v->user_id,"goods_id"=>$v->goods_id])->first();
            if($res){
                $v->UrgeScore=$res->status;
            }else{
                $v->UrgeScore=0;
            }
//            var_dump($v->order);die;
        }
//        var_dump($data);
        return view("admin.cartScore.list",["data"=>$data]);
    }
    //积分换购改状态ajax
    public function listajax(){
        $id=\request()->id;
        $res=CartScroe::where("id",$id)->update(["status"=>3]);
        if($res!==false){
            echo "发货成功";
        }
    }
    //金钱订单展示
    public function MonList(){
        $data=OrderCart::get();
        foreach ($data as $k=>$v){
            $res=UrgeMone::where(["order"=>$v->order,"user_id"=>$v->user_id])->first();
            if($res){
                $v->UrgeScore=$res->status;
            }else{
                $v->UrgeScore=0;
            }
//            var_dump($v->order);die;
        }
//        dd($data);
        return view("admin.cartMon.MonList",["data"=>$data]);
    }
    //金钱订单改变状态
    public function Monlistajax(){
        $id=\request()->id;
        $res=OrderCart::where("id",$id)->update(["status"=>3]);
        if($res!==false){
            echo "发货成功";
        }
    }

}
