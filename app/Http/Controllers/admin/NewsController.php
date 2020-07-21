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
    public function index(Request $request){
        $title=$request->post('title');
        $is_show=$request->post('is_show')!==0?$request->post('is_show'):4;
//        echo $title.$is_show;
        $newsmodel=new NewsModel();
        $where[]=[
            'is_del','=',1
        ];
        if(!empty($title)){
            $where[]=[
                'title','like',"%$title%"
            ];
        }
        $is_show=intval($is_show);
        if($is_show<2){
            $where[]=[
                'is_show','=',$is_show
            ];
        }
        $res=$newsmodel::where($where)->paginate(3);
        return view('admin.news.index',['res'=>$res,'title'=>$title,'is_show'=>$is_show]);
    }
    /*
     * 品优购快报删除
     */
    public function del(Request $request){
        $n_id=$request->post('n_id');
//        dd($n_id);
        $newsmodel=new NewsModel();
        $where=[
            ['n_id','=',$n_id]
        ];
        $res=$newsmodel::where($where)->update(['is_del'=>0]);
        if($res){
            $message=[
                'code'=>'000000',
                'message'=>'success',
                'result'=>[
                    'message'=>'删除成功',
                ]
            ];
        }else{
            $message=[
                'code'=>'000001',
                'message'=>'error',
                'result'=>[
                    'message'=>'删除失败',
                ]
            ];
        }
        return json_encode($message,JSON_UNESCAPED_UNICODE);
    }
    /*
     * 品优购快报修改
     */
    public function upd($n_id){
//        dd($n_id);
        $newsmodel=new NewsModel();
        $where=[
            ['n_id','=',$n_id]
        ];
        $res=$newsmodel::where($where)->first();
        return view('admin.news.upd',['res'=>$res]);
    }
    /*
     * 品优购快报执行修改
     */
    public function updDo(Request $request){
        $data=$request->all();
        $newsmodel=new NewsModel();
        $where=[
            ['n_id','=',$data['n_id']]
        ];
        unset($data['n_id']);
        $res=$newsmodel::where($where)->update($data);
        if($res!==false){
            $message=[
                'code'=>'000000',
                'message'=>'success',
                'result'=>[
                    'message'=>'修改成功',
                ]
            ];
        }else{
            $message=[
                'code'=>'000001',
                'message'=>'error',
                'result'=>[
                    'message'=>'修改失败',
                ]
            ];
        }
        return json_encode($message,JSON_UNESCAPED_UNICODE);
    }
    /*
     * 品优购快报极点级改
     */
    public function updTo(Request $request){
        $data=$request->all();
        $newsmodel=new NewsModel();
        $where=[
            ['n_id','=',$data['n_id']]
        ];
        unset($data['n_id']);
        $res=$newsmodel::where($where)->update([$data['field']=>$data['value']]);
        if($res!==false){
            $message=[
                'code'=>'000000',
                'message'=>'success',
                'result'=>[
                    'message'=>'修改成功',
                ]
            ];
        }else {
            $message = [
                'code' => '000001',
                'message' => 'error',
                'result' => [
                    'message' => '修改失败',
                ]
            ];
        }
        return json_encode($message);
    }
}
