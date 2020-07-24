<?php

namespace App\Http\Controllers\admin;

use App\AdminModel\Admin_Role;
use App\AdminModel\PowerModel;
use App\AdminModel\Role_PowerModel;
use App\AdminModel\RoleModel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DeveloperController extends Controller
{
    public function create(){
        return view('admin.role.create');
    }
    public function createDo(Request $request){
        $all=$request->all();
        $role_name=$all['role_name'];
        $data=[
            'role_name'=>$role_name,
            'role_status'=>1,
            'role_time'=>time()
        ];
        $res=RoleModel::insert($data);
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
        $role_name=request()->get('attr_name');
        $where=[];
        if($role_name){
            $where[]=['role_name','like',"%$role_name%"];
        }
        $data=RoleModel::where('role_status',1)->where($where)->paginate(2);
//        dd($data);
        foreach ($data as $k=>$v){
            $power_id=Role_PowerModel::where("role_id",$v->role_id)->where('status',1)->get();
            foreach ($power_id as $kk=>$vv){
                $power_id=PowerModel::where("power_id",$vv->power_id)->first();
                $data[$k]["res"].=$power_id->power_name.",";

            }
        }
//        dd($data);
        return view('admin.role.index',['data'=>$data,'role_name'=>$role_name]);
//
//        $data=RoleModel::where('role_status',1)->get();
//        $power=RoleModel::join('role_power','role.role_id','=','role_power.role_id')->get();
////        print_r($power);die;
//        return view('admin.role.index',['data'=>$data,'power'=>$power]);

    }
    public function power_create(){
        return view('admin.power.create');
    }
    public function power_createDo(Request $request){
        $all=$request->all();
        $power_name=$all['power_name'];
        $power_url=$all['power_url'];
        $data=[
            'power_name'=>$power_name,
            'power_url'=>$power_url,
            'power_status'=>1,
            'power_time'=>time()
        ];
        $res=PowerModel::insert($data);
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
    public function power_index(){
        $power_name=request()->get('power_name');
        $where=[];
        if($power_name){
            $where[]=['power_name','like',"%$power_name%"];
        }
        $data=PowerModel::where('power_status',1)->where($where)->paginate(3);
        foreach ($data as $k=>$v){
            $power_id=Role_PowerModel::where("power_id",$v->power_id)->get();
            foreach ($power_id as $kk=>$vv){
                $role=RoleModel::where("role_id",$vv->role_id)->first();
                $data[$k]["res"].=$role->role_name.",";
            }
        }


//        $data=PowerModel::where('power_status',1)->get();


//        $data=PowerModel::where('power_status',1)->get();
        return view('admin.power.index',['data'=>$data,'power_name'=>$power_name]);
    }
    public function role($admin_id){
        $role=RoleModel::where(['role_status'=>1])->get();
        return view('admin.role.role',['role'=>$role,'admin_id'=>$admin_id]);
    }
    public function roleDo(){
        $admin_id=request()->post('admin_id');
        $role_id=request()->post('role_id');
        $role_id=explode(',',$role_id);
        foreach($role_id as $k=>$v){
            $data=[
                'role_id'=>$v,
                'admin_id'=>$admin_id,
                'status'=>1,
                'time'=>time()
            ];
            $a=Admin_Role::where('admin_id',$admin_id)->where('role_id',$role_id)->first();
            if($a){
                return[
                    'code'=>'0001',
                    'msg'=>'该用户已经有此角色',
                    'data'=>$a
                ];
            }
            $res=Admin_Role::insert($data);

        }

        if($res){
            return[
                'code'=>'200',
                'msg'=>'角色添加成功',
                'data'=>$res
            ];
        }else{
            return[
                'code'=>'500',
                'msg'=>'角色添加失败',
                'data'=>$res
            ];
        }
    }
    public function power($role_id){
        $power=PowerModel::where('power_status',1)->get();
        return view('admin.power.power',['role_id'=>$role_id,'power'=>$power]);
    }
    public function powerDo(){
        $power_id=request()->post('power_id');
        $role_id=request()->post('role_id');
        $power_id=explode(',',$power_id);
        foreach($power_id as $k=>$v){
            $data=[
                'power_id'=>$v,
                'role_id'=>$role_id,
                'status'=>1,
                'time'=>time()
            ];
//            if($power_id!==''){
//                $a=Role_PowerModel::where('role_id',$role_id)->where('power_id',$power_id)->first();
//                if($a){
//                    return[
//                        'code'=>'0001',
//                        'msg'=>'该角色已经有此权限',
//                        'data'=>$a
//                    ];
//                }
//            }
            $res=Role_PowerModel::insert($data);

        }

        if($res){
            return[
                'code'=>'200',
                'msg'=>'赋权限成功',
                'data'=>$res
            ];
        }else{
            return[
                'code'=>'500',
                'msg'=>'赋权限失败',
                'data'=>$res
            ];
        }
    }
    public function upd($power_id){
        $data=PowerModel::where('power_id',$power_id)->first();
        return view('admin.power.upd',['data'=>$data]);
    }
    public function updDo(Request $request){
        $all=$request->all();
        $power_name=$all['power_name'];
        $power_url=$all['power_url'];
        $power_id=$all['power_id'];
        $data=[
            'power_name'=>$power_name,
            'power_url'=>$power_url,
        ];
        $res=PowerModel::where('power_id',$power_id)->update($data);
        if($res){
            return [
                'code'=>200,
                'msg'=>"修改权限成功",
                'data'=>$res
            ];
        }else{
            return [
                'code'=>500,
                'msg'=>"修改权限失败",
                'data'=>$res
            ];
        }
    }
    public function del(){
        $power_id=request()->post('power_id');
        $res=PowerModel::where('power_id',$power_id)->update(['power_status'=>0]);
        if($res){
            $res=Role_PowerModel::where('power_id',$power_id)->update(['status'=>0]);
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

    }
    public function roleupd($role_id){
        $data=RoleModel::where('role_id',$role_id)->first();
        return view('admin.role.upd',['data'=>$data]);
    }
    public function roleupdDo(Request $request){
        $all=$request->all();
        $role_name=$all['role_name'];
        $role_id=$all['role_id'];
        $data=[
            'role_name'=>$role_name,
        ];
        $res=RoleModel::where('role_id',$role_id)->update($data);
        if($res){
            return [
                'code'=>200,
                'msg'=>"角色修改成功",
                'data'=>$res
            ];
        }else{
            return [
                'code'=>500,
                'msg'=>"角色修改失败",
                'data'=>$res
            ];
        }
    }
    public function roledel(){
        $role_id=request()->post('role_id');
        $res=RoleModel::where('role_id',$role_id)->update(['role_status'=>0]);
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
    public function rolechange(Request $request){
        $all=$request->all();
        $value=$all['value'];
        $field=$all['field'];
        $role_id=$all['role_id'];
        $res=RoleModel::where('role_id',$role_id)->update([$field=>$value]);
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
    public function powerchange(Request $request){
        $all=$request->all();
        $value=$all['value'];
        $field=$all['field'];
        $power_id=$all['power_id'];
        $res=PowerModel::where('power_id',$power_id)->update([$field=>$value]);
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
        $role_name=request()->get('role_name');
        $res=RoleModel::where('role_name',$role_name)->first();
//        dd($res);
        if($res){
            return "no";
        }else{
            return "ok";
        }
    }
    public function poweruniq(){
        $power_name=request()->get('power_name');
        $res=PowerModel::where('power_name',$power_name)->first();
        if($res){
            return "no";
        }else{
            return "ok";
        }
    }
    public function poweruniqurl(){
        $power_url=request()->get('power_url');
        $res=PowerModel::where('power_url',$power_url)->first();
        if($res){
            return "no";
        }else{
            return "ok";
        }
    }
//    public function changeuniq(Request $request){
//        $all=$request->all();
//        $power_id=$all['power_id'];
//        $power_name=$all['power_name'];
//        $field=$all['field'];
//        $res=PowerModel::where('power_name',$power_name)->first();
//        print_r($res);die;
//        if($res){
//            return "no";
//        }else{
//            return "ok";
//        }
//    }
    public function delpower($role_id){
        $where=[
            'role.role_id'=>$role_id,
            'role_power.status'=>1
        ];
        $data=RoleModel::join('role_power','role_power.role_id','=','role.role_id')->join('power','power.power_id','=','role_power.power_id')->where($where)->get();
        return view('admin.power.delpower',['data'=>$data]);
    }
    public function dels(){
        $power_id=request()->post('power_id');
        $res=Role_PowerModel::where('power_id',$power_id)->update(['status'=>0]);
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
