<?php

namespace App\Http\Controllers\index;

use App\AdminModel\NewsModel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\AdminModel\Category;

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

        return view("index.index",compact("res","ret"));
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
}
