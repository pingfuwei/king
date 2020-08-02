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
use App\indexModel\CartScroe;
use App\indexModel\AddressModel;
use App\indexModel\Shop_Area;
use Illuminate\Support\Facades\DB;
class Score extends Controller
{
    public function list(){
            $goodsmodel=new Goods();
            $goods=$goodsmodel::where("goods_num",">",0)->orderBy("addtime","asc")->limit(3)->get();
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
        $goods_stock=goods_stock::where(["ability"=>$data["ability"],"goods_id"=>$data["goods_id"]])->first();
        if(empty($goods_stock)){
            echo "不能篡改数据";die;
        }
        if($goods_stock["stock"]<1){
            echo "库存不够请选择别的";die;
        }
        $where=[
            ["user_id","=",$user_id["user_id"]],
            ["status","<>",1],
        ];
        $result=CartScroe::where($where)->first();
        if($result){
            echo "本次活动一个用户只能兑换一次";die;
        }
            $order=rand(00000,99999).time();
            $arr=[
                "goods_id"=>$data["goods_id"],
                "user_id"=>$user_id["user_id"],
                "ability"=>$data["ability"],
                "scroe"=>$data["scroe"],
                "status"=>1,
                'order' =>$order
            ];
            $res=CartScroe::insert($arr);
            if($res){
                echo "添加成功";
            }else{
                echo "异常";
            }


    }
    //结算
    public function settlement(){
        $goods_id=\request()->goods_id;
        if(empty($goods_id)){
            echo "<script>alert('请选择商品');location.href='http://www.king.com/';</script>";
        }
        $goods=Goods::where("goods_id",$goods_id)->first();
        $name=session("user_name");
        $user_id=User::where("user_name",$name)->first();
        $address=AddressModel::where("user_id",$user_id["user_id"])->get();
        foreach ($address as $k=>$v){
            $province=Shop_Area::where("id",$v->province)->pluck("name");
            $v["province"]=$province[0];
            $city=Shop_Area::where("id",$v->city)->pluck("name");
            $v["city"]=$city[0];
            $area=Shop_Area::where("id",$v->area)->pluck("name");
            $v["area"]=$area[0];
        }
        $res=CartScroe::where(["goods_id"=>$goods_id,"user_id"=>$user_id["user_id"],"status"=>1])->first();
        $goods["ability"]=$res["ability"];
//        dd($goods);
        return view("index.score.settlement",["address"=>$address,"goods"=>$goods]);
    }
    //结算ajax
    public function settlementAjax(){
        $name=session("user_name");
        $data=\request()->all();
        $user_id=User::where("user_name",$name)->first();
        $userInfo=UserInfo::where("user_id",$user_id['user_id'])->first();
        if($userInfo["score"]<$data["price"]){
            echo "积分不够";die;
        }
        $goods_stock=goods_stock::where(["ability"=>$data["ability"],"goods_id"=>$data["goods_id"]])->first();
        if(empty($goods_stock)){
            echo "不能篡改数据";die;
        }
//        var_dump($goods_stock);die;
        if($goods_stock["stock"]<1){
            echo "库存不够---请联系卖家";die;
        }
        $where=[
            ["user_id","=",$user_id["user_id"]],
            ["status","<>",1],
        ];
        $result=CartScroe::where($where)->first();
        if($result){
            echo "本次活动一个用户只能兑换一次";die;
        }
        DB::beginTransaction();//开启一个事务
            $where=[
                "user_id"=>$user_id["user_id"],
                "goods_id"=>$data["goods_id"],
                "status"=>1,
            ];



            $address=DB::table('cartScroe')->where($where)->update(['address_id' =>$data["address_id"]]);
//            $address=false;
        if($address===false){
            echo "内部异常";
            DB::rollBack();//回滚事务
            die;
        }
        $scr=DB::table("user_info")->where("user_id",$user_id["user_id"])->first();
        $score=DB::table("user_info")->where("user_id",$user_id["user_id"])->update(["score"=>$scr->score-$data["price"]]);
        if($score===false){
            echo "内部异常";
            DB::rollBack();//回滚事务
            die;
        }
        $go=DB::table("shop_goods")->where("goods_id",$data["goods_id"])->first();
        $goods=DB::table("shop_goods")->where("goods_id",$data["goods_id"])->update(["goods_num"=>$go->goods_num-1]);
        if($goods===false){
            echo "内部异常";
            DB::rollBack();//回滚事务
            die;
        }
        $a1=DB::table("cartScroe")->where($where)->first();
        $wheress=[
            "ability"=>$a1->ability,
            "goods_id"=>$data["goods_id"],
        ];
        $a3=DB::table('goods_stock')->where($wheress)->first();
        $abc=DB::table('goods_stock')->where($wheress)->update(["stock"=>$a3->stock-1]);
        if($abc===false){
            echo "内部异常";
            DB::rollBack();//回滚事务
            die;
        }
        $order=DB::table('cartScroe')->where($where)->update(["status"=>2,"addtime"=>time()]);
        if($order===false){
            echo "内部异常";
            DB::rollBack();//回滚事务
            die;
        }
        //var_dump($wh);die;

        DB::commit();//提交事务
        echo "兑换成功";
//        var_dump($res);

    }
    //设为默认地址
    public function addresAjax(){
        $address_id=\request()->address_id;
        $name=session("user_name");
        $user_id=User::where("user_name",$name)->first();
        $where=[
            "user_id"=>$user_id["user_id"],
            "status"=>1,
        ];
        $aa=AddressModel::where($where)->first();
//        var_dump($aa);die;
        if($aa){
            $res=AddressModel::where($where)->update(["status"=>0]);
        }
        $wheres=[
            "user_id"=>$user_id["user_id"],
            "address_id"=>$address_id,
        ];
        $info=AddressModel::where($wheres)->update(["status"=>1]);
        if($info!==false){
            echo 'ok';
        }
    }
}
