@extends('layout.admin')
@section('content')
        <!DOCTYPE html>
<html>

<head>
    <!-- 页面meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>商品编辑</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no" name="viewport">

    <link rel="stylesheet" href="/plugins/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/plugins/adminLTE/css/AdminLTE.css">
    <link rel="stylesheet" href="/plugins/adminLTE/css/skins/_all-skins.min.css">
    <link rel="stylesheet" href="/css/style.css">
    <script src="/plugins/jQuery/jquery-2.2.3.min.js"></script>
    <script src="/plugins/bootstrap/js/bootstrap.min.js"></script>

    <!-- 富文本编辑器 -->
    <link rel="stylesheet" href="/plugins/kindeditor/themes/default/default.css" />
    <script charset="utf-8" src="/plugins/kindeditor/kindeditor-min.js"></script>
    <script charset="utf-8" src="/plugins/kindeditor/lang/zh_CN.js"></script>





</head>

<body class="hold-transition skin-red sidebar-mini" >

<!-- 正文区域 -->
<section class="content">

    <div class="box-body">

        <!--tab页-->
        <div class="nav-tabs-custom">

            <!--tab头-->
            <ul class="nav nav-tabs">
                <li class="active">
                    <a href="#home" data-toggle="tab">权限添加</a>
                </li>
            </ul>
            <!--tab头/-->

            <!--tab内容-->
            <div class="tab-content">

                <!--表单内容-->
                <div class="tab-pane active" id="home">
                    <div class="row data-type">

                        <div class="col-md-2 title">权限</div>
                        <div class="col-md-10 data">
                            <input type="text" class="form-control name"    placeholder="权限名称" name="power_name">
                        </div>
                        <p style="color:red;margin-left: 180px" class="msg"></p>
                        <div class="col-md-2 title">URL</div>
                        <div class="col-md-10 data">
                            <input type="text" class="form-control url"    placeholder="url" name="power_url">
                        </div>
                        <p style="color:red;margin-left: 180px" class="msgs"></p>
                    </div>
                </div>
            </div>
        </div>




    </div>
    <div class="btn-toolbar list-toolbar">
        <button class="btn btn-primary add" ng-click="setEditorValue();save()"><i class="fa fa-save "></i>添加</button>
        <button class="btn btn-default" ng-click="goListPage()"><a href="{{url('admin/power/index')}}">查看权限</a></button>
    </div>

</section>








<!-- 正文区域 /-->
<script type="text/javascript">

    var editor;
    KindEditor.ready(function(K) {
        editor = K.create('textarea[name="content"]', {
            allowFileManager : true
        });
    });

</script>
<script>
    $(".name").blur(function(){
        var value=$(this).val();
//        console.log(value);return;
        if(value==""){
            $(".msg").text("权限不为空");
            return;
        }else{
            $.ajax({
                url: "/admin/power/ajaxuniq",
                type: "get",
                sync:false,
                data: {
                    power_name:value
                },
                success: function(res) {
//                     console.log(res);
                    if (res == 'no') {
                        $(".msg").text("权限已存在");
                        return  false;
                    }else{
                        $(".msg").text("");
                    }
                }
            })
        }
    })
    $(".url").blur(function(){
        var url=$(this).val();
//        console.log(url);return;
        if(url==""){
            $(".msgs").text("url不能为空");
            return;
        }else{
            $.ajax({
                url: "/admin/power/ajaxuniqurl",
                type: "get",
                sync:false,
                data: {
                    power_url:url
                },
                success: function(res) {
//                     console.log(res);
                    if (res == 'no') {
                        $(".msgs").text("url已存在");
                        return  false;
                    }else{
                        $(".msgs").text("");
                    }
                }
            })
        }


    })
</script>
<script>
    $(".add").click(function(){
        var flag=true;
        var value=$(".name").val();
//        console.log(value);return;
        if(value==""){
            $(".msg").text("权限不为空");
//            alert(1);
            return false;
        }else{
            $.ajax({
                url: "/admin/power/ajaxuniq",
                type: "get",
                async:false,
                data: {
                    power_name:value
                },
                success: function(res) {
//                     console.log(res);
                    if (res == 'no') {
                        $(".msg").text("权限已存在");
                        flag= false;
                    }else{
                        $(".msg").text("");
                    }
                }
            })
        }
        var url=$(".url").val();
//        console.log(url);return;
        if(url==""){
            $(".msgs").text("url不能为空");
            flag=false;
        }else{
            $.ajax({
                url: "/admin/power/ajaxuniqurl",
                type: "get",
                sync:false,
                data: {
                    power_url:url
                },
                success: function(res) {
//                     console.log(res);
                    if (res == 'no') {
                        $(".msgs").text("url已存在");
                        return  false;
                    }else{
                        $(".msgs").text("");
                    }
                }
            })
        }

        if(!flag){
            return false;
        }
        var power_name=$(".name").val();
        var power_url=$(".url").val();
        $.ajax({
            url:"{{url('/admin/power/createDo')}}",
            type:'post',
            data:{'power_name':power_name,'power_url':power_url},
            dataType:'json',
            success:function(res){
                if(res.code==200){
                    alert(res.msg);
                    {{--location.href="{{url('admin/role/index')}}"--}}
                }else{
                    alert(res.msg);
                }
            }
        })
    })
</script>
</body>

</html>
@endsection