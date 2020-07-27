<?php

namespace App\Http\Controllers\index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\indexModel\User_code;
use App\indexModel\User;
use App\indexModel\GetJson;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Cookie;
class LoginController extends Controller
{
    //注册
    public function reg(){
        return view("index.reg.reg");
    }
    //注册执行
    public function regDo(){
        $data=\request()->all();
        $data["user_pwd"]=md5($data["user_pwd"]);
        $data["code"]=intval($data["code"]);
        $data["user_time"]=time();
        $data["user_status"]=1;
        $where=["user_tel"=>$data["user_tel"],"user_status"=>1];
        $user=User::where($where)->first();
        $wher=["user_name"=>$data["user_name"],"user_status"=>1];
        $user_name=User::where($wher)->first();
        $tt=User_code::where("user_tel",$data["user_tel"])->first();
        if($user_name){
            echo GetJson::getJson("111","此用户已被注册");die;
        }
        if($user){
            echo GetJson::getJson("111","此手机号已被注册");die;
        }
        if($tt->code!==$data["code"]){
            return GetJson::getJson("111","验证码有误 ");
        }
        if((time()-$tt->time)>60*50){
            return GetJson::getJson("111","验证码有效五分钟");
        }
        $wheres=["user_tel"=>$data["user_tel"],"user_status"=>0];
        $users=User::where($wheres)->first();
        if($users){
            $res=User::where("user_tel",$data["user_tel"])->update(["user_pwd"=>$data["user_pwd"],"user_time"=>$data["user_time"],"user_name"=>$data["user_name"],"user_status"=>1]);
            if($res!==false){
                return GetJson::getJson("000","注册成功");
            }
        }else{
            unset($data["code"]);
            $res=User::insert($data);
        }
        if($res){
            return GetJson::getJson("000","注册成功");
        }

    }
    //验证码
    public function ajaxCode(){
        $tel=\request()->user_tel;
        $tt=User_code::where("user_tel",$tel)->first();
        $user=User::where("user_tel",$tel)->first();
        $time=strtotime(date("Y-m-d"),time());
        if(($tt->time>$time) && $tt->status>=5){
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
//        echo \session("user_name");
        return view("index.login.login");
    }
    //登陆执行
    public function ajaxLogin(){
        $data=\request()->all();
        if(count($data)!==3){
            return GetJson::getJson("111","不能篡改内部参数");
        }
        $where=["user_tel"=>$data["user_name"],"user_status"=>1];
        $user_tel=User::where($where)->first();
        $wheres=["user_name"=>$data["user_name"],"user_status"=>1];
        $user_name=User::where($wheres)->first();
        if($user_tel){
            if($user_tel->user_pwd!==md5($data["user_pwd"])){
                $count=$this->limits($user_tel->user_id);
                return GetJson::getJson("111","$count");
            }
           return $this->Exemption($data["che"],$user_tel->user_name,$data['user_pwd']);
//            return GetJson::getJson("000","登陆成功");
        }
        if($user_name){
            if($user_name->user_pwd!==md5($data["user_pwd"])){
                $count=$this->limits($user_name->user_id);
                return GetJson::getJson("111","$count");
            }
            return $this->Exemption($data["che"],$data['user_name'],$data['user_pwd']);
        }
        if(!$user_name || !$user_tel){
            return GetJson::getJson("111","账户或密码错误");
        }
    }
    //登陆安全
    public function limits($user_id){
        $where=["user_id"=>$user_id,"user_status"=>1];
        $user=User::where($where)->first();
        $time=strtotime(date("Y-m-d"),time());
        if(($user->login_time>$time) && $user->login_status<=3){
            if($user->login_status>=3){
                $status=3;
            }else{
                $status=$user->login_status+1;
            }
            $login_status=User::where("user_id",$user_id)->update(["login_status"=>$status,"login_time"=>time()]);
            if(3-$user->login_status!==0){
                $counts="账户或密码错误今天还剩". 3-$user->login_status . "次";
            }else{
                $counts="账户或密码错误今天次数用尽！！！";
            }
            return $counts;
        }else{
            $login_status=User::where("user_id",$user_id)->update(["login_status"=>1,"login_time"=>time()]);
            return $counts="账户或密码错误今天还剩3次";

        }
    }
    //七天免登录
    public function Exemption($che,$user_name,$user_pwd){
        if($che==="2"){
            if(\request()->cookie("user") && \request()->cookie("user_pwd")){
                \session(["user_name"=>$user_name,"user_pwd"=>$user_pwd]);
                return GetJson::getJson("000","登陆成功");
            }else{
                Cookie::queue("user",null);
                Cookie::queue("user_pwd",null);
                Cookie::queue("user",$user_name,60*24*7);
                Cookie::queue("user_pwd",$user_pwd,60*24*7);
                \session(["user_name"=>$user_name,"user_pwd"=>$user_pwd]);
                return GetJson::getJson("000","登陆成功");
            }
            return GetJson::getJson("000","登陆成功");
        }else{
            return GetJson::getJson("000","登陆成功");
        }
    }
    //忘记密码短信
    public function ajaxCodes(){
        $tel=\request()->user_tel;
        $tt=User_code::where("user_tel",$tel)->first();
        $user=User::where("user_tel",$tel)->first();
        $time=strtotime(date("Y-m-d"),time());
        if(($tt['time']>$time) && $tt->status>=5){
            echo "一天之内发五条";die;
        }
        if(!$user){
            echo "此手机号没有账号";die;
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
    //忘记密码执行
    public function forgetPas(){

    }
}
