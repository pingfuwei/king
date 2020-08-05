@extends('layout.index')
@section('content')

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=9; IE=8; IE=7; IE=EDGE">
    <meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
    <title>结算页</title>

    <link rel="stylesheet" type="text/css" href="/index/css/webbase.css" />
    <link rel="stylesheet" type="text/css" href="/index/css/pages-getOrderInfo.css" />

    <link rel="stylesheet" href="/index/asset/css/modallayer.min.css">
    <script src="https://cdn.bootcss.com/font-awesome/5.11.2/js/all.min.js"></script>
    <script src="/index/asset/js/modallayer-ie.min.js"></script>
</head>

<body>
<!--head-->

<div class="cart py-container">
    <div class="checkout py-container">
        <div class="checkout-tit">
            <h4 class="tit-txt">填写并核对订单信息</h4>
        </div>
        <div class="checkout-steps">
            <!--收件人信息-->
            <div class="step-tit">
                <h5>收件人信息<span><a  href="/index/address/add"  class="newadd">新增收货地址</a></span></h5>
            </div>
            <div class="step-cont">
                <div class="addressInfo">
                    <ul class="addr-detail">
                        <li class="addr-item" >
                            @foreach($address as $k=>$v)
                            <div>
                                {{--{{$v->status}}--}}
                                {{--selected--}}
                                <div class="con name aa {{$v->status==="1"?"selected bb":""}}" address="{{$v->address_id}}"><a href="javascript:;" >{{$v->address_name}}<span title="点击取消选择">&nbsp;</a></div>
                                <div class="con address">{{$v->province}}{{$v->city}}{{$v->area}}:{{$v->detail}}<span>---{{$v->tel}}</span>
                                    {!!$v->status==="1"?"<span class='base' address='$v->address_id' style='display: none'>默认地址</span>":"<span class='base' address='$v->address_id'>默认地址</span>"!!}
                                    <span class="edittext"><a data-toggle="modal" data-target=".edit" data-keyboard="false" >编辑</a>&nbsp;&nbsp;<a href="javascript:;">删除</a></span>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                                @endforeach
                        </li>


                    </ul>
                    <!--修改地址-->
                    <div  tabindex="-1" role="dialog" data-hasfoot="false" class="sui-modal hide fade edit">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" data-dismiss="modal" aria-hidden="true" class="sui-close">×</button>
                                    <h4 id="myModalLabel" class="modal-title">添加收货地址</h4>
                                </div>
                                <div class="modal-body">
                                    <form action="" class="sui-form form-horizontal">
                                        <div class="control-group">
                                            <label class="control-label">收货人：</label>
                                            <div class="controls">
                                                <input type="text" class="input-medium">
                                            </div>
                                        </div>

                                        <div class="control-group">
                                            <label class="control-label">详细地址：</label>
                                            <div class="controls">
                                                <input type="text" class="input-large">
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label">联系电话：</label>
                                            <div class="controls">
                                                <input type="text" class="input-medium">
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label">邮箱：</label>
                                            <div class="controls">
                                                <input type="text" class="input-medium">
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label">地址别名：</label>
                                            <div class="controls">
                                                <input type="text" class="input-medium">
                                            </div>
                                            <div class="othername">
                                                建议填写常用地址：<a href="#" class="sui-btn btn-default">家里</a>　<a href="#" class="sui-btn btn-default">父母家</a>　<a href="#" class="sui-btn btn-default">公司</a>
                                            </div>
                                        </div>

                                    </form>


                                </div>
                                <div class="modal-footer">
                                    <button type="button" data-ok="modal" class="sui-btn btn-primary btn-large">确定</button>
                                    <button type="button" data-dismiss="modal" class="sui-btn btn-default btn-large">取消</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--确认地址-->
                </div>
                <div class="hr"></div>

            </div>
            <div class="hr"></div>
            <!--支付和送货-->
            <div class="payshipInfo">
                <div class="step-tit">
                    <h5>支付方式</h5>
                </div>
                <div class="step-cont">
                    <ul class="payType">
                        <li class="selected">支付宝<span title="点击取消选择"></span></li>
                    </ul>
                </div>
                <div class="hr"></div>
                <div class="step-tit">
                    <h5>送货清单</h5>
                </div>
                <div class="step-cont">
                    <ul class="send-detail">
                        @foreach($arr as $k=>$v)
                            <?php
                            if(isset($price)){
                                $price+=$v['price']*$v["buy_number"];
                            }  else{
                                $price=0;
                                $price=$v['price']*$v["buy_number"];
                            }
                            $num=count($arr);
                            ?>
                        <li>
                            <div class="sendGoods">
                                <ul class="yui3-g">
                                    <li class="yui3-u-1-6">
                                        <span><img src="{{env('UPLOADS_URL')}}{{$v['goods_img']}}" width="100px;"height="50px;"/></span>
                                    </li>
                                    <li class="yui3-u-7-12">
                                        <div class="desc">{{$v['goods_name']}}---
                                            <br>
                                            @if($v['stock']!=[])
                                                @foreach($v['stock'] as $kk=>$vv)
                                                    @if($v['stock']!=[])
                                                        {{$vv[0]}}
                                                        :
                                                        {{$vv[1]}}
                                                        &nbsp;&nbsp;&nbsp;
                                                    @endif

                                                @endforeach
                                            @endif
                                        </div>
                                        <div class="seven">7天无理由退货</div>
                                    </li>
                                    <li class="yui3-u-1-12" style="margin-left: -50px;">
                                        <div class="price" style="width: 300px;">￥：{{$v['price']*$v["buy_number"]}}</div>
                                    </li>
                                    <li class="yui3-u-1-12">
                                        <div class="num">{{$v["buy_number"]}}件</div>
                                    </li>
                                    <li class="yui3-u-1-12">
                                        <div class="exit">有货</div>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        @endforeach
                        <li></li>
                        <li></li>
                    </ul>
                </div>
                <div class="hr"></div>
            </div>


        </div>
    </div>
    <div class="order-summary">
        <div class="static fr">
            <div class="list">
                <span><i class="number"><?php echo $num; ?></i>件商品<br>总商品金钱：<i class="number"><?php echo $price; ?></i></span>
                {{--<em class="allprice">{{$goods->goods_price*2}}</em>--}}
            </div>
        </div>
    </div>
    <div class="clearfix trade">
        {{--<div class="fc-price">应付积分:　<span class="price">{{$goods->goods_price*2}}</span></div>--}}
        {{--<div class="fc-receiverInfo">寄送至:{{$v->province}}{{$v->city}}{{$v->area}}:{{$v->detail}}  收货人：某某某 159****3201</div>--}}
    </div>
    {{--<span>---{{$v->tel}}</span>--}}
    <div class="submit">
        <a class="sui-btn btn-danger btn-xlarge btn" id="msg-button" href="#">提交订单</a>
    </div>
