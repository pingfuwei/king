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
    	$brand_name = request()->brand_name;
    	$time = time();
    	$data= [];
    	//执行添加语句
    	$data= ['brand_name' => $brand_name,'time' => $time];
    	//判断是否添加成功
    	$res = brand::insert($data);
    	if($res){
    		$data = [
    			'msg'=>true,
    			'error'=>10000,
    			'data'=>[]
    		];
    	}else{
    		$data = [
    			'msg'=>true,
    			'error'=>10001,
    			'data'=>[]
    		];
    	}
    	return json_encode($data);exit;


    }
    public function index(){
    	$data = brand::where('status',0)->get();
    	return view('admin.brand.index',['data'=>$data]);
    }
}
