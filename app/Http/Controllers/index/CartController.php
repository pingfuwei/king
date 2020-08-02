<?php

namespace App\Http\Controllers\index;

use App\AdminModel\goods_stock;
use App\Http\Controllers\Controller;
use App\IndexModel\Cart;
use App\IndexModel\User;
use App\AdminModel\Goods;
use Illuminate\Http\Request;

class CartController extends Controller
{
    //
    /*
     * 购物车列表
     */
     public function cartlist(Request $request){
            $user_name = $request->session()->get("user_name");
            if(empty($user_name)){
                $message = [
                    'code' => '000001',
                    'message' => 'error',
                    'result' => [
                        'message' =>"请先登陆",
                    ]
                ];
                return json_encode($message,JSON_UNESCAPED_UNICODE);
            }
            $usermodel=new User();
            $user=$usermodel::where('user_name',$user_name)->first();
            if(empty($user)){
                $message = [
                    'code' => '000001',
                    'message' => 'error',
                    'result' => [
                        'message' =>"用户信息有误",
                    ]
                ];
                return json_encode($message,JSON_UNESCAPED_UNICODE);
            }
    //        dd($user['user_id']);
            $where=[
                ['user_id','=',$user['user_id']],
                ['cart.is_del','=',1]
            ];
            //dd($where);
            $cartmodel=new Cart();
            $cart_info=$cartmodel::leftjoin('shop_goods','cart.goods_id','=','shop_goods.goods_id')->leftjoin('goods_stock','cart.stock_id','=','goods_stock.stock_id')->where($where)->orderBy('time','desc')->get()->toArray();
            $count = $cartmodel::where($where)->count();
            // dd($count);
           // dd($cart_info);die;
            if($cart_info){
                $goods_stockmodel=new goods_stock();
                return view('index.cart.cartlist',['cart_info'=>$cart_info,"count"=>$count]);
            }else{
                $cart_info = [];
                return view('index.cart.cartlist',['cart_info'=>$cart_info,"count"=>$count]);
            }
        }
    /*
     * 购物车删除
     */
       public function cartdel(Request $request){
           $data=$request->all();
//           dd($data);
           if(empty($data['cart_id'])){
               $message = [
                   'code' => '000001',
                   'message' => 'error',
                   'result' => [
                       'message' =>"请规范您的操作",
                   ]
               ];
               return json_encode($message,JSON_UNESCAPED_UNICODE);
           }
           $cartmodel=new Cart();
           $res=$cartmodel::where('cart_id',$data['cart_id'])->update(['is_del'=>2]);
           if($res){
               $message = [
                   'code' => '000000',
                   'message' => 'success',
                   'result' => [
                       'message' =>"操作成功",
                   ]
               ];
           }else{
               $message = [
                   'code' => '000001',
                   'message' => 'error',
                   'result' => [
                       'message' =>"操作失败",
                   ]
               ];
           }
           return json_encode($message,JSON_UNESCAPED_UNICODE);
       }
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
    //购物车添加
    public function cartcreate(Request $request){
        $arr = $request->all();
        // dd($arr);
        //判断非法
        if(empty($arr["goods_id"])){
            $message = $this->datacode("false","00001","非法操作");
        }

        //判断购买数量
        if(empty($arr["buy_number"]) && $arr["buy_number"]=="0"){
            $message = $this->datacode("false","00001","数量不能为空");
        }

        //判断sku
        if(empty($arr["goods_stick"])){
            $message = $this->datacode("false","00001","请选择sku");
        }
        $arr["goods_stick"] = implode(":",$arr["goods_stick"]);
        // dd($arr);
        $arr["stock_id"] = goods_stock::where("ability",$arr["goods_stick"])->value("stock_id");
        // dd($arr);
        $count = Goods::where("goods_id",$arr["goods_id"])->count();
        // dd($count);
        //判断商品是否存在
        if($count<1){
            $message = $this->datacode("false","00001","非法操作");
        }
        $user_name = $request->session()->get("user_name");
        $user_id = User::where("user_name",$user_name)->value("user_id");
        // dd($user_name);
        if($user_name){
            //获取属性库存
            $buy_num = goods_stock::where("stock_id",$arr["stock_id"])->value("stock");
            // dd($buy_num);
            if($buy_num){
                $where = [
                    "user_id"=>"$user_id",
                    "goods_id"=>$arr["goods_id"],
                    "stock_id"=>$arr["stock_id"],
                    "is_del"=>"1"
                ];
                // dd($where);
                $goods = Cart::where($where)->first();
                // dd($goods);
                if($goods){
                    //判断输入数量是否超过库存
                    if(($goods["buy_number"]+$arr["buy_number"])>$buy_num){
                        //如果超过数量则让数量改为最大库存
                        $num = $buy_num;
                    }else{
                        //否则正常加
                        $num = $goods["buy_number"]+$arr["buy_number"];
                    }

                    //将数据库的库存数量改为最新的库存数量 时间改为最新时间
                    $cartUpd = Cart::where($where)->update(["buy_number"=>$num,"time"=>time()]);
                    if($cartUpd){
                        $message = $this->datacode("true","00000","加入购物车成功","/index/cart/cartlist");
                    }else{
                        $message = $this->datacode("false","00001","加入购物车失败");
                    }
                }else{

                    $arr["time"] = time();
                    $arr["user_id"] =$user_id;

                    //判断输入数量是否超过库存
                    if(($goods["buy_number"]+$arr["buy_number"])>$buy_num){
                        //如果超过数量则让数量改为最大库存
                        $num = $buy_num;
                    }else{
                        //否则正常加
                        $num = $goods["buy_number"]+$arr["buy_number"];
                    }
                    //否则正常添加进库
                    //数据存入数组
                    $cartInfo = ["goods_id"=>$arr["goods_id"],"buy_number"=>$num,"time"=>time(),"user_id"=>$user_id,"stock_id"=>$arr["stock_id"]];
                    $res = Cart::insert($cartInfo);
                    if($res){
                        $message = $this->datacode("true","00000","加入购物车成功","/index/cart/cartlist");
                    }else{
                        $message = $this->datacode("false","00001","加入购物车失败");
                    }
                }

            }else{
                $message = $this->datacode("false","00001","没有该属性值库存");
            }


        }


        echo json_encode($message);
    }

    //购物车提示信息
    public function datacode($status="",$code=1,$msg="",$result=""){
        $message = [];
        $message["status"] = $status;
        $message["code"] = $code;
        $message["msg"] = $msg;
        $message["result"] = $result;
        return $message;
    }
}
