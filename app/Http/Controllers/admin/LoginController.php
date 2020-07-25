<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\AdminModel\Admin;

class LoginController extends Controller
{
    public function login(){
        return view("admin.login");
    }
    //登录执行
    public function loginis(Request $request){
        $arr = $request->all();
        // dd($arr);
        $user = Admin::where("admin_name",$arr["admin_name"])->first();


        // dd($power_role);

        // var_dump($user["admin_pwd"]);exit;
        if(empty($arr["admin_name"])){
            $message = $this->datacode("false","00001","用户名称不能为空");
        }else if(!$user){
            $message = $this->datacode("false","00001","该用户名称不存在");
        }else if(decrypt($user->admin_pwd)!=$arr["admin_pwd"]){
            $message = $this->datacode("false","00001","密码有误");
        }else{
            if($user){
                session(["user"=>$user]);
                $message = $this->datacode("true","00000","登录成功","/admin/indexs");
            }else{
                $message = $this->datacode("false","00001","登录失败");
            }
        }

        echo json_encode($message);
    }

    //信息提示
    public function datacode($status="",$code=1,$msg="",$result=""){
        $message = [];
        $message["status"] = $status;
        $message["code"] = $code;
        $message["msg"] = $msg;
        $message["result"] = $result;
        return $message;
    }
    public function indexs(){

        return view("admin.indexs");
    }
    //退出登陆
    public function exit(){
        session(['user'=>null]);
        return view('admin.login');
    }
}
