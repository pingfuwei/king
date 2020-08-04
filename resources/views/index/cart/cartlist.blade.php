<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=9; IE=8; IE=7; IE=EDGE">
	<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
	<title>我的购物车</title>

    <link rel="stylesheet" type="text/css" href="/index/css/webbase.css" />
    <link rel="stylesheet" type="text/css" href="/index/css/pages-cart.css" />

    <style>
    	.add{
    		background-color: #f5f5f5;
    	}
    </style>
</head>

<body>
	<!--head-->
	<div class="top">
		<div class="py-container">
			<div class="shortcut">
			        <ul class="fl">
			            <li class="f-item">品优购欢迎{{session("user_name")}}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</li>

			            <li class="f-item">
			                <a href="/index/login/login">登录</a>　<span>
			                        <a href="/index/reg/reg">免费注册</a></span></li>
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
	<div class="cart py-container">
		<!--logoArea-->
		<div class="logoArea">
			<div class="fl logo"><span class="title">购物车</span></div>
			<div class="fr search">
				<form class="sui-form form-inline">
					<div class="input-append">
						<input type="text" type="text" class="input-error input-xxlarge" placeholder="品优购自营" />
						<button class="sui-btn btn-xlarge btn-danger" type="button">搜索</button>
					</div>
				</form>
			</div>
		</div>
		<!--All goods-->
		<div class="allgoods">
			<h4>全部商品<span>{{$count}}</span></h4>
			<div class="cart-main">
				<div class="yui3-g cart-th">
					<div class="yui3-u-1-4"><input type="checkbox" name=""value="" class="allcheck"/> 全部</div>
					<div class="yui3-u-1-4">商品</div>
					<div class="yui3-u-1-8">单价（元）</div>
					<div class="yui3-u-1-8">数量</div>
					<div class="yui3-u-1-8">小计（元）</div>
					<div class="yui3-u-1-8">操作</div>
				</div>
				<div class="cart-item-list">
					{{--<div class="cart-shop">--}}
						{{--<input type="checkbox" name="" id="" value="" />--}}
						{{--<span class="shopname self">传智自营</span>--}}
					{{--</div>--}}
					{{--<div class="cart-body">--}}
						{{--<div class="cart-list">--}}
							{{--<ul class="goods-list yui3-g">--}}
								{{--<li class="yui3-u-1-24">--}}
									{{--<input type="checkbox" name="" id="" value="" />--}}
								{{--</li>--}}
								{{--<li class="yui3-u-11-24">--}}
									{{--<div class="good-item">--}}
										{{--<div class="item-img"><img src="/index/img/goods.png" /></div>--}}
										{{--<div class="item-msg">Apple Macbook Air 13.3英寸笔记本电脑 银色（Corei5）处理器/8GB内存--}}
											{{--尺寸：13.3英寸</div>--}}
									{{--</div>--}}
								{{--</li>--}}

								{{--<li class="yui3-u-1-8"><span class="price">8848.00</span></li>--}}
								{{--<li class="yui3-u-1-8">--}}
									{{--<a href="javascript:void(0)" class="increment mins">-</a>--}}
									{{--<input autocomplete="off" type="text" value="1" minnum="1" class="itxt" />--}}
									{{--<a href="javascript:void(0)" class="increment plus">+</a>--}}
								{{--</li>--}}
								{{--<li class="yui3-u-1-8"><span class="sum">8848.00</span></li>--}}
								{{--<li class="yui3-u-1-8">--}}
									{{--<a href="#none">删除</a><br />--}}
									{{--<a href="#none">移到我的关注</a>--}}
								{{--</li>--}}
							{{--</ul>--}}
						{{--</div>--}}
						{{--<div class="cart-list">--}}
							{{--<ul class="goods-list yui3-g">--}}
								{{--<li class="yui3-u-1-24">--}}
									{{--<input type="checkbox" name="" id="" value="" />--}}
								{{--</li>--}}
								{{--<li class="yui3-u-11-24">--}}
									{{--<div class="good-item">--}}
										{{--<div class="item-img"><img src="/index/img/goods.png" /></div>--}}
										{{--<div class="item-msg">Apple Macbook Air 13.3英寸笔记本电脑 银色（Corei5）处理器/8GB内存--}}
											{{--尺寸：13.3英寸</div>--}}
									{{--</div>--}}
								{{--</li>--}}

								{{--<li class="yui3-u-1-8"><span class="price">8848.00</span></li>--}}
								{{--<li class="yui3-u-1-8">--}}
									{{--<a href="javascript:void(0)" class="increment mins">-</a>--}}
									{{--<input autocomplete="off" type="text" value="1" minnum="1" class="itxt" />--}}
									{{--<a href="javascript:void(0)" class="increment plus">+</a>--}}
								{{--</li>--}}
								{{--<li class="yui3-u-1-8"><span class="sum">8848.00</span></li>--}}
								{{--<li class="yui3-u-1-8">--}}
									{{--<a href="#none">删除</a><br />--}}
									{{--<a href="#none">移到我的关注</a>--}}
								{{--</li>--}}
							{{--</ul>--}}
						{{--</div>--}}
						{{--<div class="cart-list">--}}
							{{--<ul class="goods-list yui3-g">--}}
								{{--<li class="yui3-u-1-24">--}}
									{{--<input type="checkbox" name="" id="" value="" />--}}
								{{--</li>--}}
								{{--<li class="yui3-u-11-24">--}}
									{{--<div class="good-item">--}}
										{{--<div class="item-img"><img src="/index/img/goods.png" /></div>--}}
										{{--<div class="item-msg">--}}
											{{--Apple Macbook Air 13.3英寸笔记本电脑 银色（Corei5）处理器/8GB内存--}}
											{{--尺寸：13.3英寸--}}
										{{--</div>--}}
									{{--</div>--}}
								{{--</li>--}}

								{{--<li class="yui3-u-1-8"><span class="price">8848.00</span></li>--}}
								{{--<li class="yui3-u-1-8">--}}
									{{--<a href="javascript:void(0)" class="increment mins">-</a>--}}
									{{--<input autocomplete="off" type="text" value="1" minnum="1" class="itxt" />--}}
									{{--<a href="javascript:void(0)" class="increment plus">+</a>--}}
								{{--</li>--}}
								{{--<li class="yui3-u-1-8"><span class="sum">8848.00</span></li>--}}
								{{--<li class="yui3-u-1-8">--}}
									{{--<a href="#none">删除</a><br />--}}
									{{--<a href="#none">移到我的关注</a>--}}
								{{--</li>--}}
							{{--</ul>--}}
						{{--</div>--}}
					{{--</div>--}}
				{{--</div>--}}
				<div class="cart-item-list">
					{{--<div class="cart-shop">--}}
						{{--<input type="checkbox" name="" id="" value="" />--}}
						{{--<span class="shopname">神州数码专营店</span>--}}
					{{--</div>--}}
					@if($cart_info==[])
						<a href="/"><h3 style="text-align: center">亲，您购物车空空如也，请先先加入一些东西吧</h3></a>
					@else
						@foreach($cart_info as $k=>$v)
							<tr>
						<div class="cart-body">
							<div class="cart-list">
								<ul class="goods-list yui3-g" stock_id="{{$v['stock_id']}}">
								<ul class="goods-list yui3-g" cart_id="{{$v['cart_id']}}">
									<li class="yui3-u-1-24">
										<input type="checkbox" name="cart_id" class="check" value="{{$v['cart_id']}}" />
									</li>
									<li class="yui3-u-11-24">
										<div class="good-item">
											<div class="item-img"><img jqimg="{{env('UPLOADS_URL')}}{{$v['goods_img']}}"src="{{env('UPLOADS_URL')}}{{$v['goods_img']}}" /></div>
											<div class="item-msg">{{$v['goods_name']}}---
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
										</div>
									</li>
									<li class="yui3-u-1-8"><span class="price">{{$v['price']}}</span></li>
									<li class="yui3-u-1-8" goods_num="{{$v['stoock']}}" stock_id="{{$v['stock_id']}}" cart_id="{{$v["cart_id"]}}">
										<a href="javascript:void(0)" class="increment mins">-</a>
										<input autocomplete="off" type="text" value="{{$v['buy_number']}}" minnum="1" class="itxt" />
										<a href="javascript:void(0)" class="increment plus">+</a>
									</li>
									<li class="yui3-u-1-8"><span class="sum">{{$v['buy_number']*$v['price']}}</span></li>
									<li class="yui3-u-1-8">
										<a href="javascript:;" class="del" cart_id="{{$v['cart_id']}}">删除</a>
									</li>
								</ul>
							</div>
						{{--<div class="cart-list">--}}
							{{--<ul class="goods-list yui3-g">--}}
								{{--<li class="yui3-u-1-24">--}}
									{{--<input type="checkbox" name="" id="" value="" />--}}
								{{--</li>--}}
								{{--<li class="yui3-u-11-24">--}}
									{{--<div class="good-item">--}}
										{{--<div class="item-img"><img src="/index/img/goods.png" /></div>--}}
										{{--<div class="item-msg">Apple Macbook Air 13.3英寸笔记本电脑 银色（Corei5）处理器/8GB内存--}}
											{{--尺寸：13.3英寸</div>--}}
									{{--</div>--}}
								{{--</li>--}}

								{{--<li class="yui3-u-1-8"><span class="price">8848.00</span></li>--}}
								{{--<li class="yui3-u-1-8">--}}
									{{--<a href="javascript:void(0)" class="increment mins">-</a>--}}
									{{--<input autocomplete="off" type="text" value="1" minnum="1" class="itxt" />--}}
									{{--<a href="javascript:void(0)" class="increment plus">+</a>--}}
								{{--</li>--}}
								{{--<li class="yui3-u-1-8"><span class="sum">8848.00</span></li>--}}
								{{--<li class="yui3-u-1-8">--}}
									{{--<a href="#none">删除</a><br />--}}
									{{--<a href="#none">移到我的关注</a>--}}
								{{--</li>--}}
							{{--</ul>--}}
						{{--</div>--}}
					</div>
							</tr>
						@endforeach
				</div>
			</div>
			<div class="cart-tool">
				<div class="option">
					<a href="#none">删除选中的商品</a>
					{{--<a href="#none">移到我的关注</a>--}}
					{{--<a href="#none">清除下柜商品</a>--}}
				</div>
				<div class="toolbar">
					<div class="chosed">已选择<span>0</span>件商品</div>
					<div class="sumprice">
						<span><em>总价（不含运费） ：</em><i class="summoney"id="money">¥0</i></span>
						<span><em>已节省：</em><i>-¥20.00</i></span>
					</div>
					<div class="sumbtn">
						<a class="sum-btn" href="javascript:;" target="_blank" id="account">结算</a>
					</div>
				</div>
			</div>
			<div class="clearfix"></div>
			<div class="deled">
				<span>已删除商品，您可以重新购买或加关注：</span>
				<div class="cart-list del">
					<ul class="goods-list yui3-g">
						<li class="yui3-u-1-2">
							<div class="good-item">
								<div class="item-msg">Apple Macbook Air 13.3英寸笔记本电脑 银色（Corei5）处理器/8GB内存</div>
							</div>
						</li>
						<li class="yui3-u-1-6"><span class="price">8848.00</span></li>
						<li class="yui3-u-1-6">
							<span class="number">1</span>
						</li>
						<li class="yui3-u-1-8">
							{{--<a href="#none">重新购买</a>--}}
							{{--<a href="#none">移到我的关注</a>--}}
						</li>
					</ul>
				</div>
			</div>
				@endif
			<div class="liked">
				<ul class="sui-nav nav-tabs">
					<li class="active">
						<a href="#index" data-toggle="tab">猜你喜欢</a>
					</li>
					<li>
						<a href="#profile" data-toggle="tab">特惠换购</a>
					</li>
				</ul>
				<div class="clearfix"></div>
				<div class="tab-content">
					<div id="index" class="tab-pane active">
						<div id="myCarousel" data-ride="carousel" data-interval="4000" class="sui-carousel slide">
							<div class="carousel-inner">
								<div class="active item">
									<ul>
										<li>
											<img src="/index/img/like1.png" />
											<div class="intro">
												<i>Apple苹果iPhone 6s (A1699)</i>
											</div>
											<div class="money">
												<span>$29.00</span>
											</div>
											<div class="incar">
												<a href="#" class="sui-btn btn-bordered btn-xlarge btn-default"><i class="car"></i><span class="cartxt">加入购物车</span></a>
											</div>
										</li>
										<li>
											<img src="/index/img/like2.png" />
											<div class="intro">
												<i>Apple苹果iPhone 6s (A1699)</i>
											</div>
											<div class="money">
												<span>$29.00</span>
											</div>
											<div class="incar">
												<a href="#" class="sui-btn btn-bordered btn-xlarge btn-default"><i class="car"></i><span class="cartxt">加入购物车</span></a>
											</div>
										</li>
										<li>
											<img src="/index/img/like3.png" />
											<div class="intro">
												<i>Apple苹果iPhone 6s (A1699)</i>
											</div>
											<div class="money">
												<span>$29.00</span>
											</div>
											<div class="incar">
												<a href="#" class="sui-btn btn-bordered btn-xlarge btn-default"><i class="car"></i><span class="cartxt">加入购物车</span></a>
											</div>
										</li>
										<li>
											<img src="/index/img/like4.png" />
											<div class="intro">
												<i>Apple苹果iPhone 6s (A1699)</i>
											</div>
											<div class="money">
												<span>$29.00</span>
											</div>
											<div class="incar">
												<a href="#" class="sui-btn btn-bordered btn-xlarge btn-default"><i class="car"></i><span class="cartxt">加入购物车</span></a>
											</div>
										</li>
									</ul>
								</div>
								<div class="item">
									<ul>
										<li>
											<img src="/index/img/like1.png" />
											<div class="intro">
												<i>Apple苹果iPhone 6s (A1699)</i>
											</div>
											<div class="money">
												<span>$29.00</span>
											</div>
											<div class="incar">
												<a href="#" class="sui-btn btn-bordered btn-xlarge btn-default"><i class="car"></i><span class="cartxt">加入购物车</span></a>
											</div>
										</li>
										<li>
											<img src="/index/img/like2.png" />
											<div class="intro">
												<i>Apple苹果iPhone 6s (A1699)</i>
											</div>
											<div class="money">
												<span>$29.00</span>
											</div>
											<div class="incar">
												<a href="#" class="sui-btn btn-bordered btn-xlarge btn-default"><i class="car"></i><span class="cartxt">加入购物车</span></a>
											</div>
										</li>
										<li>
											<img src="/index/img/like3.png" />
											<div class="intro">
												<i>Apple苹果iPhone 6s (A1699)</i>
											</div>
											<div class="money">
												<span>$29.00</span>
											</div>
											<div class="incar">
												<a href="#" class="sui-btn btn-bordered btn-xlarge btn-default"><i class="car"></i><span class="cartxt">加入购物车</span></a>
											</div>
										</li>
										<li>
											<img src="/index/img/like4.png" />
											<div class="intro">
												<i>Apple苹果iPhone 6s (A1699)</i>
											</div>
											<div class="money">
												<span>$29.00</span>
											</div>
											<div class="incar">
												<a href="#" class="sui-btn btn-bordered btn-xlarge btn-default"><i class="car"></i><span class="cartxt">加入购物车</span></a>
											</div>
										</li>
									</ul>
								</div>
							</div>
							<a href="#myCarousel" data-slide="prev" class="carousel-control left">‹</a>
							<a href="#myCarousel" data-slide="next" class="carousel-control right">›</a>
						</div>
					</div>
					<div id="profile" class="tab-pane">
						<p>特惠选购</p>
					</div>
				</div>
			</div>
		</div>
	</div>
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

