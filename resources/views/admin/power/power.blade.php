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
                    <a href="#home" data-toggle="tab">给角色赋权限</a>
                </li>
            </ul>
            <!--tab头/-->

            <!--tab内容-->
            <div class="tab-content">

                <!--表单内容-->
                <div class="tab-pane active" id="home">
                    <div class="row data-type">


                        <div class="col-md-10 data">
                            选择权限：
                            @foreach($power as $k=>$v)
                                <input type="checkbox" value="{{$v->power_id}}" class="power_id" name="power_id"/>{{$v->power_name}}
                            @endforeach
                        </div>
                        <input type="hidden" class="role_id" value="{{$role_id}}">
                    </div>
                </div>
            </div>




        </div>
        <div class="btn-toolbar list-toolbar">
            <button class="btn btn-primary add" ng-click="setEditorValue();save()"><i class="fa fa-save "></i>添加</button>
            <button class="btn btn-default" ng-click="goListPage()"><a href="{{url('admin/role/index')}}">角色列表</a></button>
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
    $(document).ready(function(){
        $(".add").click(function(){
            var str='';
            $("input[name='power_id']:checked").each(function(){
                str+=$(this).val()+',';
            });
            var power_id=str.substring(0,str.length-1);
            var role_id=$(".role_id").val();
            $.ajax({
                url:"{{url('/admin/power/powerDo')}}",
                data:{'power_id':power_id,'role_id':role_id},
                dataType:'json',
                type:'post',
                success:function(res){
//                    console.log(res);
                    if(res.code=='200'){
                        alert(res.msg);
//                        location.href="/user/list";
                    }else{
                        alert(res.msg);
                    }
                }
            })
        })
    })
</script>
</body>

</html>
@endsection