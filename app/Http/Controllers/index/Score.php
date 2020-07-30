<?php

namespace App\Http\Controllers\index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\AdminModel\Goods;
use App\AdminModel\NewsModel;
use App\AdminModel\goods_stock;
use App\AdminModel\GoodsvalueModel;
use App\AdminModel\Goods_attrModel;
use App\indexModel\User_code;
use App\indexModel\User;
use App\indexModel\UserInfo;
class Score extends Controller
{
    public function list(){
            $goodsmodel=new Goods();
            $goods=$goodsmodel::where("goods_num",">",0)->orderBy("addtime","desc")->limit(3)->get();
//            dd($goods);
//            return view('index.newsone',['res'=>$res,'goods'=>$goods,'news_info'=>$news_info]);
        return view("index.score.list",["goods"=>$goods]);
    }
    public function desc(){
        $goods_id=\request()->goods_id;
        $goods=Goods::where("goods_id",$goods_id)->first();
        $stock=goods_stock::where("goods_id",$goods_id)->get();
        $goodsAttr=Goods_attrModel::get();
//        dd($goodsAttr);
        $arr=[];
        foreach ($stock as $k=>$v){
            $v["ability"]=explode(":",$v["ability"]);
            foreach ($v['ability'] as $kk=>$vv){
                $vv=explode(",",$vv);
                $val=GoodsvalueModel::where("goods_val_id",$vv[1])->first();
                $attr=Goods_attrModel::where("attr_id",$vv[0])->first();
                if(isset($arr[$vv[0]])){
                    $arr[$vv[0]][$vv["1"]]="$val->goods_val_name";
                }else{
                    $arr[$vv[0]]=[
                        $vv["1"]=>"$val->goods_val_name"
                    ];
                }
            }
        }
//        dd($arr);
        return view("index.score.desc",["goods"=>$goods,"arr"=>$arr,"goodsAttr"=>$goodsAttr]);
    }
    public function descAjax(){
        $data=\request()->all();
        $name=session("user_name");
        $user_id=User::where("user_name",$name)->first();
        $userInfo=UserInfo::where("user_id",$user_id['user_id'])->first();
        if($userInfo["score"]<$data["score"]){
            echo "积分不够";die;
        }
        $goods_stock=goods_stock::where("ability",$data["ability"])->first();
        if(empty($goods_stock)){
            echo "不能篡改数据";die;
        }
        if($goods_stock["stock"]<1){
            echo "库存不够请选择别的";die;
        }
        echo "添加成功";
    }
}
