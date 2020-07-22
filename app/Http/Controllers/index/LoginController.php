<?php

namespace App\Http\Controllers\index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\indexModel\User_code;
use App\indexModel\User;
class LoginController extends Controller
{
    //注册
    public function reg(){
        return view("index.reg.reg");
    }
    //注册执行
    public function regDo(){
        $data=\request()->all();
        $user=User::where("user_tel",$data["user_tel"])->first();

    }
    //验证码
    public function ajaxCode(){
        $tel=\request()->user_tel;
        $tt=User_code::where("user_tel",$tel)->first();
        $user=User::where("user_tel",$tel)->first();
        $time=strtotime(date("Y-m-d"),time());
        if(($tt->time-$time)<60*60*24 && $tt->status>=5){
            echo "一天之内发五条";die;
        }
        if($user){
            echo "已被注册";die;
        }
        $code=rand(000000,999999);
    $host = "http://yzxyzm.market.alicloudapi.com";
    $path = "/yzx/verifySms";
    $method = "POST";
    $appcode = "ded86ebaced34cb0bd7690472c0c399e";
    $headers = array();
    array_push($headers, "Authorization:APPCODE " . $appcode);
    $querys = "phone=$tel&templateId=TP18040314&variable=code:$code";
    $bodys = "验证码";
    $url = $host . $path . "?" . $querys;

    $curl = curl_init();
    curl_setopt($curl, CURLOPT_CUSTOMREQUEST, $method);
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($curl, CURLOPT_FAILONERROR, false);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_HEADER, false);
    if (1 == strpos("$".$host, "https://"))
    {
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
    }
        $reg=curl_exec($curl);
        $re=json_decode($reg,true);
        if($re["return_code"]==="00000"){
            echo 11;
        $info=User_code::where("user_tel",$tel)->first();
        if($info){
            if($info->status>=5){
                $status=1;
            }else{
                $status=$info->status+1;
            }
            $res=User_code::where("user_tel",$tel)->update(["code"=>$code,"time"=>time(),"status"=>$status]);
            if($res){
                echo "okk";
            }else{
                echo "non";
            }
        }else{
            $res=User_code::insert(["user_tel"=>$tel,"code"=>$code,"time"=>time(),"status"=>1]);
            if($res){
                echo "ok";
            }else{
                echo "no";
            }
        }

    }

    }
    //登陆
    public function login(){
        return view("index.login.login");
    }
}
