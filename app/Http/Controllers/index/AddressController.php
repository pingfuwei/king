<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use App\IndexModel\Shop_Area;
use App\IndexModel\AddressModel;
use App\indexModel\User;
use App\IndexModel\UserInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class AddressController extends Controller
{
    //地址添加
    public function add(){
        $privince=Shop_Area::where(['pid'=>0])->get();
        return view('index.address.add',['privince'=>$privince]);
    }
    public function addDo(Request $request){
        $all=$request->all();
        $province=$all['province'];
        $address_name=$all['address_name'];
        $city=$all['city'];
        $area=$all['area'];
        $tel=$all['tel'];
        $detail=$all['detail'];
        $add_time=time();
        $user_name=session('user_name');
        $user=User::where('user_name',$user_name)->first();
        $user_id=$user['user_id'];
            $data=[
                'province'=>$province,
                'city'=>$city,
                'area'=>$area,
                'tel'=>$tel,
                'detail'=>$detail,
                'add_time'=>$add_time,
                'status'=>0,
                'user_id'=>$user_id,
                'address_name'=>$address_name
            ];
            $res=AddressModel::insert($data);
            if($res){
                echo "<script>alert('添加收货地址成功');location.href='/index/address/list'</script>";
            }else{
                echo "<script>alert('添加收货地址失败');location.href='/index/address/add'</script>";
            }


    }
    public function list(){
        $user_name=session('user_name');
        $user=User::where('user_name',$user_name)->first();
        $user_id=$user['user_id'];
        $data=AddressModel::where('user_id',$user_id)->where('is_del',0)->get();
        $info=AddressModel::where('user_id',$user_id)->first();
        if($info){
//        dd($is_no);
        foreach($data as $k=>$v){
            if($data) {
                $data[$k]->province = Shop_Area::where('id', $v['province'])->value('name');
//                dd($data);
                $data[$k]->city = Shop_Area::where('id', $v['city'])->value('name');
                $data[$k]->area = Shop_Area::where('id', $v['area'])->value('name');
            }
        }
//        dd($data);

            return view('index.address.list',['data'=>$data]);
       }else{
         echo "<script>alert('您还没有收货地址 请添加');location.href='/index/address/add'</script>";
       }
    }
    public function is_no($address_id){
        $user_name=session('user_name');
        $user=User::where('user_name',$user_name)->first();
        $user_id=$user['user_id'];
        $res=AddressModel::where('user_id',$user_id)->get();
        if($res['status'==1]){
            DB::table('address')->where('user_id',$user_id)->update(['status'=>0]);
        }
        $data=AddressModel::where('address_id',$address_id)->update(['status'=>1]);
        if($data){
            echo "<script>alert('设为默认地址成功');location.href='/index/address/list'</script>";
        }else{
            echo "<script>alert('设为默认地址失败');location.href='/index/address/list'</script>";
        }
    }
    //地址修改
    public function upd($address_id){
        $privince=Shop_Area::where(['pid'=>0])->get();
        $data=AddressModel::where('address_id',$address_id)->first();
        $province = $this->area(0);
        $city = $this->area($data["province"]);
        $area = $this->area($data["city"]);

//        dd($province);
        return view('index.address.upd',['province'=>$province,'city'=>$city,'area'=>$area,'data'=>$data,"privince"=>$privince]);
    }

    public static function area($id){
//        echo $id;
        $son=Shop_Area::where(['pid'=>$id])->get()->toArray();
        return $son;
//        return [
//            'code'=>'00000',
//            'data'=>$son
//        ];

    }

    //执行地址修改
    public function updDo(Request $request){
        $all=$request->all();
        $address_id=$all['address_id'];
        $province=$all['province'];
        $address_name=$all['address_name'];
        $city=$all['city'];
        $area=$all['area'];
        $tel=$all['tel'];
        $detail=$all['detail'];
        $add_time=time();
        $user_name=session('user_name');
        $user=User::where('user_name',$user_name)->first();
        $user_id=$user['user_id'];
        $data=[
            'province'=>$province,
            'city'=>$city,
            'area'=>$area,
            'tel'=>$tel,
            'detail'=>$detail,
            'add_time'=>$add_time,
            'status'=>0,
            'user_id'=>$user_id,
            'address_name'=>$address_name
        ];
        $res=AddressModel::where('address_id',$address_id)->update($data);
        if($res){
            echo "<script>alert('修改收货地址成功');location.href='/index/address/list'</script>";
        }else{
            echo "<script>alert('修改收货地址失败');location.href='/index/address/add'</script>";
        }

    }
    //地址删除
    public function del($address_id){
       $res=AddressModel::where('address_id',$address_id)->update(['is_del'=>1]);
        if($res){
            echo "<script>alert('删除成功');location.href='/index/address/list'</script>";
        }else{
            echo "<script>alert('删除失败');location.href='/index/address/add'</script>";
        }
    }
}
