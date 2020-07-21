<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\StudentController;
use Illuminate\Http\Request;
use App\AdminModel\Goods_attrModel;
use App\AdminModel\GoodsvalueModel;
use App\AdminModel\goods_stock;
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
        $data=\request()->all();
        $res=goods_stock::insert($data);
        if($res){
            echo "ok";
        }
    }
    public function index(){

    }
    public function del(){

    }
    public function upd(){

    }
    public function updDo(){

    }
}
