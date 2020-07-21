
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
                            <input type="text" class="form-control"  name="goods_val_name"  placeholder="属性值" value="{{$res->goods_val_name}}">
                            <input type="hidden" class="form-control"  name="goods_val_id"  placeholder="属性值" value="{{$res->goods_val_id}}">
                        </div>
                    </div>
                </div>
    </div>
    <div class="btn-toolbar list-toolbar">
        <button class="btn btn-primary" id="btn" ng-click="setEditorValue();save();"><i class="fa fa-save"></i>修改</button>
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
    $(document).on('click','#btn',function(){
        var data={};
        data.goods_val_name=$("input[name='goods_val_name']").val();
        data.goods_val_id=$("input[name='goods_val_id']").val();
        var url="/admin/goods_val/updDo";
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
                    location.href="/admin/goods_val/index";
                }
            }
        })
    })
</script>
</body>
</html>
@endsection