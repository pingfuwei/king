<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\AdminModel\Category;

class CategoryController extends Controller
{
    //分类添加
    public function create(){
        $cate = Category::where("status","1")->get();
        return view("admin.category.create",compact("cate"));
    }
    //ajax唯一
    public function ajaxuniq(Request $request){
        // echo "123";
        $cate_name = $request->get("cate_name");
        $where = [
            "cate_name"=>$cate_name,
            "status"=>1
        ];
        $res = Category::where($where)->first();
        if($res){
            echo "no";
        }else{
            echo "ok";
        }
    }
    //分类添加执行
    public function createDo(){
        $arr = request()->except("_token");
        $arr["cate_time"] = time();
        // dd($arr);
        $where = [
            "cate_name"=>$arr["cate_name"],
            "status"=>1
        ];
        $category = Category::where($where)->first();
        //判断
        if(empty($arr["cate_name"])){
            $message = $this->datacode("false","00001","分类名称不能为空");
        }else if($category){
            $message = $this->datacode("false","00001","分类名称已存在");
        }else{
            $res = Category::create($arr);
            if($res){
            $message = $this->datacode("true","00000","添加成功","/admin/category/index");
            }else{
            $message = $this->datacode("false","00001","添加失败");
            }

        }

        echo json_encode($message);
    }
    //分类展示
    public function index(){
        $cate = Category::where("status","1")->get();
        $cateInfo = getCateInfo($cate);

        return view("admin.category.index",compact("cateInfo"));
    }

    //分类即点即改唯一
    public function ajaxNames(Request $request){
        $arr = $request->all();
        // dd($arr);
        $cate_name = Category::where("cate_id",$arr["id"])->value("cate_name");
        // dd($cate_name);
        if($cate_name==$arr["new_name"]){
            echo "oks";
        }else{
            $admin = Category::where("cate_name",$arr["new_name"])->first();
            if($admin){
                echo "no";
            }else{
                echo "ok";
            }
        }
    }

    //分类即点即改
    public function ajaxName(Request $request){
        $arr = $request->all();
        // print_r($arr);exit;
        $res = Category::where("cate_id",$arr["id"])->update(["cate_name"=>$arr["new_name"]]);
        if($res){
            $message = $this->datacode("true","00000","修改成功");
        }

        echo json_encode($message);
    }

    //分类修改展示
    public function upd(Request $request){
        $id = $request->all();
        $cate = Category::where("status","1")->get();
        $category = Category::where("cate_id",$id)->first();
        return view("admin.category.upd",compact("category","cate"));
    }

    //分类修改执行
    public function updDo(){
        $arr = request()->except("_token");
        $cate_id = $arr["cate_id"];
        $arr["cate_time"] = time();
        // dd($arr);
        $where = [
            "cate_name"=>$arr["cate_name"],
            "status"=>1
        ];
        $category = Category::where($where)->first();
        //判断
        if(empty($arr["cate_name"])){
            $message = $this->datacode("false","00001","分类名称不能为空");
        }
        $cate_name = Category::where("cate_id",$cate_id)->first();
        // dd($cate_name);
        if($cate_name["cate_name"]!=$arr["cate_name"]){
            $where2 = [
                "cate_name"=>$arr["cate_name"],
                "status"=>1
            ];
            $category = Category::where($where2)->first();
            // dd($category);
            if($category){
                $message = $this->datacode("false","00001","分类名称已存在");
            }else{
                // dd($arr);
                $res = Category::where("cate_id",$cate_id)->update($arr);
                if($res){
                    $message = $this->datacode("true","00000","修改成功","/admin/category/index");
                }else{
                    $message = $this->datacode("false","00001","修改失败");
                }

            }
        }

        echo json_encode($message);
    }

    //分类删除
    public function del(Request $request){
        $id = $request->all();
        // dd($id);
        $cate = Category::where("p_id",$id)->first();
        if($cate){
            return redirect("/admin/category/index")->with("msg","该分类下有子分类");
        }else{
            $res = Category::where("cate_id",$id)->update(["status"=>0]);
            if($res){
                return redirect("/admin/category/index");
            }else{
                return redirect("/admin/category/index");
            }
        }
    }

    //分类提示信息
    public function datacode($status="",$code=1,$msg="",$result=""){
        $message = [];
        $message["status"] = $status;
        $message["code"] = $code;
        $message["msg"] = $msg;
        $message["result"] = $result;
        return $message;
    }
}
