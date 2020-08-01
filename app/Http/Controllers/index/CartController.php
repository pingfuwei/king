<?php

namespace App\Http\Controllers\index;

use App\Http\Controllers\Controller;
use App\IndexModel\Cart;
use App\indexModel\User;
use Illuminate\Http\Request;

class CartController extends Controller
{
    //
    /*
     * 购物车列表
     */
    public function cartlist(Request $request){
        $user_name = $request->session()->get("user_name");
        if(empty($user_name)){
            $message = [
                'code' => '000001',
                'message' => 'error',
                'result' => [
                    'message' =>"请先登陆",
                ]
            ];
            return json_encode($message,JSON_UNESCAPED_UNICODE);
        }
        $usermodel=new User();
        $user=$usermodel::where('user_name',$user_name)->first();
        $where=[
            ['user_id','=',$user['user_id']],
            ['is_del','=',1]
        ];
        $cartmodel=new Cart();
        $cart_info=$cartmodel::where($where)->arderBy('time','desc')->get();
        if($cart_info){
            echo 111;
//            return view('index.cart.cartlist',['cart_info'=>$cart_info]);
        }else{
            $cart_info = [];
            echo 222;
//            return view('index.cart.cartlist',['cart_info'=>$cart_info]);
        }
    }
}