</div>

<script type="text/javascript" src="/index/js/plugins/jquery/jquery.min.js"></script>
<script type="text/javascript" src="/index/js/plugins/jquery.easing/jquery.easing.min.js"></script>
<script type="text/javascript" src="/index/js/plugins/sui/sui.min.js"></script>
<script type="text/javascript" src="components/ui-modules/nav/nav-portal-top.js"></script>
<script type="text/javascript" src="/index/js/pages/getOrderInfo.js"></script>
</body>
<script>
    $(function () {
        //提交订单
        $(document).on("click",".btn",function () {
            var cart_id="{{$cart_id}}"//购物车的id
            var address_id=$(".bb").attr("address")
            if(cart_id==""){
//                alert("篡改数据");
                let option = {
                    popupTime: 2,
                    hook: {
                        initStart: function () {
                            // 检查之前老旧实例如果存在则销毁
                            if (document.querySelector('#modal-layer-container'))
                                ModalLayer.removeAll();
                        }
                    },
                    displayProgressBar: true,
                    displayProgressBarPos: 'top',
                    displayProgressBarColor: 'red',
                    content: '<i style="color: deepskyblue"></i>篡改数据!',
                };

                ModalLayer.msg(option);
                return
            }
            if(address_id==""){
//                alert("篡改数据");
                let option = {
                    popupTime: 2,
                    hook: {
                        initStart: function () {
                            // 检查之前老旧实例如果存在则销毁
                            if (document.querySelector('#modal-layer-container'))
                                ModalLayer.removeAll();
                        }
                    },
                    displayProgressBar: true,
                    displayProgressBarPos: 'top',
                    displayProgressBarColor: 'red',
                    content: '<i style="color: deepskyblue"></i>篡改数据!',
                };

                ModalLayer.msg(option);
                return
            }
//            alert(1)
//            return
            let option = {
                popupTime: 2,
                hook: {
                    initStart: function () {
                        // 检查之前老旧实例如果存在则销毁
                        if (document.querySelector('#modal-layer-container'))
                            ModalLayer.removeAll();
                    }
                },
                displayProgressBar: true,
                displayProgressBarPos: 'top',
                displayProgressBarColor: 'green',
                content: '<i class="fas fa-check" style="color: green"></i>进入支付!',
            };

            ModalLayer.msg(option);
            location.href="/index/cart/settlementAjax?address_id="+address_id+"&cart_id="+cart_id;

        })
        $(document).on("click",".base",function () {
            var address_id=$(this).attr("address")
            var _this=$(this)
            $.ajax({
                url:'/index/score/addresAjax',
                data:{address_id:address_id},
                success:function (res) {
                    if(res==="ok"){
                        $(".aa").removeClass("selected")
                        $(".bb").removeClass("bb")
                        _this.parent().prev().addClass("selected");
                        _this.parent().prev().addClass("bb");
                        $(".base").show()
                        _this.hide()
                    }
                }
            })
        })
    })
</script>
</html>
@endsection
