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
                <form action="/admin/category/createDo" method="post">
                @csrf
                <div class="box-body">

                    <!--tab页-->
                    <div class="nav-tabs-custom">

                        <!--tab头-->
                        <ul class="nav nav-tabs">
                            <li class="active">
                                <a href="#home" data-toggle="tab">分类基本信息</a>
                            </li>
                        </ul>
                        <!--tab头/-->

                        <!--tab内容-->
                        <div class="tab-content">

                            <!--表单内容-->
                            <div class="tab-pane active" id="home">
                                <div class="row data-type">

		                           <div class="col-md-2 title">分类名称</div>
		                           <div class="col-md-10 data">
		                               <input type="text" class="form-control" name="cate_name"    placeholder="分类名称" value="">
		                           </div>
                                </div>
                                <div class="row data-type">
                                <div class="col-md-2 title">父级分类</div>
                                <div class="col-md-10 data">
                                   <select class="form-control" name="p_id">
                                       <option value="0">--顶级分类--</option>
                                       @foreach($cate as $itme)
                                       <option value="{{$itme->cate_id}}">{{$itme->cate_name}}</option>
                                       @endforeach
                                   </select>
                                </div>
                                </div>
                            </div>


                   </div>
                  <div class="btn-toolbar list-toolbar">
				      <button type="submit" class="btn btn-primary" ng-click="setEditorValue();save()"><i class="fa fa-save"></i>添加</button>
				  </div>
                  </form>

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

</body>

</html>
@endsection
