@extends('layout.index')
@section('content')
    <html>
    <head>
        <meta charset="gbk" />
        <meta name="keywords" content="京东JD.COM、快报、京东快报、文章、必买、清单、热点、攻略、推荐、好物、生活、精选、发现"/>
        <meta name="description" content="京东JD.COM快报，提供热门信息、专业购物攻略，每日一点快报，让购物更加有趣，让生活更加精彩" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <meta name="renderer" content="webkit" />
        <title>京东快报-更多内容</title>
        <!--[if lte IE 8]>
        <script src='//storage.jd.com/fragments/polyfill.min.js'></script>
        <![endif]-->

        <link rel="dns-prefetch" href="//static.360buyimg.com">
        <link rel="dns-prefetch" href="//misc.360buyimg.com">
        <link rel="dns-prefetch" href="//img10.360buyimg.com">
        <link rel="dns-prefetch" href="//img11.360buyimg.com">
        <link rel="dns-prefetch" href="//img12.360buyimg.com">
        <link rel="dns-prefetch" href="//img13.360buyimg.com">
        <link rel="dns-prefetch" href="//img14.360buyimg.com">
        <link rel="dns-prefetch" href="//img30.360buyimg.com">
        <link rel="icon" href="//www.jd.com/favicon.ico" mce_href="//www.jd.com/favicon.ico" type="image/x-icon">
        <script>
            window['_REPORT_'] = {};
            window['_REPORT_']['START'] = new Date();
        </script>
        <link type="text/css" rel="stylesheet" href="//misc.360buyimg.com/??jdf/1.0.0/unit/ui-base/5.0.0/ui-base.css,jdf/1.0.0/unit/shortcut/5.0.0/shortcut.css,jdf/1.0.0/unit/global-header/5.0.0/global-header.css,jdf/1.0.0/unit/myjd/5.0.0/myjd.css,jdf/1.0.0/unit/nav/5.0.0/nav.css,jdf/1.0.0/unit/shoppingcart/5.0.0/shoppingcart.css">
        <script type="text/javascript">window.pageConfig = { compatible: true }; </script>
        <!-- inject css START -->
        <link type="text/css" rel="stylesheet" href="//static.360buyimg.com/mtd/pc/cms/css/common.min.css">
        <!-- inject css END -->
        <script>window['_REPORT_']['CSS'] = new Date();</script>
        <script>window.o2tplVersion = { cms_header_tpl:'5c4c12b11848b9c3',cmsfooter_tpl:'bdae0bb92c99aa4b',supermarket_stroll_tpl:'1aafc3851296949c'};</script>
        <script type="text/javascript" src="//misc.360buyimg.com/jdf/??1.0.0/unit/base/5.0.0/base.js,lib/jquery-1.6.4.js"></script>
        <script type="text/javascript">pageConfig.wideVersion = true; </script>
        <script type="text/javascript" src="//static.360buyimg.com/mtd/pc/cms/js/o2_ua.min.js"></script>

        <link href="//static.360buyimg.com/mtd/pc_new/jd_bulletin_pc/1.0.0/bulletin/detail.css" rel="stylesheet">

    </head>
    <body style="overflow-x: hidden">

    <!--shortcut start-->
    <div id="o-header-2013"><div id="header-2013" style="display:none;"></div></div>
    <!--shortcut end-->
    <div style="width:100%; background-color:#eee; height: 700px;">
        <div style="width: 1200px; margin: 0 auto; padding-bottom: 30px;">
            <div style="padding-top:20px;padding-bottom: 15px;height: 50px;">
                <a href="/index/news/index" style="color: #999">king快报</a> &nbsp; <b style="font-size:12px; color: #303030;"> >&nbsp;&nbsp;{{$res->title}} </b>
                <br>
                <br>
                <a href="/index/news/index" style="color: #999; margin-left: 760px;"><b style="font-size:18px; color: #303030;"> 更多热文 </b></a>
            </div>
            <div style="width: 1200px; height: 100%; position: absolute;">
                <div style="width: 750px; padding-top:5px; background-color:white; height:100%; float: left;">
                <div style="padding-left: 90px; padding-right: 90px; height: 500px;">
                <h4>&nbsp; </h4>
                <h4>&nbsp; </h4>
                <h4>&nbsp; </h4>
                <h2>{{$res->title}}</h2>
                <h2>&nbsp; </h2>
                <span style="font-size:16px; text-indent:2em; font-weight: normal;color: #999">&nbsp; &nbsp;&nbsp; &nbsp; &nbsp;{{$res->desc}}</span>
                <h2>&nbsp; </h2>
                <ul class="yui3-g Recommend" style="width: 750px; margin-left: -90px; background-color:white; margin-top: -15px;">
                    <li class="yui3-u-5-24" style="margin-left: 90px;">
                        <a href="javascript:;" target="_blank"><img src={{env("UPLOADS_URL")}}{{$goods->goods_img}} width="200px"/></a>
                    </li>
                </ul>
                </div>
                </div>
                <div style="background-color:white; width: 400px; height: 555px; float: left; margin-left: 10px;">
                    <div style="margin-left: 30px; margin-right: 32px; margin-top: 20px;">
                        <div>
                        <h4>&nbsp; </h4>
                        <h4>{{$res->title}}</h4>
                        <h6>&nbsp; </h6>
                        <span style="font-size:12px; font-weight: normal;color: #999">{{$res->desc}}</span>
                        <h6>&nbsp; </h6>
                        <hr>
                        </div>
                        <h4>&nbsp; </h4>
                        <h4>{{$res->title}}</h4>
                        <h6>&nbsp; </h6>
                        <span style="font-size:12px; font-weight: normal;color: #999">{{$res->desc}}</span>
                        <h6>&nbsp; </h6>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>

    {{--<!-- S 主体内容 -->--}}
    {{--<div class="mod_container " >--}}

        {{--<div class="detail" id="J_container">--}}

        {{--</div>--}}
    {{--</div>--}}

    <!-- E 主体内容 -->
    {{--<script src="//static.360buyimg.com/mtd/pc/base/1.0.0/base.js" charset="UTF-8"></script>--}}
    {{--<script type="text/javascript">--}}
        {{--seajs.config({--}}
            {{--paths: {--}}
                {{--'MISC': '://misc.360buyimg.com'--}}
            {{--}--}}
        {{--});--}}
        {{--window.pageConfig = window.pageConfig || {};--}}
        {{--window.pageConfig.o2JSConfig = {--}}
            {{--useTplInJs: true,--}}
            {{--ieStorage: false,--}}
            {{--pathRule: function (path) {--}}
                {{--return '//static.360buyimg.com/mtd/pc/cms' + '/floors/' + path + '.min.js';--}}
            {{--}--}}
        {{--};--}}
        {{--seajs.use(['//static.360buyimg.com/mtd/pc/base/1.0.1/channel.js']);--}}
    {{--</script>--}}
    {{--<script type="text/javascript" src="//wl.jd.com/wl.js"></script>--}}
    {{--<script type="text/javascript" src="//static.360buyimg.com/webstatic/getprice/1.0.0/js/price.min.js"></script>--}}
    {{--<script>window['_REPORT_']['JS'] = new Date();</script>--}}
    {{--<script>window['_REPORT_']['DOM'] = new Date();</script>--}}
    {{--<script type="text/javascript" src="//static.360buyimg.com/mtd/pc_new/jd_bulletin_pc/1.0.0/bulletin/detail.js" charset="UTF-8"></script>--}}

    </body>
    </html>
@endsection
