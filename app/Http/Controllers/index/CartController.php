<?php

namespace App\Http\Controllers\index;

use App\Http\Controllers\Controller;
use App\IndexModel\Cart;
use App\IndexModel\User;
use Illuminate\Http\Request;

class CartController extends Controller
{
    //
    /*
     * 购物车列表
     */
    public function cartlist(Request $request){
        $user_name = $request->session()->get("user_name");
        $usermodel=new User();
        $user=$usermodel::where('user_name',$user_name)->first();
        $where=[
            ['user_id','=',$user['user_id']],
            ['is_del','=',1]
        ];
        $cartmodel=new Cart();
        $cart_info=$cartmodel::where($where)->get();
        if($cart_info){
            return view('index.cart.cartlist',['cart_info'=>$cart_info]);
        }
//        else{
//        }
    }
    //购物车添加
    public function cartcreate(Request $request){
        $arr = $request->all();
        // dd($arr);
        //判断非法
        if(empty($arr["goods_id"])){
            $message = $this->datacode("false","00001","非法操作");
        }

        //判断购买数量
        if(empty($arr["buy_number"]) && $arr["buy_number"]=="0"){
            $message = $this->datacode("false","00001","数量不能为空");
        }

        //判断sku
        if(empty($arr["goods_stick"])){
            $message = $this->datacode("false","00001","请选择sku");
        }

        $arr["goods_stick"] = implode(":",$arr["goods_stick"]);
        // dd($arr);

        echo json_encode($message);
    }

    //购物车提示信息
    public function datacode($status="",$code=1,$msg="",$result=""){
        $message = [];
        $message["status"] = $status;
        $message["code"] = $code;
        $message["msg"] = $msg;
        $message["result"] = $result;
        return $message;
    }
}
