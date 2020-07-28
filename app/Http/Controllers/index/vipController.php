<?php

namespace App\Http\Controllers\index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\AdminModel\vipModel;
class VipController extends Controller
{
    //vip展示
    public function index(){
        $res=vipModel::get();
        return view("index.vip.index",["res"=>$res]);
    }
    //充值
    public function payAjax(){
        $vip_name=\request()->all();
        $price=vipModel::where("vip_name",$vip_name["vip_name"])->first();
        require_once app_path('/libs/alipay/wappay/service/AlipayTradeService.php');
        require_once app_path('/libs/alipay/wappay/buildermodel/AlipayTradeWapPayContentBuilder.php');
        $config=config("alipay");
        $aa=rand(00000,99999).time();
//        var_dump($aa);die;
        if (!empty($price->price) && trim($price->price) != "") {
//        $aa="aa";
//        $bb="45454";
//        if (!empty($bb) && trim($bb) != "") {
            //商户订单号，商户网站订单系统中唯一订单号，必填
            $out_trade_no = $aa;

            //订单名称，必填
            $subject ="dwadaw";

            //付款金额，必填
            $total_amount = $price->price;

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
        $config=config("alipay");
//        var_dump($config);
        $arr=$_GET;
        var_dump($arr);
        $alipaySevice = new \App\libs\alipay\wappay\service\AlipayTradeService($config);
//        var_dump($alipaySevice);
        $result = $alipaySevice->check($arr);
//        var_dump($result);
//        var_dump($arr);

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

//            删除支付的订单

            //商户订单号

//            $out_trade_no = htmlspecialchars($_GET['out_trade_no']);
            //支付宝交易号
//            $trade_no = htmlspecialchars($_GET['trade_no']);
//            echo "支付成功<br />外部订单号：".$out_trade_no;
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
}
