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
<button class="btn btn-default" ng-click="goListPage()"><a href="{{url('admin/power/create')}}">添加权限</a></button>
<div class="box-body">

    <!-- 数据表格 -->
    <div class="table-box">


        <!--数据列表-->
        <table id="dataList" class="table table-bordered table-striped table-hover dataTable">
            <thead>
            <tr>
                <th class="sorting_asc">ID</th>
                <th class="sorting">权限名称</th>
                <th class="sorting">URL</th>
                <th class="sorting">添加时间</th>
                <th class="sorting">角色</th>
                <th class="text-center">操作</th>
            </tr>
            </thead>
            <tbody>
            @foreach($data as $k=>$v)
            <tr power_id="{{$v->power_id}}">
                <td>{{$v->power_id}}</td>
                <td field="power_name">
                    <span class="span">{{$v->power_name}}</span>
                    <input type="text" value="{{$v->power_name}}" class="change" style="display:none">
                </td>
                <td>{{$v->power_url}}</td>
                <td>{{date("Y-m-d H:i:s",$v->power_time)}}</td>
                <td>{{rtrim($v->res,",")}}</td>
                <td class="text-center">
                    <a href="{{url('admin/power/upd',$v->power_id)}}" class="btn bg-olive btn-xs">修改</a>
                    <a href="javascript:;" data-id="{{$v->power_id}}" class="del btn bg-olive btn-xs">删除</a>
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
<script src="/plugins/jQuery/jquery-2.2.3.min.js"></script>
<script>
    $(".del").click(function(){
        var power_id= $(this).data("id");
//       console.log(attr_id);
        $.ajax({
            url:"{{url('/admin/power/del')}}",
            type:'post',
            data:{'power_id':power_id},
            dataType:'json',
            success:function(res){
//                console.log(res);
                if(res.code==200){
                    alert(res.msg);
                    location.href="{{url('admin/power/index')}}"
                }else{
                    alert(res.msg);
                }
            }
        })
    })
</script>
<script>
    $(document).ready(function(){
        $(".span").click(function(){
            var _this=$(this);
            var change=$(this).text();
            _this.hide();
            var aa= _this.next().val(change).show();
        })
        $(".change").blur(function(){
            var _this = $(this);
            var value = _this.val();
            var power_id = _this.parents('tr').attr('power_id');
            var field = _this.parent('td').attr('field');
            $.ajax({
                url:"{{url('/admin/power/change')}}",
                data:{'value':value,'power_id':power_id,'field':field},
                dataType:'json',
                type:'post',
                success:function(res){
//                    console.log(res);
                    if(res.code){
                        _this.hide();
                        _this.prev().text(value).show();
                        alert(res.msg);
                    }else{
                        alert(res.msg);
                    }
                }
            })


        })
    })

</script>
</html>
@endsection