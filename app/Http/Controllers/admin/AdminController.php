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
    public function index(){
        $admin = Admin::where("admin_status","1")->get();
        return view("admin.admin.index",compact("admin"));
    }
}
