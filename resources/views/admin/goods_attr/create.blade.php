@extends('layout.admin')
@section('content')
<!DOCTYPE html>
<html>

<head>
    <!-- 页面meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>商品属性</title>
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
                    <a href="#home" data-toggle="tab">商品属性</a>
                </li>
            </ul>
            <!--tab头/-->

            <!--tab内容-->
            <div class="tab-content">

                <!--表单内容-->
                <div class="tab-pane active" id="home">
                    <div class="row data-type">

                        <div class="col-md-2 title">属性名称</div>
                        <div class="col-md-10 data">
                            <input type="text" class="form-control name"    placeholder="属性名称" name="attr_name">

                        </div>
                        <p style="color:red;margin-left: 180px" class="msg"></p>

                    </div>
                </div>
            </div>
            </div>
    </div>
    <div class="btn-toolbar list-toolbar">
        <button class="btn btn-primary add" ng-click="setEditorValue();save()"><i class="fa fa-save "></i>添加</button>
        <button class="btn btn-default" ng-click="goListPage()"><a href="{{url('admin/goods_attr/index')}}">返回列表</a></button>
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
    $(".add").click(function(){
        var flag=true;
        var value=$(".name").val();
//        console.log(value);return;
        if(value==""){
            $(".msg").text("属性名不为空");
            return false;
        }else{
            $.ajax({
                url: "/admin/goods_attr/ajaxuniq",
                type: "get",
                async:false,
                data: {
                    attr_name:value
                },
                success: function(res) {
//                     console.log(res);
                    if (res == 'no') {
                        $(".msg").text("属性名已存在");
                        flag = false;
                    }else{
                        $(".msg").text("");
                    }
                }
            })

        }
        if(!flag){
            return false;
        }
        var attr_name=$(".name").val();
//       console.log(attr_name);return;
        $.ajax({
            url:"{{url('/admin/goods_attr/createDo')}}",
            type:'post',
            data:{'attr_name':attr_name},
            dataType:'json',
            success:function(res){
                if(res.code==200){
                    alert(res.msg);
                    {{--location.href="{{url('admin/vip/index')}}"--}}
                }else{
                    alert(res.msg);
                }
            }
        })
    })
</script>
<script>
    $(".name").blur(function(){
        var value=$(this).val();
//        console.log(value);return;
        if(value==""){
            $(".msg").text("属性名不为空");
        }else{
            $.ajax({
                url: "/admin/goods_attr/ajaxuniq",
                type: "get",
                sync:false,
                data: {
                    attr_name:value
                },
                success: function(res) {
//                     console.log(res);
                    if (res == 'no') {
                        $(".msg").text("属性名已存在");
                        return  false;
                    }else{
                        $(".msg").text("");
                    }
                }
            })
        }
    })
</script>
</body>

</html>
@endsection