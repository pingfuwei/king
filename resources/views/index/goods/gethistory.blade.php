@extends('index.persion.index')
@section('contents')
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=9; IE=8; IE=7; IE=EDGE">
        <meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
        <title>我的收藏</title>
        <link rel="icon" href="/index/img/favicon.ico">

        <link rel="stylesheet" type="text/css" href="/index/css/webbase.css" />
        <link rel="stylesheet" type="text/css" href="/index/pages-seckillOrder.css" />
    </head>

    <!--右侧主内容-->
            <div class="yui3-u-5-6 goods">
                <div class="body">
                    <h4>全部足迹 {{$num}}</h4>
                    <div class="goods-list">
                        <ul class="yui3-g" id="goods-list">
                            @foreach($data as $k=>$v)
                            <li class="yui3-u-1-4">
                                <div class="list-wrap">
                                    <div class="p-img"><a href="/index/goods/desc?goods_id={{$v->goods_id}}"><img src="{{env("UPLOADS_URL")}}{{$v->goods_img}}" alt='' style="width:200px; height:250px;"></a></div>
                                    <div class="price"><strong><em>¥</em> <i>{{$v->goods_price}}</i></strong></div>
                                    <div class="attr"><em>{{substr($v->goods_name,0,9)}}...</em></div>
                                    <div class="cu"><em><span>促</span>满一件可参加超值换购</em></div>
                                    {{--<div class="operate">--}}
                                        <a href="javascript:void(0);" target="_blank" class="sui-btn btn-bordered btn-danger">加入购物车</a>
                                        <a href="javascript:void(0);" class="sui-btn btn-bordered">对比</a>
                                        <a href="javascript:void(0);" class="sui-btn btn-bordered">降价通知</a>
                                    {{--</div>--}}
                                </div>
                            </li >
                            @endforeach
                        </ul>
                    </div>


                    <!--猜你喜欢-->
                    <div class="like-title">
                        <div class="mt">
                            <span class="fl"><strong>猜你喜欢</strong></span>
                        </div>
                    </div>
                    <div class="like-list">
                        <ul class="yui3-g">
                            @foreach($like as $k=>$v)
                            <li class="yui3-u-1-4">
                                <div class="list-wrap">
                                    <div class="p-img">
                                        <img src="{{env("UPLOADS_URL")}}{{$v->goods_img}}" style="width:200px; height:250px;"/>
                                    </div>
                                    <div class="attr">
                                        <em>{{substr($v->goods_name,0,9)}}...</em>
                                    </div>
                                    <div class="price">
                                        <strong>
                                            <em>¥</em>
                                            <i>{{$v->goods_price}}</i>
                                        </strong>
                                    </div>
                                    <div class="commit">
                                        <i class="command">已有6人评价</i>
                                    </div>
                                </div>
                            </li>
                           @endforeach

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- 底部栏位 -->
@endsection
