<?php

namespace App\Http\Controllers\index;

use App\AdminModel\goods_stock;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\IndexModel\User;
use App\IndexModel\Shop_Area;
use App\IndexModel\UserInfo;
use App\IndexModel\SignModel;
use App\AdminModel\vipModel;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Session;
use App\indexModel\CartScroe;
use App\AdminModel\Goods;
use App\indexModel\UrgeScore;
use App\indexModel\OrderCart;
use App\indexModel\Cart;
use App\indexModel\UrgeMone;

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
        $province1 = $this->area(0);
//        dd($province);
        $province = $province1["data"];
//        dd($privince);
        $city1 = $this->area($data["province"]);
        $city = $city1["data"];
//        dd($city);
        $area1 = $this->area($data["city"]);
        $area = $area1["data"];
        return view('index.persion.persion',['privince'=>$privince,'data'=>$data,'province'=>$province,'city'=>$city,'area'=>$area]);
    }
    public static function area($id){
//        echo $id;
        $son=Shop_Area::where(['pid'=>$id])->get()->toArray();
//        return $son;
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
        if($user_id==''){
            echo "<script>alert('请登录');location.href='/index/login/login'</script>";
        }
        $vipinfo=vipModel::leftjoin('user_vip','user_vip.vip_id','=','vip.vip_id')->where(['user_id'=>$user_id])->first();
        if($vipinfo){
            if($vipinfo['vip_name']=='至尊会员'){
                $score=10;
            }else{
                $score=5;
            }
        }else{
            echo "<script>alert('请登录');location.href='/index/login/login'</script>";
        }
        $check=SignModel::where('user_id',$user_id)->orderBy("time","desc")->first();
//        var_dump($check);die;
        $time=strtotime(date("Y-m-d"),time());
//        echo $time;die;
        if(($check["time"]<$time)){
            $data=[
                'img'=>$img,
                'user_id'=>$user_id,
                'score'=>$score,
                'time'=>time(),
                'content'=>$content
            ];
            $user_score=UserInfo::where("user_id",$user_id)->first();
            $user_score=UserInfo::where("user_id",$user_id)->update(["score"=>$user_score["score"]+$score]);
            if($user_score){
                $res=SignModel::insert($data);
                if($res){
                    if($score===10){
                        $font="由于您是至尊会员签到---送10积分";
                    }else{
                        $font="由于您是普通会员签到---送5积分";
                    }
                    return [
                        'code'=>'000',
                        'msg'=>$font,
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
                    'code'=>'001',
                    'msg'=>"内部异常---联系客服",
                    'data'=>""
                ];
            }
        }else{
                return [
                    'code'=>'002',
                    'msg'=>"一天只能签到一次哦",
                ];
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
    //代发货方法
    public function Consignment(){
        $page=isset(\request()->page)?\request()->page:1;
        $name=session("user_name");
        $user_id=User::where("user_name",$name)->first();
        $where=[
            "user_id"=>$user_id["user_id"],
            "status"=>2
        ];
        $data=CartScroe::where($where)->get();
        foreach ($data as $k=>$v){
                $v->goods_id=Goods::where("goods_id",$v->goods_id)->first()->toArray();
        }
        $monData=OrderCart::where(["user_id"=>$user_id["user_id"],"status"=>2])->get();
        $monData=$this->Ggoo($monData);
        $countMon=count($monData);
        if($countMon>1){
            $monDatas=$this->page($page,$monData);
            $countMons=ceil($countMon/2);
        }else{
            $countMons=ceil($countMon/2);
            $monDatas=$monData;
        }
        return view("index.persion.Consignment",["data"=>$data,"monData"=>$monDatas,"count"=>$countMons,"countAll"=>$countMon]);
    }
    //待付款方法
    public function Tobepaid(){
        $page=isset(\request()->page)?\request()->page:1;
        $name=session("user_name");
        $user_id=User::where("user_name",$name)->first();
        $where=[
            "user_id"=>$user_id["user_id"],
            "status"=>1
        ];
        $data=CartScroe::where($where)->get();
//        if(isset($data[0])){
            foreach ($data as $k=>$v){
                $v->goods_id=Goods::where("goods_id",$v->goods_id)->first()->toArray();
            }
        $monData=OrderCart::where(["user_id"=>$user_id["user_id"],"status"=>1])->get();
        $monData=$this->Ggoo($monData);
        $countMon=count($monData);
        if($countMon>1){
            $monDatas=$this->page($page,$monData);
            $countMons=ceil($countMon/2);
        }else{
            $countMons=ceil($countMon/2);
            $monDatas=$monData;
        }
        return view("index.persion.Tobepaid",["data"=>$data,"monData"=>$monDatas,"count"=>$countMons,"countAll"=>$countMon]);
    }
    //催货ajax
    public function urgeScore(){
        $user_name=session("user_name");
        $user_id=User::where("user_name",$user_name)->first();
        $data=\request()->all();
        $data["user_id"]=$user_id["user_id"];
        $data["addtime"]=time();
        $data["status"]=1;
        $user=UrgeScore::where(["user_id"=>$user_id["user_id"],"order"=>$data["order"],"goods_id"=>$data["goods_id"]])->first();
//        echo time()-$user['addtime'];die;
        if((time()-$user['addtime'])<60*5){
            echo "不能连续提醒---请".ceil((300-(time()-$user['addtime']))/60)."分钟后再提醒";die;
        }
        if($user){
            $res=UrgeScore::where(["user_id"=>$user_id["user_id"],"order"=>$data["order"],"goods_id"=>$data["goods_id"]])->update(['status'=>$user["status"]+1,"addtime"=>time()]);
            if($res){
                echo "ok";die;
            }
        }else{
            $res=UrgeScore::insert($data);
            if($res){
                echo "ok";
            }
        }

    }
    //金钱催货ajax
    public function sendMone(){
        $user_name=session("user_name");
        $user_id=User::where("user_name",$user_name)->first();
        $data=\request()->all();
        $data["user_id"]=$user_id["user_id"];
        $data["addtime"]=time();
        $data["status"]=1;
        $user=UrgeMone::where(["user_id"=>$user_id["user_id"],"order"=>$data["order"]])->first();
//        echo time()-$user['addtime'];die;
        if((time()-$user['addtime'])<60*5){
            echo "不能连续提醒---请".ceil((300-(time()-$user['addtime']))/60)."分钟后再提醒";die;
        }
        if($user){
            $res=UrgeMone::where(["user_id"=>$user_id["user_id"],"order"=>$data["order"]])->update(['status'=>$user["status"]+1,"addtime"=>time()]);
            if($res){
                echo "ok";die;
            }
        }else{
            $res=UrgeMone::insert($data);
            if($res){
                echo "ok";
            }
        }
    }
    //待收货方法
    public function gootbr(){
        $page=isset(\request()->page)?\request()->page:1;
        $name=session("user_name");
        $user_id=User::where("user_name",$name)->first();
        $where=[
            "user_id"=>$user_id["user_id"],
            "status"=>3
        ];
        $data=CartScroe::where($where)->get();
//        if(isset($data[0])){
        foreach ($data as $k=>$v){
            $v->goods_id=Goods::where("goods_id",$v->goods_id)->first()->toArray();
        }
        $monData=OrderCart::where(["user_id"=>$user_id["user_id"],"status"=>3])->get();
        $monData=$this->Ggoo($monData);
        $countMon=count($monData);
        if($countMon>1){
            $monDatas=$this->page($page,$monData);
            $countMons=ceil($countMon/2);
        }else{
            $countMons=ceil($countMon/2);
            $monDatas=$monData;
        }
        return view("index.persion.gootbr",["data"=>$data,"monData"=>$monDatas,"count"=>$countMons,"countAll"=>$countMon]);
    }
    //待收货ajax
    public function gootbrajax(){
        $user_name=session("user_name");
        $user_id=User::where("user_name",$user_name)->first();
        $data=\request()->all();
        $res=CartScroe::where(["user_id"=>$user_id["user_id"],"goods_id"=>$data["goods_id"],"order"=>$data["order"],"status"=>3])->update(["status"=>4]);
        if($res!==false){
            echo "ok";
        }else{
            echo "服务器繁忙";
        }

    }
    //金钱待收货的ajax
    public function sendMon(){
        $user_name=session("user_name");
        $user_id=User::where("user_name",$user_name)->first();
        $data=\request()->all();
//        var_dump($data);die;
        $res=OrderCart::where(["user_id"=>$user_id["user_id"],"order"=>intval($data["order"]),"status"=>3])->update(["status"=>4]);
//        var_dump($res);die;
        if($res!==false){
            echo "ok";
        }else{
            echo "服务器繁忙";
        }
    }
    //我的购买历史
    public function purchase(){
        $page=isset(\request()->page)?\request()->page:1;
        $name=session("user_name");
        $user_id=User::where("user_name",$name)->first();
        $where=[
            "user_id"=>$user_id["user_id"],
            "status"=>4
        ];
        $data=CartScroe::where($where)->get();
        foreach ($data as $k=>$v){
            $v->goods_id=Goods::where("goods_id",$v->goods_id)->first()->toArray();
        }
        $monData=OrderCart::where(["user_id"=>$user_id["user_id"],"status"=>4])->get();
        $monData=$this->Ggoo($monData);
        $countMon=count($monData);
        if($countMon>1){
            $monDatas=$this->page($page,$monData);
            $countMons=ceil($countMon/2);
        }else{
            $countMons=ceil($countMon/2);
            $monDatas=$monData;
        }
        return view("index.persion.purchase",["data"=>$data,"monData"=>$monDatas,"count"=>$countMons,"countAll"=>$countMon]);
    }

    //拿到商品信息
    public function Ggoo($monData){
        $arr=[];
        foreach ($monData as $k=>$v){
            $cart=Cart::where("cart_id",$v["cart_id"])->first();
//            var_dump($cart);die;
            $goods_stock=goods_stock::where("stock_id",$cart["stock_id"])->first();
            $goods=Goods::where("goods_id",$cart["goods_id"])->first();
            $arr[$k]=["order"=>$v["order"],"cart_id"=>$v["cart_id"],"addtime"=>$v["addtime"],"buy_number"=>$cart["buy_number"],"stock_id"=>$cart["stock_id"],"goods_id"=>$goods["goods_id"],"goods_score"=>$goods["goods_score"],"goods_img"=>$goods["goods_img"],"goods_price"=>$goods["goods_price"],"goods_name"=>$goods["goods_name"],"status"=>$v["status"]];
//            var_dump($goods_stock);die;
        }
        return $arr;
    }
    //分页
    public function page($page,$monData){
        $countMon=count($monData);
        if($page===1){
            if($countMon>1){
                $monDatas[]=$monData[0];
                $monDatas[]=$monData[1];
            }else{
                $monDatas[]=$monData[0];
            }
        }else{
            if($page*2<=$countMon){
                $monDatas[]=$monData[2*$page-2];
                $monDatas[]=$monData[2*$page-1];
            }else{
                $monDatas[]=$monData[2*$page-2];
            }
        }
        return $monDatas;
    }
}
