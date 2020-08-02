@extends('index.persion.index')
 @section('contents')
        <!--右侧主内容-->
            <div class="yui3-u-5-6">
                <div class="body userInfo">
                    <ul class="sui-nav nav-tabs nav-large nav-primary ">
                        <li class="active"><a href="#one" data-toggle="tab">基本资料</a></li>
                    </ul>
                    <div class="tab-content ">
                        <div id="one" class=" active">
                            <form  class="sui-form form-horizontal" action="{{url('index/persion/info')}}">
                                <div class="control-group">
                                    <label for="inputName" class="control-label">昵称：</label>
                                    <div class="controls">
                                        <input type="text" id="inputName" class="user_name" name="user_name" value="{{session("user_name")}}" placeholder="昵称">
                                    <font color="red">！注意：修改用户名下次就要重新登录</font>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label for="inputGender" class="control-label">性别：</label>

                                            <input type="radio" name="sex" value="1"  {{$data->sex=="1" ? "checked" : ""}}><span>男</span>
                                            <input type="radio" name="sex" value="2"  {{$data->sex=="2" ? "checked" : ""}}><span>女</span>
                                </div>
                                <div class="control-group">
                                    <label for="inputName" class="control-label">电话：</label>
                                    <div class="controls">
                                        <input type="text" id="inputName" class="tel" name="tel" placeholder="手机号" value="{{$data->tel}}">
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label for="inputPassword" class="control-label">所在地：</label>



                                                <select class="form-control" id="province" name="province">

                                                    <option>请选择</option>
                                                    @foreach($province as $k=>$v)
                                                        <option value="{{$v['id']}}" {{$data["province"]==$v['id'] ? "selected" : ""}} >{{$v['name']}}</option>
                                                    @endforeach
                                                </select>
                                                <select class="form-control" id="city"   name="city" >
                                                    <option>请选择</option>
                                                    @foreach($city as $k=>$v)
                                                        <option value="{{$v['id']}}" {{$data["city"]==$v['id'] ? "selected" : ""}}>{{$v['name']}}</option>
                                                    @endforeach
                                                </select>
                                                <select class="form-control" id="qu"  name="area" >
                                                    <option>请选择</option>
                                                    @foreach($area as $k=>$v)
                                                        <option value="{{$v['id']}}" {{$data["area"]==$v['id'] ? "selected" : ""}}>{{$v['name']}}</option>
                                                    @endforeach
                                                </select>
                                </div>
                                <div class="control-group">
                                    <label for="sanwei" class="control-label"></label>
                                    <div class="controls">
                                        <button  class="sui-btn btn-primary btn button">修改</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div id="two" class="tab-pane">

                            <div class="new-photo">
                                <p>当前头像：</p>
                                <div class="upload">
                                    <img id="imgShow_WU_FILE_0" width="100" height="100" src="/index/img/_/photo_icon.png" alt="">
                                    <input type="file" id="up_img_WU_FILE_0">
                                </div>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<script src="/layui/bootstrap.min.js"></script>
<script src="/js/jquery.min.js"></script>
<script>
        $(document).on('change','select',function(){
//            alert(123);
            var id=$(this).val();
            var obj=$(this);
//            alert(id);
            obj.nextAll('select').html("<option value=''>请选择...</option>");
            $.get(
                    "{{url('/index/persion/area')}}/"+id,
                    function(res){
//                        console.log(res);
                       if(res.code=='00000'){
//                          console.log(1);return;

                           var str='<option>请选择</option>';
                           $.each(res.data,function(i,k){
                               str+='<option value='+ k.id+'>'+ k.name+'</option>';
                           });
                           obj.next('select').html(str);
                       }
                    },
            'json'
            )
        })


</script>
{{--<script>--}}
    {{--$(".btn").click(function(){--}}
        {{--var name=$(".name").val();--}}
        {{--console.log(name);--}}
    {{--})--}}
{{--</script>--}}
@endsection