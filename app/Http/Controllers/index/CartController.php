<?php

namespace App\Http\Controllers\index;

use App\AdminModel\Goods_attrModel;
use App\AdminModel\goods_stock;
use App\AdminModel\GoodsvalueModel;
use App\Http\Controllers\Controller;
use App\IndexModel\Cart;
use App\IndexModel\User;
use App\AdminModel\Goods;
use App\IndexModel\UserInfo;
use Illuminate\Http\Request;
use App\indexModel\AddressModel;
use App\indexModel\Shop_Area;
use App\indexModel\OrderCart;
use Illuminate\Support\Facades\DB;

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

            foreach($cart_info as $k=>$v){
//                dd($v);
                $v["stoock"]=$v["stock"];
//                dd($v);
                $ass=explode(':', $v['ability']);
                $v['stock']=$ass;
//                dd($v);
                foreach($v['stock'] as $kk=>$vv){
                    $asd=explode(',', $vv);
                    //根据下标查询属性和值 0 ：属性表  1 属性值
                    $v['stock'][$kk]=$asd;
                    foreach($v['stock'][$kk] as $kkk=>$vvv){
////                        echo $kkk;
//                        $vvv['val']=[];
                        if($kkk==0){
                            $goods_attrmodel=new Goods_attrModel();
                            $goods_attr_info=$goods_attrmodel::where('attr_id',$vvv)->first();
//                            $arr[]=$goods_attr_info;
                            $v['stock'][$kk][$kkk]=$goods_attr_info['attr_name'];
                        }else{
                            $goods_valmodel=new GoodsvalueModel();
                            $goods_val_info=$goods_valmodel::where('goods_val_id',$vvv)->first();
//                            $arr1[]=$vvv;
                            $v['stock'][$kk][$kkk]=$goods_val_info['goods_val_name'];
//                            echo 123;
                        }
                    }
                }
                $cart_info[$k]=$v;
//                dd($v);
            }
