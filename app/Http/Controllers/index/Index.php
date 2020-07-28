<?php

namespace App\Http\Controllers\index;

use App\AdminModel\NewsModel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Index extends Controller
{
    public function index(){
        $newsmodel=new NewsModel();
        $where=[
            ['is_del','=',1],
            ['is_show','=',1]
        ];
        $res=$newsmodel::where($where)->orderBy('n_id','desc')->limit(5)->get();
//        dd($res);
        return view("index.index",compact("res"));
    }
}
