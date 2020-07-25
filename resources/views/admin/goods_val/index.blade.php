@extends('layout.admin')
@section('content')
        <!DOCTYPE html>
<html>

<head>
    <!-- 页面meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>品优购管理</title>
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
    <h3 class="box-title">商品属性值管理</h3>
</div>

<div class="box-body">

    <!-- 数据表格 -->
    <div class="table-box">

        <!--工具栏-->
        <div class="pull-left">
            <div class="form-group form-inline">
                <div class="btn-group">
                    <a href="/admin/goods_val/create"><button type="button" class="btn btn-default" title="新建"style="background-color:greenyellow" ><i class="fa fa-file-o"></i> 新建</button></a>
                    <a href="/admin/goods_val/index"><button type="button" class="btn btn-default" title="刷新" style="background-color:indianred"onclick="window.location.reload();"><i class="fa fa-refresh"></i> 刷新</button></a>
                </div>
            </div>
        </div>
        <div class="box-tools pull-right">
            <form action="{{url('/admin/goods_val/index')}}" method="post">
                <div class="has-feedback">
                    商品属性值名称：<input name="goods_val_name"  placeholder="请输入要查找的标题"value="{{$goods_val_name}}">
                    <button class="btn btn-default chaxun" type="submit" style="background-color:orangered" >查询</button>
                </div>
            </form>
        </div>
        <!--工具栏/-->

        <!--数据列表-->
        <table id="dataList" class="table table-bordered table-striped table-hover dataTable">
            <thead>
            <tr>
                <th class="sorting_asc">商品属性值ID</th>
                <th class="sorting">商品属性值名称</th>
                <th class="sorting">商品属性值添加时间</th>
                <th class="text-center">操作</th>
            </tr>
            </thead>
            <tbody>
            @foreach($res as $k=>$v)
            <tr goods_val_id="{{$v->goods_val_id}}">
                <td>{{$v->goods_val_id}}</td>
                <td filed="goods_val_name">
                    <span class="span_name">{{$v->goods_val_name}}</span>
                    <input type="text" value="{{$v->goods_val_name}}" style="display: none" class="inp"/>
                    <b><span id="span_name" style="color: red; font-size: 16px; margin-left: 220px;"></span></b>
                </td>
                <td>{{date('Y-m-d H:i:s',$v->add_time)}}</td>
                <td class="text-center" goods_val_id="{{$v->goods_val_id}}">
                    <a href="{{url('/admin/goods_val/upd/'.$v->goods_val_id)}}"><button type="button" class="btn bg-olive btn-xs upd">修改</button></a>
                    <button type="button" class="btn btn-xs del" style="background-color:yellow">删除</button>
                </td>
            </tr>
            @endforeach
            <tr><td colspan="7">{{$res->appends(['goods_val_name'=>$goods_val_name])->links()}}</td></tr>
            </tbody>
        </table>
        <!--数据列表/-->

    </div>
    <!-- 数据表格 /-->


</div>
<!-- /.box-body -->
<script>
    $(document).on('click','.del',function(){
        if(!confirm("是否确定删除？")){
            return false;
        }
        var data={};
        data.goods_val_id=$(this).parent('td').attr('goods_val_id');
        url="/admin/goods_val/del";
        $.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') } });
        $.ajax({
            url:url,
            data:data,
            type:"post",
            dataType:'json',
            success:function(res){
                console.log(res);
                alert(res.result.message);
                if(res.message=='success'){
                    location.href="/admin/goods_val/index";
                }
            }
        })
    })
    $(document).ready(function(){
        $(".span_name").click(function(){
            $('input').hide();
            $('span').show()
            var _this=$(this);
            var as=$(this).text();
            $(this).hide();
            var xd= _this.next().val(as).show();
        });
    })
    $(document).ready(function(){
        $(document).on("blur",".inp", function () {
            var _this = $(this);
            var data={};
            data.value = _this.val();
            data.goods_val_id= _this.parents('tr').attr('goods_val_id');
            if(!data.value){
                $("#span_name").show();
                $(this).next().children().text("属性值不能为空");
                return false;
            }else{
                $(this).next().children().hide();
            }
            data.field = _this.parent('td').attr('filed');
            var nameflag = true;
            var url = "/admin/goods_val/unique";
            $.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});
            $.ajax({
                url: url,
                data: {'goods_val_name':data.value,'goods_val_id':data.goods_val_id},
                type: "post",
                async:false,
                success: function (res) {
                    console.log(res);
                    if(res=="no"){
                        $("#span_name").show();
                        $("#span_name").text("该属性值已存在");
                        nameflag = false;
                    }
                }
            })
            if(!nameflag){
                return false;
            }
            var url="/admin/goods_val/updTo";
            $.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') } });
            $.ajax({
                type:"post",
                data:data,
                url:url,
                dataType:"json",
                success:function(res){
                    if(res.code==000000){
                        _this.hide();
                        //console.log(as);
                        _this.prev().text(data.value).show();
                        alert(res.result.message);
                    }else{
                        _this.hide();
                        _this.prev().show();
                        alert(res.result.message);
                    }
//
                }
            })
        })
    })
</script>
</body>

</html>
@endsection