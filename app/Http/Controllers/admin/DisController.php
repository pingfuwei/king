<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\AdminModel\Goods;
use App\AdminModel\discount;

class DisController extends Controller
{
    public  function create(){
        $data = Goods::all();
        return view('admin.dis.create',['data'=>$data]);
    }
    public function createDO(){
        $form = [];
        $dis_name = request()->dis_name;
        $money = request()->money;
        $timeStamp = request()->timeStamp;
        $goods_id = request()->goods_id;
        $data = ['timeout'=>$timeStamp,'money'=>$money,'goods_id'=>$goods_id,'dis_name'=>$dis_name,'addtime'=>time()];
        $data =discount::insert($data);
        if($data){
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
    public  function index(){
        $goods_name = request()->goods_name ? request()->goods_name :'';
        $where =[];
        if($goods_name){
            $where[]= ['goods_name','like',"%$goods_name%"];
        }

        $where[] = ["status","1"];
        $data = discount::where($where)->leftjoin('shop_goods','shop_goods.goods_id','=','discount.goods_id')->get();
        return view('admin.dis.index',['data'=>$data,'goods_name'=>$goods_name]);
    }
    public function upd(){
        $id  = request()->id;
        $data = Goods::all();
        $ret = discount::where('dis_id',$id)->first();
        //var_dump($ret);exit;
        return view('admin.dis.upd',['ret'=>$ret,'data'=>$data]);
    }
    public function updDo(){
        $form = [];
        $dis_name = request()->dis_name;
        $id = request()->id;
        $money = request()->money;
        $timeStamp = request()->timeStamp;
        $goods_id = request()->goods_id;
        $data = ['timeout'=>$timeStamp,'money'=>$money,'goods_id'=>$goods_id,'dis_name'=>$dis_name,'addtime'=>time()];
        $ret =discount::where('dis_id',$id)->update($data);
        if($ret>=1){
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
    public function del(){
        $dis_id = Request()->dis_id;

        $data = discount::where('dis_id',$dis_id)->update(['status'=>2]);
        var_dump($data);exit;
        if($data){
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
}
