<?php

namespace App\Http\Controllers\index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\IndexModel\User;
use App\IndexModel\Shop_Area;
use App\IndexModel\UserInfo;
use App\IndexModel\SignModel;
class SignController extends Controller
{
    public function sign(){
        return view('index.persion.sign');
    }
    public function personal(){
        $user_name=session('user_name');
        $user=User::where('user_name',$user_name)->first();
        $user_id=$user['user_id'];
        $data=UserInfo::where('user_id',$user_id)->first();
        if($data){
            $province=Shop_Area::where('id',$data['province'])->value('name');
            $city=Shop_Area::where('id',$data['city'])->value('name');
            $area=Shop_Area::where('id',$data['area'])->value('name');

            return view('index.persion.pers',['data'=>$data,'province'=>$province,'city'=>$city,'area'=>$area]);
        }else{
            echo "<script>alert('您还没有个人信息 请添加')</script>";
        }

    }
    public function pers(){
        $user_name=session('user_name');
        $user=User::where('user_name',$user_name)->first();
        $user_id=$user['user_id'];
        $data=UserInfo::where('user_id',$user_id)->first();
        $privince=Shop_Area::where(['pid'=>0])->get();
        return view('index.persion.persion',['privince'=>$privince,'data'=>$data]);
    }
    public function area(){
        $id=request()->get('id');
//        echo $id;
        $son=Shop_Area::where(['pid'=>$id])->get()->toArray();
        return [
            'code'=>'00000',
            'data'=>$son
        ];

    }
    public function info(Request $request){
        $all=$request->all();
//        dd($all);
        $name=$all['user_name'];
        $sex=$all['sex'];
        $province=$all['province'];
        $city=$all['city'];
        $area=$all['area'];
        $tel=$all['tel'];
        $user_name=session('user_name');
        $user=User::where('user_name',$user_name)->first();
        $user_id=$user['user_id'];
        $data=[
            'user_id'=>$user_id,
            'user_name'=>$name,
            'sex'=>$sex,
            'province'=>$province,
            'city'=>$city,
            'area'=>$area,
            'tel'=>$tel,
        ];
        $res=UserInfo::where('user_id',$user_id)->update($data);
        if($res){
            return redirect('index/persion/personal');
        }
    }
    public function Dosign(){
        $img=request()->get('val');
        $user_name=session('user_name');
        $user=User::where('user_name',$user_name)->first();
        $user_id=$user['user_id'];
        $data=[
            'img'=>$img,
            'user_id'=>$user_id,
            'score'=>10,
            'time'=>time()
        ];
        $res=SignModel::insert($data);
        if($res){
            return [
                'code'=>'000',
                'msg'=>"签到成功",
                'data'=>$res
            ];
        }else{
            return [
                'code'=>'001',
                'msg'=>"签到失败",
                'data'=>$res
            ];
        }
    }
}