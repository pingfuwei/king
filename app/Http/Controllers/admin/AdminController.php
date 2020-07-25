<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\AdminModel\Admin;

class AdminController extends Controller
{
    public function create(){
        return view("admin.admin.create");
    }
    //ajax唯一
    public function ajaxuniq(Request $request){
        // echo "123";
        $admin_name = $request->get("admin_name");
        $where = [
            "admin_name"=>$admin_name,
            "admin_status"=>1
        ];
        $res = Admin::where($where)->first();
        if($res){
            echo "no";
        }else{
            echo "ok";
        }
    }
    public function createDo(){
        $arr = request()->except("_token");
        // dd($arr);

        //判断
        if(empty($arr["admin_name"])){
            $message = $this->datacode("false","00001","管理员名称不能为空");
        }
        $admin = Admin::where("admin_name",$arr["admin_name"])->first();
        if($admin){
            $message = $this->datacode("false","00001","管理员已存在");
        }
        if(empty($arr["admin_pwd"])){
            $message = $this->datacode("false","00001","管理员密码不能为空");
        }
        $pwd = "/^\w{6,}$/";
        if(!preg_match($pwd, $arr["admin_pwd"])){
            $message = $this->datacode("false","00001","管理员密码格式不正确");
        }

        $arr["addtime"] = time();
        $arr["admin_pwd"] = encrypt($arr["admin_pwd"]);
        $res = Admin::create($arr);
        if($res){
            $message = $this->datacode("true","00000","添加成功","/admin/admin/index");
        }else{
            $message = $this->datacode("false","00001","添加失败");
        }
        echo json_encode($message);
    }
    //管理员展示
    public function index(Request $request){
        $admin_name = $request->get("admin_name");
        // dd($admin_name);
        $where = [];
        if($admin_name){
            $where[] = ["admin_name","like","%$admin_name%"];
        }
        $where[] = ["admin_status","1"];
        // dd($where);
        $admin = Admin::where($where)->paginate("3");
        return view("admin.admin.index",compact("admin","admin_name"));
    }
    //管理员即点即改
    public function ajaxName(Request $request){
        $arr = $request->all();
        // print_r($arr);exit;
        $res = Admin::where("admin_id",$arr["id"])->update(["admin_name"=>$arr["new_name"]]);
        if($res){
            $message = $this->datacode("true","00000","修改成功");
        }

        echo json_encode($message);
    }
    //管理员即点即改唯一
    public function ajaxNames(Request $request){
        $arr = $request->all();
        // dd($arr);
        $admin_name = Admin::where("admin_id",$arr["id"])->value("admin_name");
        // dd($admin_name);
        if($admin_name==$arr["new_name"]){
            echo "oks";
        }else{
            $admin = Admin::where("admin_name",$arr["new_name"])->first();
            if($admin){
                echo "no";
            }else{
                echo "ok";
            }
        }
    }
    //管理员修改
    public function upd(Request $request){
        $id = $request->all();
        // dd($id);
        $admin = Admin::where("admin_id",$id)->first();
        $admin["admin_pwd"] = decrypt($admin["admin_pwd"]);
        // dd($admin);
        return view("admin.admin.edit",compact("admin"));
    }
    //管理员修改执行
    public function updDo(Request $request){
        $arr = $request->except("_token");
        $admin_id = $arr["admin_id"];
        // dd($admin_id);

        //判断
        if(empty($arr["admin_name"])){
            $message = $this->datacode("false","00001","管理员名称不能为空");
        }

        $admin_name = Admin::where("admin_id",$admin_id)->first();
        // dd($admin_name);
        if($admin_name["admin_name"]!=$arr["admin_name"]){
            $where2 = [
                "admin_name"=>$arr["admin_name"],
                "admin_status"=>1
            ];
            $admin = Admin::where($where2)->first();
            if($admin){
                $message = $this->datacode("false","00001","管理员名称已存在");
            }
        }
        if(empty($arr["admin_pwd"])){
            $message = $this->datacode("false","00001","管理员密码不能为空");
        }
        $pwd = "/^\w{6,}$/";
        if(!preg_match($pwd, $arr["admin_pwd"])){
            $message = $this->datacode("false","00001","管理员密码格式不正确");
        }

        $arr["addtime"] = time();
        $arr["admin_pwd"] = encrypt($arr["admin_pwd"]);
        $res = Admin::where("admin_id",$arr["admin_id"])->update($arr);
        if($res){
            $message = $this->datacode("true","00000","修改成功","/admin/admin/index");
        }else{
            $message = $this->datacode("false","00001","修改失败");
        }
        echo json_encode($message);
    }
    //管理员删除
    public function del(Request $request){
        $id = $request->all();
        // dd($id);
        $res = Admin::where("admin_id",$id)->update(["admin_status"=>0]);
        if($res){
            return redirect("/admin/admin/index");
        }else{
             return redirect("/admin/admin/index");
        }
    }

    //管理员提示信息
    public function datacode($status="",$code=1,$msg="",$result=""){
        $message = [];
        $message["status"] = $status;
        $message["code"] = $code;
        $message["msg"] = $msg;
        $message["result"] = $result;
        return $message;
    }
}
