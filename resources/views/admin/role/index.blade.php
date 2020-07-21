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
    <h3 class="box-title">角色列表</h3>
</div>
<button class="btn btn-default" ng-click="goListPage()"><a href="{{url('admin/role/create')}}">添加角色</a></button>
<div class="box-body">

    <!-- 数据表格 -->
    <div class="table-box">


        <!--数据列表-->
        <table id="dataList" class="table table-bordered table-striped table-hover dataTable">
            <thead>
            <tr>
                <th class="sorting_asc">ID</th>
                <th class="sorting">角色名称</th>
                <th class="sorting">是否删除</th>
                <th class="sorting">添加时间</th>
                <th class="sorting">所有权限</th>
                <th class="text-center">操作</th>
            </tr>
            </thead>
            <tbody>
            @foreach($data as $k=>$v)
            <tr>

                <td>{{$v->role_id}}</td>
                <td>{{$v->role_name}}</td>
                <td>@if($v->role_status==1)否@else 是 @endif</td>
                <td>{{date("Y-m-d H:i:s",$v->role_time)}}</td>
                <td>
                {{--@foreach($power as $kk=>$vv)--}}
                    {{--@if($v->role_id==$vv->role_id)--}}
                        {{--{{$vv->power_name}}--}}
                        {{--@endif--}}
                {{--@endforeach--}}
                    {{rtrim($v->res,",")}}
                </td>
                <td class="text-center">
                    <button type="button" class="btn bg-olive btn-xs">修改</button>
                    <button class="btn btn-default" ng-click="goListPage()"><a href="{{url('/admin/power/power',$v->role_id)}}">赋权限</a></button>
                </td>
            </tr>
                @endforeach
            </tbody>
        </table>
        <!--数据列表/-->


    </div>
    <!-- 数据表格 /-->


</div>
<!-- /.box-body -->

</body>

</html>
@endsection