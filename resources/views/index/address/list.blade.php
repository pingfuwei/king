@extends('index.persion.index')
@section('contents')
        <!--右侧主内容-->
                <div class="yui3-u-5-6">
                    <div class="body userAddress">
                        <div class="address-title">
                            <span class="title">地址管理</span>
                            <a  href="{{url('index/address/add')}}"    class="sui-btn  btn-info add-new">添加新地址</a>
                            <span class="clearfix"></span>
                        </div>
                        <div class="address-detail">
                            <table class="sui-table table-bordered">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>姓名</th>
                                    <th>地址</th>
                                    <th>联系电话</th>
                                    <th>操作</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($data as $k=>$v)
                                <tr>
                                    <td>{{$v->address_id}}</td>
                                    <td>{{$v->address_name}}</td>
                                    <td>{{$v->province}}{{$v->city}}{{$v->area}}{{$v->detail}}</td>
                                    <td>{{$v->tel}}</td>
                                    <td>
                                        <a href="{{url('index/address/upd',$v->address_id)}}">编辑</a>
                                        <a href="{{url('index/address/del',$v->address_id)}}">删除</a>
                                        {{--{{$v->status=="0" ? "<a href='{{url('index/address/is_no',$v->address_id)}}'>'设为默认'</a>" : <b>默认地址</b>}}--}}
                                            <a href="{{url('index/address/is_no',$v->address_id)}}">{{$v->status=="0" ? "设为默认" : "默认地址"}}</a>

                                    </td>
                                </tr>
                                    @endforeach


                                </tbody>
                            </table>
                        </div>
            </div>
        </div>
    </div>
    <script src="/js/jquery.min.js"></script>
    <script>
        $(document).on('change','select',function(){
//            alert(123);
            var id=$(this).val();
            var obj=$(this);
//            alert(id);
            obj.nextAll('select').html("<option value=''>请选择...</option>");
            $.get(
                    "{{url('/index/persion/area')}}",
                    {'id':id},
                    function(res){
//                        console.log(res);
                        if(res.code=='00000'){
                            console.log(1);
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