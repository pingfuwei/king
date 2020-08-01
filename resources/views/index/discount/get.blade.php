@extends('index.persion.index')
@section('contents')


                <!--右侧主内容-->
                <div class="yui3-u-5-6">
                    <div class="body userAddress">
                        <div class="address-title">
                            <span class="title">优惠券管理</span>
                            {{--<a  href="{{url('index/address/add')}}"    class="sui-btn  btn-info add-new">添加新地址</a>--}}
                            <span class="clearfix"></span>
                        </div>
                        <div class="address-detail">
                            <table class="sui-table table-bordered">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>优惠券</th>
                                    <th>失效时间</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($data as $k=>$v)
                                    <tr>
                                        <td>{{$v->id}}</td>
                                        <td>{{$v->dis_name}}</td>
                                        <td>{{date('Y-m-d H:i:s',$v->timeout)}}</td>
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

@endsection