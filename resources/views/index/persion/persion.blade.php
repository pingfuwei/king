@extends('layout.index')
@section('content')
<!--header-->
<div id="account">
    <div class="py-container">
        <div class="yui3-g home">
            <!--左侧列表-->
            <div class="yui3-u-1-6 list">

                <div class="person-info">
                    <div class="person-photo"><img src="/index/img/_/photo.png" alt=""></div>
                    <div class="person-account">
                        <span class="name">Michelle</span>
                        <span class="safe">账户安全</span>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="list-items">

                    <dl>
                        <dt><i>·</i> 设置</dt>
                        <dd><a href="home-setting-info.html" class="list-active">个人信息</a></dd>
                        <dd><a href="home-setting-address.html">地址管理</a></dd>
                        <dd><a href="home-setting-safe.html">安全管理</a></dd>
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
                            <form  class="sui-form form-horizontal" action="{{url('index/persion/info')}}">
                                <div class="control-group">
                                    <label for="inputName" class="control-label">昵称：</label>
                                    <div class="controls">
                                        <input type="text" id="inputName" class="user_name" name="user_name" value="{{$data->user_name}}" placeholder="昵称">
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label for="inputGender" class="control-label">性别：</label>
                                    <div class="controls">
                                        <label data-toggle="radio" class="radio-pretty inline {{$data->sex=="1" ? "checked" : ""}}">
                                            <input type="radio" name="sex" value="1"><span>男</span>
                                        </label>
                                        <label data-toggle="radio" class="radio-pretty inline {{$data->sex=="2" ? "checked" : ""}}">
                                            <input type="radio" name="sex" value="2"><span>女</span>
                                        </label>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label for="inputName" class="control-label">电话：</label>
                                    <div class="controls">
                                        <input type="text" id="inputName" class="tel" name="tel" placeholder="手机号" value="{{$data->tel}}">
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
                                                <select class="form-control" id="city" value="" name="city" {{$data->city==$v->id ? "selected" : ""}}><option>请选择</option></select>
                                                <select class="form-control" id="qu" value="" name="area" {{$data->area==$v->id ? "selected" : ""}}><option>请选择</option></select>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label for="sanwei" class="control-label"></label>
                                    <div class="controls">
                                        <button  class="sui-btn btn-primary btn">提交</button>
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