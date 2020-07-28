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
@if(session('msg'))
<div class="alert alert-danger">{{session("msg")}}</div>
@endif
                    <div class="box-header with-border">
                        <h3 class="box-title">用户优惠券管理</h3>
                    </div>

                    <div class="box-body">

                        <!-- 数据表格 -->
                        <div class="table-box">


			                  <!--数据列表-->
			                  <table id="dataList" class="table table-bordered table-striped table-hover dataTable">
			                      <thead>
			                          <tr>
			                              <th class="" style="padding-right:0px">
			                                  <input id="selall" type="checkbox" class="icheckbox_square-blue">
			                              </th>
										  <th class="sorting_asc">ID</th>
									      <th class="sorting">用户名称</th>
									      <th class="sorting">优惠券名称</th>
									      <th class="sorting">有效之间时间</th>
					                      <th class="text-center">操作</th>
			                          </tr>
			                      </thead>
			                      <tbody>
                                      @foreach($userdis as $itme)
			                          <tr>
                                          <td><input  type="checkbox"></td>
				                          <td>{{$itme->id}}</td>
									      <td>{{$itme->user_name}}</td>
									      <td>{{$itme->dis_name}}</td>
									      <td>{{date('Y-m-d H:i:s',$itme->timeadd)}}——{{date('Y-m-d H:i:s',$itme->outtime)}}</td>
		                                  <td class="text-center">
		                                 	  <a href="/admin/userdis/upd?id={{$itme->id}}" class="btn bg-olive btn-xs">修改</a>
		                                 	  <a href="/admin/userdis/del?id={{$itme->id}}" class="btn bg-olive btn-xs">删除</a>
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
