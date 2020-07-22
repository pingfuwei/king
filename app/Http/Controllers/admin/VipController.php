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
    public function upd($vip_id){
        $data=vipModel::where('vip_id',$vip_id)->first();
        return view('admin.vip.upd',['data'=>$data]);
    }
    public function updDo(Request $request){
        $all=$request->all();
        $vip_name=$all['vip_name'];
        $price=$all['price'];
        $vip_id=$all['vip_id'];
        $data=[
            'vip_name'=>$vip_name,
            'price'=>$price,
        ];
        $res=vipModel::where('vip_id',$vip_id)->update($data);
        if($res){
            return [
                'code'=>200,
                'msg'=>"修改成功",
                'data'=>$res
            ];
        }else{
            return [
                'code'=>500,
                'msg'=>"修改失败",
                'data'=>$res
            ];
        }
    }
    public function del(){
        $vip_id=request()->post('vip_id');
        $res=vipModel::where('vip_id',$vip_id)->delete();
        if($res){
            return [
                'code'=>200,
                'msg'=>"删除成功",
                'data'=>$res
            ];
        }else{
            return [
                'code'=>500,
                'msg'=>"删除失败",
                'data'=>$res
            ];
        }
    }
    public function change(Request $request){
        $all=$request->all();
        $value=$all['value'];
        $field=$all['field'];
        $vip_id=$all['vip_id'];
        $res=vipModel::where('vip_id',$vip_id)->update([$field=>$value]);
        if($res){
            return [
                'code'=>200,
                'msg'=>"修改成功",
                'data'=>$res
            ];
        }else{
            return [
                'code'=>500,
                'msg'=>"修改成功",
                'data'=>$res
            ];
        }
    }
}
