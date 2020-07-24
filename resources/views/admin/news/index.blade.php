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
    <h3 class="box-title">品优购快报管理</h3>
</div>

<div class="box-body">

    <!-- 数据表格 -->
    <div class="table-box">

        <!--工具栏-->
        <div class="pull-left">
            <div class="form-group form-inline">
                <div class="btn-group">
                    <a href="/admin/news/create"><button type="button" class="btn btn-default" title="新建"style="background-color:greenyellow" ><i class="fa fa-file-o"></i> 新建</button></a>
                    <a href="/admin/news/index"><button type="button" class="btn btn-default" title="刷新" style="background-color:indianred"onclick="window.location.reload();"><i class="fa fa-refresh"></i> 刷新</button></a>
                </div>
            </div>
        </div>
        <div class="box-tools pull-right">
            <form action="{{url('/admin/news/index')}}" method="post">
                <div class="has-feedback">
                    状态：<select name="is_show">
                        <option value="4" {{$is_show==4?'selected':''}}>全部</option>
                        <option value="1" {{$is_show==1?'selected':''}}>展示</option>
                        <option value="0" {{$is_show==0?'selected':''}}>不展示</option>
                    </select>
                    品优购快报名称：<input name="title"  placeholder="请输入要查找的标题"value="{{$title}}">
                    <button class="btn btn-default chaxun" type="submit" style="background-color:orangered" >查询</button>
                </div>
            </form>
        </div>
        <!--工具栏/-->

        <!--数据列表-->
        <table id="dataList" class="table table-bordered table-striped table-hover dataTable">
            <thead>
            <tr>
                <th class="sorting_asc">品优购快报ID</th>
                <th class="sorting">品优购快报通知</th>
                <th class="sorting">品优购快报详情</th>
                <th class="sorting">品优购快报标题</th>
                <th class="sorting">品优购快报添加时间</th>
                <th class="sorting">是否展示</th>
                <th class="text-center">操作</th>
            </tr>
            </thead>
            <tbody>
            @foreach($res as $k=>$v)
            <tr n_id="{{$v->n_id}}">
                <td style="width:10%">{{$v->n_id}}</td>
                <td field="notice" style="width:10%">
                    <span class="span_name">{{$v->notice}}</span>
                    <input type="text" value="{{$v->notice}}" style="display: none" class="inp"/>
                </td >
                <td field="desc" style="width:40%">
                    <span class="span_name"><a href="javascript:;" title="{{$v->desc}}">{{mb_substr($v->desc,0,50) ."..."}}</a></span>
                    <input type="text" value="{{$v->desc}}" style="display: none" class="inp"/>
                </td>
                <td field="title"style="width:10%">
                    <span class="span_name"><a href="javascript:;" title="{{$v->title}}">{{mb_substr($v->title,0,10) ."..."}}</a></span>
                    <input type="text" value="{{$v->title}}" style="display: none" class="inp"/>
                </td>
                <td style="width:13%">{{date('Y-m-d H:i:s',$v->addtime)}}</td>
                <td>{{$v->is_show==1?'√':'×'}}</td>
                <td class="text-center" n_id="{{$v->n_id}}" style="width:8%">
                    <a href="{{url('/admin/news/upd/'.$v->n_id)}}"><button type="button" class="btn bg-olive btn-xs upd">修改</button></a>
                    <button type="button" class="btn btn-xs del" style="background-color:yellow">删除</button>
                </td>
                <b><span id="span_name" style="color: red; font-size: 16px; margin-left: 220px;"></span></b>
            </tr>
            @endforeach
            <tr><td colspan="7">{{$res->appends(["is_show"=>$is_show,'title'=>$title])->links()}}</td></tr>
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
        data.n_id=$(this).parent('td').attr('n_id');
//        alert(data);
        url="/admin/news/del";
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
                    location.href="/admin/news/index";
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
        $('.inp').blur(function() {
            var _this = $(this);
            var data={};
            data.value = _this.val();
            data.n_id = _this.parents('tr').attr('n_id');
            data.field = _this.parent('td').attr('field');
            _this.prev("span").show();
            _this.hide();
            if(data.field=="notice"){
                if(!data.value){
                    $("#span_name").show();
                    $("#span_name").text("通知不能为空");
                    _this.prev("span").show();
                    _this.hide();
                    return false;
                }else{
                    $("#span_name").hide();
                }
            }
            if(data.field=="desc"){
                if(!data.value){
                    $("#span_name").show();
                    $("#span_name").text("详情不能为空");
                    _this.prev("span").show();
                    _this.hide();
                    return false;
                }else{
                    $("#span_name").hide();
                }
            }
            if(data.field=="title"){
                if(!data.value){
                    $("#span_name").show();
                    $("#span_name").text("标题不能为空");
                    _this.prev("span").show();
                    _this.hide();
                    return false;
                }else{
                    $("#span_name").hide();
                }
            }
            var url="/admin/news/updTo";
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
                }
            })
        })
    })
</script>
</body>

</html>
@endsection
