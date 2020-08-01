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
                <div class="body userInfo">
                    <ul class="sui-nav nav-tabs nav-large nav-primary ">
                        <li class="active"><a href="#one" data-toggle="tab">基本资料</a></li>
                    </ul>
                    <div class="tab-content ">
                        <div id="one" class=" active">
                            <form  class="sui-form form-horizontal" action="{{url('index/address/updDo')}}" method="post">
                                <div class="control-group">
                                    <label for="inputName" class="control-label">姓名：</label>
                                    <div class="controls">
                                        <input type="text" id="inputName" class="tel" name="address_name" value="{{$data->address_name}}" placeholder="姓名">
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label for="inputPassword" class="control-label">所在地：</label>
                                    <div class="controls">
                                        <div data-toggle="distpicker">
                                            <div class="form-group area">

                                                <select class="form-control" id="province" name="province">

                                                    <option>请选择</option>
                                                    @foreach($privince as $k=>$v)
                                                        <option value="{{$v->id}}" {{$data->province==$v->id ? "selected" : ""}} >{{$v->name}}</option>
                                                    @endforeach
                                                </select>
                                                <select class="form-control" id="city" value="" name="city" ><option>请选择</option></select>
                                                <select class="form-control" id="qu" value="" name="area" ><option>请选择</option></select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label for="inputName" class="control-label">详细地址：</label>
                                    <div class="controls">
                                        <textarea name="detail">{{$data->detail}}</textarea>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label for="inputName" class="control-label">电话：</label>
                                    <div class="controls">
                                        <input type="text" id="inputName" class="tel" name="tel" value="{{$data->tel}}" placeholder="手机号">
                                        <input type="hidden" name="address_id" value="{{$data->address_id}}">
                                    </div>
                                </div>


                                <div class="control-group">
                                    <label for="sanwei" class="control-label"></label>
                                    <div class="controls">
                                        <button  class="sui-btn btn-primary btn">修改</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div id="two" class="tab-pane">

                            <div class="new-photo">
                                <p>当前头像：</p>
                                <div class="upload">
                                    <img id="imgShow_WU_FILE_0" width="100" height="100" src="/index/img/_/photo_icon.png" alt="">
                                    <input type="file" id="up_img_WU_FILE_0">
                                </div>

                            </div>
                        </div>
                    </div>

                </div>
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