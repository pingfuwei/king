<?php

namespace App\Http\Controllers\index;

use App\AdminModel\Goods;
use App\AdminModel\NewsModel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    /*
     * 查找一条详细信息
     */
    public function one($n_id){
        if(empty($n_id)){
            $message = [
                'code' => '000001',
                'message' => 'error',
                'result' => [
                    'message' =>"缺少必要参数",
                ]
            ];
            return json_encode($message,JSON_UNESCAPED_UNICODE);
        }
        $newsmodel=new NewsModel();
        $where=[
            ['is_del','=',1],
            ['is_show','=',1],
            ['n_id','=',$n_id]
        ];
        $res=$newsmodel::where($where)->first();
//        dd($res);
        if($res){
            $goodsmodel=new Goods();
            $goods=$goodsmodel::where('goods_id',$res['goods_id'])->first();
            $wheret=[
                ['notice','=',$res['notice']],
                ['n_id','!=',$n_id]
            ];
            $news_info=$newsmodel::where($wheret)->limit(3)->get();
            return view('index.newsone',['res'=>$res,'goods'=>$goods,'news_info'=>$news_info]);
        }else{
            $message = [
                'code' => '000001',
                'message' => 'error',
                'result' => [
                    'message' =>"请正确访问",
                ]
            ];
            return json_encode($message,JSON_UNESCAPED_UNICODE);
        }
    }
    /*
     * 列表
     */
    public function index($n_id){
        if(empty($n_id)){
            $message = [
                'code' => '000001',
                'message' => 'error',
                'result' => [
                    'message' =>"缺少必要参数",
                ]
            ];
            return json_encode($message,JSON_UNESCAPED_UNICODE);
        }
        $newsmodel=new NewsModel();
        $where=[
            ['is_del','=',1],
            ['is_show','=',1],
            ['n_id','=',$n_id]
        ];
        $res=$newsmodel::where($where)->first();
//        dd($res);
        if($res){
            $goods=$newsmodel::leftjoin("shop_goods","news.goods_id","=","shop_goods.goods_id")
                                    ->where('notice',$res['notice'])
                                    ->limit(5)
                                    ->get();
            $wherec=[
                ['notice','!=',$res['notice']]
            ];
            $news_info=$newsmodel::where($wherec)->limit(5)->get();
            return view('index.newsindex',['news_info'=>$news_info,'res'=>$res,'goods'=>$goods]);
        }else{
            $message = [
                'code' => '000001',
                'message' => 'error',
                'result' => [
                    'message' =>"请正确访问",
                ]
            ];
            return json_encode($message,JSON_UNESCAPED_UNICODE);
        }
    }
}
