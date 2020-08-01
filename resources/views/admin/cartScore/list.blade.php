@extends('layout.admin')
@section('content')
    <body class="hold-transition skin-red sidebar-mini" >
    <!-- .box-body -->
    @if(session('msg'))
        <div class="alert alert-danger">{{session("msg")}}</div>
    @endif
    <div class="box-header with-border">
        <h3 class="box-title">积分订单展示</h3>
    </div>

    <div class="box-body">

        <!-- 数据表格 -->
        <div class="table-box">


            <!--数据列表-->
            <table id="dataList" class="table table-bordered table-striped table-hover dataTable">
                <thead>
                <tr>
                    <th class="" style="padding-right:0px">
                        <input id="selall" type="checkbox" class="icheckbox_square-blue">
                    </th>
                    <th class="sorting_asc">ID</th>
                    <th class="sorting">订单号</th>
                    <th class="sorting">添加时间</th>
                    <th class="text-center">操作</th>
                </tr>
                </thead>
                <tbody>
                @foreach($data as $k=>$v)
                <tr>
                    <td>{{$v->id}}</td>
                    <td>{{$v->order}}  </td>
                   <td>{{$v->addtime}}</td>
                    <td></td>
                    <td></td>
                    {{--<td class="text-center">--}}
                        {{--<a href="/admin/category/upd?id={{$itme->cate_id}}" class="btn bg-olive btn-xs">修改</a>--}}
                        {{--<a href="/admin/category/del?id={{$itme->cate_id}}" class="btn bg-olive btn-xs">删除</a>--}}
                    {{--</td>--}}
                </tr>
                    @endforeach
                </tbody>
            </table>
            <!--数据列表/-->


        </div>
        <!-- 数据表格 /-->


    </div>
    <!-- /.box-body -->

    </body>
@endsection