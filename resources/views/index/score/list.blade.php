@extends('layout.index')
@section('content')
    <div id="o-header-2013"><div id="header-2013" style="display:none;"></div></div>
    <!--shortcut end-->
    <div style="width:100%; background-color:#eee; height: 2000px;">
        <div style="width: 1200px; margin: 0 auto; padding-bottom: 30px;">
            <div style="padding-top:20px;padding-bottom: 15px;height: 50px;">
                <a href="{{url('/index/news/index/')}}" style="color: #999">king快报</a> &nbsp; <b style="font-size:12px; color: #303030;"> >&nbsp;&nbsp;积分换购 </b>
                <br>
                <br>
            </div>
                {{--<center><b style="font-size:18px; color: #303030;font-size: 30px;"> 积分换购</b></center>--}}
            <div style="width: 1200px;">
                <div style="width: 1185px; padding-top:5px; background-color:white; height:830px; float: left;">
                    @foreach($goods as $key=>$v)
                        <div style="padding-left: 250px; padding-right: 90px; height: 250px;">
                            {{--<h1 sty>&nbsp; 积分换购</h1>--}}
                            {{--<h4>&nbsp; </h4>--}}
                            {{--<h4>&nbsp; </h4>--}}
                            <h2><a href="{{url('/index/news/one/'.$v->n_id)}}">{{mb_substr($v->title,0,24)}}</a></h2>
                            <h2>&nbsp; </h2>
                            <span style="font-size:16px; text-indent:2em; font-weight: normal;color: #999">&nbsp; &nbsp;&nbsp; &nbsp; &nbsp;<a href="{{url('/index/news/one/'.$v->n_id)}}">{{mb_substr($v->desc,0,68)}}</a></span>
                            <h2>&nbsp; </h2>
                            <ul class="yui3-g Recommend" style="width: 750px; margin-left: -90px; background-color:white; margin-top: -15px;">
                                <li class="yui3-u-5-24" style="margin-left: 90px;">
                                    <a href="javascript:;" target="_blank"><img src={{env("UPLOADS_URL")}}{{$v->goods_img}} width="200px"/></a>
                                </li>
                                <li class="yui3-u-5-24" style="margin-left: 30px; width: 300px; margin-top: 25px;">
                                    <a href="javascript:;" target="_blank" style="font-size: 12px;">{{$v->goods_name}}</a>
                                    <br>
                                    <br>
                                    <b><a href="javascript:;" target="_blank" style="color: red;">积分：{{$v->goods_price*2}}</a></b>
                                    <br>
                                    <h5>&nbsp;</h5>
                                    <a href="/index/score/desc?goods_id={{$v->goods_id}}" class="btn btn-danger">立即换购</a>
                                </li>
                            </ul>
                        </div>
                    @endforeach
                </div>
            </div>

        </div>
    </div>


@endsection
