<?php

namespace App\Http\Controllers\admin;

use App\AdminModel\vipModel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class VipController extends Controller
{
    public function create(){
        return view("admin.vip.create");
    }
    public function createDo(Request $request){
        $all=$request->all();
        $vip_name=$all['vip_name'];
        $price=$all['price'];
        $data=[
            'vip_name'=>$vip_name,
            'price'=>$price,
            'vip_time'=>time()
        ];
        $res=vipModel::insert($data);
        if($res){
            return [
                'code'=>200,
                'msg'=>"添加成功",
                'data'=>$res
            ];
        }else{
            return [
                'code'=>500,
                'msg'=>"添加失败",
                'data'=>$res
            ];
        }
    }
    public function index(){
        $data=vipModel::get();
        return view('admin.vip.index',['data'=>$data]);
    }
}
