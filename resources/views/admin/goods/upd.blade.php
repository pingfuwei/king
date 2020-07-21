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
                <form action="/admin/goods/updates" method="post" enctype="multipart/form-data">
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
                                <input type="hidden" name="goods_id" value="{{$goods->goods_id}}">
		                           <div class="col-md-2 title">商品名称</div>
		                           <div class="col-md-10 data">

		                               <input type="text" class="form-control" name="goods_name"    placeholder="商品名称" value="{{$goods->goods_name}}">
		                           </div>

                                <div class="col-md-2 title">所属分类</div>
                                <div class="col-md-10 data">
                                   <select class="form-control" name="cate_id">
                                       <option value="0">--请选择--</option>
                                       @foreach($cate as $itme)
                                       <option value="{{$itme->cate_id}}" {{$goods->cate_id==$itme->cate_id ? "selected" : ""}}>{{$itme->cate_name}}</option>
                                       @endforeach
                                   </select>
                                </div>

                                <div class="col-md-2 title">所属品牌</div>
                                <div class="col-md-10 data">
                                   <select class="form-control" name="brand_id">
                                       <option value="0">--请选择--</option>
                                       @foreach($brand as $v)
                                       <option value="{{$v->brand_id}}" {{$goods->brand_id==$v->brand_id ? "selected" : ""}}>{{$v->brand_name}}</option>
                                       @endforeach
                                   </select>
                                </div>

                                <div class="col-md-2 title">价格</div>
                                <div class="col-md-10 data">
                                    <div class="input-group">
                                        <span class="input-group-addon">¥</span>
                                        <input type="text" class="form-control price"  placeholder="价格" name="goods_price" value="{{$goods->goods_price}}">
                                    </div>
                                </div>

                                <div class="col-md-2 title">商品图片</div>
                                <div class="col-md-10 data" style="height:70px;">
                                    <img src="{{env('UPLOADS_URL')}}{{$goods->goods_img}}" width="20px" alt="">
		                               <input type="file" class="form-control" name="goods_img">
                                </div>

                                <div class="col-md-2 title">商品相册</div>
                                <div class="col-md-10 data" style="height:70px;">
                                    @php $goods_imgs = explode("|",$goods["goods_imgs"]); @endphp
                                    	@foreach($goods_imgs as $vv)
                                    		<img src="{{env('UPLOADS_URL')}}{{$vv}}" width="20px" alt="">
                                        @endforeach
                                       <input type="file" class="form-control" multiple="multiple"  name="goods_imgs[]">
                                </div>

                                <div class="col-md-2 title">商品数量</div>
                                <div class="col-md-10 data">
                                    <input type="text" class="form-control" name="goods_num"    placeholder="商品数量" value="{{$goods->goods_num}}">
                                </div>

                                <div class="col-md-2 title">商品简介</div>
                                <div class="col-md-10 data">
                                    <textarea class="form-control" name="goods_desc" placeholder="商品简介" value="">{{$goods->goods_desc}}</textarea>
                                </div>

                                <div class="col-md-2 title">是否展示</div>
                                <div class="col-md-10 data">
                                   <input type="radio" name="is_show" value="1" {{$goods->is_show=="1" ? "checked" : ""}}>是
                                   <input type="radio" name="is_show" value="2" {{$goods->is_show=="2" ? "checked" : ""}}>否
                                </div>

                                <div class="col-md-2 title">是否热门</div>
                                <div class="col-md-10 data">
                                   <input type="radio" name="is_new" value="1" {{$goods->is_new=="1" ? "checked" : ""}}>是
                                   <input type="radio" name="is_new" value="2" {{$goods->is_new=="2" ? "checked" : ""}}>否
                                </div>

                                <div class="col-md-2 title">是否上架</div>
                                <div class="col-md-10 data">
                                   <input type="radio" name="is_up" value="1" {{$goods->is_up=="1" ? "checked" : ""}}>是
                                   <input type="radio" name="is_up" value="2" {{$goods->is_up=="2" ? "checked" : ""}}>否
                                </div>

                                <div class="col-md-2 title">是否新品</div>
                                <div class="col-md-10 data">
                                   <input type="radio" name="is_sell" value="1" {{$goods->is_sell=="1" ? "checked" : ""}}>是
                                   <input type="radio" name="is_sell" value="2" {{$goods->is_sell=="2" ? "checked" : ""}}>否
                                </div>

                                <div class="col-md-2 title">商品积分</div>
                                <div class="col-md-10 data">
                                    <input type="text" class="form-control" name="goods_score"    placeholder="商品积分" value="{{$goods->goods_score}}">
                                </div>


                                </div>


                            </div>


                   </div>
                  <div class="btn-toolbar list-toolbar">
				      <button type="submit" class="btn btn-primary" ng-click="setEditorValue();save()"><i class="fa fa-save"></i>修改</button>
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
