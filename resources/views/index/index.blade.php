@extends('layout.index')
@section('content')
<!--列表-->
<script type="text/javascript" src="/index/js/plugins/jquery/jquery.min.js"></script>
<div class="sort">
    <div class="py-container">
        <div class="yui3-g SortList ">{{--伸缩特效--}}
            <div class="yui3-u Left all-sort-list">
                <div class="all-sort-list2">
                    @foreach ($ret as $value)
                    <div class="item">
                        <h3><a href="index/cate/list?cate_id={{$value['cate_id']}}">
                                {{$value['cate_name']}}
                        </a></h3>
                        <div class="item-list clearfix">
                            <div class="subitem">
                                @foreach ($value['son'] as $v)
                                <dl class="fore1">
                                    <dt><a href="index/cate/list?cate_id={{$v['cate_id']}}">{{$v['cate_name']}}</a></dt>
                                    <dd>
                                        @foreach ($v['son'] as $j)
                                        <em><a href="index/cate/list?cate_id={{$j['cate_id']}}">{{$j['cate_name']}}</a></em>
                                        @endforeach
                                    </dd>
                                </dl>
                                @endforeach
                       
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="yui3-u Center banerArea">
                <!--banner轮播-->
                <div id="myCarousel" data-ride="carousel" data-interval="4000" class="sui-carousel slide">
                    <ol class="carousel-indicators">
                        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                        <li data-target="#myCarousel" data-slide-to="1"></li>
                        <li data-target="#myCarousel" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="active item">
                            <a href="/index/score/list">
                                <img src="/index/img/jfhg.jpg" />
                            </a>

                        </div>
                    </div><a href="#myCarousel" data-slide="prev" class="carousel-control left">‹</a><a href="#myCarousel" data-slide="next" class="carousel-control right">›</a>
                </div>
            </div>
            <div class="yui3-u Right">
                <div class="news">
                    <h4><em class="fl">品优购快报</em><span class="fr tip">更多 ></span></h4>
                    <div class="clearix"></div>
                    <ul class="news-list unstyled">
                        @foreach($res as $k=>$v)
                        <li n_id="{{$v->n_id}}">
                            <a href="{{url('/index/news/one/'.$v->n_id)}}" class="addnews"><span class="bold">[{{$v->notice}}]</span>{{mb_substr($v->title,0,15)}}</a>
                        </li>
                        @endforeach
                    </ul>
                </div>
                <ul class="yui3-g Lifeservice">
                    <li class="yui3-u-1-4 life-item tab-item">
                        <i class="list-item list-item-1"></i>
                        <span class="service-intro">话费</span>
                    </li>
                    <li class="yui3-u-1-4 life-item tab-item">
                        <i class="list-item list-item-2"></i>
                        <span class="service-intro">机票</span>
                    </li>
                    <li class="yui3-u-1-4 life-item tab-item">
                        <i class="list-item list-item-3"></i>
                        <span class="service-intro">电影票</span>
                    </li>
                    <li class="yui3-u-1-4 life-item tab-item">
                        <i class="list-item list-item-4"></i>
                        <span class="service-intro">游戏</span>
                    </li>
                    <li class="yui3-u-1-4 life-item notab-item">
                        <i class="list-item list-item-5"></i>
                        <span class="service-intro">彩票</span>
                    </li>
                    <li class="yui3-u-1-4 life-item notab-item">
                        <i class="list-item list-item-6"></i>
                        <span class="service-intro">加油站</span>
                    </li>
                    <li class="yui3-u-1-4 life-item notab-item">
                        <i class="list-item list-item-7"></i>
                        <span class="service-intro">酒店</span>
                    </li>
                    <li class="yui3-u-1-4 life-item notab-item">
                        <i class="list-item list-item-8"></i>
                        <span class="service-intro">火车票</span>
                    </li>
                    <li class="yui3-u-1-4 life-item  notab-item">
                        <i class="list-item list-item-9"></i>
                        <span class="service-intro">众筹</span>
                    </li>
                    <li class="yui3-u-1-4 life-item notab-item">
                        <i class="list-item list-item-10"></i>
                        <span class="service-intro">理财</span>
                    </li>
                    <li class="yui3-u-1-4 life-item notab-item">
                        <i class="list-item list-item-11"></i>
                        <span class="service-intro">礼品卡</span>
                    </li>
                    <li class="yui3-u-1-4 life-item notab-item">
                        <i class="list-item list-item-12"></i>
                        <span class="service-intro">白条</span>
                    </li>
                </ul>
                <div class="life-item-content">
                    <div class="life-detail">
                        <i class="close">关闭</i>
                        <p>话费充值</p>
                        <form action="" class="sui-form form-horizontal">
                            号码：<input type="text" id="inputphoneNumber" placeholder="输入你的号码" />
                        </form>
                        <button class="sui-btn btn-danger">快速充值</button>
                    </div>
                    <div class="life-detail">
                        <i class="close">关闭</i> 机票
                    </div>
                    <div class="life-detail">
                        <i class="close">关闭</i> 电影票
                    </div>
                    <div class="life-detail">
                        <i class="close">关闭</i> 游戏
                    </div>
                </div>
                <div class="ads">
                    <img src="/index/img/ad1.png" />
                </div>
            </div>
        </div>
    </div>
