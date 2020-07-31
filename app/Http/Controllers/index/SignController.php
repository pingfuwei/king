<?php

namespace App\Http\Controllers\index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\IndexModel\User;
use App\IndexModel\Shop_Area;
use App\IndexModel\UserInfo;
use App\IndexModel\SignModel;
use App\AdminModel\vipModel;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Session;

class SignController extends Controller
{
    public function sign(){
        return view('index.persion.sign');
    }
    public function personal(){
//        return view('index.persion.list');
        $user_name=session('user_name');
        $user=User::where('user_name',$user_name)->first();
        $user_id=$user['user_id'];
        $vipinfo=vipModel::leftjoin('user_vip','user_vip.vip_id','=','vip.vip_id')->where(['user_id'=>$user_id])->first();
        //var_dump($vipinfo);exit;
        $data=UserInfo::where('user_id',$user_id)->first();
        if($data){
            $province=Shop_Area::where('id',$data['province'])->value('name');
            $city=Shop_Area::where('id',$data['city'])->value('name');
            $area=Shop_Area::where('id',$data['area'])->value('name');

            return view('index.persion.list',['data'=>$data,'province'=>$province,'city'=>$city,'area'=>$area,'vipinfo'=>$vipinfo]);
        }else{
            echo "<script>alert('您还没有个人信息 请添加');location.href='/index/persion/addpersion'</script>";

        }

    }
    public function pers(){
        $user_name=session('user_name');
//        echo $user_name;die;
        $user=User::where('user_name',$user_name)->first();
//dd($user);
        $user_id=$user['user_id'];
//        if($user_id=''){
//            echo "<script>alert('您还没有登录 请登录');location.href='/index/login/login'</script>";die;
//        }
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
        $userss=User::where('user_id',$user_id)->update(['user_name'=>$name]);
        if($userss!==false){
            Cookie::queue("user",$name);
            Cookie::queue("user_pwd",null);
            session(["user_name"=>null]);
            session(["user_name"=>$name]);
//            echo session("user_name");
//            echo 1;die;

        }
//        dd($user_id);die;
        $datas=UserInfo::where('user_id',$user_id)->first();
        $data=[
            'user_id'=>$user_id,
//            'user_name'=>$name,
            'sex'=>$sex,
            'province'=>$province,
            'city'=>$city,
            'area'=>$area,
            'tel'=>$tel,
        ];
        $res=UserInfo::where('user_id',$user_id)->update($data);
        if($res!==false){
            return redirect('index/persion/personal');
        }
    }
    public function Dosign(){
        $img=request()->get('val');
        $content=request()->get('content');
        $user_name=session('user_name');
        $user=User::where('user_name',$user_name)->first();
        $user_id=$user['user_id'];
        $vipinfo=vipModel::leftjoin('user_vip','user_vip.vip_id','=','vip.vip_id')->where(['user_id'=>$user_id])->first();
        if($vipinfo){
            if($vipinfo['vip_name']=='vip'){
                $score=10;
            }else if($vipinfo['vip_name']=='svip'){
                $score=15;
            }
        }else{
            $score=5;
        }
        $check=SignModel::where('user_id',$user_id)->first();
        if(!empty($check)&&$check['time']-time()>86400){
            $data=[
                'img'=>$img,
                'user_id'=>$user_id,
                'score'=>$score,
                'time'=>time(),
                'content'=>$content
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
        }else{
            if(empty($check)){
                $data=[
                    'img'=>$img,
                    'user_id'=>$user_id,
                    'score'=>$score,
                    'time'=>time(),
                    'content'=>$content
                ];
                $res=SignModel::insert($data);
                UserInfo::where('user_id',$user_id)->insert(['score'=>$score]);
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
            }else{
                return [
                    'code'=>'002',
                    'msg'=>"一天只能签到一次哦",
                ];
            }

        }

    }
    public function addpersion(){
        $user_name=session('user_name');
        $user=User::where('user_name',$user_name)->first();
        $user_id=$user['user_id'];
        $data=UserInfo::where('user_id',$user_id)->first();
        $privince=Shop_Area::where(['pid'=>0])->get();
        return view('index.persion.addpersion',['privince'=>$privince]);
    }
    public function persionDo(Request $request){
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
        if($user_id==''){
            echo "<script>alert('您还没有登录，请登录');location.href='/index/login/login'</script>";
        }
        $data=[
            'user_id'=>$user_id,
            'user_name'=>$name,
            'sex'=>$sex,
            'province'=>$province,
            'city'=>$city,
            'area'=>$area,
            'tel'=>$tel,
        ];
        $res=UserInfo::insert($data);
        if($res){
            return redirect('index/persion/personal');
        }
    }
}
