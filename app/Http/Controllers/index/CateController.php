<?php

namespace App\Http\Controllers\index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\AdminModel\Category;

class CateController extends Controller
{
    public function index(){
        $data = Category::where('status',1)->get()->toArray();
        $ret = $this->gatCate3($data);
        //print_r($ret);
        return view('index.index',['ret'=>$ret]);
    }
    function gatCate3($array,$pid=0)
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
