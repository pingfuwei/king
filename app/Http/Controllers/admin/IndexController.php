<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\indexModel\CartScroe;
class IndexController extends Controller
{
    public function index(Request $request){
        $cartCount=CartScroe::count();//积分换购订单
        return view("admin.index",["cartCount"=>$cartCount]);
    }
    //积分换购订单展示
    public function list(){
        $data=CartScroe::get();
        return view("admin.cartScore.list",["data"=>$data]);
    }
}
