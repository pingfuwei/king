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
                        <h3 class="box-title">商品管理</h3>
                    </div>

                    <div class="box-body">

                        <!-- 数据表格 -->
                        <div class="table-box">
                            <div class="box-tools pull-right">
                                <div class="has-feedback">
                                    <form action="/admin/goods/index">
                                        分类：<select name="cate_name">
                                               	<option value="">全部</option>
                                                @foreach($cate as $k=>$v)
                                                <option value="{{$v->cate_name}}" {{$cate_name==$v->cate_name ? "selected" : ""}}>{{$v->cate_name}}</option>
                                                @endforeach
                                              </select>
                                              品牌：<select name="brand_name">
                                                     	<option value="">全部</option>
                                                      @foreach($brand as $k=>$v)
                                                      <option value="{{$v->brand_name}}"  {{$brand_name==$v->brand_name ? "selected" : ""}}>{{$v->brand_name}}</option>
                                                      @endforeach
                                                    </select>
                                              管理员名称：<input type="text" name="goods_name" value="{{$goods_name??''}}">
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
										  <th class="sorting_asc">商品ID</th>
									      <th class="sorting">商品名称</th>
									      <th class="sorting">所属分类</th>
										  <th class="sorting_asc">所属品牌</th>
									      <th class="sorting">商品图片</th>
									      <th class="sorting">商品相册</th>
									      <th class="sorting">商品数量</th>
										  <th class="sorting_asc">商品简介</th>
									      <th class="sorting">是否展示</th>
									      <th class="sorting">是否热门</th>
										  <th class="sorting_asc">是否上架</th>
									      <th class="sorting">是否新品</th>
									      <th class="sorting">商品积分</th>
									      <th class="sorting">添加时间</th>
					                      <th class="text-center">操作</th>
			                          </tr>
			                      </thead>
			                      <tbody>
                                      @foreach($goods as $itme)
			                          <tr>
                                          <td><input  type="checkbox"></td>
				                          <td>{{$itme->goods_id}}</td>
									      <td>{{$itme->goods_name}}</td>
				                          <td>{{$itme->cate_name}}</td>
				                          <td>{{$itme->brand_name}}</td>
				                          <td><img src="{{env('UPLOADS_URL')}}{{$itme->goods_img}}" width="35px" alt=""></td>
				                          <td>
                                                @php $goods_imgs = explode("|",$itme["goods_imgs"]); @endphp
                                                @foreach($goods_imgs as $vv)
                                                <img src="{{env('UPLOADS_URL')}}{{$vv}}" width="35px" alt="">
                                                @endforeach
                                          </td>
				                          <td>{{$itme->goods_num}}</td>
				                          <td>{{$itme->goods_desc}}</td>
				                          <td>{{$itme->is_show=="1" ? "√" : "×"}}</td>
				                          <td>{{$itme->is_new=="1" ? "√" : "×"}}</td>
				                          <td>{{$itme->is_up=="1" ? "√" : "×"}}</td>
				                          <td>{{$itme->is_sell=="1" ? "√" : "×"}}</td>
				                          <td>{{$itme->goods_score}}</td>
									      <td>{{date('Y-m-d H:i:s',$itme->addtime)}}</td>
		                                  <td class="text-center">
		                                 	  <a href="/admin/goods/upd?id={{$itme->goods_id}}" class="btn bg-olive btn-xs">修改</a>
		                                 	  <a href="/admin/goods/del?id={{$itme->goods_id}}" class="btn bg-olive btn-xs">删除</a>
		                                  </td>
			                          </tr>
                                      @endforeach
                                      <tr><td colspan="16">{{$goods->appends(["cate_name"=>$cate_name,"brand_name"=>$brand_name,"goods_name"=>$goods_name])->links()}}</td></tr>
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
