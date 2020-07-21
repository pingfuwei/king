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
}
