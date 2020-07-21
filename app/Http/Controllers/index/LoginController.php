<?php

namespace App\Http\Controllers\index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    //注册
    public function reg(){
        return view("index.reg.reg");
    }
    //验证码
    public function ajaxCode(){
        echo 11;
    }
    //登陆
    public function login(){
        return view("index.login.login");
    }
}
