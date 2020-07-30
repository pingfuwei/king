<?php

namespace App\Http\Controllers\index;

use App\AdminModel\Goods;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GoodsController extends Controller
{
    /*
     * 商品详情
     */
    public function desc(Request $request){
        $goods_id=$request->get('goods_id');
        if(empty($goods_id)){
            $message = [
                'code' => '000001',
                'message' => 'error',
                'result' => [
                    'message' =>"缺少必要参数",
                ]
            ];
            return json_encode($message,JSON_UNESCAPED_UNICODE);
        }
        $goods_model=new Goods();
        $goods_info=$goods_model::where('goods_id',$goods_id)->first();
        if(empty($goods_info)){
            $message = [
                'code' => '000001',
                'message' => 'error',
                'result' => [
                    'message' =>"参数有问题,请核对后再试",
                ]
            ];
            return json_encode($message,JSON_UNESCAPED_UNICODE);
        }else{
            // dd($goods_info);
            return view('index.goods.desc',['goods'=>$goods_info]);
        }
    }
}
