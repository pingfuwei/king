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
                    <th class="sorting">状态</th>
                    <th class="sorting">催货</th>
                    <th class="text-center">操作</th>
                </tr>
                </thead>
                <tbody>
                @foreach($data as $k=>$v)
                <tr>
                    <td></td>
                    <td>{{$v->id}}</td>
                    <td>{{$v->order}}  </td>
                   <td>{{date("Y-m-d H:i:s",$v->addtime)}}</td>
                    <td>
                        @if($v->status===1)
                            未支付
                        @elseif($v->status===2)
                            已支付---未发货
                        @elseif($v->status===3)
                            已发货
                        @elseif($v->status===4)
                            已到货
                         @endif
                    </td>
                    <td>
                        {{$v->UrgeScore}}次
                    </td>
                    <td>

                        @if($v->status===1)
                            <button type="button" class="btn btn-warning">未支付</button>
                        @elseif($v->status===2)
                            <button type="button" order_id="{{$v->id}}" id="send" class="btn btn-info">发货</button>
                        @elseif($v->status===3)
                            <a href="javascript:;" class="btn bg-olive btn-xs">已发货</a>
                        @elseif($v->status===4)
                            <a href="javascript:;" class="btn bg-olive btn-xs">已到货</a>
                        @endif
                    </td>
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
    <script>
        $(function () {
            $(document).on("click","#send",function () {
                var id=$(this).attr("order_id")
                $.ajax({
                    url:"/admin/index/listajax",
                    data:{id:id},
                    success:function (res) {
                        alert(res)
                        location.href="/admin/index/list"
                    }
                })
            })
        })
    </script>
@endsection