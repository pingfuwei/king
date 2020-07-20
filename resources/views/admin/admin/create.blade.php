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

    <link rel="stylesheet" href="/plugins/bootstrap//css/bootstrap.min.css">
    <link rel="stylesheet" href="/plugins/adminLTE//css/AdminLTE.css">
    <link rel="stylesheet" href="/plugins/adminLTE//css/skins/_all-skins.min.css">
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
                <form action="/admin/admin/createDo" method="post">
                @csrf
                <div class="box-body">

                    <!--tab页-->
                    <div class="nav-tabs-custom">

                        <!--tab头-->
                        <ul class="nav nav-tabs">
                            <li class="active">
                                <a href="#home" data-toggle="tab">商品基本信息</a>
                            </li>
                        </ul>
                        <!--tab头/-->

                        <!--tab内容-->
                        <div class="tab-content">

                            <!--表单内容-->
                            <div class="tab-pane active" id="home">
                                <div class="row data-type">

		                           <div class="col-md-2 title">管理员名称</div>
		                           <div class="col-md-10 data">
		                               <input type="text" class="form-control" name="admin_name"    placeholder="管理员名称" value="">
		                           </div>
                                </div>
                                <div class="row data-type">

                                   <div class="col-md-2 title">管理员密码</div>
                                   <div class="col-md-10 data">
                                       <input type="password" class="form-control" name="admin_pwd"   placeholder="管理员密码" value="">
                                   </div>
                                </div>
                            </div>


                   </div>
                  <div class="btn-toolbar list-toolbar">
				      <button type="submit" class="btn btn-primary" ng-click="setEditorValue();save()"><i class="fa fa-save"></i>添加</button>
				  </div>
                  </form>

            </section>


<!-- 上传窗口 -->
<div class="modal fade" id="uploadModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" >
	<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			<h3 id="myModalLabel">上传商品图片</h3>
		</div>
		<div class="modal-body">

			<table class="table table-bordered table-striped">
		      	<tr>
		      		<td>颜色</td>
		      		<td><input  class="form-control" placeholder="颜色" ng-model="image_entity.color">  </td>
		      	</tr>
		      	<tr>
		      		<td>商品图片</td>
		      		<td>
						<table>
							<tr>
								<td>
								<input type="file" id="file" />
					                <button class="btn btn-primary" type="button" ng-click="uploadFile()">
				                   		上传
					                </button>
					            </td>
								<td>
									<img  src="" width="200px" height="200px">
								</td>
							</tr>
						</table>
		      		</td>
		      	</tr>
			 </table>

		</div>
		<div class="modal-footer">
			<button class="btn btn-success" ng-click="add_image_entity()" data-dismiss="modal" aria-hidden="true">保存</button>
			<button class="btn btn-default" data-dismiss="modal" aria-hidden="true">关闭</button>
		</div>
	  </div>
	</div>
</div>



<!-- 自定义规格窗口 -->
<div class="modal fade" id="mySpecModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" >
	<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			<h3 id="myModalLabel">自定义规格</h3>
		</div>
		<div class="modal-body">

			<table class="table table-bordered table-striped">
		      	<tr>
		      		<td>规格名称</td>
		      		<td><input  class="form-control" placeholder="规格名称" ng-model="spec_entity.text">  </td>
		      	</tr>
		      	<tr>
		      		<td>规格选项(用逗号分隔)</td>
		      		<td>
						<input  class="form-control" placeholder="规格选项" ng-model="spec_entity.values">
		      		</td>
		      	</tr>
			 </table>

		</div>
		<div class="modal-footer">
			<button class="btn btn-success" ng-click="add_spec_entity()" data-dismiss="modal" aria-hidden="true">保存</button>
			<button class="btn btn-default" data-dismiss="modal" aria-hidden="true">关闭</button>
		</div>
	  </div>
	</div>
</div>


            <!-- 正文区域 /-->
<script type="text/javascript">

	var editor;
	KindEditor.ready(function(K) {
		editor = K.create('textarea[name="content"]', {
			allowFileManager : true
		});
	});

</script>

</body>

</html>
@endsection