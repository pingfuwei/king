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
            {{--{{dd(request()->url())}}--}}
            <dt><i>·</i> 订单中心</dt>
            <dd ><a href="/index/persion/purchase" {{request()->url()=='http://www.king.com/index/persion/purchase'?"class=list-active" : "class:' '"}}   >我的购买历史</a></dd>
            <dd><a href="/index/persion/Tobepaid" {{request()->url()=='http://www.king.com/index/persion/Tobepaid'?"class=list-active" : "class:' '"}}>待付款</a></dd>
            <dd><a href="/index/persion/Consignment" {{request()->url()=='http://www.king.com/index/persion/Consignment'?"class=list-active" : "class:' '"}} >待发货</a></dd>
            <dd><a href="/index/persion/gootbr" {{request()->url()=='http://www.king.com/index/persion/gootbr'?"class=list-active" : "class:' '"}}>待收货</a></dd>
            <dd><a href="#"  >待评价</a></dd>
        </dl>
        <dl>
            <dt><i>·</i> 我的中心</dt>
            <dd><a href="#"  >我的收藏</a></dd>
            <dd><a href="{{url('index/goods/gethistory')}}" {{request()->url()=='http://www.king.com/index/goods/gethistory'?"class=list-active" : "class:' '"}} >我的足迹</a></dd>
            <dd><a href="{{url('index/discount/get')}}" {{request()->url()=='http://www.king.com/index/discount/get'?"class=list-active" : "class:' '"}} >我的优惠券</a></dd>
        </dl>
        <dl>
            <dt><i>·</i> 物流消息</dt>
        </dl>
        <dl>
            <dt><i>·</i> 设置</dt>
            <dd><a href="{{url('index/persion/personal')}}" {{request()->url()=='http://www.king.com/index/persion/personal'?"class=list-active" : "class:' '"}} >个人信息</a></dd>
            <dd><a href="{{url('index/address/list')}}" {{request()->url()=='http://www.king.com/index/address/list'?"class=list-active" : "class:' '"}} >地址管理</a></dd>
            <dd><a href="#" >安全管理</a></dd>
        </dl>
    </div>
</div>
                @yield('contents')

            </div>
        </div>
        </div>
        <script src="/js/jquery.min.js"></script>
    {{--<script>--}}
        {{--$(function(){--}}
            {{--var web = window.location.href;--}}
            {{--console.log(web)--}}
            {{--var url = new Array();--}}
            {{--$("dd a").each(function(){--}}
                {{--url += $(this).attr("href");--}}
            {{--})--}}
            {{--console.log(url);--}}
        {{--})--}}
        {{--$("dd a").click(function(){--}}
{{--//            console.log($(this));--}}

            {{--if(web==url){--}}
                {{--alert(123);--}}
                {{--$(this).addClass("list-active");--}}
                {{--$(this).parent().siblings("dd").children().removeClass("list-active")--}}
            {{--}--}}



        {{--})--}}
    {{--</script>--}}
@endsection