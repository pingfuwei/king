@extends('layout.admin')
@section('content')
<!DOCTYPE html>
<html>

<head>
    <!-- 页面meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>品优购编辑</title>
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
            <!--tab内容-->
            <div class="tab-content">

                <!--表单内容-->
                <div class="tab-pane active" id="home">
                    <div class="row data-type">
                        <div class="col-md-2 title">通知</div>
                        <div class="col-md-10 data">
                            <input type="text" class="form-control"  name="notice"  placeholder="通知">
                        </div>

                        <div class="col-md-2 title">详情</div>
                        <div class="col-md-10 data">
                            <input type="text" class="form-control" name="desc"  placeholder="详情">
                        </div>

                        <div class="col-md-2 title">标题</div>
                        <div class="col-md-10 data">
                            <input type="text" class="form-control" name="title"  placeholder="标题">
                        </div>

                        <div class="col-md-2 title">是否显示</div>
                        <div class="col-md-10 data">
                            <input type="radio" name="is_show"  placeholder="标题" value="1" checked>是&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <input type="radio" name="is_show"  placeholder="标题" value="0">否
                        </div>
                    </div>
                    <b><span id="span_name" style="color: red; font-size: 16px; margin-left: 220px;"></span></b>
                </div>
    </div>
    <div class="btn-toolbar list-toolbar">
        <button class="btn btn-primary" id="btn" ng-click="setEditorValue();save();"><i class="fa fa-save"></i>添加</button>
        <a href="/admin/news/index"><button class="btn btn-default" ng-click="goListPage()">查看列表</button></a>
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
    $(document).on("blur","input[name='notice']",function() {
        var data = {};
        data.notice = $(this).val();
        if (!data.notice) {
            $("#span_name").show();
            $("#span_name").text("通知不能为空");
            return false;
        }else{
            $("#span_name").hide();
        }
    })
    $(document).on("blur","input[name='desc']",function() {
        var data = {};
        data.desc = $(this).val();
        if (!data.desc) {
            $("#span_name").show();
            $("#span_name").text("详情不能为空");
            return false;
        }else{
            $("#span_name").hide();
        }
    })
    $(document).on("blur","input[name='title']",function() {
        var data = {};
        data.title = $(this).val();
        if (!data.title) {
            $("#span_name").show();
            $("#span_name").text("标题不能为空");
            return false;
        }else{
            $("#span_name").hide();
        }
        var url = "/admin/news/unique";
        $.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});
        $.ajax({
            url: url,
            data: data,
            type: "post",
            success: function (res) {
                console.log(res);
                if(res=="no"){
                    $("#span_name").show();
                    $("#span_name").text("该标题已存在");
                }else{
                    $("#span_name").html("<font color='green'>√</font>");
                }
            }
        })
    })
    $(document).on('click','#btn',function(){
        var data={};
        var nameflag = true;
        data.notice=$("input[name='notice']").val();
        if(!data.notice){
            $("#span_name").show();
            $("#span_name").text("通知不能为空");
            return false;
        }else{
            $("#span_name").hide();
        }
        data.desc=$("input[name='desc']").val();
        if(!data.desc){
            $("#span_name").show();
            $("#span_name").text("详情不能为空");
            return false;
        }else{
            $("#span_name").hide();
        }
        data.title=$("input[name='title']").val();
        if(!data.title){
            $("#span_name").show();
            $("#span_name").text("标题不能为空");
            return false;
        }else{
            $("#span_name").hide();
        }
        var url = "/admin/news/unique";
        $.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});
        $.ajax({
            url: url,
            data: data,
            type: "post",
            async:false,
            success: function (res) {
                console.log(res);
                if(res=="no"){
                    $("#span_name").show();
                    $("#span_name").text("该标题已存在");
                    nameflag = false;
                }
            }
        })
        if(!nameflag){
            return false;
        }
        data.is_show=$("input[name='is_show']:checked").val();
        var url="/admin/news/createDo";
        $.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') } });
        $.ajax({
            url:url,
            data:data,
            type:"post",
            dataType:'json',
            success:function(res){
//                console.log(res);
                if(res.message=='success'){
                    location.href="/admin/news/index";
                    alert(res.result.message);
                }else{
                    $("#span_name").show();
                    $("#span_name").text(res.result.message);
                }
            }
        })
    })
</script>
</body>
</html>
@endsection