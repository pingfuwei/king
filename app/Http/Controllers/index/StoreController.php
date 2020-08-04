<?php

namespace App\Http\Controllers\index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\indexModel\User;
use App\indexModel\store;
class StoreController extends Controller
{
    public function add(){
    $goods_id = Request()->goods_id;
    $status = Request()->status;
    $user_name =request()->session()->get('user_name');
    $user_id = user::where('user_name',$user_name)->get();
    $user_id = $user_id[0]->user_id;
    $form = store::where(['goods_id'=>$goods_id,'user_id'=>$user_id])->get();
    if(!$form->count()){
    	$data = store::insert(['time'=>time(),'status'=>$status,'user_id'=>$user_id,'goods_id'=>$goods_id]);
    }else{
    	$data = store::where(['goods_id'=>$goods_id,'user_id'=>$user_id])->update(['status'=>$status]);
    }
    if($data>0 && $data==true){
    	$dat=[
    		'msg'=>true,
    		'data'=>'',
    		'code'=>10000,
    	];
    }else{
    	$dat=[
    		'msg'=>false,
    		'data'=>'',
    		'code'=>10001,
    	];
    }
    return json_encode($dat);
    }
    public function list(){

    }
}
