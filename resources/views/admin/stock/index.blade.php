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
    <h3 class="box-title">商品管理</h3>
</div>

<div class="box-body">

    <!-- 数据表格 -->
    <div class="table-box">

        <!--工具栏-->
        <div class="pull-left">
            <div class="form-group form-inline">
                <div class="btn-group">
                    <button type="button" class="btn btn-default" title="新建" ><i class="fa fa-file-o"></i> 新建</button>
                    <button type="button" class="btn btn-default" title="删除" ><i class="fa fa-trash-o"></i> 删除</button>
                    <button type="button" class="btn btn-default" title="提交审核" ><i class="fa fa-check"></i> 提交审核</button>
                    <button type="button" class="btn btn-default" title="屏蔽" onclick='confirm("你确认要屏蔽吗？")'><i class="fa fa-ban"></i> 屏蔽</button>
                    <button type="button" class="btn btn-default" title="刷新" onclick="window.location.reload();"><i class="fa fa-refresh"></i> 刷新</button>
                </div>
            </div>
        </div>
        <div class="box-tools pull-right">
            <div class="has-feedback">
                状态：<select>
                    <option value="">全部</option>
                    <option value="0">未申请</option>
                    <option value="1">申请中</option>
                    <option value="2">审核通过</option>
                    <option value="3">已驳回</option>
                </select>
                商品名称：<input >
                <button class="btn btn-default" >查询</button>
            </div>
        </div>
        <!--工具栏/-->

        <!--数据列表-->
        <table id="dataList" class="table table-bordered table-striped table-hover dataTable">
            <thead>
            <tr>
                <th class="sorting_asc">id</th>
                <th class="sorting">商品</th>
                <th class="sorting">库存</th>
                <th class="sorting">属性属性值</th>
                <th class="text-center">操作</th>
            </tr>
            </thead>
            <tbody>
            @foreach($data as $v)
                <tr>
                    <td>{{$v->stock_id}}</td>
                    <td>{{$v->goods_name}}</td>
                    <td>{{$v->stock}}</td>
                    <td>{{$v->data}}</td>
                    <td class="text-center">
                        <button type="button" id="del" stock_id="{{$v->stock_id}}" class="btn bg-olive btn-xs">删除</button>
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
<script src="/js/jquery.min.js"></script>
<script>
    $(function(){
        $(document).on('click',"#del",function(){
           var stock_id=$(this).attr('stock_id');
            $.ajax({
                url: 'updDo',
                type: 'get',
                dataType: 'defaul',
                data: {stock_id: 'stock_id'},
                success:function(msg){
                    console.log(msg);
                }
            })
        });
    })
</script>