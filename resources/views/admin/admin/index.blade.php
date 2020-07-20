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
                        <h3 class="box-title">管理员管理</h3>
                    </div>

                    <div class="box-body">

                        <!-- 数据表格 -->
                        <div class="table-box">

                            <div class="box-tools pull-right">
                                <div class="has-feedback">
                                    <form action="/admin/admin/index">
							                  管理员名称：<input type="text" name="admin_name" value="{{$admin_name??''}}">
									<button type="submit" class="btn btn-default" >查询</button>
                                    </form>
                                </div>
                            </div>

			                  <!--数据列表-->
			                  <table id="dataList" class="table table-bordered table-striped table-hover dataTable">
			                      <thead>
			                          <tr>
			                              <th class="" style="padding-right:0px">
			                                  <input id="selall" type="checkbox" class="icheckbox_square-blue">
			                              </th>
										  <th class="sorting_asc">管理员ID</th>
									      <th class="sorting">管理员名称</th>
									      <th class="sorting">添加时间</th>
					                      <th class="text-center">操作</th>
			                          </tr>
			                      </thead>
			                      <tbody>
                                      @foreach($admin as $itme)
			                          <tr>
                                          <td><input  type="checkbox"></td>
				                          <td>{{$itme->admin_id}}</td>
									      <td>{{$itme->admin_name}}</td>
									      <td>{{date('Y-m-d H:i:s',$itme->addtime)}}</td>
		                                  <td class="text-center">
		                                 	  <a href="/admin/admin/edit?id={{$itme->admin_id}}" class="btn bg-olive btn-xs">修改</a>
		                                 	  <a href="/admin/admin/del?id={{$itme->admin_id}}" class="btn bg-olive btn-xs">删除</a>
		                                  </td>
			                          </tr>
                                      @endforeach
                                      <tr><td colspan="7">{{$admin->appends(["admin_name"=>$admin_name])->links()}}</td></tr>
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
