<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\AdminModel\Userdis;
use App\IndexModel\User;
use DB;

class UserdisController extends Controller
{
    //用户优惠券添加
    public function create(){
        $discount = DB::table("discount")->where("status",1)->get();
        $user = User::where("user_status","1")->get();
        return view("admin.userdis.create",compact("discount","user"));
    }
    //用户优惠券添加执行
    public function createDo(Request $request){
        $arr = $request->except("_token");
        // dd($arr);
        if(empty($arr["user_id"])){
            $message = $this->datacode("false","00001","用户不能为空");
        }
        if(empty($arr["dis_id"])){
            $message = $this->datacode("false","00001","优惠券不能为空");
        }else{
            $arr["addtime"] = time();
            $arr["timeout"] = $arr["timeout2"];
            // dd($arr);
            unset($arr["timeout2"]);
            $res = Userdis::create($arr);
            if($res){
                $message = $this->datacode("true","00000","添加成功","/admin/userdis/index");
            }else{
                $message = $this->datacode("false","00001","添加失败");
            }

        }
        echo json_encode($message);

    }
    //用户优惠券展示
    public function index(){
        // echo "123";
        $userdis = Userdis::leftjoin("discount","user_discount.dis_id","=","discount.dis_id")
                            ->join("user","user_discount.user_id","=","user.user_id")
                            ->select("user_discount.addtime as timeadd","user_discount.timeout as outtime","dis_name","user_name","id")
                            ->where("user_discount.status","1")
                            ->get();
        // dd($userdis);
        return view("admin.userdis.index",compact("userdis"));
    }
    //用户优惠券修改展示
    public function upd(Request $request){
        $id = $request->all();
        $discount = DB::table("discount")->where("status",1)->get();
        $user = User::where("user_status","1")->get();
        $res = Userdis::where("id",$id)->first();
        // $timeout = $res->timeout*1000;
        // $res->timeout = date('Y-m-d H:i:s',$timeout);
        // dd($res);
        return view("admin.userdis.upd",compact("res","user","discount"));
    }
    //用户优惠券修改执行
    public function updDo(Request $request){
        $arr = $request->all();
        // dd($arr);
        if(empty($arr["user_id"])){
            $message = $this->datacode("false","00001","用户不能为空");
        }
        if(empty($arr["dis_id"])){
            $message = $this->datacode("false","00001","优惠券不能为空");
        }else{
            $time = Userdis::where("id",$arr["id"])->first();
            if($time["timeout"]==$arr["timeout2"]){
                $message = $this->datacode("true","00000","修改成功","/admin/userdis/index");
            }else{
                $arr["addtime"] = time();
                $arr["timeout"] = $arr["timeout2"];
                // dd($arr);
                unset($arr["timeout2"]);
                $res = Userdis::where("id",$arr["id"])->update($arr);
                if($res){
                    $message = $this->datacode("true","00000","修改成功","/admin/userdis/index");
                }else{
                    $message = $this->datacode("false","00001","修改失败");
                }
            }

        }
        echo json_encode($message);
    }
    //用户优惠券删除
    public function del(Request $request){
        $id = $request->all();
        // dd($id);
        $res = Userdis::where("id",$id)->update(["status"=>2]);
        if($res){
            return redirect("/admin/userdis/index");
        }else{
            return redirect("/admin/userdis/index");
        }
    }
    //用户优惠券提示信息
    public function datacode($status="",$code=1,$msg="",$result=""){
        $message = [];
        $message["status"] = $status;
        $message["code"] = $code;
        $message["msg"] = $msg;
        $message["result"] = $result;
        return $message;
    }
}
