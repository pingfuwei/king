<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\AdminModel\brand;
use App\AdminModel\Category;
use App\AdminModel\Goods;

class GoodsController extends Controller
{
    public function create(){
        $brand = brand::where("status","0")->get();
        $cate = Category::where("status","1")->get();
        return view("admin.goods.create",compact("brand","cate"));
    }

    //商品ajax验证唯一
    public function ajaxuniq(Request $request){
        // echo "123";
        $goods_name = $request->get("goods_name");
        $where = [
            "goods_name"=>$goods_name,
            "is_del"=>1
        ];
        $res = Goods::where($where)->first();
        if($res){
            echo "no";
        }else{
            echo "ok";
        }
    }

    //添加执行
    public function createDo(Request $request){
        $arr = $request->except("_token");
        // dd($arr);
        //单文件上传
        if($request->hasFile("goods_img")){
            $arr["goods_img"] = upload("goods_img");
        }
        //多文件上传
        if($request->hasFile("goods_imgs")){
            $arr["goods_imgs"] = uploads("goods_imgs");
            $arr["goods_imgs"] = implode("|",$arr["goods_imgs"]);
        }
        $arr["addtime"] = time();
        // dd($arr);
        $res = Goods::create($arr);
        if($res){
            return redirect("/admin/goods/index");
        }else{
            return redirect("/admin/goods/create");
        }
    }

    //商品展示
    public function index(Request $request){
        $cate_name = $request->get("cate_name");
        $goods_name = $request->get("goods_name");
        $brand_name = $request->get("brand_name");

        // print_r($arr);exit;
        $where = [];
            if($cate_name){
                $where[] = ["category.cate_name","like","%$cate_name%"];
            }
            if($brand_name){
                $where[] = ["brand.brand_name","like","%".$brand_name."%"];
            }
            if($goods_name){
                $where[] = ["shop_goods.goods_name","like","%".$goods_name."%"];
            }

        $where[] = ["shop_goods.is_del","1"];

        $brand = brand::where("status","0")->get();
        $cate = Category::where("status","1")->get();

        $goods = Goods::leftjoin("category","shop_goods.cate_id","=","category.cate_id")
                        ->join("brand","shop_goods.brand_id","=","brand.brand_id")
                        ->where($where)
                        ->paginate("3");
        // dd($cate);
        return view("admin.goods.index",compact("goods","brand","cate","cate_name","brand_name","goods_name"));
    }

    //即点即改唯一性
    public function ajaxNames(Request $request){
        $arr = $request->all();
        // dd($arr);
        $goods_name = Goods::where("goods_id",$arr["id"])->value("goods_name");
        // dd($goods_name);
        if($goods_name==$arr["new_name"]){
            echo "oks";
        }else{
            $admin = Goods::where("goods_name",$arr["new_name"])->first();
            if($admin){
                echo "no";
            }else{
                echo "ok";
            }
        }
    }

    //商品即点即改
    public function ajaxName(Request $request){
        $arr = $request->all();
        // print_r($arr);exit;
        $res = Goods::where("goods_id",$arr["id"])->update(["goods_name"=>$arr["new_name"]]);
        if($res){
            $message = $this->datacode("true","00000","修改成功");
        }

        echo json_encode($message);
    }

    //即点即改
    public function ajaxji(Request $request){
        $arr = $request->all();
        $filed = $arr["filed"];
        $status = $arr["status"]==1?2:1;
        // print_r($status);exit;
        $res = Goods::where("goods_id",$arr["goods_id"])->update([$filed=>$status]);
        if($res){
            $add = $arr["status"]==1?"×":"√";
            $message = $this->datacode("true","00000",$status,$add);
        }

        echo json_encode($message);
    }

    //商品修改
    public function upd(Request $request){
        $id = $request->all();
        // dd($id);
        $brand = brand::where("status","0")->get();
        $cate = Category::where("status","1")->get();
        $goods = Goods::where("goods_id",$id)->first();
        return view("admin.goods.upd",compact("goods","brand","cate"));
    }

    //商品修改执行
    public function updates(Request $request){
        $arr = $request->except("_token");
        // dd($arr);
        //单文件上传
        if($request->hasFile("goods_img")){
            $arr["goods_img"] = upload("goods_img");
        }
        //多文件上传
        if($request->hasFile("goods_imgs")){
            $arr["goods_imgs"] = uploads("goods_imgs");
            $arr["goods_imgs"] = implode("|",$arr["goods_imgs"]);
        }
        $arr["addtime"] = time();
        // dd($arr);
        $res = Goods::where("goods_id",$arr["goods_id"])->update($arr);
        if($res){
            return redirect("/admin/goods/index");
        }else{
            return redirect("/admin/goods/index");
        }
    }

    //商品删除
    public function del(Request $request){
        $id = $request->all();
        $res = Goods::where("goods_id",$id)->update(["is_del"=>0]);
        if($res){
            return redirect("/admin/goods/index");
        }else{
            return redirect("/admin/goods/index");
        }
    }

    //商品提示信息
    public function datacode($status="",$code=1,$msg="",$result=""){
        $message = [];
        $message["status"] = $status;
        $message["code"] = $code;
        $message["msg"] = $msg;
        $message["result"] = $result;
        return $message;
    }
}
