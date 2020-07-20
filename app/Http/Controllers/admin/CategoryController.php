<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\AdminModel\Category;

class CategoryController extends Controller
{
    public function create(){
        $cate = Category::where("status","1")->get();
        return view("admin.category.create",compact("cate"));
    }
    public function createDo(){
        $arr = request()->except("_token");
        $arr["cate_time"] = time();
        // dd($arr);
        $res = Category::create($arr);
        if($res){
            return redirect("/admin/category/index");
        }else{
            return redirect("/admin/category/create");
        }
    }
    public function index(){
        $cate = Category::where("status","1")->get();
        $cateInfo = getCateInfo($cate);

        return view("admin.category.index",compact("cateInfo"));
    }
}
