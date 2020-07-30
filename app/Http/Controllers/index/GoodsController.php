<?php

namespace App\Http\Controllers\index;

use App\AdminModel\Goods;
use App\AdminModel\Goods_attrModel;
use App\AdminModel\goods_stock;
use App\AdminModel\GoodsvalueModel;
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
            $arr=[];
            $arr1=[];
            $goods_stock=$stock_model::where($where)->get()->toArray();
            $stock="";
            foreach($goods_stock as $k=>$v){
//                $stock=$v['stock'];
                if($stock!==""){
                    $stock=$stock+$v['stock'];
                }else{
                    $stock = $v['stock'];
                }
            }
            foreach($goods_stock as $k=>$v){
                $ass=explode(':', $v['ability']);
//                print_r($ass);
                foreach($ass as $kk=>$vv){
                    $asd=explode(',', $vv);
                    //根据下标查询属性和值 0 ：属性表  1 属性值
                    foreach($asd as $kkk=>$vvv){
////                        echo $kkk;
                        if($kkk==0){
                            $arr[]=$vvv;
                        }else{
                            $arr1[]=$vvv;
                        }
//                        if($kkk==0){
//                            $goods_attrmodel=new Goods_attrModel();
//                            $goods_attr=$goods_attrmodel::where('attr_id',$vvv)->first();
//                            $vvv=$goods_attr['attr_name'];
//                            echo $vvv;
//                        }else{
//                            $goods_valmodel=new GoodsvalueModel();
//                            $goods_val=$goods_valmodel::where('goods_val_id',$vvv)->first();
//                            $vvv=$goods_val['goods_val_name'];
//                            echo $vvv;
//                        }
                    }
                }
            }
//            print_r($goods_stock);
            //该商品的属性
            $arr=array_unique($arr);
            $goods_attr=[];
            $goods_val=[];
            foreach($arr as  $k=>$v){
                $goods_attrmodel=new Goods_attrModel();
                $goods_attr_info=$goods_attrmodel::where('attr_id',$v)->first();
                $goods_attr[]=$goods_attr_info;
            }
//            print_r($goods_attr);
            $arr1=array_unique($arr1);
            foreach($arr1 as $k=>$v){
                $goods_valmodel=new GoodsvalueModel();
                $goods_val_info=$goods_valmodel::where('goods_val_id',$v)->first();
                $goods_val[]=$goods_val_info;
            }
//            print_r($goods_val);
//            print_r($goods_attr);die;
//            foreach($goods_attr as $k=>$v){
//                foreach($goods_val as $kk=>$vv){
//                    if($v['attr_id']==$vv['attr_id']){
//                        $goods_attr['goods_value_name']=$vv['goods_value_name'];
//                    }
//                }
//            }
//            print_r($goods_attr);
//            print_r($goods_val);
//            die;
            return view('index.goods.desc',['goods'=>$goods_info,'goods_attr'=>$goods_attr,'goods_val'=>$goods_val,'stock'=>$stock]);
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
            // dd($goods_info);
            return view('index.goods.desc',['goods'=>$goods_info]);
        }
    }
}