//            die;
//         var_dump($cart_info);
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
     //购物车到结算ajax
    public function cartajax(Request $request){
        $data=$request->all();
        $cart_id_info=explode(',',$data['cart_id']);
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
        $arr=[];
        foreach($cart_id_info as $k=>$v){
//            var_dump($v);die;
            $k=[];
            $cart_model=new Cart();
            $where=[
                ['cart_id','=',$v],
                ['cart.is_del','=',1]
            ];
            $arr[$v]=$cart_model::leftjoin('shop_goods','cart.goods_id','=','shop_goods.goods_id')->leftjoin('goods_stock','cart.stock_id','=','goods_stock.stock_id')->orderBy('time','desc')->where($where)->first()->toArray();
//            var_dump($arr);die;
            if($arr[$v]["stock"]-$arr[$v]["buy_number"]<0){
                $message = [
                    'code' => '000001',
                    'message' => 'error',
                    'result' => [
                        'message' =>$arr[$v]["goods_name"]."---库存不足",
                    ]
                ];
                return json_encode($message,JSON_UNESCAPED_UNICODE);
            }
        }
        $message = [
            'code' => '000000',
            'message' => 'success',
            'result' => [
                'message' =>"即将进入结算",
            ]
        ];
        return json_encode($message,JSON_UNESCAPED_UNICODE);
    }
    /*
     * 点击结算
     */
    public function account(Request $request){
        $data=$request->all();
//        dd($data);
        $cart_id_info=explode(',',$data['cart_id']);
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
        $arr=[];
        foreach($cart_id_info as $k=>$v){
//            var_dump($v);die;
            $k=[];
            $cart_model=new Cart();
            $where=[
                ['cart_id','=',$v],
                ['cart.is_del','=',1]
            ];
            $arr[$v]=$cart_model::leftjoin('shop_goods','cart.goods_id','=','shop_goods.goods_id')->leftjoin('goods_stock','cart.stock_id','=','goods_stock.stock_id')->orderBy('time','desc')->where($where)->first()->toArray();
//            var_dump($arr);die;
            if($arr[$v]["stock"]-$arr[$v]["buy_number"]<0){
                $message = [
                    'code' => '000001',
                    'message' => 'error',
                    'result' => [
                        'message' =>$arr[$v]["goods_name"]."---库存不足",
                    ]
                ];
                return json_encode($message,JSON_UNESCAPED_UNICODE);
            }
//            var_dump($arr);die;
        }
        foreach($arr as $k=>$v){
//                dd($v);
            $v["stoock"]=$v["stock"];
//                dd($v);
            $ass=explode(':', $v['ability']);
            $v['stock']=$ass;
//                dd($v);
            foreach($v['stock'] as $kk=>$vv){
                $asd=explode(',', $vv);
                //根据下标查询属性和值 0 ：属性表  1 属性值
                $v['stock'][$kk]=$asd;
                foreach($v['stock'][$kk] as $kkk=>$vvv){
////                        echo $kkk;
//                        $vvv['val']=[];
//                    var_dump($kkk);die;
                    if($kkk==0){
                        $goods_attrmodel=new Goods_attrModel();
                        $goods_attr_info=$goods_attrmodel::where('attr_id',$vvv)->first();
//                            $arr[]=$goods_attr_info;
                        $v['stock'][$kk][$kkk]=$goods_attr_info['attr_name'];
//                        var_dump($v);die;
                    }else{
                        $goods_valmodel=new GoodsvalueModel();
                        $goods_val_info=$goods_valmodel::where('goods_val_id',$vvv)->first();
//                            $arr1[]=$vvv;
                        $v['stock'][$kk][$kkk]=$goods_val_info['goods_val_name'];
//                            echo 123;
                    }
                }
            }
            $arr[$k]=$v;
//                dd($v);
        }
//        dd($arr);
        //地址
        $name=session("user_name");
        $user_id=User::where("user_name",$name)->first();
        $address=AddressModel::where("user_id",$user_id["user_id"])->get();
        foreach ($address as $k=>$v){
            $province=Shop_Area::where("id",$v->province)->pluck("name");
            $v["province"]=$province[0];
            $city=Shop_Area::where("id",$v->city)->pluck("name");
            $v["city"]=$city[0];
            $area=Shop_Area::where("id",$v->area)->pluck("name");
            $v["area"]=$area[0];
        }
//        ===============
//        dd($arr);
        return view("index.cart.settlement",["address"=>$address,"arr"=>$arr,"cart_id"=>$data["cart_id"]]);
//        dd($arr);
    }
    //支付
    public function settlementAjax(){
        $data=\request()->all();
//        echo 11;die;
        $name=session("user_name");
        $user_id=User::where("user_name",$name)->first();
        $cart_id=explode(",",$data["cart_id"]);
        $aa="";
        foreach ($cart_id as $k=>$v){
            $order=$user_id["user_id"].$v.time();
            $a=OrderCart::where(["user_id"=>$user_id["user_id"],"cart_id"=>$v,"status"=>1])->first();
            if(!$a){
                $res=OrderCart::insert(["user_id"=>$user_id["user_id"],"cart_id"=>$v,"status"=>1,"addtime"=>time(),"address_id"=>$data["address_id"],"order"=>$order]);
                if(!$res){
                    echo "内部异常";die;
                }
                if($aa!==""){
                    $aa.=",".$v;
                }else{
                    $aa=$v;
                }
            }else{
                if($aa!==""){
                    $aa.=",".$v;
                }else{
                    $aa=$v;
                }
            }

            $cart=Cart::where(["user_id"=>$user_id["user_id"],"cart_id"=>$v])->first();
            $stock=goods_stock::where("stock_id",$cart["stock_id"])->first();
            if($stock["stock"]<1){
                echo $k+1 ."号商品库存不足";die;
            }
            $sku_price=Cart::where("cart_id",$v)->first();
            $ppri=goods_stock::where("stock_id",$sku_price["stock_id"])->first();
            if(isset($price)){
                $price+=$ppri['price']*$sku_price["buy_number"];
            }  else{
                $price=0;
                $price=$ppri['price']*$sku_price["buy_number"];
            }
        }
//        echo $aa;die;
        //======================支付宝
        require_once app_path('/libs/alipay/wappay/service/AlipayTradeService.php');
        require_once app_path('/libs/alipay/wappay/buildermodel/AlipayTradeWapPayContentBuilder.php');
        $config=config("alipays");
        if (!empty($price) && trim($price) != "") {

//        if (!empty($bb) && trim($bb) != "") {
            //商户订单号，商户网站订单系统中唯一订单号，必填
            $out_trade_no = time().rand(000,999)."@".$aa;

            //订单名称，必填
            $subject =$aa;

            //付款金额，必填
            $total_amount = $price;

            //商品描述，可空
            $body = "";

            //超时时间
            $timeout_express = "1m";
//            \libs\alipay\wappay\buildermodel
            $payRequestBuilder = new \App\libs\alipay\wappay\buildermodel\AlipayTradeWapPayContentBuilder();
            $payRequestBuilder->setBody($body);
            $payRequestBuilder->setSubject($subject);
            $payRequestBuilder->setOutTradeNo($out_trade_no);
            $payRequestBuilder->setTotalAmount($total_amount);
            $payRequestBuilder->setTimeExpress($timeout_express);

            $payResponse = new \App\libs\alipay\wappay\service\AlipayTradeService($config);
            $result = $payResponse->wapPay($payRequestBuilder, $config['return_url'], $config['notify_url']);
            return $result;

        }
    }
    /**
     *支付同步回调接口，在config/alipay.php的return_url参数进行配置

     */
    public function return_url() {
        require_once app_path('/libs/alipay/wappay/service/AlipayTradeService.php');
        $config=config("alipays");
        $arr=$_GET;
        $alipaySevice = new \App\libs\alipay\wappay\service\AlipayTradeService($config);
        $result = $alipaySevice->check($arr);
//        var_dump($result);die;
        /* 实际验证过程建议商户添加以下校验。
        1、商户需要验证该通知数据中的out_trade_no是否为商户系统中创建的订单号，
        2、判断total_amount是否确实为该订单的实际金额（即商户订单创建时的金额），
        3、校验通知中的seller_id（或者seller_email) 是否为out_trade_no这笔单据的对应的操作方（有的时候，一个商户可能有多个seller_id/seller_email）
        4、验证app_id是否为该商户本身。
        */
        if($result) {//验证成功
            /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
            //请在这里加上商户的业务逻辑程序代码

            //——请根据您的业务逻辑来编写程序（以下代码仅作参考）——
            //获取支付宝的通知返回参数，可参考技术文档中页面跳转同步通知参数列表

            //数据库逻辑代码
//            var_dump($arr["out_trade_no"]);die;
            $user_name=session("user_name");
            $user_id=User::where("user_name",$user_name)->first();
            $strpos=strrpos($arr["out_trade_no"],"@");
            $subs=substr($arr["out_trade_no"],$strpos+1,strlen($arr["out_trade_no"]));
            $strl=strlen($subs);
            $str="";
            if($strl===1){
                $subs=$subs.",";
            }
//            echo $subs;die;
            if($strl!=""){
                $subs=explode(",",$subs);
                foreach ($subs as $k=>$v){
//                    var_dump($v);
                    if($v===""){
                        unset($k);
                        break;
                    }
                    DB::beginTransaction();//开启一个事务

                    $OrderCart=OrderCart::where("cart_id",$v)->update(["status"=>2,"addtime"=>time()]);//改变支付状态
                    if($OrderCart===false){
                        echo "内部异常";
                        DB::rollBack();//回滚事务
                        $str="false";
//                        break;
//                        die;
                    }
                    //==============减sku库存
                    $cart=Cart::where("cart_id",$v)->first();
                    $goods_stock=goods_stock::where("stock_id",$cart["stock_id"])->first();
                    if($goods_stock["stock"]-$cart["buy_number"]>0){
                        $goods_stocks=goods_stock::where("stock_id",$cart["stock_id"])->update(["stock"=>$goods_stock["stock"]-$cart["buy_number"]]);
                    }else{
                        echo "内部异常1";
                        DB::rollBack();//回滚事务
                        $str="false";
//                        break;
//                        die;
                    }
                    if($goods_stocks===false){
                        echo "内部异常2";
                        DB::rollBack();//回滚事务
                        $str="false";
//                        break;
//                        die;
                    }
//                ==========给用户加积分
                    $goods=Goods::where("goods_id",$cart["goods_id"])->first();
                    if(!$goods){
                        echo "商品内部异常";
                        DB::rollBack();//回滚事务
                        $str="false";
//                        break;
//                        die;
                    }
                    $info=UserInfo::where("user_id",$user_id["user_id"])->first();
                    $user=UserInfo::where("user_id",$user_id["user_id"])->update(["score"=>$info["score"]+$goods["goods_score"]*$cart["buy_number"]]);
//                    $user=false;
                    if($user===false){
                        echo "积分内部异常";
                        DB::rollBack();//回滚事务
                        $str="false";
//                        break;
//                        die;
                    }
                    //删除购物车的数据
                    $ca=Cart::where("cart_id",$v)->update(["is_del"=>2]);
                    if($ca===false){
                        echo "购物车内部异常";
                        DB::rollBack();//回滚事务
                        $str="false";
//                        break;

                    }
                    if($str==="false"){
                        DB::rollBack();//回滚事务
                        echo "---请联系客服";die;
                    }else{
                        DB::commit();//提交事务
                        echo "<script>alert('支付成功');location.href='http://www.king.com/';</script>";
                    }
//                    DB::commit();//提交事务
//                    echo "<script>alert('支付成功');location.href='http://www.king.com/';</script>";
                }

            }
            //商户订单号
//                $out_trade_no = htmlspecialchars($_GET['out_trade_no']);
            //支付宝交易号
//            $trade_no = htmlspecialchars($_GET['trade_no']);


            //——请根据您的业务逻辑来编写程序（以上代码仅作参考）——
            /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        }
        else {
            //验证失败
            echo "验证失败";
        }
    }

    /**
     *支付异步回调接口，在config/alipay.php的notify_url参数进行配置
     */
    public function notify_url() {
        Log::info("测试支付宝支付");die;
    }























































    /*
     * 获取合计
     */
    public function getmonney(Request $request){
        $stock_id = $request->get("stock_id");
        // echo $stock_id;
        $id = explode(",",$stock_id);
        $user_name = $request->session()->get("user_name");
        $user_id = User::where("user_name",$user_name)->value("user_id");
        $where = [
            "user_id"=>$user_id,
            "cart.is_del"=>1
        ];
        // dd($where);
        $info = Cart::leftjoin("goods_stock","cart.stock_id","=","goods_stock.stock_id")
                ->where($where)
                ->whereIn("cart.stock_id",$id)
                ->get(["price","buy_number"]);
//         dd($info);
        $money=0;
        //循环查询出的值
        foreach($info as $k=>$v){
            // dump($v);
            //将价格乘以购买数量 赋值给空值
            $money += $v["price"]*$v["buy_number"];
            // dump($money);
        }

//         dd($money);
        return $money;
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
        }else{
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
    //         var_dump($user_name);
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
//                     dd($goods);
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

//                return json_encode($message);

            }else{

                $message = $this->datacode("false","00001","请您先登录","/index/login/login");
            }
        }

        return json_encode($message);
    }

    //修改购买数量
    public function updnumber(Request $request){
        $arr = $request->all();
        // dd($arr);
        $where = [
            "cart_id"=>$arr["cart_id"],
            "is_del"=>1
        ];
        $updnumber = Cart::where($where)->update(["buy_number"=>$arr["buy_number"]]);
        if($updnumber){
            $message = $this->datacode("true","00000","修改成功");
        }else{
            $message = $this->datacode("false","00001","修改失败");
        }
        echo json_encode($message);
    }

    //小计
    public function total(Request $request){
        $stock_id = $request->get("stock_id");

//        echo $stock_id;exit;
        $cart_id = $request->get("cart_id");
        $user_name = $request->session()->get("user_name");
        $user_id = User::where("user_name",$user_name)->value("user_id");
        // dd($user_id);
        $where = [
            "stock_id"=>$stock_id,
            "is_del"=>1
        ];
        $price = goods_stock::where($where)->value("price");
        // dd($price);
        $buy_number = Cart::where($where)->value("buy_number");
//        echo $buy_number;exit;
        $wheres = [
            "cart_id"=>$cart_id,
            "is_del"=>1,
            "user_id"=>$user_id
        ];
        $buy_number = Cart::where($wheres)->value("buy_number");
	        echo $price*$buy_number;
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
