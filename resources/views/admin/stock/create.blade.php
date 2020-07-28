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
                        <div class="col-md-2 title" >商品</div>

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
                        <div id="hid" style="display: none">{{--头部--}}

                        </div>{{--尾部--}}

            </div>
            <div class="btn-toolbar list-toolbar" >
                <button class="btn btn-success" id="btn" ng-click="setEditorValue();save();"><i class="fa fa-save"></i>确定</button>

                <a id="list" data-toggle="modal" class="btn btn-danger">查看列表</a>
            </div>
            <div class="modal-content" hidden>
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">库存</button>
                    <h3 id="myModalLabel">库存添加</h3>
                </div>
                <div class="modal-body">
                    <table class="table table-bordered table-striped"   width="800px">
                        <tr id="shop_box">
                            <td>商品</td>
                            <td>属性</td>
                            <td>库存</td>
                            <td>价格</td>
                            <td>操作</td>
                        </tr>
                    </table>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-success" id="ti" data-dismiss="modal" aria-hidden="true">保存</button>
                    <button class="btn btn-default" id="yin" data-dismiss="modal" aria-hidden="true">关闭</button>
                </div>

                <button class="btn btn-primary" id="btn" ng-click="setEditorValue();save();"><i class="fa fa-save"></i>添加</button>
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
           goods_id=$("#goods_id option:selected").val();
           var str="";
           var arr=[]
           $("input[name='goods_val_name']:checked").each(function() {
               if(arr.length===0){
                   arr[$(this).attr("attr_id")]=$(this).val()+","
               }else{
                   if(arr[$(this).attr("attr_id")]===undefined){
                       arr[$(this).attr("attr_id")]=$(this).val()+","
                   }else{
                       arr[$(this).attr("attr_id")]+=$(this).val()+","
                   }
               }
           });
           var date={goods_id:goods_id,ability:arr}
           $.ajax({
               url:"/admin/stock/createDo",
               data:date,
               dataType:"json",
               success:function (msg) {
                   alert(123);
                   //console.log(msg);return
                  goods_name =msg.msg;
                   var html ="";
                   $.each(msg.data,function(k,v){
                       //console.log(v.ability);
                    html +="<tr> "+
                        "<td name='goods' goods_id="+goods_id+">"+goods_name+"</td> " +
                        "<td name= 'sx' sx_id="+v.id.slice(0,v.id.length-1)+">"+v.ability+"</td> " +
                        "<td><input type='text' name='num' id='num' value=''></td> " +
                        "<td><input type='text' name='price' id='price' value=''> </td> "+
                        "<td><input type='button' class='btn btn-primary but btn-success' value='确认' disabled> </td></tr> "
                   })
                   $("#shop_box").after(html);
                   $(".modal-content").show();
               }
           })
       });
       $(document).on("click","#yin",function(){
           $(".modal-content").hide();
       });

       $(document).on("click","#ti",function () {

       })
        var num=""
        var price=""
        var all=""
        $(document).on("focus","#num",function () {//获取焦点
            $(".but").attr("disabled","false")
            $(this).parent().next().next().children().removeAttr("disabled")
        })
        $(document).on("focus","#price",function () {//获取焦点
            $(".but").attr("disabled","false")
            $(this).parent().next().children().removeAttr("disabled")
        })
        $(document).on("blur","#num",function () {
            num=$(this).val()
        })
        $(document).on("blur","#price",function () {

            price=$(this).val()
        })
        var str=""
        $(document).on("click",".but",function () {
            var ability = $(this).parent().prev().prev().prev().attr('sx_id');
            alert(num)
            if(num==="" || price===""){
                alert("操作有误")
                return
            }
            all=+num+"@"+price+"@"+ability+"|";
            str+=all
            console.log(str);return false;
            num=""
            price=""
        })
        $(document).on("click","#ti",function(){
            var data={}
            var goods_id = $("td[name='goods']").attr('goods_id');
            str =str.slice(0,str.length-1)
            data.ability=str;
            data.goods_id = goods_id;
            $.ajax({
                url:"upd",
                type:'get',
                dataType:'json',
                data:data,
                success:function(msg){
                    console.log(msg);
                }
            })
        });
       $(document).on("click","#list",function(){
           location.href="index";
       })
    });
</script>
@endsection