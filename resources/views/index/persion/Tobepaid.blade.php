@extends('index.persion.index')
@section('contents')
    <!--右侧主内容-->
    <div class="yui3-u-5-6 order-pay">
        <div class="body">
            {{--========================================积分代付款 id=scroe--}}
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
                                    <input type="checkbox" checked="checked"><span>2017-02-11 11:59　订单编号：{{$v->order}}  店铺：哇哈哈 <a>和我联系</a></span>
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
                                            <li>买家未付款</li>
                                            <li><a href="orderDetail.html" class="btn">订单详情 </a></li>
                                        </ul>
                                    </td>
                                    <td width="10%" class="center">
                                        <ul class="unstyled">
                                            <li><a href="http://www.king.com/index/score/settlement?goods_id={{$v->goods_id['goods_id']}}"  class="sui-btn btn-info">立即兑换</a></li>
                                        </ul>
                                    </td>
                                </tr>


                                </tbody>
                            </table>
                        @endforeach

                    </div>
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
                    <div class="clearfix"></div>
                </div>
            </div>
            {{--========================================积分代付款 id=scroe--}}
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
@endsection