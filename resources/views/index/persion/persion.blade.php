@extends('layout.index')
@section('content')
<!--header-->
<div id="account">
    <div class="py-container">
        <div class="yui3-g home">
            <!--左侧列表-->
            <div class="yui3-u-1-6 list">

                <div class="person-info">
                    <div class="person-photo"><img src="img/_/photo.png" alt=""></div>
                    <div class="person-account">
                        <span class="name">Michelle</span>
                        <span class="safe">账户安全</span>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="list-items">

                    <dl>
                        <dt><i>·</i> 设置</dt>
                        <dd><a href="home-setting-info.html" class="list-active">个人信息</a></dd>
                        <dd><a href="home-setting-address.html">地址管理</a></dd>
                        <dd><a href="home-setting-safe.html">安全管理</a></dd>
                    </dl>
                </div>
            </div>
            <!--右侧主内容-->
            <div class="yui3-u-5-6">
                <div class="body userInfo">
                    <ul class="sui-nav nav-tabs nav-large nav-primary ">
                        <li class="active"><a href="#one" data-toggle="tab">基本资料</a></li>
                        <li class=""><a href="#two" data-toggle="tab">头像照片</a></li>
                    </ul>
                    <div class="tab-content ">
                        <div id="one" class="tab-pane active">
                            <form id="form-msg" class="sui-form form-horizontal">
                                <div class="control-group">
                                    <label for="inputName" class="control-label">昵称：</label>
                                    <div class="controls">
                                        <input type="text" id="inputName" name="user" placeholder="昵称">
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label for="inputGender" class="control-label">性别：</label>
                                    <div class="controls">
                                        <label data-toggle="radio" class="radio-pretty inline">
                                            <input type="radio" name="gender" value="1"><span>男</span>
                                        </label>
                                        <label data-toggle="radio" class="radio-pretty inline">
                                            <input type="radio" name="gender" value="2"><span>女</span>
                                        </label>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label for="inputName" class="control-label">电话：</label>
                                    <div class="controls">
                                        <input type="text" id="inputName" name="user" placeholder="手机号">
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label for="inputPassword" class="control-label">所在地：</label>
                                    <div class="controls">
                                        <div data-toggle="distpicker">
                                            <div class="form-group area">
                                                <select class="form-control" id="province1"><option value="" data-code="">—— 省 ——</option><option value="北京市" data-code="110000" selected="">北京市</option><option value="天津市" data-code="120000">天津市</option><option value="河北省" data-code="130000">河北省</option><option value="山西省" data-code="140000">山西省</option><option value="内蒙古自治区" data-code="150000">内蒙古自治区</option><option value="辽宁省" data-code="210000">辽宁省</option><option value="吉林省" data-code="220000">吉林省</option><option value="黑龙江省" data-code="230000">黑龙江省</option><option value="上海市" data-code="310000">上海市</option><option value="江苏省" data-code="320000">江苏省</option><option value="浙江省" data-code="330000">浙江省</option><option value="安徽省" data-code="340000">安徽省</option><option value="福建省" data-code="350000">福建省</option><option value="江西省" data-code="360000">江西省</option><option value="山东省" data-code="370000">山东省</option><option value="河南省" data-code="410000">河南省</option><option value="湖北省" data-code="420000">湖北省</option><option value="湖南省" data-code="430000">湖南省</option><option value="广东省" data-code="440000">广东省</option><option value="广西壮族自治区" data-code="450000">广西壮族自治区</option><option value="海南省" data-code="460000">海南省</option><option value="重庆市" data-code="500000">重庆市</option><option value="四川省" data-code="510000">四川省</option><option value="贵州省" data-code="520000">贵州省</option><option value="云南省" data-code="530000">云南省</option><option value="西藏自治区" data-code="540000">西藏自治区</option><option value="陕西省" data-code="610000">陕西省</option><option value="甘肃省" data-code="620000">甘肃省</option><option value="青海省" data-code="630000">青海省</option><option value="宁夏回族自治区" data-code="640000">宁夏回族自治区</option><option value="新疆维吾尔自治区" data-code="650000">新疆维吾尔自治区</option><option value="台湾省" data-code="710000">台湾省</option><option value="香港特别行政区" data-code="810000">香港特别行政区</option><option value="澳门特别行政区" data-code="820000">澳门特别行政区</option></select>
                                            </div>
                                            <div class="form-group area">
                                                <select class="form-control" id="city1"><option value="" data-code="">—— 市 ——</option><option value="北京市市辖区" data-code="110100" selected="">北京市市辖区</option></select>
                                            </div>
                                            <div class="form-group area">
                                                <select class="form-control" id="district1"><option value="" data-code="">—— 区 ——</option><option value="东城区" data-code="110101" selected="">东城区</option><option value="西城区" data-code="110102">西城区</option><option value="朝阳区" data-code="110105">朝阳区</option><option value="丰台区" data-code="110106">丰台区</option><option value="石景山区" data-code="110107">石景山区</option><option value="海淀区" data-code="110108">海淀区</option><option value="门头沟区" data-code="110109">门头沟区</option><option value="房山区" data-code="110111">房山区</option><option value="通州区" data-code="110112">通州区</option><option value="顺义区" data-code="110113">顺义区</option><option value="昌平区" data-code="110114">昌平区</option><option value="大兴区" data-code="110115">大兴区</option><option value="怀柔区" data-code="110116">怀柔区</option><option value="平谷区" data-code="110117">平谷区</option><option value="密云区" data-code="110118">密云区</option><option value="延庆区" data-code="110119">延庆区</option></select>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label for="sanwei" class="control-label"></label>
                                    <div class="controls">
                                        <button type="submit" class="sui-btn btn-primary">提交</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div id="two" class="tab-pane">

                            <div class="new-photo">
                                <p>当前头像：</p>
                                <div class="upload">
                                    <img id="imgShow_WU_FILE_0" width="100" height="100" src="img/_/photo_icon.png" alt="">
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
@endsection