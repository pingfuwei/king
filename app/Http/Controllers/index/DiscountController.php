<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\AdminModel\Userdis;
use App\IndexModel\User;

class DiscountController extends Controller
{
    public function get(){
        $user_name=session('user_name');
        $user=User::where('user_name',$user_name)->first();
        $user_id=$user['user_id'];
        $data=Userdis::leftjoin('discount','discount.dis_id','=','user_discount.dis_id')->where('user_id',$user_id)->get();
        return view('index.discount.get',['data'=>$data]);
    }
}
