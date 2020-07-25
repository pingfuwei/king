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
									      <td attr_id="{{$itme->goods_id}}">
                                            <span class="span_name"><a href="javascript:void(0)"title="{{$itme->goods_name}}">{{substr($itme->goods_name,0,18)}}...</a></span>
                                          </td>
				                          <td>{{$itme->cate_name}}</td>
				                          <td>{{$itme->brand_name}}</td>
				                          <td><img src={{"/".$itme->goods_img}} width="35px" alt=""></td>
				                          <td>
                                                @php $goods_imgs = explode("|",$itme["goods_imgs"]); @endphp
                                                @foreach($goods_imgs as $vv)
                                                <img src="{{"/".$vv}}" width="35px" alt="">
                                                @endforeach
                                          </td>
				                          <td>{{$itme->goods_num}}</td>
				                          <td><a href="javascript:void(0)"title="{{$itme->goods_desc}}">{{substr($itme->goods_desc,0,18)}}...</a></td>
				                          <td goods_id="{{$itme->goods_id}}" class="hubei" status='{{$itme->is_show}}' filed="is_show">{{$itme->is_show=="1" ? "√" : "×"}}</td>
				                          <td goods_id="{{$itme->goods_id}}" class="hubei" status='{{$itme->is_new}}' filed="is_new">{{$itme->is_new=="1" ? "√" : "×"}}</td>
				                          <td goods_id="{{$itme->goods_id}}" class="hubei" status='{{$itme->is_up}}' filed="is_up">{{$itme->is_up=="1" ? "√" : "×"}}</td>
				                          <td goods_id="{{$itme->goods_id}}" class="hubei" status='{{$itme->is_sell}}' filed="is_sell">{{$itme->is_sell=="1" ? "√" : "×"}}</td>
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

<script src="/js/jquery.js"></script>
<script>
    $(function(){
        $(document).on("click",".span_name",function(){
            var name = $(this).text();
            // console.log(name);
            $(this).parent().html('<input type="text" class="input_name" value='+name+'> <b><span id="span_names" style="color: red; font-size: 16px; margin-left: 220px;"></span></b>');
        })
        $(document).on("blur",".input_name",function(){
            // alert("123");
            var obj = $(this);
            var new_name = $(this).val();
            // alert(new_name);
            var id = $(this).parent().attr("attr_id");
            // alert(id);

            var data = {};
            data.new_name = new_name;
            data.id = id;

            // console.log(data);
            if(new_name==""){
                // alert("123");
                $(this).next().children().text("商品名称不能为空");
                return false;
            }else{
                $.get(
                    "/admin/goods/ajaxNames",
                    data,
                    function(res){
                        // console.log(res);
                        if (res == 'no') {
                            obj.next().children().text("商品名称已存在");
                            return false;
                        }else if(res=="oks"){
                            obj.parent().html('<span class="span_name">'+new_name+'</span>');
                            $(this).html(new_name);
                        }else{
                            $.get("/admin/goods/ajaxName",data,function(res){
                                // console.log(res);
                                if(res.status=="true"){
                                    obj.parent().html('<span class="span_name">'+new_name+'</span>');
                                    $(this).html(new_name);
                                }
                            },'json');
                        }
                    }
                )
            }


        })
        //是否即点即改
            $(document).on("click",".hubei",function(){
                var data = {};
                data.goods_id = $(this).attr("goods_id");
                data.status = $(this).attr("status");
                data.filed = $(this).attr("filed");
                var obj = $(this);
                $.get("/admin/goods/ajaxji",data,function(res){
                    // console.log(res);
                    if(res.status=="true"){
                        obj.attr("status",res.msg);
                        obj.text(res.result);
                    }
                },"json")
            })
    })
</script>

</html>
@endsection
