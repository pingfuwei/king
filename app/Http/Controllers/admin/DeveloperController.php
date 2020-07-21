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
        $data=RoleModel::get();
//        dd($data);
        foreach ($data as $k=>$v){
            $power_id=Role_PowerModel::where("role_id",$v->role_id)->get();
            foreach ($power_id as $kk=>$vv){
                $power_id=PowerModel::where("power_id",$vv->power_id)->first();
                $data[$k]["res"].=$power_id->power_name.",";
            }
        }
//        dd($data);
        return view('admin.role.index',['data'=>$data]);
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
        $data=PowerModel::get();
        foreach ($data as $k=>$v){
            $power_id=Role_PowerModel::where("power_id",$v->power_id)->get();
            foreach ($power_id as $kk=>$vv){
                $role=RoleModel::where("role_id",$vv->role_id)->first();
                $data[$k]["res"].=$role->role_name.",";
            }
        }
        return view('admin.power.index',['data'=>$data]);
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
        $power=PowerModel::get();
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
            $a=Role_PowerModel::where('role_id',$role_id)->where('power_id',$power_id)->first();
            if($a){
                return[
                    'code'=>'0001',
                    'msg'=>'该用户已经有此角色',
                    'data'=>$a
                ];
            }
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
}
