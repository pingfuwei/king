<?php

namespace App\Http\Controllers\index;

use App\Http\Controllers\Controller;
use App\IndexModel\Cart;
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
}
