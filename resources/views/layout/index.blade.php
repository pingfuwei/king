<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
    <title>品优购，优质！优质！</title>
    <link rel="icon" href="/index/assets/index/img/favicon.ico">
    <link rel="stylesheet" type="text/css" href="/index/css/pages-item.css" />
    <link rel="stylesheet" type="text/css" href="/index/css/pages-zoom.css" />
    <link rel="stylesheet" type="text/css" href="/index/css/webbase.css" />
    <link rel="stylesheet" type="text/css" href="/index/css/pages-JD-index.css" />
    <link rel="stylesheet" type="text/css" href="/index/css/widget-jquery.autocomplete.css" />
    <link rel="stylesheet" type="text/css" href="/index/css/widget-cartPanelView.css" />
    <link rel="stylesheet" type="text/css" href="/index/css/webbase.css" />
    <link rel="stylesheet" type="text/css" href="/index/css/pages-list.css" />

    <link rel="stylesheet" type="text/css" href="/index/css/pages-cart.css" />

    <link rel="stylesheet" href="/index/asset/css/modallayer.min.css">
    <script src="https://cdn.bootcss.com/font-awesome/5.11.2/js/all.min.js"></script>
    <script src="/index/asset/js/modallayer-ie.min.js"></script>
</head>
<body>
<!-- 头部栏位 -->
<!--页面顶部-->
<div id="nav-bottom">
    <!--顶部-->
    <div class="nav-top">
        <div class="top">
            <div class="py-container">
                <div class="shortcut">
                    <ul class="fl">
                        <li class="f-item">品优购欢迎{{session("user_name")}}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</li>
                        <?php $aa=session("user_name"); ?>
                        <li class="f-item">
                            @if($aa!="")
                                <a href="javascript:;" class="quits" id="msg-button">退出</a>　<span>
                                    <a href="/index/reg/reg">免费注册</a></span></li>
                                @else
                                <a href="/index/login/login">登录</a>　<span>
                                    <a href="/index/reg/reg">免费注册</a></span></li>
                                @endif

                    </ul>
                    <ul class="fr">
                        <li class="f-item"><a href="{{url('index/persion/sign')}}">签到</a></li>
                        <li class="f-item space"></li>
                        <li class="f-item">我的订单</li>
                        <li class="f-item space"></li>
                        <li class="f-item"><a href="{{url('index/persion/personal')}}">个人中心</a></li>
                        <li class="f-item space"></li>
                        <li class="f-item"><a href="/index/vip/index">品优购会员</a></li>
                        <li class="f-item space"></li>
                        <li class="f-item space"></li>
                        <li class="f-item">关注品优购</li>
                        <li class="f-item space"></li>
                        <li class="f-item" id="service">
                            <span>客户服务</span>
                            <ul class="service">
                                <li><a href="cooperation.html" target="_blank">合作招商</a></li>
                                <li><a href="shoplogin.html" target="_blank">商家后台</a></li>
                                <li><a href="cooperation.html" target="_blank">合作招商</a></li>
                                <li><a href="#">商家后台</a></li>
                            </ul>
                        </li>
                        <li class="f-item space"></li>
                        <li class="f-item">网站导航</li>
                    </ul>
                </div>
            </div>
        </div>

        <!--头部-->
        <div class="header">
            <div class="py-container">
                <div class="yui3-g Logo">
                    <div class="yui3-u Left logoArea">
                        <a class="logo-bd" title="品优购" href="JD-index.html" target="_blank"></a>
                    </div>
                    <div class="yui3-u Center searchArea">
                        <div class="search">
                            <form action="" class="sui-form form-inline">
                                <!--searchAutoComplete-->
                                <div class="input-append">
                                    <input type="text" id="autocomplete"  style="height: 20px;" class="input-error input-xxlarge" />
                                    <button class="sui-btn btn-xlarge btn-danger" type="button">搜索</button>
                                </div>
                            </form>
                        </div>
                        <div class="hotwords">
                            <ul>
                                <li class="f-item">品优购首发</li>
                                <li class="f-item">亿元优惠</li>
                                <li class="f-item">9.9元团购</li>
                                <li class="f-item">每满99减30</li>
                                <li class="f-item">亿元优惠</li>
                                <li class="f-item">9.9元团购</li>
                                <li class="f-item">办公用品</li>

                            </ul>
                        </div>
                    </div>
                    <div class="yui3-u Right shopArea">
                        <div class="fr shopcar">
                            <div class="show-shopcar" id="shopcar">
                                <span class="car"></span>
                                <a class="sui-btn btn-default btn-xlarge count" href="/index/cart/cartlist" target="_blank">
                                    <span>我的购物车</span>
                                    <i class="shopnum">@{{count}}</i>
                                </a>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="yui3-g NavList">
                    <div class="yui3-u Left all-sort">
                        <h4>全部商品分类</h4>
                    </div>
                    <div class="yui3-u Center navArea">
                        <ul class="nav">
                            <li class="f-item" v-for="v in top"><a :href="'/index/cate/list?cate_id='+v.cate_id" style="color: #000;" >@{{v.cate_name}}</a></li>
                        </ul>
                    </div>
                    <div class="yui3-u Right"></div>
                </div>
            </div>
        </div>
    </div>
