<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\StudentController;
use Illuminate\Http\Request;
use App\AdminModel\Goods_attrModel;
use App\AdminModel\GoodsvalueModel;
use App\AdminModel\goods_stock;
use App\AdminModel\Goods;
use Illuminate\Support\Facades\DB;
class StockController extends Controller
{
    public function create(){
        $res = db::table('shop_goods')->get();
        $data = Goods_attrModel::get();
        foreach ($data as $k=>$v){
            $ret = GoodsvalueModel::where('attr_id',$v['attr_id'])->get();
            $v['data'] = $ret;
        }
        return view('admin.stock.create',['res'=>$res,'data'=>$data]);
    }
    public function createDo(){
        $data=request()->all();
        $res=goods_stock::insert($data);
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
        $data = goods_stock::leftjoin('shop_goods','shop_goods.goods_id','=','goods_stock.goods_id')->get();
        //var_dump($data);exit;
        return view('admin.stock.index',['data'=>$data]);
    }
    public function del(){

    }
    public function upd(){

    }
    public function updDo(){

    }
}
