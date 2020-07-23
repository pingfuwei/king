@extends('layout.admin')
@section('content')
        <!DOCTYPE html>
<html>

<head>
    <!-- 页面meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>品牌编辑</title>
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
                    <a href="#home" data-toggle="tab">品牌基本信息</a>
                </li>
            </ul>
            <!--tab头/-->

            <!--tab内容-->
            <div class="tab-content">

                <!--表单内容-->
                <div class="tab-pane active" id="home">
                    <div class="row data-type">
                        <div class="col-md-2 title">品牌姓名</div>
                        <div class="col-md-5 data">
                            <input type="text" class="form-control"    placeholder="品牌姓名" value="{{$data->brand_name}}">
                            <input type="hidden" name="brand_id" value="{{$data->brand_id}}">
                        </div>
                    </div>
                </div>


            </div>
            <!--tab内容/-->
            <!--表单内容/-->

        </div>




    </div>
    <div class="btn-toolbar list-toolbar">
        <button class="btn btn-primary" ng-click="setEditorValue();save()"><i class="fa fa-save"></i>修改</button>
        <button class="btn btn-default" ng-click="goListPage()">返回列表</button>
    </div>

</section>
<script type="text/javascript">
    var editor;
    KindEditor.ready(function(K) {
        editor = K.create('textarea[name="content"]', {
            allowFileManager : true
        });
    });

</script>

</body>

</html>
<script>
    $(function(){
        $(document).on("click",".btn-primary",function(){
            var data = {}
            var brand_name = $(".form-control").val();
            var brand_id =$("input[name='brand_id']").val();
            //var a =$("input[name='a']").val
            data.brand_name = brand_name;
            data.brand_id = brand_id;
            $.ajax({
                url: 'updDo',
                type: 'get',
                dataType: 'json',
                data:data,
                success:function(msg){
                    if(msg.essay==10000){
                        location.href="index";
                    }else{
                        alert('修改失败');
                    }
                }

            })
        })
    })
</script>
@endsection