</div>
<!--推荐-->
<div class="show">
    <div class="py-container">
        <ul class="yui3-g Recommend">
            <li class="yui3-u-1-6  clock">
                <div class="time">
                    <img src="/index/img/clock.png" />
                    <h3>今日推荐</h3>
                </div>
            </li>
            @foreach($referInfo as $kk=>$vv)
            <li class="yui3-u-5-24" style="background: darkgray">
                <a href="index/goods/desc?goods_id={{$vv->goods_id}}" target="_blank"><img src="{{env("UPLOADS_URL")}}{{$vv->goods_img}}" width="120px;" /></a>
            </li>
            @endforeach
        </ul>
    </div>
</div>
<!--喜欢-->
<div class="like">
    <div class="py-container">
        <div class="title">
            <h3 class="fl">猜你喜欢</h3>
            <b class="border"></b>
            <a href="javascript:;" class="fr tip changeBnt" id="xxlChg"><i></i>换一换</a>
        </div>
        <div class="bd">
            <ul class="clearfix yui3-g Favourate picLB" id="picLBxxl">
                @foreach($like as $k=>$v)
                <li class="yui3-u-1-6">
                    <dl class="picDl huozhe">
                        <dd>
                            <a href="index/goods/desc?goods_id={{$v->goods_id}}" class="pic" goods_id="{{$v->goods_id}}"><img src="{{env("UPLOADS_URL")}}{{$v->goods_img}}" alt="" /></a>
                            <div class="like-text">
                                <p>{{substr($v->goods_name,0,9)}}...</p>
                                <h3>¥{{$v->goods_price}}</h3>
                            </div>
                        </dd>
                    </dl>
                </li>
                @endforeach
                {{--<li class="yui3-u-1-6">--}}
                    {{--<dl class="picDl jilu">--}}
                        {{--<dd>--}}
                            {{--<a href="" class="pic"><img src="/index/img/like_03.png" alt="" /></a>--}}
                            {{--<div class="like-text">--}}
                                {{--<p>爱仕达 30CM炒锅不粘锅NWG8330E电磁炉炒</p>--}}
                                {{--<h3>¥116.00</h3>--}}
                            {{--</div>--}}
                        {{--</dd>--}}
                        {{--<dd>--}}
                            {{--<a href="" class="pic"><img src="/index/img/like_02.png" alt="" /></a>--}}
                            {{--<div class="like-text">--}}
                                {{--<p>阳光美包新款单肩包女包时尚子母包四件套女</p>--}}
                                {{--<h3>¥116.00</h3>--}}
                            {{--</div>--}}
                        {{--</dd>--}}
                    {{--</dl>--}}
                {{--</li>--}}

            </ul>
        </div>
    </div>
</div>
<!--有趣-->
<div class="like">
    <div class="py-container">
        <div class="title">
            <h3 class="fl">最美女装</h3>
            <b class="border"></b>
            <a href="javascript:;" class="fr tip changeBnt" id="xxlChg"><i></i>换一换</a>
        </div>
        <div class="bd">
            <ul class="clearfix yui3-g Favourate picLB" id="picLBxxl">
                @foreach($nv_info as $k=>$v)
                    <li class="yui3-u-1-6">
                        <dl class="picDl huozhe">
                            <dd>
                                <a href="index/goods/desc?goods_id={{$v->goods_id}}" class="pic" goods_id="{{$v->goods_id}}"><img src="{{env("UPLOADS_URL")}}{{$v->goods_img}}" alt="" /></a>
                                <div class="like-text">
                                    <p>{{substr($v->goods_name,0,9)}}...</p>
                                    <h3>¥{{$v->goods_price}}</h3>
                                </div>
                            </dd>
                        </dl>
                    </li>
                @endforeach
                {{--<li class="yui3-u-1-6">--}}
                {{--<dl class="picDl jilu">--}}
                {{--<dd>--}}
                {{--<a href="" class="pic"><img src="/index/img/like_03.png" alt="" /></a>--}}
                {{--<div class="like-text">--}}
                {{--<p>爱仕达 30CM炒锅不粘锅NWG8330E电磁炉炒</p>--}}
                {{--<h3>¥116.00</h3>--}}
                {{--</div>--}}
                {{--</dd>--}}
                {{--<dd>--}}
                {{--<a href="" class="pic"><img src="/index/img/like_02.png" alt="" /></a>--}}
                {{--<div class="like-text">--}}
                {{--<p>阳光美包新款单肩包女包时尚子母包四件套女</p>--}}
                {{--<h3>¥116.00</h3>--}}
                {{--</div>--}}
                {{--</dd>--}}
                {{--</dl>--}}
                {{--</li>--}}

            </ul>
        </div>
    </div>
