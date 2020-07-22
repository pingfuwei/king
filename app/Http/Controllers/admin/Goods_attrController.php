<?php

namespace App\Http\Controllers\admin;

use App\AdminModel\Goods_attrModel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Goods_attrController extends Controller
{
    public function create(){
        return view('admin.goods_attr.create');
    }
    public function createDo(Request $request){
        $all=$request->all();
        $attr_name=$all['attr_name'];
        $data=[
            'attr_name'=>$attr_name,
            'add_time'=>time()
        ];
        $res=Goods_attrModel::insert($data);
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
        $attr_name=request()->get('attr_name');
        $where=[];
        if($attr_name){
            $where[]=['attr_name','like',"%$attr_name%"];
        }
        $data=Goods_attrModel::where($where)->paginate(2);
        return view('admin.goods_attr.index',['data'=>$data,'attr_name'=>$attr_name]);
    }
    public function upd($attr_id){
        $data=Goods_attrModel::where('attr_id',$attr_id)->first();
        return view('admin.goods_attr.upd',['data'=>$data]);
    }
    public function updDo(Request $request){
        $all=$request->all();
        $attr_name=$all['attr_name'];
        $attr_id=$all['attr_id'];
        $data=[
            'attr_name'=>$attr_name,
        ];
        $res=Goods_attrModel::where('attr_id',$attr_id)->update($data);
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
        $attr_id=request()->post('attr_id');
        $res=Goods_attrModel::where('attr_id',$attr_id)->delete();
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
        $attr_id=$all['attr_id'];
        $res=Goods_attrModel::where('attr_id',$attr_id)->update([$field=>$value]);
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
    public function uniq(){
//        echo 111;die;
        $attr_name=request()->get('attr_name');
        $res=Goods_attrModel::where('attr_name',$attr_name)->first();
        if($res){
            return "no";
        }else{
            return "ok";
        }
    }
}
