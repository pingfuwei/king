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
    <!--header-->
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
                            <dd><a href="{{url('index/persion/personal')}}" >个人信息</a></dd>
                            <dd><a href="{{url('index/address/list')}}"  >地址管理</a></dd>
                            <dd><a href="home-setting-safe.html" >安全管理</a></dd>
                        </dl>
                    </div>
                </div>
                <!--右侧主内容-->
                <div class="yui3-u-5-6">
                    <div class="body userAddress">
                        <div class="address-title">
                            <span class="title">地址管理</span>
                            <a  href="{{url('index/address/add')}}"    class="sui-btn  btn-info add-new">添加新地址</a>
                            <span class="clearfix"></span>
                        </div>
                        <div class="address-detail">
                            <table class="sui-table table-bordered">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>姓名</th>
                                    <th>地址</th>
                                    <th>联系电话</th>
                                    <th>操作</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($data as $k=>$v)
                                <tr>
                                    <td>{{$v->address_id}}</td>
                                    <td>{{$v->address_name}}</td>
                                    <td>{{$v->province}}{{$v->city}}{{$v->area}}{{$v->detail}}</td>
                                    <td>{{$v->tel}}</td>
                                    <td>
                                        <a href="{{url('index/address/upd',$v->address_id)}}">编辑</a>
                                        <a href="{{url('index/address/del',$v->address_id)}}">删除</a>
                                        {{--{{$v->status=="0" ? "<a href='{{url('index/address/is_no',$v->address_id)}}'>'设为默认'</a>" : <b>默认地址</b>}}--}}
                                            <a href="{{url('index/address/is_no',$v->address_id)}}">{{$v->status=="0" ? "设为默认" : "默认地址"}}</a>

                                    </td>
                                </tr>
                                    @endforeach


                                </tbody>
                            </table>
                        </div>
            </div>
        </div>
    </div>
    <script src="/js/jquery.min.js"></script>
    <script>
        $(document).on('change','select',function(){
//            alert(123);
            var id=$(this).val();
            var obj=$(this);
//            alert(id);
            obj.nextAll('select').html("<option value=''>请选择...</option>");
            $.get(
                    "{{url('/index/persion/area')}}",
                    {'id':id},
                    function(res){
//                        console.log(res);
                        if(res.code=='00000'){
                            console.log(1);
                            var str='<option>请选择</option>';
                            $.each(res.data,function(i,k){
                                str+='<option value='+ k.id+'>'+ k.name+'</option>';
                            });
                            obj.next('select').html(str);
                        }
                    },
                    'json'
            )
        })


    </script>
    {{--<script>--}}
    {{--$(".btn").click(function(){--}}
    {{--var name=$(".name").val();--}}
    {{--console.log(name);--}}
    {{--})--}}
    {{--</script>--}}
@endsection