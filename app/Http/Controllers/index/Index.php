<?php

namespace App\Http\Controllers\index;

use App\AdminModel\Goods;
use App\AdminModel\NewsModel;
use App\Http\Controllers\Controller;
use App\IndexModel\User;
use Illuminate\Http\Request;
use App\AdminModel\Category;
use App\IndexModel\HistoryModel;
use App\IndexModel\store;
use App\IndexModel\Cart;

class Index extends Controller
{
    public function index(){
        $newsmodel=new NewsModel();
        $where=[
            ['is_del','=',1],
            ['is_show','=',1]
        ];
        $res=$newsmodel::where($where)->orderBy('n_id','desc')->limit(5)->get();
        //==========================许海哲分类
        $data = Category::where('status',1)->get()->toArray();
        $ret = $this->gatCate3($data);
        //浏览历史记录展示
//        dd($ret);
        $user_name=session('user_name');
        $user=User::where('user_name',$user_name)->first();
        $user_id=$user['user_id'];
        if($user_id){
            //猜你喜欢列表展示
            $likeinfo=[
                ['user_id',$user_id],
                ['history.is_del',1]
            ];
            $likeinfos = HistoryModel::leftjoin('shop_goods', 'shop_goods.goods_id', '=', 'history.goods_id')->leftjoin('category','category.cate_id','=','shop_goods.goods_id')->where($likeinfo)->orderBy('count', 'desc')->first();
//           dd($like);
            $goodsinfo=Goods::where('goods_id',$likeinfos['goods_id'])->first();
            $like=Goods::where('cate_id',$goodsinfo['cate_id'])->limit(6)->get();
            //今日推荐
            $referInfos=HistoryModel::leftjoin('shop_goods','shop_goods.goods_id','=','history.goods_id')->leftjoin('category','category.cate_id','=','shop_goods.goods_id')->where($likeinfo)->orderBy('count','desc')->first();
            $goodsinfos=Goods::where('goods_id',$referInfos['goods_id'])->first();
            $referInfo=Goods::where('cate_id',$goodsinfos['cate_id'])->limit(4)->get();
        }else {
            //猜你喜欢列表展示

            $likeinfo = HistoryModel::leftjoin('shop_goods', 'shop_goods.goods_id', '=', 'history.goods_id')->leftjoin('category','category.cate_id','=','shop_goods.goods_id')->where('history.is_del', 1)->orderBy('count', 'desc')->first();
//           dd($like);
            $goodsinfo=Goods::where('goods_id',$likeinfo['goods_id'])->first();
            $like=Goods::where('cate_id',$goodsinfo['cate_id'])->limit(6)->get();
//            dd($cateinfo);
            $referInfos=HistoryModel::leftjoin('shop_goods','shop_goods.goods_id','=','history.goods_id')->leftjoin('category','category.cate_id','=','shop_goods.goods_id')->where(['history.is_del'=>1])->orderBy('count','desc')->first();
            $goodsinfos=Goods::where('goods_id',$referInfos['goods_id'])->first();
            $referInfo=Goods::where('cate_id',$goodsinfos['cate_id'])->limit(4)->get();
        }
        $catemodel=new Category();
//        获取女状
//        $nvzhuang=$catemodel::where('status',1)->get()->toArray();
//        $nv_id=$this->gatCate3($nvzhuang,1);
////        dd($nv_id);
        $where1=[
            ['is_del','=','1'],
            ['cate_id','=',14]
        ];
        $na_info=Goods::where($where1)->limit(6)->get();
        $where2=[
            ['is_del','=','1'],
            ['cate_id','=',6]
        ];
        $nv_info=Goods::where($where2)->limit(6)->get();
        $where3=[
            ['is_del','=','1'],
            ['cate_id','=',26]
        ];
        $se_info=Goods::where($where3)->limit(6)->get();
        return view("index.index",compact("res","ret","like","referInfo","nv_info","na_info","se_info"));
    }
//    public function zilei($nvzhuang){
//        foreach($nvzhuang as $k=>$v){
//            print_r($v);
//        }
//    }
    function gatCate3($array,$pid=0)//许海哲分类
    {
        $info=[];
        foreach ($array as $k => $v) {
            if ($v['p_id']==$pid) {
                $v['son']=$this->gatCate3($array,$v['cate_id']);
                $info[]=$v;
            }
        }
        return $info;
    }
    //浏览历史记录列表
    public function history(){
        $user_name=session('user_name');
        $user=User::where('user_name',$user_name)->first();
        $user_id=$user['user_id'];
//        echo $user_id;die;
        $wheres=[
            'user_id'=>$user_id,
            'history.is_del'=>1
        ];
        $datas=Goods::leftjoin('history','history.goods_id','=','shop_goods.goods_id')->where($wheres)->limit(6)->get();
//        dd($datas);
        foreach($datas as $k=>$v){
            $v['goods_img']=env('UPLOADS_URL').$v['goods_img'];
        }
//        var_dump($datas);die;
        return $datas;
    }
    //历史记录删除
    public function del(){
        $his_id=request()->post('his_id');
        $user_name=session('user_name');
        $user=User::where('user_name',$user_name)->first();
        $user_id=$user['user_id'];
        $wheres=[
            'user_id'=>$user_id,
            'history.is_del'=>1
        ];
        $data=HistoryModel::where('his_id',$his_id)->update(['is_del'=>0]);
        if(request()->ajax()){
            $datas=Goods::leftjoin('history','history.goods_id','=','shop_goods.goods_id')->where($wheres)->get();
            return view('index.goods.historylist',['datas'=>$datas]);
        }
        if($data){
            return [
                'code'=>000,
                'data'=>$data
            ];
        }else{
            return [
                'code'=>001,
                'data'=>$data
            ];
        }
    }
    //购物车列表
    public function cart(){
        $user_name=session('user_name');
        $user=User::where('user_name',$user_name)->first();
        $user_id=$user['user_id'];
        $data=store::leftjoin('shop_goods','shop_goods.goods_id','=','store.goods_id')->where(['user_id'=>$user_id,'status'=>2])->get();
        foreach($data as $k=>$v){
            $v['goods_img']=env('UPLOADS_URL').$v['goods_img'];
        }
//        var_dump($data);die;
        return $data;
    }
    //购物车数量
    public function count(){
        $user_name=session('user_name');
        $user=User::where('user_name',$user_name)->first();
        $user_id=$user['user_id'];
        $data=Cart::where(['is_del'=>1,'user_id'=>$user_id])->count();
        return $data;
    }
}
