@extends('layout.admin')
@section('content')
<!DOCTYPE html>
<html>

<head>
    <!-- 页面meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>商品管理</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no" name="viewport">
    <link rel="stylesheet" href="/plugins/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/plugins/adminLTE/css/AdminLTE.css">
    <link rel="stylesheet" href="/plugins/adminLTE/css/skins/_all-skins.min.css">
    <link rel="stylesheet" href="/css/style.css">
    <script src="/plugins/jQuery/jquery-2.2.3.min.js"></script>
    <script src="/plugins/bootstrap/js/bootstrap.min.js"></script>

</head>

<body class="hold-transition skin-red sidebar-mini" >
<!-- .box-body -->

<div class="box-header with-border">
    <h3 class="box-title">VIP列表</h3>
</div>

<div class="box-body">

    <!-- 数据表格 -->
    <div class="table-box">


        <!--数据列表-->
        <table id="dataList" class="table table-bordered table-striped table-hover dataTable">
            <thead>
            <tr>
                <th class="sorting_asc">属性ID</th>
                <th class="sorting">属性名称</th>
                <th class="sorting">添加时间</th>
                <th class="text-center">操作</th>
            </tr>
            </thead>
            <tbody>
            @foreach($data as $k=>$v)
            <tr>

                <td>{{$v->attr_id}}</td>
                <td>{{$v->attr_name}}</td>
                <td>{{date('Y-m-d H:i:s',$v->add_time)}}</td>
                <td class="text-center">
                    <a href="{{url('admin/goods_attr/upd',$v->attr_id)}}" class="btn bg-olive btn-xs">修改</a>
                    <a href="javascript:;" data-id="{{$v->attr_id}}" class="del btn bg-olive btn-xs">删除</a>
                </td>
            </tr>
                @endforeach
            </tbody>
        </table>
        <!--数据列表/-->

        <button class="btn btn-default" ng-click="goListPage()"><a href="{{url('admin/goods_attr/create')}}">添加属性</a></button>
    </div>
    <!-- 数据表格 /-->


</div>
<!-- /.box-body -->

</body>


<script src="/plugins/jQuery/jquery-2.2.3.min.js"></script>
<script>
    $(".del").click(function(){
//    alert(123);
        var attr_id= $(this).data("id");
//       console.log(attr_id);
        $.ajax({
            url:"{{url('/admin/goods_attr/del')}}",
            type:'post',
            data:{'attr_id':attr_id},
            dataType:'json',
            success:function(res){
                if(res.code==200){
                    alert(res.msg);
                    location.href="{{url('admin/goods_attr/index')}}"
                }else{
                    alert(res.msg);
                }
            }
        })
    })
</script>
</html>
@endsection