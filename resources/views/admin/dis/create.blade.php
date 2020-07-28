@extends('layout.admin')
@section('content')
    <body class="hold-transition skin-red sidebar-mini" >

    <!-- 正文区域 -->
    <section class="content">

        <div class="box-body">

            <!--tab页-->
            <div class="nav-tabs-custom">

                <!--tab头-->
                <ul class="nav nav-tabs">
                    <li class="active">
                        <a href="#home" data-toggle="tab">优惠卷</a>
                    </li>
                </ul>
                <!--tab头/-->

                <!--tab内容-->
                <div class="tab-content">

                    <!--表单内容-->
                    <div class="tab-pane active" id="home">
                        <div class="row data-type">
                            <div class="col-md-2 title">商品</div>

                            <div class="col-md-10 data">
                                <table>
                                    <tr>
                                        <td>
                                            <select class="form-control" name="goods_id">
                                                <option value="">请选择----+</option>
                                            @foreach($data as $v)
                                                <option value="{{$v->goods_id}}">{{$v->goods_name}}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                    </tr>
                                </table>

                            </div>


                            <div class="col-md-2 title">过期时间</div>
                            <div class="col-md-10 data">
                                <input  class="form-control" id="meeting" type="datetime-local"/>
                            </div>


                            <div class="col-md-2 title">优惠卷名称</div>
                            <div class="col-md-10 data">
                                <input type="text" class="form-control" name="dis_name"  placeholder="优惠卷名称" value="">
                            </div>
                            <div class="col-md-2 title">优惠价格</div>
                            <div class="col-md-10 data">
                                <input type="text" class="form-control" name="money"  placeholder="优惠价格" value="">
                            </div>


                        </div>
                    </div>


                </div>
                <!--tab内容/-->
                <!--表单内容/-->

            </div>




        </div>
        <div class="btn-toolbar list-toolbar">
            <button class="btn btn-primary" id="add" ng-click="setEditorValue();save()"><i class="fa fa-save"></i>保存</button>
            <button class="btn btn-default" ng-click="goListPage()">返回列表</button>
        </div>

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
    <script>
        $(function(){
            $("#add").click(function(){
                var date = new Date();
                var timeout=$("input[type='datetime-local']").val();
                var timeout2 = timeout.replace('T', ' ') +":00";     // 2017-12-07 12:12:00
                // 日期字符串 转换成 时间戳
                var timeStamp = new Date(Date.parse(timeout2.replace(/-/g, '/'))).getTime();
                var dis_name = $("input[name='dis_name']").val()
                var money = $("input[name='money']").val()
                var goods_id = $("option:selected").val()
                //console.log(timeStamp);return
                var data ={}
                data.dis_name=dis_name;
                data.money =money;
                data.goods_id=goods_id;
                data.timeStamp=timeStamp;
                $.ajax({
                    url:'createDo',
                    type:'post',
                    dataType:'json',
                    data:data,
                    success:function(msg){
                        if(msg.error==10000){
                            location.href="index";
                        }
                    }
                })

            })
        })
    </script>
@endsection