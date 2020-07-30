@extends('layout.admin')
@section('content')
<!DOCTYPE html>
<html>

<head>
    <!-- 页面meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>品牌编辑</title>
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
                <form action="/admin/brand/createDo" method="post" enctype="multipart/form-data">
                @csrf

                <div class="box-body">

                    <!--tab页-->
                    <div class="nav-tabs-custom">

                        <!--tab头-->
                        <ul class="nav nav-tabs">
                            <li class="active">
                                <a href="#home" data-toggle="tab">品牌基本信息</a>
                            </li>
                        </ul>
                        <!--tab头/-->

                        <!--tab内容-->
                        <div class="tab-content">

                            <!--表单内容-->
                            <div class="tab-pane active" id="home">
                                <div class="row data-type">
		                           <div class="col-md-2 title">品牌姓名</div>
		                           <div class="col-md-5 data">
		                               <input type="text" class="form-control"  name="brand_name"  placeholder="品牌姓名" value="">
		                           </div>
                                </div>

                                    <div class="row data-type">
                                       <div class="col-md-2 title">品牌图片</div>
                                       <div class="col-md-5 data">
                                           <input type="file" class="form-control" name="brand_img" value="">
                                       </div>
                                    </div>
                            </div>


                        </div>
                        <!--tab内容/-->
						<!--表单内容/-->

                    </div>




                   </div>
                  <div class="btn-toolbar list-toolbar">
				      <button class="btn btn-primary" ng-click="setEditorValue();save()"><i class="fa fa-save"></i>添加</button>
				      <button class="btn btn-default" ng-click="goListPage()">返回列表</button>
				  </div>
                  </form>

            </section>
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
<!-- <script>
	$(function(){
		$(document).on("click",".btn-primary",function(){
				var data = {}
				var brand_name = $(".form-control").val();
                var brand_img = $("input[name='brand_img']").val();
                // console.log(brand_img);return false;
				//var a =$("input[name='a']").val
				data.brand_name = brand_name;
                data.brand_img = brand_img;
			$.ajax({
				url: 'createDo',
				type: 'get',
				dataType: 'json',
				data:data,
				success:function(msg){
					if(msg.error=10000){
						location.href="index";
					}else{
						alert('添加成功')
					}
				}

			})
		})
	})
</script> -->
@endsection
