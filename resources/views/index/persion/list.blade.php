@extends('layout.index')
@section('content')

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=9; IE=8; IE=7; IE=EDGE">
    <meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
    <title>设置-个人信息</title>
     <link rel="icon" href="/index/img/favicon.ico">

    <link rel="stylesheet" type="text/css" href="/index/css/webbase.css" />
    <link rel="stylesheet" type="text/css" href="/index/css/pages-seckillOrder.css" />
</head>

<body>

<script type="text/javascript" src="js/plugins/jquery/jquery.min.js"></script>
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
</body>
    <!--header-->
    <div id="account">
        <div class="py-container">
            <div class="yui3-g home">
                <!--左侧列表-->
                <div class="yui3-u-1-6 list aa">

                    <div class="person-info">
                        <div class="person-photo"><img src="/img/king.jpg" alt=""></div>
                        <div class="person-account">
                            <span class="name">{{session("user_name")}}</span>
                            <span class="safe">账户安全</span>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="list-items">
                        <dl>
							<dt><i>·</i> 订单中心</dt>
							<dd ><a href="home-index.html"   >我的订单</a></dd>
							<dd><a href="home-order-pay.html" >待付款</a></dd>
							<dd><a href="home-order-send.html"  >待发货</a></dd>
							<dd><a href="home-order-receive.html" >待收货</a></dd>
							<dd><a href="home-order-evaluate.html" >待评价</a></dd>
						</dl>
						<dl>
							<dt><i>·</i> 我的中心</dt>
							<dd><a href="home-person-collect.html" >我的收藏</a></dd>
							<dd><a href="home-person-footmark.html" >我的足迹</a></dd>
                            <dd><a href="{{url('index/discount/get')}}" >我的优惠券</a></dd>
						</dl>
						<dl>
							<dt><i>·</i> 物流消息</dt>
						</dl>
						<dl>
							<dt><i>·</i> 设置</dt>
							<dd><a href="{{url('index/persion/personal')}}" class="list-active">个人信息</a></dd>
							<dd><a href="{{url('index/address/list')}}"  >地址管理</a></dd>
							<dd><a href="home-setting-safe.html" >安全管理</a></dd>
						</dl>
                    </div>
                </div>
                <!--右侧主内容-->
                <div class="yui3-u-5-6">
                    <div class="body userAddress">
						<div class="address-title">
							<span class="title">个人信息管理</span>
						</div>
						<div class="address-detail">
							<table class="sui-table table-bordered">
								<thead>
								<tr>

									<th>用户名</th>
									<th>{{session("user_name")}}</th>
								</tr>
								<tr>
									<th>地址</th>
									<th>{{$province}}{{$city}}{{$area}}</th>
								</tr>
								<tr>
									<th>性别</th>
									<th>{{$data->sex=="1" ? "男" : "女"}}</th>
								</tr>
								<tr>
									<th>联系电话</th>
									<th>{{$data->tel}}</th>
								</tr>
								<tr>
									<th>会员</th>
									<th>
										@if($vipinfo)
											{{$vipinfo->vip_name}}
										@else
											普通用户
										@endif
									</th>
								</tr>
								</thead>

							</table>
						</div>
						<script src="/layui/bootstrap.min.js"></script>
						<button class="button button3"><a href="{{url('index/persion/pers')}}">修改个人信息</a></button>
						<button class="button button3"><a href="{{url('index/persion/sign')}}">签到</a></button>
                        <!--新增地址弹出层-->
                         <div  tabindex="-1" role="dialog" data-hasfoot="false" class="sui-modal hide fade edit" style="width:580px;">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" data-dismiss="modal" aria-hidden="true" class="sui-close">×</button>
                                        <h4 id="myModalLabel" class="modal-title">新增地址</h4>
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
                                            <label class="control-label">所在地区：</label>
                                            <div class="controls">
                                                <div data-toggle="distpicker">
                                                <div class="form-group area">
                                                    <select class="form-control" id="province1"></select>
                                                </div>
                                                <div class="form-group area">
                                                    <select class="form-control" id="city1"></select>
                                                </div>
                                                <div class="form-group area">
                                                    <select class="form-control" id="district1"></select>
                                                </div>
                                            </div>
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

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
