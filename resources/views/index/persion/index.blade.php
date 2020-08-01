@extends('layout.index')
@section('content')
        <link rel="icon" href="/index/img/favicon.ico">
        <link rel="stylesheet" type="text/css" href="/index/css/webbase.css" />
        <link rel="stylesheet" type="text/css" href="/index/css/pages-seckillOrder.css" />
    <style>
        .button {
            display: inline-block;
            padding: 10px 15px;
            font-size: 10px;
            cursor: pointer;
            text-align: center;
            text-decoration: none;
            outline: none;
            color: #fff;
            background-color: #4CAF50;
            border: none;
            border-radius: 15px;
            box-shadow: 0 9px #999;
        }
        .button:hover {background-color: #3e8e41}

        .button:active {
            background-color: #3e8e41;
            box-shadow: 0 5px #666;
            transform: translateY(4px);
        }
    </style>
    <div id="account">
        <div class="py-container">
            <div class="yui3-g home">
                <!--左侧列表-->
<div class="yui3-u-1-6 list">

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
            <dd><a href="/index/persion/Tobepaid" >待付款</a></dd>
            <dd><a href="/index/persion/Consignment"  >待发货</a></dd>
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
                @yield('contents')

            </div>
        </div>
        </div>
@endsection