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
    $(document).on('click','#btn',function(){
        var data={};
        data.notice=$("input[name='notice']").val();
        data.desc=$("input[name='desc']").val();
        data.title=$("input[name='title']").val();
        data.is_show=$("input[name='is_show']:checked").val();
        var url="/admin/news/createDo";
        $.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') } });
        $.ajax({
            url:url,
            data:data,
            type:"post",
            dataType:'json',
            success:function(res){
                console.log(res);
                alert(res.result.message);
                if(res.message=='success'){
                    location.href="/admin/news/index";
                }
            }
        })
    })
</script>
</body>
</html>
@endsection