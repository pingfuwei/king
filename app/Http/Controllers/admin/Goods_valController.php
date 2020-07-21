<?php

namespace App\Http\Controllers\admin;

use App\AdminModel\GoodsvalueModel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Goods_valController extends Controller
{
    /*
     * 商品属性值添加
     */
    public function create(){
        return view('admin.goods_val.create');
    }
    /*
     * 商品属性值入库
     */
    public function createDo(Request $request){
        $data=$request->all();
        $data['add_time']=time();
        $goods_valuemodel=new GoodsvalueModel();
        $res=$goods_valuemodel::insert($data);
        if($res){
            $message=[
                'code'=>'000000',
                'message'=>'success',
                'result'=>[
                    'message'=>'添加成功',
                ]
            ];
        }else{
            $message=[
                'code'=>'000001',
                'message'=>'error',
                'result'=>[
                    'message'=>'添加失败',
                ]
            ];
        }
        return json_encode($message,JSON_UNESCAPED_UNICODE);
    }
    /*
     * 商品属性值列表
     */
    public function index(Request $request){
        $goods_valuemodel=new GoodsvalueModel();
        $where[]=[
            'is_del','=',1
        ];
        $goods_val_name=$request->post('goods_val_name');
        if($goods_val_name){
            $where[]=[
                'goods_val_name','like',"%$goods_val_name%"
            ];
        }
        $res=$goods_valuemodel::where($where)->paginate(5);
        return view('admin.goods_val.index',['res'=>$res,'goods_val_name'=>$goods_val_name]);
    }
    /*
     * 商品属性值删除
     */
    public function del(Request $request){
        $goods_val_id=$request->post('goods_val_id');
//        dd($goods_val_id);
        $goods_valuemodel=new GoodsvalueModel();
        $where=[
            ['goods_val_id','=',$goods_val_id]
        ];
        $res=$goods_valuemodel::where($where)->update(['is_del'=>0]);
        if($res){
            $message=[
                'code'=>'000000',
                'message'=>'success',
                'result'=>[
                    'message'=>'删除成功',
                ]
            ];
        }else{
            $message=[
                'code'=>'000001',
                'message'=>'error',
                'result'=>[
                    'message'=>'删除失败',
                ]
            ];
        }
        return json_encode($message,JSON_UNESCAPED_UNICODE);
    }
    /*
     * 商品属性值修改
     */
    public function upd($goods_val_id){
        $goods_valuemodel=new GoodsvalueModel();
        $where=[
            ['goods_val_id','=',$goods_val_id]
        ];
        $res=$goods_valuemodel::where($where)->first();
        return view('admin.goods_val.upd',['res'=>$res]);
    }
    /*
     * 商品属性值修改
     */
    public function updDo(Request $request){
        $data=$request->all();
        $goods_valuemodel=new GoodsvalueModel();
        $where=[
            ['goods_val_id','=',$data['goods_val_id']]
        ];
        unset($data['goods_val_id']);
        $res=$goods_valuemodel::where($where)->update($data);
        if($res!==false){
            $message=[
                'code'=>'000000',
                'message'=>'success',
                'result'=>[
                    'message'=>'修改成功',
                ]
            ];
        }else{
            $message=[
                'code'=>'000001',
                'message'=>'error',
                'result'=>[
                    'message'=>'修改失败',
                ]
            ];
        }
        return json_encode($message,JSON_UNESCAPED_UNICODE);
    }
    /*
     * 商品属性值极点级改
     */
    public function updTo(Request $request){
        $data=$request->all();
//        dd($data);
        $newsmodel=new NewsModel();
        $where=[
            ['n_id','=',$data['n_id']]
        ];
        unset($data['n_id']);
        $res=$newsmodel::where($where)->update([$data['field']=>$data['value']]);
        if($res!==false){
            $message=[
                'code'=>'000000',
                'message'=>'success',
                'result'=>[
                    'message'=>'修改成功',
                ]
            ];
        }else {
            $message = [
                'code' => '000001',
                'message' => 'error',
                'result' => [
                    'message' => '修改失败',
                ]
            ];
        }
        return json_encode($message);
    }
}
