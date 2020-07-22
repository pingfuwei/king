@extends('layout.admin')
@section('content')
<!DOCTYPE html>
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
    <h3 class="box-title">VIP列表</h3>
</div>

<div class="box-body">

    <!-- 数据表格 -->
    <div class="table-box">
        <div class="box-tools pull-right">
            <div class="has-feedback">
                <form action="/admin/vip/index">
                    vip名称：<input type="text" name="vip_name" value="{{$vip_name??''}}">
                    <button type="submit" class="btn btn-default" >查询</button>
                </form>
            </div>
        </div>

        <!--数据列表-->
        <table id="dataList" class="table table-bordered table-striped table-hover dataTable">
            <thead>
            <tr>
                <th class="sorting_asc">VIPID</th>
                <th class="sorting">VIP名称</th>
                <th class="sorting">VIP价格</th>
                <th class="text-center">操作</th>
            </tr>
            </thead>
            <tbody>
            @foreach($data as $k=>$v)
            <tr vip_id="{{$v->vip_id}}">

                <td>{{$v->vip_id}}</td>
                <td field="vip_name">
                    <span class="span">{{$v->vip_name}}</span>
                    <input type="text" class="change" style="display: none" value="{{$v->vip_name}}">
                </td>
                <td field="price">
                    <span class="span">{{$v->price}}</span>
                    <input type="text" class="change" style="display: none" value="{{$v->price}}">
                </td>
                <td class="text-center">
                    <a href="{{url('admin/vip/upd',$v->vip_id)}}" class="btn bg-olive btn-xs">修改</a>
                    <a href="javascript:;" data-id="{{$v->vip_id}}" class="del btn bg-olive btn-xs">删除</a>
                </td>
            </tr>
                @endforeach
            <tr><td colspan="16">{{$data->links()}}</td></tr>
            </tbody>
        </table>
        <!--数据列表/-->


    </div>
    <!-- 数据表格 /-->


</div>
<!-- /.box-body -->

</body>
<script src="/plugins/jQuery/jquery-2.2.3.min.js"></script>
<script>
    $(".del").click(function(){
        var vip_id= $(this).data("id");
//       console.log(attr_id);
        $.ajax({
            url:"{{url('/admin/vip/del')}}",
            type:'post',
            data:{'vip_id':vip_id},
            dataType:'json',
            success:function(res){
//                console.log(res);
                if(res.code==200){
                    alert(res.msg);
                    location.href="{{url('admin/vip/index')}}"
                }else{
                    alert(res.msg);
                }
            }
        })
    })
</script>
<script>
    $(document).ready(function(){
        $(".span").click(function(){
            var _this=$(this);
            var change=$(this).text();
            _this.hide();
            var aa= _this.next().val(change).show();
        })
        $(".change").blur(function(){
            var _this = $(this);
            var value = _this.val();
            var vip_id = _this.parents('tr').attr('vip_id');
            var field = _this.parent('td').attr('field');
//            console.log(field);return;
            $.ajax({
                url:"{{url('/admin/vip/change')}}",
                data:{'value':value,'vip_id':vip_id,'field':field},
                dataType:'json',
                type:'post',
                success:function(res){
                    if(res.code){
                        _this.hide();
                        _this.prev().text(value).show();
                        alert(res.msg);
                    }else{
                        alert(res.msg);
                    }
                }
            })


        })
    })

</script>
</html>
@endsection