<script type="text/javascript" src="/index/js/plugins/jquery/jquery.min.js"></script>
<script type="text/javascript" src="/index/js/plugins/jquery.easing/jquery.easing.min.js"></script>
<script type="text/javascript" src="/index/js/plugins/sui/sui.min.js"></script>
<script type="text/javascript" src="/index/js/widget/nav.js"></script>
</body>

</html>
<script>
    $(function(){
        // alert(123);
        //加号
        $(document).on("click",".plus",function(){
            // alert(123);
            var _this = $(this);
            var buy_number = parseInt(_this.prev("input").val());
            var goods_num = parseInt(_this.parent().attr("goods_num"));
            var stock_id = _this.parent().attr("stock_id");
            var cart_id = _this.parent().attr("cart_id");
            // console.log(cart_id);
            // console.log(goods_num);
            if (buy_number >= goods_num) {
                _this.prev("input").val(goods_num);
            } else {
                buy_number = buy_number + 1;
                _this.prev("input").val(buy_number);
            }

			background(_this);
            _this.parent().prev().prev().prev().children().attr("checked","aa");
            // _this.parent().attr("aa","bb");
            // console.log(ass);
//            alert(1)
            // alert(1)
            updnumber(buy_number,cart_id);
            total(_this,stock_id,cart_id);
            getMoney();
        })
        //减号
        $(document).on("click",".mins",function(){
            // alert(123);
            var _this = $(this);
            var buy_number = parseInt(_this.next("input").val());
            var goods_num = parseInt(_this.parent().attr("goods_num"));
            var stock_id = _this.parent().attr("stock_id");
            var cart_id = _this.parent().attr("cart_id");
            // console.log(goods_num);
            if (buy_number <= 1) {
                _this.next("input").val("1");
            } else {
                buy_number = buy_number - 1;
                _this.next("input").val(buy_number);
            }

            background(_this);
            _this.parent().prev().prev().prev().children().attr("checked","aa");
            updnumber(buy_number,cart_id);
            total(_this,stock_id,cart_id);
            getMoney();
        })
        //失去焦点
        $(document).on("blur",".itxt",function(){
            // alert(123);
            var _this = $(this);
            var buy_number = _this.val();
            var goods_num = parseInt(_this.parent().attr("goods_num"));
            // console.log(goods_num);
            var stock_id = _this.parent().attr("stock_id");
            var cart_id = _this.parent().attr("cart_id");

            //正则验证
            var ags = /^\d{1,}$/;
            if (buy_number == "") {
                _this.val("1");
                buy_number = 1;
            } else if (buy_number <= 1) {
                _this.val("1");
                buy_number = 1;
            } else if (!ags.test(buy_number)) {
                _this.val("1");
                buy_number = 1;
            } else if (parseInt(buy_number) >= goods_num) {
                _this.val(goods_num);
                buy_number = goods_num;
            } else {
                _this.val(parseInt(buy_number));
                buy_num = parseInt(buy_number);
            }

			background(_this);
            _this.parent().prev().prev().prev().children().attr("checked","aa");
            updnumber(buy_number,cart_id);
            total(_this,stock_id,cart_id);
            getMoney();
        })
        //修改购买数量
        function updnumber(buy_number,cart_id){
            $.get(
                "/index/cart/updnumber", {
                    cart_id: cart_id,
                    buy_number:buy_number
                },
                function(res) {
                    // console.log(res);
                    if(res.status=="false"){
                        alert(res.msg);
                        return false;
                    }
                },'json'
            )
        }
        //小计
        function total(_this,stock_id,cart_id){
            // console.log(stock_id);
            $.get(
                "/index/cart/total", {
                    stock_id: stock_id,
                    cart_id:cart_id
                },
                function(res) {
                    // console.log(res);
                    _this.parents("li").next().children().text(res);
                }
            )
        }

    })
