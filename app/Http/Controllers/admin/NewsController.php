<?php

namespace App\Http\Controllers\admin;

use App\AdminModel\NewsModel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    /*
     * 品优购快报添加
     */
    public function create(){
        return view('admin.news.create');
    }
    /*
     * 品优购快报入库
     */
    public function createDo(Request $request){
        $data=$request->all();
        $data['addtime']=time();
        $newsmodel=new NewsModel();
        $res=$newsmodel::insert($data);
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
     * 品优购快报列表
     */
    public function index(){
        $newsmodel=new NewsModel();
//        $where=[
//            ['is_show','=',1]
//        ];
        $res=$newsmodel::get();
        return view('admin.news.index',['res'=>$res]);
    }
}
