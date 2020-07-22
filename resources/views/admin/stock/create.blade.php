@extends('layout.admin')
@section('content')
        <!DOCTYPE html>
<html>

<head>
    <!-- 页面meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>品优购编辑</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no" name="viewport">

    <link rel="stylesheet" href="/plugins/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/plugins/adminLTE/css/AdminLTE.css">
    <link rel="stylesheet" href="/plugins/adminLTE/css/skins/_all-skins.min.css">
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

    <div class="box-body">

        <!--tab页-->
        <div class="nav-tabs-custom">
            <!--tab内容-->
            <div class="tab-content" >

                <!--表单内容-->
                <div class="tab-pane active" id="home" >
                    <div class="row data-type" >
                        <div class="col-md-2 title" >商品分类</div>

                        <div class="col-md-10  data" >
                            <table>
                                <tr>
                                    <td>
                                        <select class="form-control" name="goods_id" id="goods_id">
                                            <option value="" selected>选择商品---+</option>
                                            @foreach ($res as $k=>$v)
                                            <option value="{{$v->goods_id}}" id="goods_name">{{$v->goods_name}}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                </tr>
                            </table>

                        </div  >

                        <div class="col-md-2  title" >库存</div>
                        <div class="col-md-10 data">
                            <input type="text" class="form-control" id="stock"  placeholder="库存">
                        </div>

                        <div class="col-md-2 title">价格</div>
                        <div class="col-md-10 data">
                            <input type="text" class="form-control" id="price"  placeholder="价格">
                        </div>
                        @foreach ($data as $k=>$v)
                        <div id="aa" >
                            <div class="col-md-2 title" >{{$v->attr_name}}</div>
                            <div class="col-md-10 data" >
                                @foreach ($v['data'] as $val)
                                    <span >
                                    <input  type="checkbox" name="goods_val_name" id="attr_id"  attr_id="{{$v->attr_id}}" value="{{$val->goods_val_id}}">{{$val->goods_val_name}}
                                </span>
                                @endforeach
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="btn-toolbar list-toolbar" >
                <button class="btn btn-primary" id="btn" ng-click="setEditorValue();save();"><i class="fa fa-save"></i>确定</button>
                <a href="/admin/stock/del"><button class="btn btn-default" ng-click="goListPage()">查看列表</button></a>
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
</html>
<script>
    $(function(){
       $("#btn").click(function(){
           var stock=$("#stock").val()
           var price=$("#price").val()
           var goods_id=$("#goods_id option:selected").val();
           //alert(goods_id)
           var aa="";
           $("input[name='goods_val_name']:checked").each(function() {
               aa+=$(this).attr("attr_id")+":"+$(this).val()+","
           });
           aa=aa.substr(0,aa.length-1)
           var date={stock:stock,price:price,goods_id:goods_id,ability:aa}
           $.ajax({
               url:"/admin/stock/createDo",
               data:date,
               success:function (res) {
                    //console.log(res);false;
               }
           })
       });
       $("#goods_id").on("change",function(){
           var goods_id = $('option:selected').val();
           var data={};
           data.goods_id = goods_id;
           //console.log(goods_id);
           $.ajax({
              url:'index',
              type:'get',
               dataType:'json',
               data:data,
               success:function(msg){
                   if(msg){
                       $("input[name='goods_val_name']").prop("checked","");
                       var array = msg.split(',');
                       $.each(array,function(k,v){
                           console.log(v.substr(2));
                           $("input[name='goods_val_name'][value="+v.substr(2)+"]").prop("checked","checked");
                       })
                   }else{
                       $("input[name='goods_val_name']").prop("checked","");
                   }

               }
           });
       })
    });
</script>
@endsection