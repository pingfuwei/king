
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
                        <div class="col-md-2 title">属性值</div>
                        <div class="col-md-10 data">
                            <input type="text" class="form-control" id="goods_val_name"  name="goods_val_name"  placeholder="属性值">
                        </div>
                        <b><span id="span_name" style="color: red; font-size: 16px; margin-left: 220px;"></span></b>
                    </div>
                </div>
    </div>
    <div class="btn-toolbar list-toolbar">
        <button class="btn btn-primary" id="btn"><i class="fa fa-save"></i>添加</button>
        <a href="/admin/goods_val/index"><button class="btn btn-default" ng-click="goListPage()">查看列表</button></a>
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
    $(document).on("blur","#goods_val_name",function() {
        var data = {};
        data.goods_val_name = $(this).val();
        if(!data.goods_val_name){
            $("#span_name").text("属性值不能为空");
            return false;
        }
        var url = "/admin/goods_val/unique";
        $.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});
        $.ajax({
            url: url,
            data: data,
            type: "post",
            success: function (res) {
                console.log(res);
                if(res=="no"){
                    $("#span_name").text("该属性值已存在");
                }else{
                    $("#span_name").html("<font color='green'>√</font>");
                }
            }
        })
    })
    $(document).on('click','#btn',function(){
        var nameflag = true;
        var data={};
        data.goods_val_name=$("input[name='goods_val_name']").val();
        if(!data.goods_val_name){
            $("#span_name").text("属性值不能为空");
            return false;
        }
        var url = "/admin/goods_val/unique";
        $.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});
        $.ajax({
            url: url,
            data: data,
            type: "post",
            async:false,
            success: function (res) {
                console.log(res);
                if(res=="no"){
                    $("#span_name").text("该属性值已存在");
                     nameflag = false;
                }
            }
        })
        if(!nameflag){
            return false;
        }
        var url="/admin/goods_val/createDo";
        $.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') } });
        $.ajax({
            url:url,
            data:data,
            type:"post",
            dataType:'json',
            success:function(res){
//                console.log(res);
                if(res.message=='success'){
                    alert(res.result.message);
                    location.href="/admin/goods_val/index";
                }else{
                    $("#span_name").text(res.result.message);
                }
            }
        })
    })
</script>
</body>
</html>
@endsection