<?php

namespace App\Http\Controllers\index;

use App\AdminModel\Goods;
use App\AdminModel\goods_stock;
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
            $stock_model=new goods_stock();
            $where=[
                ['goods_id','=',$goods_info['goods_id']],
                ['is_del','=',1]
            ];
            $goods_stock=$stock_model::where($where)->get()->toArray();
            foreach($goods_stock as $k=>$v){
                $ass=explode(':', $v['ability']);
                foreach($ass as $kk=>$vv){
                    $asd=explode(',', $v['ability']);
                }
            }
//            print_r($goods_stock);die;
            return view('index.goods.desc',['goods'=>$goods_info]);
        }
    }
    function cut_str($str,$sign,$number){
        $array=explode($sign, $str);
        $length=count($array);
        if($number<0){
            $new_array=array_reverse($array);
            $abs_number=abs($number);
            if($abs_number>$length){
                return 'error';
            }else{
                return $new_array[$abs_number-1];
            }
        }else{
            if($number>=$length){
                return 'error';
            }else{
                return $array[$number];
            }
        }
    }
}