</div>
<!--楼层-->
<div class="like">
    <div class="py-container">
        <div class="title">
            <h3 class="fl">最帅男装</h3>
            <b class="border"></b>
            <a href="javascript:;" class="fr tip changeBnt" id="xxlChg"><i></i>换一换</a>
        </div>
        <div class="bd">
            <ul class="clearfix yui3-g Favourate picLB" id="picLBxxl">
                @foreach($na_info as $k=>$v)
                    <li class="yui3-u-1-6">
                        <dl class="picDl huozhe">
                            <dd>
                                <a href="index/goods/desc?goods_id={{$v->goods_id}}" class="pic" goods_id="{{$v->goods_id}}"><img src="{{env("UPLOADS_URL")}}{{$v->goods_img}}" alt="" /></a>
                                <div class="like-text">
                                    <p>{{substr($v->goods_name,0,9)}}...</p>
                                    <h3>¥{{$v->goods_price}}</h3>
                                </div>
                            </dd>
                        </dl>
                    </li>
                @endforeach
                {{--<li class="yui3-u-1-6">--}}
                {{--<dl class="picDl jilu">--}}
                {{--<dd>--}}
                {{--<a href="" class="pic"><img src="/index/img/like_03.png" alt="" /></a>--}}
                {{--<div class="like-text">--}}
                {{--<p>爱仕达 30CM炒锅不粘锅NWG8330E电磁炉炒</p>--}}
                {{--<h3>¥116.00</h3>--}}
                {{--</div>--}}
                {{--</dd>--}}
                {{--<dd>--}}
                {{--<a href="" class="pic"><img src="/index/img/like_02.png" alt="" /></a>--}}
                {{--<div class="like-text">--}}
                {{--<p>阳光美包新款单肩包女包时尚子母包四件套女</p>--}}
                {{--<h3>¥116.00</h3>--}}
                {{--</div>--}}
                {{--</dd>--}}
                {{--</dl>--}}
                {{--</li>--}}

            </ul>
        </div>
    </div>
</div>

<div class="like">
    <div class="py-container">
        <div class="title">
            <h3 class="fl">生鲜蔬果</h3>
            <b class="border"></b>
            <a href="javascript:;" class="fr tip changeBnt" id="xxlChg"><i></i>换一换</a>
        </div>
        <div class="bd">
            <ul class="clearfix yui3-g Favourate picLB" id="picLBxxl">
                @foreach($se_info as $k=>$v)
                    <li class="yui3-u-1-6">
                        <dl class="picDl huozhe">
                            <dd>
                                <a href="index/goods/desc?goods_id={{$v->goods_id}}" class="pic" goods_id="{{$v->goods_id}}"><img src="{{env("UPLOADS_URL")}}{{$v->goods_img}}" alt="" /></a>
                                <div class="like-text">
                                    <p>{{substr($v->goods_name,0,9)}}...</p>
                                    <h3>¥{{$v->goods_price}}</h3>
                                </div>
                            </dd>
                        </dl>
                    </li>
                @endforeach
                {{--<li class="yui3-u-1-6">--}}
                {{--<dl class="picDl jilu">--}}
                {{--<dd>--}}
                {{--<a href="" class="pic"><img src="/index/img/like_03.png" alt="" /></a>--}}
                {{--<div class="like-text">--}}
                {{--<p>爱仕达 30CM炒锅不粘锅NWG8330E电磁炉炒</p>--}}
                {{--<h3>¥116.00</h3>--}}
                {{--</div>--}}
                {{--</dd>--}}
                {{--<dd>--}}
                {{--<a href="" class="pic"><img src="/index/img/like_02.png" alt="" /></a>--}}
                {{--<div class="like-text">--}}
                {{--<p>阳光美包新款单肩包女包时尚子母包四件套女</p>--}}
                {{--<h3>¥116.00</h3>--}}
                {{--</div>--}}
                {{--</dd>--}}
                {{--</dl>--}}
                {{--</li>--}}

            </ul>
        </div>
    </div>
</div>
<!-- <script>
var me = new Vue({
    el:"#a",
    data:{
      top:null,
    },
    mounted(){
        var _this=this;
        var data={};            
        var url="/index/cate/top"
          axios.post(url,data).then(function (msg){
            console.log(msg);return;
            _this.top=msg.data;
          });
    },
    methods:{
    }    
 });  
</script> -->
@endsection
