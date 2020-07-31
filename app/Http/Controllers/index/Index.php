<?php

namespace App\Http\Controllers\index;

use App\AdminModel\Goods;
use App\AdminModel\NewsModel;
use App\Http\Controllers\Controller;
use App\IndexModel\User;
use Illuminate\Http\Request;
use App\AdminModel\Category;
use App\IndexModel\HistoryModel;

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
        $user_name=session('user_name');
        $user=User::where('user_name',$user_name)->first();
        $user_id=$user['user_id'];
        $wheres=[
            'user_id'=>$user_id,
            'history.is_del'=>1
        ];
        $datas=Goods::leftjoin('history','history.goods_id','=','shop_goods.goods_id')->where($wheres)->get();
        //猜你喜欢列表展示
        $likeinfo=[
            ['user_id',$user_id],
            ['history.is_del',1]
        ];
        $like=HistoryModel::leftjoin('shop_goods','shop_goods.goods_id','=','history.goods_id')->where($likeinfo)->orderBy('count','desc')->limit(6)->get();
        //今日推荐
        $referInfo=HistoryModel::leftjoin('shop_goods','shop_goods.goods_id','=','history.goods_id')->where(['history.is_del'=>1])->orderBy('count','desc')->limit(4)->get();
        return view("index.index",compact("res","ret","datas","like","referInfo"));
    }
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
}