</div>
@yield('content')
<!-- 底部栏位 -->
<!--页面底部-->
<div class="clearfix footer">
    <div class="py-container">
        <div class="footlink">
            <div class="Mod-service">
                <ul class="Mod-Service-list">
                    <li class="grid-service-item intro  intro1">

                        <i class="serivce-item fl"></i>
                        <div class="service-text">
                            <h4>正品保障</h4>
                            <p>正品保障，提供发票</p>
                        </div>

                    </li>
                    <li class="grid-service-item  intro intro2">

                        <i class="serivce-item fl"></i>
                        <div class="service-text">
                            <h4>正品保障</h4>
                            <p>正品保障，提供发票</p>
                        </div>

                    </li>
                    <li class="grid-service-item intro  intro3">

                        <i class="serivce-item fl"></i>
                        <div class="service-text">
                            <h4>正品保障</h4>
                            <p>正品保障，提供发票</p>
                        </div>

                    </li>
                    <li class="grid-service-item  intro intro4">

                        <i class="serivce-item fl"></i>
                        <div class="service-text">
                            <h4>正品保障</h4>
                            <p>正品保障，提供发票</p>
                        </div>

                    </li>
                    <li class="grid-service-item intro intro5">

                        <i class="serivce-item fl"></i>
                        <div class="service-text">
                            <h4>正品保障</h4>
                            <p>正品保障，提供发票</p>
                        </div>

                    </li>
                </ul>
            </div>
            <div class="clearfix Mod-list">
                <div class="yui3-g">
                    <div class="yui3-u-1-6">
                        <h4>购物指南</h4>
                        <ul class="unstyled">
                            <li>购物流程</li>
                            <li>会员介绍</li>
                            <li>生活旅行/团购</li>
                            <li>常见问题</li>
                            <li>购物指南</li>
                        </ul>

                    </div>
                    <div class="yui3-u-1-6">
                        <h4>配送方式</h4>
                        <ul class="unstyled">
                            <li>上门自提</li>
                            <li>211限时达</li>
                            <li>配送服务查询</li>
                            <li>配送费收取标准</li>
                            <li>海外配送</li>
                        </ul>
                    </div>
                    <div class="yui3-u-1-6">
                        <h4>支付方式</h4>
                        <ul class="unstyled">
                            <li>货到付款</li>
                            <li>在线支付</li>
                            <li>分期付款</li>
                            <li>邮局汇款</li>
                            <li>公司转账</li>
                        </ul>
                    </div>
                    <div class="yui3-u-1-6">
                        <h4>售后服务</h4>
                        <ul class="unstyled">
                            <li>售后政策</li>
                            <li>价格保护</li>
                            <li>退款说明</li>
                            <li>返修/退换货</li>
                            <li>取消订单</li>
                        </ul>
                    </div>
                    <div class="yui3-u-1-6">
                        <h4>特色服务</h4>
                        <ul class="unstyled">
                            <li>夺宝岛</li>
                            <li>DIY装机</li>
                            <li>延保服务</li>
                            <li>品优购E卡</li>
                            <li>品优购通信</li>
                        </ul>
                    </div>
                    <div class="yui3-u-1-6">
                        <h4>帮助中心</h4>
                        <img src="/index/img/wx_cz.jpg">
                    </div>
                </div>
            </div>
            <div class="Mod-copyright">
                <ul class="helpLink">
                    <li>关于我们<span class="space"></span></li>
                    <li>联系我们<span class="space"></span></li>
                    <li>关于我们<span class="space"></span></li>
                    <li>商家入驻<span class="space"></span></li>
                    <li>营销中心<span class="space"></span></li>
                    <li>友情链接<span class="space"></span></li>
                    <li>关于我们<span class="space"></span></li>
                    <li>营销中心<span class="space"></span></li>
                    <li>友情链接<span class="space"></span></li>
                    <li>关于我们</li>
                </ul>
                <p>地址：北京市昌平区建材城西路金燕龙办公楼一层 邮编：100096 电话：400-618-4000 传真：010-82935100</p>
                <p>京ICP备08001421号京公网安备110108007702</p>
            </div>
        </div>
    </div>
