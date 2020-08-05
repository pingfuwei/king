@extends('index.persion.index')
@section('contents')
    <link rel="stylesheet" href="/index/asset/css/modallayer.min.css">
    <script src="https://cdn.bootcss.com/font-awesome/5.11.2/js/all.min.js"></script>
    <script src="/index/asset/js/modallayer-ie.min.js"></script>
            <!--右侧主内容-->
            <div class="yui3-u-5-6 order-pay">
                <div class="body">
                    {{--========================================积分代发货 id=scroe--}}
                    <div id="scroe" >
                    <div class="table-title">
                        <table class="sui-table  order-table">
                            <tr>
                                <thead>
                                <th width="35%">宝贝</th>
                                <th width="5%">积分</th>
                                <th width="5%">数量</th>
                                <th width="8%">商品操作</th>
                                <th width="10%">交易状态</th>
                                <th width="10%">交易操作</th>
                                </thead>
                            </tr>
                        </table>
                    </div>
                    <div class="order-detail">
                        <div class="orders">
                            @if(isset($data[0]))
                            <!--order2-->
                            @foreach($data as $k=>$v)
                                {{--{{$v}}--}}
                            <div class="choose-title">
                                <label data-toggle="checkbox" class="checkbox-pretty ">
                                    <input type="checkbox" checked="checked"><span>{{date("Y-m-d H:i:s",$v->addtime)}}　订单编号：{{$v->order}}  店铺：哇哈哈 <a>和我联系</a></span>
                                </label>
                                <a class="sui-btn btn-info share-btn">分享</a>
                            </div>
                            <table class="sui-table table-bordered order-datatable">
                                <tbody>
                                <tr>
                                    <td width="35%">
                                        <div class="typographic"><img src="{{env('UPLOADS_URL')}}{{$v->goods_id["goods_img"]}}" width="50px;" height="60px;"/>
                                            <a href="#" class="block-text">{{$v->goods_id["goods_name"]}}</a>
                                            <span class="guige">规格：温泉喷雾150ml</span>
                                        </div>
                                    </td>
                                    <td width="5%" class="center">
                                        <ul class="unstyled">
                                            {{--<li class="o-price">¥599.00</li>--}}
                                            <li>{{$v->scroe}}</li>
                                        </ul>
                                    </td>
                                    <td width="5%" class="center">1</td>
                                    <td width="8%" class="center">
                                        <ul class="unstyled">

                                            <li><a>退货/退款</a></li>
                                        </ul>
                                    </td>
                                    <td width="10%" class="center">
                                        <ul class="unstyled">
                                            <li>买家已付款</li>
                                            <li><a href="orderDetail.html" class="btn">订单详情 </a></li>
                                        </ul>
                                    </td>
                                    <td width="10%" class="center">
                                        <ul class="unstyled">
                                            @if(time()-$v->addtime>60*60*12)
                                            <li><a href="javascript:;" id="msg-button"  order="{{$v->order}}" goods_id="{{$v->goods_id["goods_id"]}}" class="sui-btn btn-info sendScroe">提醒发货</a></li>
                                                @else
                                                商家正在备货请等待---
                                            @endif
                                        </ul>
                                    </td>
                                </tr>


                                </tbody>
                            </table>
                                @endforeach
                                <div class="choose-order">

                                    <div class="sui-pagination pagination-large top-pages">
                                        <ul>
                                            <li class="prev disabled"><a href="#">«上一页</a></li>
                                            <li class="active"><a href="#">1</a></li>
                                            <li><a href="#">2</a></li>
                                            <li><a href="#">3</a></li>
                                            <li class="dotted"><span>...</span></li>
                                            <li class="next"><a href="#">下一页»</a></li>
                                        </ul>
                                        <div><span>共10页&nbsp;</span><span>
                                            到
                                            <input type="text" class="page-num"><button class="page-confirm" onclick="alert(1)">确定</button>
                                            页</span></div>
                                    </div>
                                </div>
                            @else
                                <h2>暂无宝贝</h2>
                            @endif
                        </div>

                        <div class="clearfix"></div>
                    </div>
                    </div>
                    {{--========================================积分代发货 id=scroe--}}
                    {{--=======================================金钱代发货--}}、
                    <div  >
                        <div class="table-title">
                            <table class="sui-table  order-table">
                                <tr>
                                    <thead>
                                    <th width="35%">宝贝</th>
                                    <th width="5%">金钱</th>
                                    <th width="5%">数量</th>
                                    <th width="8%">商品操作</th>
                                    <th width="10%">交易状态</th>
                                    <th width="10%">交易操作</th>
                                    </thead>
                                </tr>
                            </table>
                        </div>
                        <div class="order-detail">
                            <div class="orders">
                            @if(isset($monData[0]))
                                <!--order2-->
                                    @foreach($monData as $k=>$v)
                                        {{--{{$v}}--}}
                                        <div class="choose-title">
                                            <label data-toggle="checkbox" class="checkbox-pretty ">
                                                <input type="checkbox" checked="checked"><span>2017-02-11 11:59　订单编号：{{$v['order']}}  店铺：哇哈哈 <a>和我联系</a></span>
                                            </label>
                                            <a class="sui-btn btn-info share-btn">分享</a>
                                        </div>
                                        <table class="sui-table table-bordered order-datatable">
                                            <tbody>
                                            <tr>
                                                <td width="35%">
                                                    <div class="typographic"><img src="{{env('UPLOADS_URL')}}{{$v["goods_img"]}}" width="50px;" height="60px;"/>
                                                        <a href="#" class="block-text">{{$v["goods_name"]}}</a>
                                                        <span class="guige">规格：温泉喷雾150ml</span>
                                                    </div>
                                                </td>
                                                <td width="5%" class="center">
                                                    <ul class="unstyled">
                                                        <li>¥{{$v["goods_price"]}}</li>
                                                        <li><span>赠送积分</span>{{$v['goods_score']}}</li>
                                                    </ul>
                                                </td>
                                                <td width="5%" class="center">{{$v['buy_number']}}</td>
                                                <td width="8%" class="center">
                                                    <ul class="unstyled">

                                                        <li><a>退货/退款</a></li>
                                                    </ul>
                                                </td>
                                                <td width="10%" class="center">
                                                    <ul class="unstyled">
                                                        <li>买家未付款</li>
                                                        <li><a href="orderDetail.html" class="btn">订单详情 </a></li>
                                                    </ul>
                                                </td>
                                                <td width="10%" class="center">
                                                    <ul class="unstyled">
                                                        @if(time()-$v['addtime']>60*60*12)
                                                            <li><a href="javascript:;" id="msg-button"   order="{{$v['order']}}" goods_id="{{$v["goods_id"]}}" class="sui-btn btn-info sendMone">提醒发货</a></li>
                                                        @else
                                                            商家正在备货请等待---
                                                        @endif
                                                    </ul>
                                                </td>
                                            </tr>


                                            </tbody>
                                        </table>
                                    @endforeach
                                    @if($countAll>=3)
                                        <div class="choose-order">

                                            <div class="sui-pagination pagination-large top-pages">
                                                <ul>
                                                    {{--class="active"--}}
                                                    <li class="next"><a href="/index/persion/Consignment?page=1">«首页</a></li>
                                                    @for($i=1;$i<=$count;$i++)
                                                        <li ><a href="/index/persion/Consignment?page=<?php echo $i;  ?>"><?php echo $i;  ?></a></li>
                                                    @endfor
                                                    <li class="next"><a href="/index/persion/Consignment?page={{$count}}">尾页»</a></li>
                                                </ul>
                                                <div><span>共10页&nbsp;</span><span>
                                            到
                                            <input type="text" class="page-num"><button class="page-confirm" onclick="alert(1)">确定</button>
                                            页</span></div>
                                            </div>
                                        </div>
                                        @endif
                                @else
                                    <h2>暂无宝贝</h2>
                                @endif
                            </div>


                            <div class="clearfix"></div>
                        </div>
                    </div>
                    {{--=======================================金钱代发货--}}

                    <div class="like-title">
                        <div class="mt">
                            <span class="fl"><strong>热卖单品</strong></span>
                        </div>
                    </div>
                    <div class="like-list">
                        <ul class="yui3-g">
                            <li class="yui3-u-1-4">
                                <div class="list-wrap">
                                    <div class="p-img">
                                        <img src="/index/img/_/itemlike01.png" />
                                    </div>
                                    <div class="attr">
                                        <em>DELL戴尔Ins 15MR-7528SS 15英寸 银色 笔记本</em>
                                    </div>
                                    <div class="price">
                                        <strong>
                                            <em>¥</em>
                                            <i>3699.00</i>
                                        </strong>
                                    </div>
                                    <div class="commit">
                                        <i class="command">已有6人评价</i>
                                    </div>
                                </div>
                            </li>
                            <li class="yui3-u-1-4">
                                <div class="list-wrap">
                                    <div class="p-img">
                                        <img src="/index/img/_/itemlike02.png" />
                                    </div>
                                    <div class="attr">
                                        <em>Apple苹果iPhone 6s/6s Plus 16G 64G 128G</em>
                                    </div>
                                    <div class="price">
                                        <strong>
                                            <em>¥</em>
                                            <i>4388.00</i>
                                        </strong>
                                    </div>
                                    <div class="commit">
                                        <i class="command">已有700人评价</i>
                                    </div>
                                </div>
                            </li>
                            <li class="yui3-u-1-4">
                                <div class="list-wrap">
                                    <div class="p-img">
                                        <img src="/index/img/_/itemlike03.png" />
                                    </div>
                                    <div class="attr">
                                        <em>DELL戴尔Ins 15MR-7528SS 15英寸 银色 笔记本</em>
                                    </div>
                                    <div class="price">
                                        <strong>
                                            <em>¥</em>
                                            <i>4088.00</i>
                                        </strong>
                                    </div>
                                    <div class="commit">
                                        <i class="command">已有700人评价</i>
                                    </div>
                                </div>
                            </li>
                            <li class="yui3-u-1-4">
                                <div class="list-wrap">
                                    <div class="p-img">
                                        <img src="/index/img/_/itemlike04.png" />
                                    </div>
                                    <div class="attr">
                                        <em>DELL戴尔Ins 15MR-7528SS 15英寸 银色 笔记本</em>
                                    </div>
                                    <div class="price">
                                        <strong>
                                            <em>¥</em>
                                            <i>4088.00</i>
                                        </strong>
                                    </div>
                                    <div class="commit">
                                        <i class="command">已有700人评价</i>
                                    </div>
                                </div>
                            </li>

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
            <script type="text/javascript" src="/index/js/plugins/jquery/jquery.min.js"></script>

            <script>
                $(function () {
                    $(document).on("click",".sendScroe",function () {
                        var goods_id=$(this).attr("goods_id")
                        var order=$(this).attr("order")
//                        alert(goods_id)
                        $.ajax({
                            url:"/index/persion/urgeScore",
                            data:{order:order,goods_id:goods_id},
                            success:function (res) {
                                if(res==="ok"){
//                                    alert("提醒成功---商家会尽快发货亲😙")
                                    let option = {
                                        popupTime: 2,
                                        hook: {
                                            initStart: function () {
                                                // 检查之前老旧实例如果存在则销毁
                                                if (document.querySelector('#modal-layer-container'))
                                                    ModalLayer.removeAll();
                                            }
                                        },
                                        displayProgressBar: true,
                                        displayProgressBarPos: 'top',
                                        displayProgressBarColor: 'green',
                                        content: '<i class="fas fa-check" style="color: green"></i>提醒成功---商家会尽快发货亲😙!',
                                    };

                                    ModalLayer.msg(option);
                                }else{
//                                    alert(res)
                                    let option = {
                                        popupTime: 2,
                                        hook: {
                                            initStart: function () {
                                                // 检查之前老旧实例如果存在则销毁
                                                if (document.querySelector('#modal-layer-container'))
                                                    ModalLayer.removeAll();
                                            }
                                        },
                                        displayProgressBar: true,
                                        displayProgressBarPos: 'top',
                                        displayProgressBarColor: 'red',
                                        content: '<i style="color: deepskyblue"></i>'+res+'!',
                                    };

                                    ModalLayer.msg(option);
                                }
                            }
                        })
                    })
                    $(document).on("click",".sendMone",function () {
//                        var goods_id=$(this).attr("goods_id")
                        var order=$(this).attr("order")
//                        alert(goods_id)
                        $.ajax({
                            url:"/index/persion/sendMone",
                            data:{order:order},
                            success:function (res) {
                                if(res==="ok"){
//                                    alert("提醒成功---商家会尽快发货亲😙")
                                    let option = {
                                        popupTime: 2,
                                        hook: {
                                            initStart: function () {
                                                // 检查之前老旧实例如果存在则销毁
                                                if (document.querySelector('#modal-layer-container'))
                                                    ModalLayer.removeAll();
                                            }
                                        },
                                        displayProgressBar: true,
                                        displayProgressBarPos: 'top',
                                        displayProgressBarColor: 'green',
                                        content: '<i class="fas fa-check" style="color: green"></i>提醒成功---商家会尽快发货亲😙!',
                                    };

                                    ModalLayer.msg(option);
                                }else{
//                                    alert(res)
                                    let option = {
                                        popupTime: 2,
                                        hook: {
                                            initStart: function () {
                                                // 检查之前老旧实例如果存在则销毁
                                                if (document.querySelector('#modal-layer-container'))
                                                    ModalLayer.removeAll();
                                            }
                                        },
                                        displayProgressBar: true,
                                        displayProgressBarPos: 'top',
                                        displayProgressBarColor: 'red',
                                        content: '<i style="color: deepskyblue"></i>'+res+'!',
                                    };

                                    ModalLayer.msg(option);
                                }
                            }
                        })
                    })
                })
            </script>
@endsection