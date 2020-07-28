@extends('layout.admin')
@section('content')
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
        <h3 class="box-title">优惠卷</h3>
    </div>

    <div class="box-body">

        <!-- 数据表格 -->
        <div class="table-box">

            <div class="box-tools pull-right">
                <div class="has-feedback">
                    <form action="index">
                        商品：<input type="text" name="goods_name" value="{{$goods_name ? $goods_name:''}}">
                        <button type="submit" class="btn btn-default" >查询</button>
                    </form>
                </div>
            </div>

            <!--数据列表-->
                <table id="dataList" class="table table-bordered table-striped table-hover dataTable">
                    <thead>
                    <tr>
                        <th class="sorting_asc">ID</th>
                        <th class="sorting">优惠卷名称</th>
                        <th class="sorting">商品</th>
                        <th class="sorting">过期时间</th>
                        <th class="sorting">添加时间</th>

                        <th class="text-center">操作</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($data as $v)
                        <tr>
                            <td>{{$v->dis_id}}</td>
                            <td>{{$v->dis_name}}</td>
                            <td>{{$v->goods_name}}</td>
                            <td>{{date('Y-m-d h:i:s',($v->timeout/1000))}}</td>
                            <td>{{date('Y-m-d h:i:s',$v->addtime)}}</td>

                            <td class="text-center">
                                <button type="button"  id="upd" dis_id="{{$v->dis_id}}"class="btn bg-olive btn-xs">修改</button>
                                <button type="button" id="del" dis_id="{{$v->dis_id}}" class="btn bg-olive btn-xs">删除</button>
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
    <script src="/js/jquery.js"></script>
    <script>
        $(function(){
           $(document).on("click","#del",function(){
              var dis_id =$(this).attr('dis_id');
              var data ={}
              data.dis_id=dis_id;
              //console.log(data);return
              $.ajax({
                 url:'del',
                 data:data,
                 type:'post',
                 dataType:'json',
                 success:function(msg){
                     console.log(msg);
                    //location.href="index";
                 }
              });
           });
           $(document).on("click","#upd",function(){
               var dis_id = $(this).attr('dis_id');
               location.href="upd?id="+dis_id;
           });
        })
    </script>
@endsection
