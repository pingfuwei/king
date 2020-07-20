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
    public function createDo(){
        $arr = request()->except("_token");
        $arr["addtime"] = time();
        $arr["admin_pwd"] = encrypt($arr["admin_pwd"]);
        $res = Admin::create($arr);
        if($res){
            return redirect("/admin/admin/index");
        }else{
            return redirect("/admin/admin/create");
        }
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
    //管理员修改
    public function edit(Request $request){
        $id = $request->all();
        // dd($id);
        $admin = Admin::where("admin_id",$id)->first();
        $admin["admin_pwd"] = decrypt($admin["admin_pwd"]);
        // dd($admin);
        return view("admin.admin.edit",compact("admin"));
    }
    //管理员修改执行
    public function editDo(Request $request){
        $arr = $request->except("_token");
        // dd($arr);
        $arr["addtime"] = time();
        $arr["admin_pwd"] = encrypt($arr["admin_pwd"]);
        $res = Admin::where("admin_id",$arr["admin_id"])->update($arr);
        if($res){
            return redirect("/admin/admin/index");
        }else{
            return redirect("/admin/admin/create");
        }
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
}
