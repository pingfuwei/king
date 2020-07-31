@extends('layout.index')
@section('content')
    <script type="text/javascript" src="/index/js/plugins/jquery/jquery.min.js"></script>
    <div class="py-container">
        <div id="item">
            {{--<div class="crumb-wrap">--}}
                {{--<ul class="sui-breadcrumb">--}}
                    {{--<li>--}}
                        {{--<a href="#">手机、数码、通讯</a>--}}
                    {{--</li>--}}
                    {{--<li>--}}
                        {{--<a href="#">手机</a>--}}
                    {{--</li>--}}
                    {{--<li>--}}
                        {{--<a href="#">Apple苹果</a>--}}
                    {{--</li>--}}
                    {{--<li class="active">iphone 6S系类</li>--}}
                {{--</ul>--}}
            {{--</div>--}}
            <!--product-info-->
                {{--@foreach($goods as $v)--}}
            <div class="product-info">
                <div class="fl preview-wrap">
                    <!--放大镜效果-->
                    <div class="zoom">
                        <!--默认第一个预览-->
                        <div id="preview" class="spec-preview">
                            <span class="jqzoom"><img jqimg="{{env('UPLOADS_URL')}}{{$goods['goods_img']}}" src="{{env('UPLOADS_URL')}}{{$goods['goods_img']}}" width="400px;"height="200px;"/></span>
                        </div>
                        <!--下方的缩略图-->
                        <div class="spec-scroll">
                            <a class="prev">&lt;</a>
                            <!--左右按钮-->
                            <div class="items">
                                <ul>
                                    @php $goods["goods_imgs"] = explode("|",$goods["goods_imgs"]); @endphp
                                    @foreach($goods["goods_imgs"] as $v)
                                    <li><img src={{env('UPLOADS_URL')}}{{$v}} bimg="{{env('UPLOADS_URL')}}{{$v}}" onmousemove="preview(this)" /></li>
                                    @endforeach
                                    {{--<li><img src="/index/img/_/s2.png" bimg="/index/img/_/b2.png" onmousemove="preview(this)" /></li>--}}
                                    {{--<li><img src="/index/img/_/s3.png" bimg="/index/img/_/b3.png" onmousemove="preview(this)" /></li>--}}
                                    {{--<li><img src="/index/img/_/s1.png" bimg="/index/img/_/b1.png" onmousemove="preview(this)" /></li>--}}
                                    {{--<li><img src="/index/img/_/s2.png" bimg="/index/img/_/b2.png" onmousemove="preview(this)" /></li>--}}
                                    {{--<li><img src="/index/img/_/s3.png" bimg="/index/img/_/b3.png" onmousemove="preview(this)" /></li>--}}
                                    {{--<li><img src="/index/img/_/s1.png" bimg="/index/img/_/b1.png" onmousemove="preview(this)" /></li>--}}
                                    {{--<li><img src="/index/img/_/s2.png" bimg="/index/img/_/b2.png" onmousemove="preview(this)" /></li>--}}
                                    {{--<li><img src="/index/img/_/s3.png" bimg="/index/img/_/b3.png" onmousemove="preview(this)" /></li>--}}
                                </ul>
                            </div>
                            <a class="next">&gt;</a>
                        </div>
                    </div>
                </div>
                <div class="fr itemInfo-wrap">
                    <div class="sku-name">
                        <h4>{{$goods["goods_name"]}}</h4>
                    </div>
                    <div class="news"><span>推荐选择下方[移动优惠购],手机套餐齐搞定,不用换号,每月还有花费返</span></div>
                    <div class="summary">
                        <div class="summary-wrap">
                            <div class="fl title">
                                <i>积分</i>
                            </div>
                            <div class="fl price" style="margin-top: 11px;">
                                <em id="price">{{$goods["goods_price"]*2}}</em>
                            </div>
                            <div class="fr remark">
                                <i>累计评价</i><em>612188</em>
                            </div>
                        </div>
                        <div class="summary-wrap">
                            <div class="fl title">
                                <i>促　　销</i>
                            </div>
                            <div class="fl fix-width">
                                <i class="red-bg">加价购</i>
                                <em class="t-gray">满999.00另加20.00元，或满1999.00另加30.00元，或满2999.00另加40.00元，即可在购物车换
                                    购热销商品</em>
                            </div>
                        </div>
                    </div>
                    <div class="support">
                        <div class="summary-wrap">
                            <div class="fl title">
                                <i>支　　持</i>
                            </div>
                            <div class="fl fix-width">
                                <em class="t-gray">以旧换新，闲置手机回收  4G套餐超值抢  礼品购</em>
                            </div>
                        </div>
                        <div class="summary-wrap">
                            <div class="fl title">
                                <i>配 送 至</i>
                            </div>
                            <div class="fl fix-width">
                                <em class="t-gray">满999.00另加20.00元，或满1999.00另加30.00元，或满2999.00另加40.00元，即可在购物车换购热销商品</em>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix choose">
                        <div id="specification" class="summary-wrap clearfix">
                            <input type="hidden" count="{{count($arr)}}" id="count">
                            @foreach($arr as $k=>$v)
                            <dl>
                                <dt>
                                <div class="fl title">
                                    @foreach($goodsAttr as $key=>$val)
                                    <i>
                                        @if($val->attr_id===$k)
                                            {{$val->attr_name}}
                                        @endif
                                    </i>
                                        @endforeach
                                </div>
                                </dt>
                                @foreach($v as $kk=>$vv)
                                <dd style="margin-top: 15px;">
                                    <a href="javascript:;" attr_val="{{$kk}}" class="at">
                                        {{$vv}}
                                        <input type="checkbox" id="che" attrr="{{$k}}" attr_val="{{$kk}}" style="display: none;">
                                    </a>
                                    {{--class="selected"--}}
                                </dd>
                                    @endforeach
                            </dl>
                                @endforeach
                        </div>


                        <div class="summary-wrap">
                            <div class="fl title">
                                <div class="control-group">

                                </div>
                            </div>
                            <div class="fl" style="margin-top: 31px;">
                                <ul class="btn-choose unstyled">
                                    <li>
                                        <a href="javascript:;"  class="sui-btn  btn-danger addshopcar" id="btn">加入购物车</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                {{--@endforeach/--}}
            <!--product-detail-->
            <div class="clearfix product-detail">
                <div class="fl aside">
                    <ul class="sui-nav nav-tabs tab-wraped">
                        <li class="active">
                            <a href="#index" data-toggle="tab">
                                <span>相关分类</span>
                            </a>
                        </li>
                        <li>
                            <a href="#profile" data-toggle="tab">
                                <span>推荐品牌</span>
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content tab-wraped">
                        <div id="index" class="tab-pane active">
                            <ul class="part-list unstyled">
                                <li>手机</li>
                                <li>手机壳</li>
                                <li>内存卡</li>
                                <li>Iphone配件</li>
                                <li>贴膜</li>
                                <li>手机耳机</li>
                                <li>移动电源</li>
                                <li>平板电脑</li>
                            </ul>
                            <ul class="goods-list unstyled">
                                <li>
                                    <div class="list-wrap">
                                        <div class="p-img">
                                            <img src="/index/img/_/part01.png" />
                                        </div>
                                        <div class="attr">
                                            <em>Apple苹果iPhone 6s (A1699)</em>
                                        </div>
                                        <div class="price">
                                            <strong>
                                                <em>¥</em>
                                                <i>6088.00</i>
                                            </strong>
                                        </div>
                                        <div class="operate">
                                            <a href="javascript:void(0);" class="sui-btn btn-bordered">加入购物车</a>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="list-wrap">
                                        <div class="p-img">
                                            <img src="/index/img/_/part02.png" />
                                        </div>
                                        <div class="attr">
                                            <em>Apple苹果iPhone 6s (A1699)</em>
                                        </div>
                                        <div class="price">
                                            <strong>
                                                <em>¥</em>
                                                <i>6088.00</i>
                                            </strong>
                                        </div>
                                        <div class="operate">
                                            <a href="javascript:void(0);" class="sui-btn btn-bordered">加入购物车</a>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="list-wrap">
                                        <div class="p-img">
                                            <img src="/index/img/_/part03.png" />
                                        </div>
                                        <div class="attr">
                                            <em>Apple苹果iPhone 6s (A1699)</em>
                                        </div>
                                        <div class="price">
                                            <strong>
                                                <em>¥</em>
                                                <i>6088.00</i>
                                            </strong>
                                        </div>
                                        <div class="operate">
                                            <a href="javascript:void(0);" class="sui-btn btn-bordered">加入购物车</a>
                                        </div>
                                    </div>
                                    <div class="list-wrap">
                                        <div class="p-img">
                                            <img src="/index/img/_/part02.png" />
                                        </div>
                                        <div class="attr">
                                            <em>Apple苹果iPhone 6s (A1699)</em>
                                        </div>
                                        <div class="price">
                                            <strong>
                                                <em>¥</em>
                                                <i>6088.00</i>
                                            </strong>
                                        </div>
                                        <div class="operate">
                                            <a href="javascript:void(0);" class="sui-btn btn-bordered">加入购物车</a>
                                        </div>
                                    </div>
                                    <div class="list-wrap">
                                        <div class="p-img">
                                            <img src="/index/img/_/part03.png" />
                                        </div>
                                        <div class="attr">
                                            <em>Apple苹果iPhone 6s (A1699)</em>
                                        </div>
                                        <div class="price">
                                            <strong>
                                                <em>¥</em>
                                                <i>6088.00</i>
                                            </strong>
                                        </div>
                                        <div class="operate">
                                            <a href="javascript:void(0);" class="sui-btn btn-bordered">加入购物车</a>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div id="profile" class="tab-pane">
                            <p>推荐品牌</p>
                        </div>
                    </div>
                </div>
                <div class="fr detail">
                    <div class="clearfix fitting">
                        <h4 class="kt">选择搭配</h4>
                        <div class="good-suits">
                            <div class="fl master">
                                <div class="list-wrap">
                                    <div class="p-img">
                                        <img src="/index/img/_/l-m01.png" />
                                    </div>
                                    <em>￥5299</em>
                                    <i>+</i>
                                </div>
                            </div>
                            <div class="fl suits">
                                <ul class="suit-list">
                                    <li class="">
                                        <div id="">
                                            <img src="/index/img/_/dp01.png" />
                                        </div>
                                        <i>Feless费勒斯VR</i>
                                        <label data-toggle="checkbox" class="checkbox-pretty">
                                            <input type="checkbox"><span>39</span>
                                        </label>
                                    </li>
                                    <li class="">
                                        <div id=""><img src="/index/img/_/dp02.png" /> </div>
                                        <i>Feless费勒斯VR</i>
                                        <label data-toggle="checkbox" class="checkbox-pretty">
                                            <input type="checkbox"><span>50</span>
                                        </label>
                                    </li>
                                    <li class="">
                                        <div id=""><img src="/index/img/_/dp03.png" /></div>
                                        <i>Feless费勒斯VR</i>
                                        <label data-toggle="checkbox" class="checkbox-pretty">
                                            <input type="checkbox"><span>59</span>
                                        </label>
                                    </li>
                                    <li class="">
                                        <div id=""><img src="/index/img/_/dp04.png" /></div>
                                        <i>Feless费勒斯VR</i>
                                        <label data-toggle="checkbox" class="checkbox-pretty">
                                            <input type="checkbox"><span>99</span>
                                        </label>
                                    </li>
                                </ul>
                            </div>
                            <div class="fr result">
                                <div class="num">已选购0件商品</div>
                                <div class="price-tit"><strong>套餐价</strong></div>
                                <div class="price">￥5299</div>
                                <button class="sui-btn  btn-danger addshopcar">加入购物车</button>
                            </div>
                        </div>
                    </div>
                    <div class="tab-main intro">
                        <ul class="sui-nav nav-tabs tab-wraped">
                            <li class="active">
                                <a href="#one" data-toggle="tab">
                                    <span>商品介绍</span>
                                </a>
                            </li>
                            <li>
                                <a href="#two" data-toggle="tab">
                                    <span>规格与包装</span>
                                </a>
                            </li>
                            <li>
                                <a href="#three" data-toggle="tab">
                                    <span>售后保障</span>
                                </a>
                            </li>
                            <li>
                                <a href="#four" data-toggle="tab">
                                    <span>商品评价</span>
                                </a>
                            </li>
                            <li>
                                <a href="#five" data-toggle="tab">
                                    <span>手机社区</span>
                                </a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                        <div class="tab-content tab-wraped">
                            <div id="one" class="tab-pane active">
                                <ul class="goods-intro unstyled">
                                    <li>分辨率：1920*1080(FHD)</li>
                                    <li>后置摄像头：1200万像素</li>
                                    <li>前置摄像头：500万像素</li>
                                    <li>核 数：其他</li>
                                    <li>频 率：以官网信息为准</li>
                                    <li>品牌： Apple</li>
                                    <li>商品名称：APPLEiPhone 6s Plus</li>
                                    <li>商品编号：1861098</li>
                                    <li>商品毛重：0.51kg</li>
                                    <li>商品产地：中国大陆</li>
                                    <li>热点：指纹识别，Apple Pay，金属机身，拍照神器</li>
                                    <li>系统：苹果（IOS）</li>
                                    <li>像素：1000-1600万</li>
                                    <li>机身内存：64GB</li>
                                </ul>
                                <div class="intro-detail">
                                    <img src="/index/img/_/intro01.png" />
                                    <img src="/index/img/_/intro02.png" />
                                    <img src="/index/img/_/intro03.png" />
                                </div>
                            </div>
                            <div id="two" class="tab-pane">
                                <p>规格与包装</p>
                            </div>
                            <div id="three" class="tab-pane">
                                <p>售后保障</p>
                            </div>
                            <div id="four" class="tab-pane">
                                <p>商品评价</p>
                            </div>
                            <div id="five" class="tab-pane">
                                <p>手机社区</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--like-->
            <div class="clearfix"></div>
            <div class="like">
                <h4 class="kt">猜你喜欢</h4>
                <div class="like-list">
                    <ul class="yui3-g">
                        <li class="yui3-u-1-6">
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
                        <li class="yui3-u-1-6">
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
                        <li class="yui3-u-1-6">
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
                        <li class="yui3-u-1-6">
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
                        <li class="yui3-u-1-6">
                            <div class="list-wrap">
                                <div class="p-img">
                                    <img src="/index/img/_/itemlike05.png" />
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
                        <li class="yui3-u-1-6">
                            <div class="list-wrap">
                                <div class="p-img">
                                    <img src="/index/img/_/itemlike06.png" />
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
    <script type="text/javascript" src="/index/js/model/cartModel.js"></script>
    <script type="text/javascript" src="/index/js/plugins/jquery.easing/jquery.easing.min.js"></script>
    <script type="text/javascript" src="/index/js/plugins/sui/sui.min.js"></script>
    <script type="text/javascript" src="/index/js/plugins/jquery.jqzoom/zoom.js"></script>
    <script type="text/javascript" src="/index/js/plugins/jquery.jqzoom/jquery.jqzoom.js"></script>
    <script type="text/javascript">
        $(function(){
            $("#service").hover(function(){
                $(".service").show();
            },function(){
                $(".service").hide();
            });
            $("#shopcar").hover(function(){
                $("#shopcarlist").show();
            },function(){
                $("#shopcarlist").hide();
            });

        })
    </script>
    <script>
        $(function () {
            $(document).on("click",".at",function () {
                    $(this).parent().siblings().children().removeClass("selected")
                $(this).parent().siblings().children().children().removeAttr("checked")
                $(this).addClass("selected").append("<span title='点击取消选择'>&nbsp;</span>")
                    $(this).children("#che").attr("checked",true)
            })
            $(document).on("click","#btn",function () {
                var count=$("#count").attr("count")
                var goods_id="{{$goods["goods_id"]}}"
                var scroe="{{$goods["goods_price"]*2}}"
                var price=$("#price").html()
                var str=""
                $("#che:checked").each(function() {
                    str+=$(this).attr("attrr")+","+$(this).attr("attr_val")+":"
                });
                str =str.slice(0,str.length-1)
                var n=(str.split(':')).length-1;
                if(str==""){
                    alert("请选择类型")
                    return
                }
                if(count-1!==n){
                    alert("请选择类型")
                    return
                }
                $.ajax({
                    url:"/index/score/descAjax",
                    data:{score:price,ability:str,goods_id:goods_id,scroe:scroe},
                    success:function (res) {
                        alert(res)
                        if(res==="添加成功"){
                            location.href='/index/score/settlement'
                        }
                    }
                })
//                console.log(str)
            })

        })
    </script>
@endsection
