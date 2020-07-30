<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\AdminModel\brand;
class BrandController extends Controller
{	//跳到品牌添加页面
    public function create(){
    	return view('admin.brand.create');
    }
    //执行添加
    public function createDo(){
        $arr = request()->except("_token");
        // dd($arr);
        if(request()->hasFile("brand_img")){
            $arr["brand_img"] = upload("brand_img");
        }
    	$arr["time"] = time();
    	//判断是否添加成功
    	$res = brand::insert($arr);
    	if($res){
    		return redirect("/admin/brand/index");
    	}else{
    		return redirect("/admin/brnad/create");
    	}


    }
    public function index(){
    	$data = brand::where('status',0)->get();
    	return view('admin.brand.index',['data'=>$data]);
    }
    public function del(){
        $brand_id = request()->brand_id;
        $res = brand::destroy($brand_id);
        if($res){
            $data = [
                'msg'=>true,
                'essay'=>10000,
                'data'=>[]
            ];
        }else{
            $data = [
                'msg'=>true,
                'essay'=>10001,
                'data'=>[]
            ];
        }
        return json_encode($data);exit;
    }
    public function upd(){
        $brand_id = request()->brand_id;
        $data = brand::where('brand_id',$brand_id)->first();
        return view('admin.brand.upd',['data'=>$data]);
    }
    public function updDo(){
        $arr = request()->except("_token");
        // dd($arr);
        if(request()->hasFile("brand_img")){
            $arr["brand_img"] = upload("brand_img");
        }
        $arr["time"] = time();
        //判断是否修改成功
        $res = brand::where('brand_id',$arr["brand_id"])->update($arr);
        if($res){
        	return redirect("/admin/brand/index");
        }else{
        	return redirect("/admin/brnad/index");
        }
    }
}