</script>
<script>
	$(document).on('click','.del',function(){
		if(!confirm("是否确定删除？")){
			return false;
		}
		var data={};
		data.cart_id=$(this).attr('cart_id');
//        alert(data);
		url="/index/cart/cartdel";
		$.ajax({
			url:url,
			data:data,
			type:"post",
			dataType:'json',
			success:function(res){
//				console.log(res);
				alert(res.result.message);
				if(res.message=='success'){
					location.href="/index/cart/cartlist";
				}
			}
		})
		$.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') } });
	})
	//点击复选框 class="check"
	$(document).on("click",".check",function(){
		var _this=$(this);
		var _checked=_this.prop("checked");
//		alert(_checked);
		if(_checked==true){
			// 当前行 背景色改变
			background(_this);
			// 当前行复选框 变为选中状态
			checkbox(_this);
			// 重新获取总价
            getMoney();
		}else{
			// 重新获取总价
			_this.parents("ul").removeClass("add");
            getMoney();
		}
		//alert(_this);
	})
	//点击全选   和全不选
	$(document).on("click",".allcheck",function(){
		// alert(1);
		var _this=$(this);

		var _checkbox=_this.prop("checked");
            var _this = $(".check");
		// console.log(_checkbox);
		if (_checkbox==true) {
			background(_this);
		} else {
			_this.parents("ul").removeClass("add");
		}
		$('.check').prop("checked",_checkbox);
		// 重新获取总价
        getMoney();
	})
	//点击批量删除
	$(document).on("click",'#pdel',function(){
		var box=$('.check:checked');
		if(box.length<1){
			alert('没有内容删除');
			return false;
		}
		var goods_id='';
		box.each(function(){
			goods_id+=$(this).parents('tr').attr('goods_id')+',';
		})
		goods_id=goods_id.substr(0,goods_id.length-1);
		// alert(goods_id);
		//
		if(window.confirm('是否确定删除？')){
			$.ajax({
				type:"post",
				url:"{:url('cart/changedel')}",
				data:{goods_id:goods_id},
				async:false,
				dataType:"json",
				success:function(index){
					if (index.code==1) {
						box.each(function(){
							$(this).parents('tr').remove();
						})
					} else {
						alert(index.canshu);
					}
					// alert(index);
				}
			})
		}
		// 重新获取总价
        getMoney();
	})
	//点击结算
	$(document).on("click",'#account',function(){
		var box=$('.check:checked');
//		console.log(box);
//		return false;
		if (box.length<0) {
			alert('请至少选择一见商品');
			return false;
		}
		var cart_id='';
		box.each(function(index){
			cart_id+=$(this).val()+',';
		})
//		console.log(cart_id);return false;
		var cart_id=cart_id.substr(0,cart_id.length-1);
//		 alert(cart_id);
		location.href="/index/cart/account?cart_id="+cart_id;
	})
	//  封装商品的总价
	function getmonney(){
		var cart_id='';
		var box=$('.check:checked');//获取选中的复选框
		box.each(function(index){
			cart_id+=$(this).val()+',';   //给每个上面拼接一个,号  每个都拼接  用字符串连接一起
		})
		cart_id=cart_id.substr(0,cart_id.length-1); //截取长度减去1 控制用in查询 所以去一位就可以  //alert(goods_id);
		$.ajax({
			type:"post",
			url:"{:url('cart/getmonney')}",
			data:{cart_id:cart_id},
			async:false,
			success:function(index){
				// alert(index);
				$('#monney').text('￥'+index);
			}
		})
	}
	// 封装当前行 背景色改变
	function background(_this){
		_this.parents("ul").addClass("add");
	}
	// 封装当前行复选框 变为选中状态
	function checkbox(_this){
		_this.parents("tr").find('.check').prop("checked",true);
	}
    //获取总价
    function getMoney() {
        // alert(123);
        //获取类为box选择复选框的
        var _box = $(".check:checked");
        // console.log(_box);
        var stock_id = "";
        //将选中的复选框循环
        _box.each(function(index) {
                //获取到的值 再加上id
                // console.log($(this));
                stock_id += $(this).parents("ul").attr("stock_id") + ",";
            })
            // console.log(stock_id);
            //将id最后一个符号去掉
        stock_id = stock_id.substr(0, stock_id.length - 1);
        // console.log(stock_id);
        $.get(
            "/index/cart/getmonney", {
                stock_id:stock_id
            },
            function(res) {
                // console.log(res);
                $("#money").text("￥" + res);
            }
        )
    }
</script>
