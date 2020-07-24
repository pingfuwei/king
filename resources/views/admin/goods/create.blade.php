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
                <form action="/admin/goods/createDo" method="post" enctype="multipart/form-data">
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

		                           <div class="col-md-2 title">商品名称</div>
		                           <div class="col-md-10 data">
		                               <input type="text" class="form-control" name="goods_name"  id="goods_name"  placeholder="商品名称" value="">
		                           </div>
                                       <b><span id="span_name" style="color: red; font-size: 16px; margin-left: 220px;"></span></b>
                                </div>
                                <div class="row data-type">
                                <div class="col-md-2 title">所属分类</div>
                                <div class="col-md-10 data">
                                   <select class="form-control" name="cate_id">
                                       <option value="0">--请选择--</option>
                                       @foreach($cate as $itme)
                                       <option value="{{$itme->cate_id}}">{{$itme->cate_name}}</option>
                                       @endforeach
                                   </select>
                                </div>
                                </div>

                                <div class="row data-type">
                                <div class="col-md-2 title">所属品牌</div>
                                <div class="col-md-10 data">
                                   <select class="form-control" name="brand_id">
                                       <option value="0">--请选择--</option>
                                       @foreach($brand as $v)
                                       <option value="{{$v->brand_id}}">{{$v->brand_name}}</option>
                                       @endforeach
                                   </select>
                                </div>
                                </div>

                                <div class="row data-type">
                                <div class="col-md-2 title">价格</div>
                                <div class="col-md-10 data">
                                    <div class="input-group">
                                        <span class="input-group-addon">¥</span>
                                        <input type="text" class="form-control price"  placeholder="价格" id="goods_price" name="goods_price">
                                    </div>
                                </div>
                                       <b><span id="span_price" style="color: red; font-size: 16px; margin-left: 220px;"></span></b>
                                </div>

                                <div class="row data-type">
                                <div class="col-md-2 title">商品图片</div>
                                <div class="col-md-10 data">
		                               <input type="file" class="form-control" name="goods_img" id="goods_img">
                                </div>
                                </div>

                                <div class="row data-type">
                                <div class="col-md-2 title">商品相册</div>
                                <div class="col-md-10 data">
                                       <input type="file" class="form-control" multiple="multiple"  name="goods_imgs[]" id="goods_imgs">
                                </div>
                                </div>

                                <div class="row data-type">
                                <div class="col-md-2 title">商品数量</div>
                                <div class="col-md-10 data">
                                    <input type="text" class="form-control" name="goods_num" id="goods_num"   placeholder="商品数量" value="">
                                </div>
                                       <b><span id="span_num" style="color: red; font-size: 16px; margin-left: 220px;"></span></b>
                                </div>

                                <div class="row data-type">
                                <div class="col-md-2 title">商品简介</div>
                                <div class="col-md-10 data">
                                    <textarea class="form-control" name="goods_desc" placeholder="商品简介" id="goods_desc" value=""></textarea>
                                </div>
                                       <b><span id="span_desc" style="color: red; font-size: 16px; margin-left: 220px;"></span></b>
                                </div>

                                <div class="row data-type">
                                <div class="col-md-2 title">是否展示</div>
                                <div class="col-md-10 data">
                                   <input type="radio" name="is_show" value="1" checked>是
                                   <input type="radio" name="is_show" value="2">否
                                </div>
                                </div>

                                <div class="row data-type">
                                <div class="col-md-2 title">是否热门</div>
                                <div class="col-md-10 data">
                                   <input type="radio" name="is_new" value="1" checked>是
                                   <input type="radio" name="is_new" value="2">否
                                </div>
                                </div>

                                <div class="row data-type">
                                <div class="col-md-2 title">是否上架</div>
                                <div class="col-md-10 data">
                                   <input type="radio" name="is_up" value="1" checked>是
                                   <input type="radio" name="is_up" value="2">否
                                </div>
                                </div>

                                <div class="row data-type">
                                <div class="col-md-2 title">是否新品</div>
                                <div class="col-md-10 data">
                                   <input type="radio" name="is_sell" value="1" checked>是
                                   <input type="radio" name="is_sell" value="2">否
                                </div>
                                </div>

                                <div class="row data-type">
                                <div class="col-md-2 title">商品积分</div>
                                <div class="col-md-10 data">
                                    <input type="text" class="form-control" name="goods_score" id="goods_score"   placeholder="商品积分" value="">
                                </div>
                                       <b><span id="span_score" style="color: red; font-size: 16px; margin-left: 220px;"></span></b>


                                </div>


                            </div>


                   </div>
                  <div class="btn-toolbar list-toolbar">
				      <button type="submit" class="btn btn-primary" id="but" ng-click="setEditorValue();save()"><i class="fa fa-save"></i>添加</button>
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
<script src="/js/jquery.js"></script>
<script>
    $(function(){
        //验证商品名称
        $(document).on("blur","#goods_name",function(){
            // alert(123);
            var goods_name = $(this).val();
            if(goods_name==""){
                $("#span_name").text("商品名称不能为空");
            }else{
                $.ajax({
                    url: "/admin/goods/ajaxuniq",
                    type: "get",
                    data: {
                        goods_name:goods_name
                    },
                    success: function(res) {
                        // console.log(res);
                        if (res == 'no') {
                            $("#span_name").text("商品名称已存在");
                        } else {
                            $("#span_name").html("<font color='green'>√</font>");
                        }
                    }
                })
            }
        })
        //验证价格
        $(document).on("blur","#goods_price",function(){
            // alert(123);
            var goods_price = $(this).val();
            var price = /((^[1-9]\d*)|^0)(\.\d{0,2}){0,1}$/;
            if(goods_price==""){
                // alert(123);
                $("#span_price").text("商品价格不能为空");
            }else if(!price.test(goods_price)){
                $("#span_price").text("商品价格格式不正确");
            }else {
                $("#span_price").html("<font color='green'>√</font>");
            }
        })
        //验证数量
        $(document).on("blur","#goods_num",function(){
            // alert(123);
            var goods_num = $(this).val();
            var num = /^\d{1,}$/;
            if(goods_num==""){
                // alert(123);
                $("#span_num").text("商品数量不能为空");
            }else if(!num.test(goods_num)){
                $("#span_num").text("商品数量格式不正确");
            }else {
                $("#span_num").html("<font color='green'>√</font>");
            }
        })
        //验证简介
        $(document).on("blur","#goods_desc",function(){
            // alert(123);
            var goods_desc = $(this).val();
            if(goods_desc==""){
                // alert(123);
                $("#span_desc").text("商品简介不能为空");
            }else {
                $("#span_desc").html("<font color='green'>√</font>");
            }
        })
        //验证积分
        $(document).on("blur","#goods_score",function(){
            // alert(123);
            var goods_score = $(this).val();
            var score = /^\d{1,}$/;
            if(goods_score==""){
                // alert(123);
                $("#span_score").text("商品积分不能为空");
            }else if(!score.test(goods_score)){
                $("#span_score").text("商品积分格式不正确");
            }else {
                $("#span_score").html("<font color='green'>√</font>");
            }
        })

        //验证阻止提交
        $(document).on("click",".btn",function(){
            //验证阻止商品名称
            var nameflag = true;
            var goods_name = $("#goods_name").val();
            if(goods_name==""){
                $("#span_name").text("商品名称不能为空");
                return false;
            }else{
                $.ajax({
                    url: "/admin/goods/ajaxuniq",
                    type: "get",
                    data: {
                        goods_name:goods_name
                    },
                    success: function(res) {
                        // console.log(res);
                        if (res == 'no') {
                            $("#span_name").text("商品名称已存在");
                            nameflag = false;
                        }
                    }
                })
                if(!nameflag){
                    return false;
                }
            }

            //验证阻止商品价格
            var goods_price = $("#goods_price").val();
            var price = /((^[1-9]\d*)|^0)(\.\d{0,2}){0,1}$/;
            if(goods_price==""){
                // alert(123);
                $("#span_price").text("商品价格不能为空");
                return false;
            }else if(!price.test(goods_price)){
                $("#span_price").text("商品价格格式不正确");
                return false;
            }
            //验证阻止商品数量
            var goods_num = $("#goods_num").val();
            var num = /^\d{1,}$/;
            if(goods_num==""){
                // alert(123);
                $("#span_num").text("商品数量不能为空");
                return false;
            }else if(!num.test(goods_num)){
                $("#span_num").text("商品数量格式不正确");
                return false;
            }
            //验证阻止商品简介
            //验证阻止商品积分
            var goods_score = $("#goods_score").val();
            // console.log(goods_score);
            // var score = /^[0-9]*$/;
            var goods_desc = $("#goods_desc").val();
            if(goods_desc==""){
                // alert(123);
                $("#span_desc").text("商品简介不能为空");
                return false;
            }
            if(!goods_score){
                // alert(123);
                $("#span_score").text("商品积分不能为空1");
                return false;
            }
        })
    })
</script>

</html>
@endsection