</div>
<!--页面底部END-->
<!-- 楼层位置 -->
<div id="floor-index" class="floor-index">
    <ul>
        <li>
            <a class="num" href="javascript:;" style="display: none;">1F</a>
            <a class="word" href="javascript;;" style="display: block;">家用电器</a>
        </li>
        <li>
            <a class="num" href="javascript:;" style="display: none;">2F</a>
            <a class="word" href="javascript;;" style="display: block;">手机通讯</a>
        </li>
        <li>
            <a class="num" href="javascript:;" style="display: none;">3F</a>
            <a class="word" href="javascript;;" style="display: block;">电脑办公</a>
        </li>
        <li>
            <a class="num" href="javascript:;" style="display: none;">4F</a>
            <a class="word" href="javascript;;" style="display: block;">家居家具</a>
        </li>
        <li>
            <a class="num" href="javascript:;" style="display: none;">5F</a>
            <a class="word" href="javascript;;" style="display: block;">运动户外</a>
        </li>
    </ul>
</div>
<!--侧栏面板开始-->
<div class="J-global-toolbar">
    <div class="toolbar-wrap J-wrap">
        <div class="toolbar">
            <div class="toolbar-panels J-panel">

                <!-- 购物车 -->
                <div style="visibility: hidden;" class="J-content toolbar-panel tbar-panel-cart toolbar-animate-out">
                    <h3 class="tbar-panel-header J-panel-header">
                        <a href="/index/cart/cartlist" class="title"><i></i><em class="title">购物车</em></a>
                        <span class="close-panel J-close" onclick="cartPanelView.tbar_panel_close('cart');" ></span>
                    </h3>
                    <div class="tbar-panel-main">
                        <div class="tbar-panel-content J-panel-content">
                            <div id="J-cart-tips" class="tbar-tipbox hide">
                                <div class="tip-inner">
                                    <span class="tip-text">还没有登录，登录后商品将被保存</span>
                                    <a href="#none" class="tip-btn J-login">登录</a>
                                </div>
                            </div>
                            <div id="J-cart-render">
                                <!-- 列表 -->
                                <div id="cart-list" class="tbar-cart-list">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- 小计 -->
                    {{--<div id="cart-footer" class="tbar-panel-footer J-panel-footer">--}}
                        {{--<div class="tbar-checkout">--}}
                            {{--<div class="jtc-number"> <strong class="J-count" id="cart-number">0</strong>件商品 </div>--}}
                            {{--<div class="jtc-sum"> 共计：<strong class="J-total" id="cart-sum">¥0</strong> </div>--}}
                            {{--<a class="jtc-btn J-btn" href="#none" target="_blank">去购物车结算</a>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                </div>

                <!-- 我的关注 -->
                <div style="visibility: hidden;" data-name="follow" class="J-content toolbar-panel tbar-panel-follow">
                    <h3 class="tbar-panel-header J-panel-header">
                        <a href="#" target="_blank" class="title"> <i></i> <em class="title">我的收藏</em> </a>
                        <span class="close-panel J-close" onclick="cartPanelView.tbar_panel_close('follow');"></span>
                    </h3>
                    <div class="tbar-panel-main">
                        <div class="tbar-panel-content J-panel-content" id="btn">
                            <div class="jt-history-wrap cart">
                                <ul>

                                    <li class="jth-item" v-for="v in cart">

                                        <a :href="'/index/goods/desc?goods_id='+v.goods_id" class="img-wrap"> <img v-bind:src="v.goods_img" height="160" width="180" /> </a>
                                        <div><a class="add-cart-button" href="#" target="_blank">@{{v.goods_name}}</a></div>
                                        <a :href="'/index/goods/desc?goods_id='+v.goods_id" target="_blank" class="price" style="color: red">￥@{{v.goods_price}}</a>
                                        <div height="10" width="100" style="background: plum; "><a ><b>-------</b></a></div>
                                    </li>

                                </ul>


                            </div>
                        </div>
                    </div>
                    <div class="tbar-panel-footer J-panel-footer"></div>
                </div>

                <!-- 我的足迹 -->
                <div style="visibility: hidden;" class="J-content toolbar-panel tbar-panel-history toolbar-animate-in">
                    <h3 class="tbar-panel-header J-panel-header">
                        <a href="#" target="_blank" class="title"> <i></i> <em class="title">我的足迹</em> </a>
                        <span class="close-panel J-close" onclick="cartPanelView.tbar_panel_close('history');"></span>
                    </h3>
                    <div class="tbar-panel-main">
                        <div class="tbar-panel-content J-panel-content" id="btn">
                            <div class="jt-history-wrap but">
                                    <ul>

                                            <li class="jth-item" v-for="v in history">
                                                <a :href="'/index/goods/desc?goods_id='+v.goods_id" class="img-wrap"> <img v-bind:src="v.goods_img" height="80" width="80" /> </a>
                                                <a class="add-cart-button" href="#" target="_blank">加入购物车</a>
                                                <a :href="'/index/goods/desc?goods_id='+v.goods_id" target="_blank" class="price">￥@{{v.goods_price}}</a>
                                                <div height="10" width="100" style="background: plum"><a ><b class="del" his_id="@{{v.his_id}}" style="align-content: center">删除记录</b></a></div>
                                            </li>

                                    </ul>
                                    <a href="#" class="history-bottom-more" target="_blank">查看更多足迹商品 &gt;&gt;</a>

                            </div>
                        </div>
                    </div>
                    <div class="tbar-panel-footer J-panel-footer"></div>
                </div>

            </div>

            <div class="toolbar-header"></div>

            <!-- 侧栏按钮 -->
            <div class="toolbar-tabs J-tab">
                <div onclick="cartPanelView.tabItemClick('follow')" class="toolbar-tab tbar-tab-follow" data="我的收藏" tag="follow" >
                    <i class="tab-ico"></i>
                    <em class="tab-text"></em>
                    <span class="tab-sub J-count hide">0</span>
                </div>
                <div onclick="cartPanelView.tabItemClick('history')" class="toolbar-tab tbar-tab-history" data="我的足迹" tag="history" >
                    <i class="tab-ico"></i>
                    <em class="tab-text"></em>
                    <span class="tab-sub J-count hide">0</span>
                </div>
            </div>

            <div class="toolbar-footer">
                <div class="toolbar-tab tbar-tab-top" > <a href="#"> <i class="tab-ico  "></i> <em class="footer-tab-text">顶部</em> </a> </div>
                <div class="toolbar-tab tbar-tab-feedback" > <a href="#" target="_blank"> <i class="tab-ico"></i> <em class="footer-tab-text ">反馈</em> </a> </div>
            </div>

            <div class="toolbar-mini"></div>

        </div>

        <div id="J-toolbar-load-hook"></div>

    </div>
</div>
<!--购物车单元格 模板-->


<!--侧栏面板结束-->
<script type="text/javascript">
    $(function(){
        $("#service").hover(function(){
            $(".service").show();
        },function(){
            $(".service").hide();
        });
        $("#shopcar").hover(function(){
            $("#shopcarlist").show();
        },function(){
            $("#shopcarlist").hide();
        });

    })
</script>

<!-- <script type="text/javascript" src="/index/js/model/cartModel.js"></script> -->
<script type="text/javascript" src="/index/js/czFunction.js"></script>
<!-- <script type="text/javascript" src="/index/js/plugins/jquery.easing/jquery.easing.min.js"></script> -->
<!-- <script type="text/javascript" src="/index/js/plugins/sui/sui.min.js"></script> -->

 <script type="text/javascript" src="/index/js/model/cartModel.js"></script>
<script type="text/javascript" src="/index/js/czFunction.js"></script>
 <script type="text/javascript" src="/index/js/plugins/jquery.easing/jquery.easing.min.js"></script>
 <script type="text/javascript" src="/index/js/plugins/sui/sui.min.js"></script>

<script type="text/javascript" src="/index/js/pages/index.js"></script>
<script type="text/javascript" src="/index/js/widget/cartPanelView.js"></script>
<script type="text/javascript" src="/index/js/widget/jquery.autocomplete.js"></script>
<script type="text/javascript" src="/index/js/widget/nav.js"></script>
</body>


</html>


<script src="/index/vue/axios.min.js"></script>
<script src="/index/vue/vue.min.js"></script>
{{--//浏览历史记录--}}
<script>
    var me = new Vue({
        el:".but",
        data:{
            history:null,
        },
        mounted(){
        var _this=this;
        var data={

        };
        var url="/history/list"
        axios.post(url,data).then(function (msg){
//            console.log(msg.data);return;
            _this.history=msg.data;
        });
    },
    methods:{
    }
    });
</script>
{{--我的收藏--}}
<script>
    var me = new Vue({
        el:".cart",
        data:{
            cart:null,
        },
        mounted(){
        var _this=this;
        var data={

        };
        var url="/cart/list"
        axios.post(url,data).then(function (msg){
//            console.log(msg.data);return;
            _this.cart=msg.data;
        });
    },
    methods:{
    }
    });
</script>
{{--购物车--}}
<script>
    var me = new Vue({
        el:".count",
        data:{
            count:null,
        },
        mounted(){
        var _this=this;
        var data={

        };
        var url="/cart/count"
        axios.post(url,data).then(function (msg){
//            console.log(msg.data);return;
            _this.count=msg.data;
        });
    },
    methods:{
    }
    });
</script>
<script>
var me = new Vue({
    el:".nav",
    data:{
      top:null,
    },
    mounted(){
        var _this=this;
        var data={};
        var url="/index/cate/top"
          axios.post(url,data).then(function (msg){
            //console.log(msg);return;
            _this.top=msg.data;
          });
    },
    methods:{
    }
 });
</script>
<script>
    $(document).on('click','.del',function(){
//        alert(1);
        var his_id=$(this).attr('his_id');
        var _this=$(".but");
        $.ajax({
            url:"{{url('history/del')}}",
            data:{'his_id':his_id},
            type:'post',
            dataType:'html',
            success:function(res){

                $("#btn").html(res);
                return false;

            }
        })
    })
    $(document).on("click",".quits",function () {
            $.ajax({
                url:"/index/login/quit",
                data:{},
                success:function (res) {
                    if(res==="ok"){
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
                            content: '<i class="fas fa-check" style="color: green"></i>退出成功',
                        };
                        ModalLayer.msg(option);
                        location.href="/"
                    }else{
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
                            content: '<i style="color: red"></i>系统错误---联系客服',
                        };
                        ModalLayer.msg(option);
                    }
                }
            })
    })
</script>