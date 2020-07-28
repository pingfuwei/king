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
                <form action="" method="post">
                @csrf
                <div class="box-body">

                    <!--tab页-->
                    <div class="nav-tabs-custom">

                        <!--tab头-->
                        <ul class="nav nav-tabs">
                            <li class="active">
                                <a href="#home" data-toggle="tab">用户优惠券基本信息</a>
                            </li>
                        </ul>
                        <!--tab头/-->

                        <!--tab内容-->
                        <div class="tab-content">

                            <!--表单内容-->
                            <div class="tab-pane active" id="home">
                                <div class="row data-type">
                                <div class="col-md-2 title">用户</div>
                                <div class="col-md-10 data">
                                    <input type="hidden" name="id" value="{{$res->id}}">
                                   <select class="form-control" name="user_id">
                                       <option value="">--请选择--</option>
                                       @foreach($user as $itme)
                                       <option value="{{$itme->user_id}}" {{$res->user_id==$itme->user_id ? "selected" : ""}}>{{$itme->user_name}}</option>
                                       @endforeach
                                   </select>
                                </div>
                                       <b><span id="span_user" style="color: red; font-size: 16px; margin-left: 220px;"></span></b>
                                </div>

                                <div class="row data-type">
                                <div class="col-md-2 title">优惠券</div>
                                <div class="col-md-10 data">
                                   <select class="form-control" name="dis_id">
                                       <option value="">--请选择--</option>
                                       @foreach($discount as $itme)
                                       <option value="{{$itme->dis_id}}" {{$res->dis_id==$itme->dis_id ? "selected" : ""}}>{{$itme->dis_name}}</option>
                                       @endforeach
                                   </select>
                                </div>
                                       <b><span id="span_dis" style="color: red; font-size: 16px; margin-left: 220px;"></span></b>
                                </div>

                                <div class="row data-type">
                                   <div class="col-md-2 title">过期时间</div>
                                   <div class="col-md-10 data">
                                       <input type="datetime-local" class="form-control" name="timeout" id="cate_name" value="{{date('Y-m-d',$res->timeout).'T'.date('H:i:s',$res->timeout)}}">
                                   </div>
                                       <b><span id="span_name" style="color: red; font-size: 16px; margin-left: 220px;"></span></b>
                                </div>

                            </div>


                   </div>
                  <div class="btn-toolbar list-toolbar">
				      <button type="button" class="btn btn-primary" id="but" ng-click="setEditorValue();save()"><i class="fa fa-save"></i>修改</button>
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
        // alert("123");
        //阻止提交提示
        $(document).on("click","#but",function(){
            var data = {};

            data.id = $("input[name='id']").val();
            data.dis_id = $('select[name="dis_id"]').val();
            data.user_id = $('select[name="user_id"]').val();
            var timeout = $("input[name='timeout']").val();
            var timeout1 = timeout.replace("T"," ")+":00";
            data.timeout2 = new Date(Date.parse(timeout1.replace(/-/g,"/"))).getTime()/1000;
            // alert(timeout2);
            // return false;
            // alert(user_id);
            if(data.user_id==""){
                // alert(123);
                $("#span_user").text("用户不能为空");
                return false;
            }else{
                $("#span_user").html("<font color='green'>√</font>");
            }
            if(data.dis_id==""){
                $("#span_dis").text("优惠券不能为空");
                return false;
            }else{

                           $.ajax({
                               url: "/admin/userdis/updDo",
                               type: "post",
                               sync:false,
                               data: data,
                               dataType:"json",
                               success: function(res) {
                                   // alert(123);
                                   // console.log(res);
                                   if(res.status=="true"){
                                       alert(res.msg);
                                       window.location.href=res.result;
                                   }else{
                                       alert(res.msg);
                                   }
                    }
                })
            }

        })
    })

</script>

</html>
@endsection
