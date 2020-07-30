
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>品优购充值</title>
    <meta name="Keywords" content="英国充值苹果,英国苹果充值,英国苹果id充值,英国充值apple id,英国apple id充值,澳洲充值苹果,澳洲苹果充值,澳洲苹果id充值,澳洲充值apple id,澳洲apple id充值,澳大利亚充值苹果,澳大利亚苹果充值,澳大利亚充值苹果账号,澳大利亚苹果账号充值,澳大利亚充值苹果id,澳大利亚苹果id充值,澳大利亚充值apple id,澳大利亚apple id充值,加拿大充值苹果,加拿大苹果充值,加拿大苹果账号充值,加拿大苹果id充值,加拿大充值apple id,加拿大apple id充值,美国充值苹果,美国苹果充值,美国充值苹果账号,美国苹果账号充值,美国充值苹果id,美国苹果id充值,美国充值apple id,美国apple id充值,美国充值苹果手游,美国苹果手游充值,海外充值苹果,海外苹果充值,海外充值苹果账号,海外苹果账号充值,海外充值苹果id,海外苹果id充值,海外充值apple id,海外apple id充值,海外苹果手游充值" />
    <meta name="Description" content="英国充值苹果,英国苹果充值,英国苹果id充值,英国充值apple id,英国apple id充值,澳洲充值苹果,澳洲苹果充值,澳洲苹果id充值,澳洲充值apple id,澳洲apple id充值,澳大利亚充值苹果,澳大利亚苹果充值,澳大利亚充值苹果账号,澳大利亚苹果账号充值,澳大利亚充值苹果id,澳大利亚苹果id充值,澳大利亚充值apple id,澳大利亚apple id充值,加拿大充值苹果,加拿大苹果充值,加拿大苹果账号充值,加拿大苹果id充值,加拿大充值apple id,加拿大apple id充值,美国充值苹果,美国苹果充值,美国充值苹果账号,美国苹果账号充值,美国充值苹果id,美国苹果id充值,美国充值apple id,美国apple id充值,美国充值苹果手游,美国苹果手游充值,海外充值苹果,海外苹果充值,海外充值苹果账号,海外苹果账号充值,海外充值苹果id,海外苹果id充值,海外充值apple id,海外apple id充值,海外苹果手游充值" />
    <link rel="stylesheet" href="https://image.ka-cn.com/landing/css/reset.css?release_css=20200720" />
    <link rel="stylesheet" href="https://image.ka-cn.com/landing/css/landing_2019.css?release_css=20200720_2" />
    <link type="text/css" href="https://image.ka-cn.com/static/floating_cs/floating_cs.css?release_css=20200720" rel="stylesheet" />
    <title>Bootstrap 实例 - 按钮选项</title>
    <link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="/landing/js/jquery.min.js" ></script>
    <script type="text/javascript" src="/landing/js/func.js?release_js=20200720" ></script>
    <script type="text/javascript" src="/spgoods/js/common.js?release_js=20200720" ></script>
    <script type="text/javascript" src="/js/transport.js?release_js=20200720"></script>
    <script type="text/javascript" src="/js/json2.js?release_js=20200720"></script>
    <script type='text/javascript'>
        !function(e,t,n,g,i){e[i]=e[i]||function(){(e[i].q=e[i].q||[]).push(arguments)},n=t.createElement("script"),tag=t.getElementsByTagName("script")[0],n.async=1,n.src=('https:'==document.location.protocol?'https://':'http://')+g,tag.parentNode.insertBefore(n,tag)}(window,document,"script","assets.giocdn.com/2.1/gio.js","gio");
        gio('init','a690d7f9aecdbb20', {});
        gio('send');
    </script>

    <style>
        .top_boxImg{position: relative;width: 1200px;margin: 0 auto;}
    </style>

    <style>
        .footer_img {
            background: url(https://image.ka-cn.com/landing/img/yes_ka_cn.png?t=20200417) no-repeat center center;
            width: 1200px;
            background-size: 1200px 272px;
            margin: 0 auto;
            height: 272px;
            margin-top: 20px;
            margin-bottom: 24px;
        }
    </style>
</head>
<body>
<input type="hidden" value="1" name="is_vip">
<input type="hidden" value="1" name="is_use_bonus">
<div class="tgdjh_nav_bg">
    <div class="land_nav">

        <div class="land_right">
            <p class="tgdjh_p"><a href="/index/reg/reg">注册</a></p><p class="tgdjh_p"><a href="/index/login/login">登录</a></p>
            <select name="hbxz" id="hbxz" onchange="change_currency(this.value)" class="currency_select pc_313_select tgdjh_select">
                <option value="0" selected>人民币&nbsp;&nbsp;$USD</option>
                <option value="1" >
                    澳元&nbsp;&nbsp;A$AUD			          </option>
                <option value="2" >
                    英镑&nbsp;&nbsp;￡GBP			          </option>
                <option value="3" >
                    加元&nbsp;&nbsp;C$CAD			          </option>
                <option value="4" >
                    欧元&nbsp;&nbsp;€EUR			          </option>
                <option value="5" >
                    马币&nbsp;&nbsp;$MYR			          </option>
            </select>
            <script>
                var currency_ajax_status = false;
                function change_currency(cid){
                    if(currency_ajax_status) return false;
                    currency_ajax_status = true;
                    $.ajax({
                        url : '/do.php',
                        type : 'post',
                        data : {act: 'update_currency', 'cid': cid},
                        dataType : 'json',
                        async : false,
                        success : function(res){
                            if(res.status == 1){
                                window.location.reload();
                            }
                            currency_ajax_status = false;
                        }
                    });
                }
            </script>
            <div style="width: 117px;position: relative;float: left">
                <div class="tgdjh_div" style="position: absolute;z-index: 1;">
                    <p class="tgdjh_p2"><span>联系客服</span><img src="https://image.ka-cn.com/landing/img/tgdjh_xljt.png" class="tgdjh_img"/><div class="clear_both"></div>	</p>
                    <div class="tgdjh_div_div1" style="display: none;">
                        <p><a href="/kefu.php?com=top-qq&qq=800088077&place=land-top" target="_blank">QQ客服</a></p>
                        <p><a href="/kefu.php?com=top-kf&type=1&place=land-top" target="_blank">在线客服</a></p>
                    </div>
                </div>
            </div>
            <div class="clear_both"></div>
        </div>
    </div>
</div>



<div class="top_boxImg">
    <a href="/user.php?act=register&is_landing=1&from=landingtoutu">
        <img src="https://image.ka-cn.com/data/afficheimg/20200703rnivjm.jpg">
    </a>
</div>
<link rel="stylesheet" href="https://image.ka-cn.com/themes/2009jingdong/library/right_bar/css/style.css?release_css=20200720">
<div class="H_flowRight">
    <ul class="H_flowIcon">
        <a href="/kefu.php?com=right_bar&type=1" target="_blank">
            <li class="H_icon2">
                <p class="H_title">联系客服</p>
            </li>
        </a>
        <a href="/article_cat-56.html" target="_blank">
            <li class="H_icon3">
                <p class="H_title">活动专区</p>
            </li>
        </a>
        <li class="H_icon4 js-bar">
            <p class="H_title">意见反馈</p>
        </li>
        <li class="H_icon5">
            <p class="H_title">返回顶部</p>
        </li>
    </ul>
</div>

<script>
    $(function(){
        // 返回顶部
        $('.H_icon5').click(function(){
            $("body,html").animate({scrollTop:0},300);
        })
        // app二维码展示四秒隐藏
        // 二维码显示隐藏
        $('.H_icon1').mouseenter(function(){
            $('.H_qrCode').show()
        }).mouseleave(function(){
            $('.H_qrCode').hide()
        });
        $('.H_flowIcon li:not(:first)').mouseover(function () {
            $('.H_qrCode').hide()
        })

        $('.tousu_button_sub').click(function(){
            if($(".tsfl :checked").size()==0){
                $("#qsrtsfl").show();
                return false;
            }
        });
        $('.tsfl input').click(function(){
            $("#qsrtsfl").hide();
        });
        $('.js-bar').click(function() {
            window.open("/feedback.php");
        });
        $('.cuo').click(function() {
            $('.body').css('display', 'none');
        });
    })
</script>    	<a name="main" href="#main"></a>
<div class="landing_main">
    <div class="landing_content">
        <div class="landing_center">
            <p class="landing_title">选择网站</p>
            <div class="landing_list">


                <a href="javascript:;">
                    <div class="landing_li js_border"  style="margin-left:0" data-growing-container data-growing-title="苹果" id="tubiao_pg">
                        <img class="landing_sp_logo" width="50" height="30" src="/index/img/logo.png" alt="">
                        <div class="landing_sp_bt">
                            <p>品优购</p>
                            <p>电商网站充值</p>
                        </div>
                        <div class="clear_both"></div>
                    </div>
                </a>
                <a href="javascript:;">
                    <div class="landing_li "  data-growing-container data-growing-title="网易游戏" id="tubiao_wy">
                        <img class="landing_sp_logo" src="https://image.ka-cn.com/landing/img/landing_wy.png" alt="">
                        <div class="landing_sp_bt">
                            <p>网易游戏</p>
                            <p>网易通行证通用点数或寄售点数</p>
                        </div>
                        <div class="clear_both"></div>
                    </div>
                </a>
                <a href="javascript:;">
                    <div class="landing_li "  data-growing-container data-growing-title="金山" id="tubiao_js">
                        <img class="landing_sp_logo" src="https://image.ka-cn.com/landing/img/landing_js.png" alt="">
                        <div class="landing_sp_bt">
                            <p>金山</p>
                            <p>充值剑侠情缘3、金山一卡通</p>
                        </div>
                        <div class="clear_both"></div>
                    </div>
                </a>
                <a href="javascript:;">
                    <div class="landing_li "  data-growing-container data-growing-title="战网" id="tubiao_zw">
                        <img class="landing_sp_logo" src="https://image.ka-cn.com/landing/img/landing_zw.png" alt="">
                        <div class="landing_sp_bt">
                            <p>战网</p>
                            <p>充值炉石传说、守望先锋等战网游戏</p>
                        </div>
                        <div class="clear_both"></div>
                    </div>
                </a>
                <a href="javascript:;">
                    <div class="landing_li "  data-growing-container data-growing-title="盛大" id="tubiao_sd">
                        <img class="landing_sp_logo" src="https://image.ka-cn.com/landing/img/landing_sd.png" alt="">
                        <div class="landing_sp_bt">
                            <p>盛大</p>
                            <p>盛大点券、最终幻想等盛大游戏充值</p>
                        </div>
                        <div class="clear_both"></div>
                    </div>
                </a>
                <a href="javascript:;">
                    <div class="landing_li "  data-growing-container data-growing-title="搜狐畅游" id="tubiao_shcy">
                        <img class="landing_sp_logo" src="https://image.ka-cn.com/landing/img/landing_shcy.png" alt="">
                        <div class="landing_sp_bt">
                            <p>搜狐畅游</p>
                            <p>搜狐畅游旗下游戏充值</p>
                        </div>
                        <div class="clear_both"></div>
                    </div>
                </a>
                <a href="javascript:;">
                    <div class="landing_li "  style="margin-left:0" data-growing-container data-growing-title="YY直播" id="tubiao_yy">
                        <img class="landing_sp_logo" src="https://image.ka-cn.com/landing/img/landing_yy.png" alt="">
                        <div class="landing_sp_bt">
                            <p>YY直播</p>
                            <p>充值多玩游戏平台、YY币</p>
                        </div>
                        <div class="clear_both"></div>
                    </div>
                </a>
                <a href="javascript:;">
                    <div class="landing_li "  data-growing-container data-growing-title="映客直播" id="tubiao_yk">
                        <img class="landing_sp_logo" src="https://image.ka-cn.com/landing/img/landing_yk.png" alt="">
                        <div class="landing_sp_bt">
                            <p>映客直播</p>
                            <p>映客钻石充值</p>
                        </div>
                        <div class="clear_both"></div>
                    </div>
                </a>
                <a href="javascript:;">
                    <div class="landing_li "  data-growing-container data-growing-title="虎牙直播" id="tubiao_hyzb">
                        <img class="landing_sp_logo" src="https://image.ka-cn.com/landing/img/landing_hyzb.png" alt="">
                        <div class="landing_sp_bt">
                            <p>虎牙直播</p>
                            <p>虎牙直播充值</p>
                        </div>
                        <div class="clear_both"></div>
                    </div>
                </a>
                <a href="javascript:;">
                    <div class="landing_li "  data-growing-container data-growing-title="花椒直播" id="tubiao_hjzb">
                        <img class="landing_sp_logo" src="https://image.ka-cn.com/landing/img/landing_hjzb.png" alt="">
                        <div class="landing_sp_bt">
                            <p>花椒直播</p>
                            <p>充值花椒币</p>
                        </div>
                        <div class="clear_both"></div>
                    </div>
                </a>
                <a href="javascript:;">
                    <div class="landing_li "  data-growing-container data-growing-title="抖音直播" id="tubiao_dy">
                        <img class="landing_sp_logo" src="https://image.ka-cn.com/landing/img/landing_dy.png" alt="">
                        <div class="landing_sp_bt">
                            <p>抖音直播</p>
                            <p>抖币充值</p>
                        </div>
                        <div class="clear_both"></div>
                    </div>
                </a>
                <a href="javascript:;">
                    <div class="landing_li "  data-growing-container data-growing-title="世纪天成" id="tubiao_sjtc">
                        <img class="landing_sp_logo" src="https://image.ka-cn.com/landing/img/landing_sjtc.png" alt="">
                        <div class="landing_sp_bt">
                            <p>世纪天成</p>
                            <p>适用于世纪天成平台游戏充值</p>
                        </div>
                        <div class="clear_both"></div>
                    </div>
                </a>
                <a href="javascript:;">
                    <div class="landing_li "  style="margin-left:0" data-growing-container data-growing-title="MyCard" id="tubiao_mycard">
                        <img class="landing_sp_logo" src="https://image.ka-cn.com/landing/img/landing_mycard.png" alt="">
                        <div class="landing_sp_bt">
                            <p>MyCard</p>
                            <p>充值台服游戏</p>
                        </div>
                        <div class="clear_both"></div>
                    </div>
                </a>
                <a href="javascript:;">
                    <div class="landing_li "  data-growing-container data-growing-title="PlayStation" id="tubiao_psn">
                        <img class="landing_sp_logo" src="https://image.ka-cn.com/landing/img/landing_psn.png" alt="">
                        <div class="landing_sp_bt">
                            <p>PlayStation</p>
                            <p>充值港、日、加拿大、美、台服PSN</p>
                        </div>
                        <div class="clear_both"></div>
                    </div>
                </a>
                <a href="javascript:;">
                    <div class="landing_li "  data-growing-container data-growing-title="Google Play" id="tubiao_gg">
                        <img class="landing_sp_logo" src="https://image.ka-cn.com/landing/img/landing_gg.png" alt="">
                        <div class="landing_sp_bt">
                            <p>Google Play</p>
                            <p>充值Google Play商店</p>
                        </div>
                        <div class="clear_both"></div>
                    </div>
                </a>
                <a href="javascript:;">
                    <div class="landing_li "  data-growing-container data-growing-title="陌陌直播" id="tubiao_mm">
                        <img class="landing_sp_logo" src="https://image.ka-cn.com/landing/img/landing_mm.png" alt="">
                        <div class="landing_sp_bt">
                            <p>陌陌直播</p>
                            <p>充值陌陌币</p>
                        </div>
                        <div class="clear_both"></div>
                    </div>
                </a>

                <div class="clear_both"></div>
            </div>
            <form action="" method="post" name="ECS_FORMBUY" id="ECS_FORMBUY" class="form">
                <input type="hidden" id="buy_type" name="buy_type" value="pg" />
                <input  type="hidden" id="other_id_val" value="">

                <a name="content" href="#content"></a>
                <p class="landing_title">选择充值方式</p>
                <div class="landing_tab">
                    <div class="landing_btn choose-mode  selected js_img_hide" id="show_mode1" onclick="show_moneys(1, $(this));" need_count="1" _desc="支付宝支付">
                        支付宝                          </div>
                    <div class="landing_btn choose-mode  js_img_hide" id="show_mode2" onclick="show_moneys(2, $(this));" need_count="0" _desc="">
                        微信                            </div>
                    <div class="landing_btn choose-mode  js_img_hide" id="show_mode3" onclick="show_moneys(3, $(this));" need_count="0" _desc="">
                        银行卡                            </div>
                    <p class="clear_both"></p>

                    <div class="landing_fixed landing_fixed_desc">
                        <p>Array</p>
                    </div>
                    <script>
                        $(function(){
                            var landing_fixed_desc = $(".choose-mode.selected").attr('_desc');
                            $(".landing_fixed_desc").html('<p>'+landing_fixed_desc+'</p>');
                        })
                    </script>
                </div>

                <p class="landing_title">选择面额</p>
                <div class="landing_me " id="show1" >
                    @foreach($res as $v)
                    <div class="landing_me_list " id="pin" num="{{$v->price}}" style="margin-left: 0;" >
                        <div class="M_landingTips"></div>
                        <div class="landing_me_border" >
                            <p>
                                <img src="/index/img/Logo.png" width="550" height="30">
                                <span id="num">{{$v->price}}元</span>
                            </p>
                            <div class="clear_both"></div>
                        </div>
                        <p class="landing_me_jg">{{$v->vip_name}}</p>
                    </div>
                    @endforeach
                    <div class="clear_both"></div>
                    <div class="landing_me_dw">
                        <div class="landing_fixed js_landing_fixed">
                        </div>

                    </div>
                </div>


                <div class="landing_cz_xq">
                    <div class="landing_cz_left">
                        <img class="landing_sp_logo" src="/index/img/Logo.png">
                        <div class="landing_sp_bt landing_sp_bt2">
                            <p>品优购</p>
                            <p>会员充值</p>
                        </div>
                        <div class="clear_both"></div>
                    </div>
                    <div class="landing_cz_center">
                        <label class="landing_cz_center_lab">
                            <div class="clear_both" style="float: right;">
                                <span style="margin-left: 150px;font-size: 8px;">请选择（单位：月）</span>
                                <input type="text" value="1" id="month" style="width: 50px;height: 40px;margin-top: 5px;" disabled>
                                <button type="button" class="btn btn-primary" id="add">+</button>
                                <button type="button" class="btn btn-warning" id="del">-</button>
                                <h3 style="float: right;margin-left: 50px;margin-top: 20px;"><span style="color: red" id="price">￥0.00</span></h3>
                            </div>
                        </label>
                        <div class="landing_cz_center_btn goodes_title"></div>
                    </div>
                    <div class="landing_cz_right">
                        <div class="landing_cz_right_vip">
                        </div>

                        <input type="button" value="立即充值"  class="landing_cz_right_btn send" id="BuyButton">
                    </div>
                    <div class="clear_both"></div>
                </div>
            </form>
        </div>
    </div>
    <div class="landing_yes">
        <p class="landing_yes_p">我们的优势</p>
        <div class="landing_yes_main">
            <div class="landing_yes_list">
                <img class="landing_yes_img1" src="https://image.ka-cn.com/landing/img/yes_img1.png" alt="">
                <div class="landing_yes_right">
                    <p class="landing_yes_p1">支持多国货币多种支付方式</p>
                    <img class="landing_yes_img2" src="https://image.ka-cn.com/landing/img/yes_img7.png" alt="">
                    <p class="landing_yes_p2">KA-CN支持多国货币付款，无需换汇即可支付，满足您的付款需求</p>
                </div>
                <div class="clear_both"></div>
            </div>
            <div class="landing_yes_list">
                <img class="landing_yes_img1" src="https://image.ka-cn.com/landing/img/yes_img2.png" alt="">
                <div class="landing_yes_right">
                    <p class="landing_yes_p1">1分钟极速发货</p>
                    <img class="landing_yes_img2" src="https://image.ka-cn.com/landing/img/yes_img7.png" alt="">
                    <p class="landing_yes_p2">核心极速发货技术支持，突破传统发货速度，尽享极速充值体验</p>
                </div>
                <div class="clear_both"></div>
            </div>
            <div class="landing_yes_list">
                <img class="landing_yes_img1" src="https://image.ka-cn.com/landing/img/yes_img3.png" alt="">
                <div class="landing_yes_right">
                    <p class="landing_yes_p1">充值额度不限</p>
                    <img class="landing_yes_img2" src="https://image.ka-cn.com/landing/img/yes_img7.png" alt="">
                    <p class="landing_yes_p2">全面开放充值额度，充值金额不设限制，满足您在海外的充值习惯</p>
                </div>
                <div class="clear_both"></div>
            </div>
            <div class="landing_yes_list">
                <img class="landing_yes_img1" src="https://image.ka-cn.com/landing/img/yes_img4.png" alt="">
                <div class="landing_yes_right">
                    <p class="landing_yes_p1">HTTPS保密更安全</p>
                    <img class="landing_yes_img2" src="https://image.ka-cn.com/landing/img/yes_img7.png" alt="">
                    <p class="landing_yes_p2">HTTPS加密处理，在充值付款时，有效保护您的账户及隐私安全</p>
                </div>
                <div class="clear_both"></div>
            </div>
            <div class="landing_yes_list">
                <img class="landing_yes_img1" src="https://image.ka-cn.com/landing/img/yes_img5.png" alt="">
                <div class="landing_yes_right">
                    <p class="landing_yes_p1">发货超时赔付</p>
                    <img class="landing_yes_img2" src="https://image.ka-cn.com/landing/img/yes_img7.png" alt="">
                    <p class="landing_yes_p2">极速发货，超时赔付，用专业水准保证时效性，珍惜您的每一分钟</p>
                </div>
                <div class="clear_both"></div>
            </div>
            <div class="landing_yes_list">
                <img class="landing_yes_img1" src="https://image.ka-cn.com/landing/img/yes_img6.png" alt="">
                <div class="landing_yes_right">
                    <p class="landing_yes_p1">百名在线客服</p>
                    <img class="landing_yes_img2" src="https://image.ka-cn.com/landing/img/yes_img7.png" alt="">
                    <p class="landing_yes_p2">百名7*24小时在线客服，随时随地为您专业解答售前售后各项问题</p>
                </div>
                <div class="clear_both"></div>
            </div>
            <div class="clear_both"></div>
        </div>
    </div>
</div>
<div class="footer_img">
    <ul class="footer_fixed">
        <li><a href="/article-5.html" target="_blank">公司简介</a>|</li>
        <li><a href="https://www.ka-cn.com/cooperation.php" target="_blank">商务合作</a>|</li>
        <li><a href="/article-4.html" target="_blank">联系我们</a></li>
        <div class="clear_both"></div>
    </ul>
</div>



<style>
    .ask_box{position:fixed;right:40px;bottom:0px;width:144px;height:130px;text-align:center;}
    .ask_boxUl{background:#36A9E2;height:40px;display:flex;}
    .ask_box:hover .ask_boxUl{background:#219AD6;}
    .ask_boxLi{width:40px;height:40px;text-align:center;padding-top:12px;box-sizing:border-box;}
    .ask_boxText{height:40px;line-height:40px;width:104px;color:#fff;font-size:14px;border-left:1px solid #2890C4;}
    .ask_boxImg{width:24px;height:21px;}
    .ask_boxLion{width:80px;height:90px;vertical-align:bottom;}
    .ask_boxText{}
</style>
<div class="ask_box">
    <a href="/kefu.php?place=land-layer" target="_blank">
        <img src="https://image.ka-cn.com/themes/2009jingdong/images/ask_lion.png" class="ask_boxLion" />
        <ul class="ask_boxUl">
            <li class="ask_boxLi"><img src="https://image.ka-cn.com/themes/2009jingdong/images/ask_msg.png" class="ask_boxImg" /></li>
            <li class="ask_boxText">咨询客服</li>
        </ul>
    </a>
</div>
<style>
    .pin{
        border-color: blue;
    }
</style>
<script>

    $(function () {
        //	app引流二维码显示隐藏
        $('.H_landCode').mouseover(function () {
            $('.H_DownCode').show()
            $('.H_IconBottom').attr('src','https://image.ka-cn.com/images/H_IconTop.png')
        }).mouseout(function () {
            $('.H_DownCode').hide()
            $('.H_IconBottom').attr('src','https://image.ka-cn.com/images/H_IconBottom.png')
        })
        //关闭cj弹层
        $('.bg_img img').click(function () {
            $('.mask_layer').hide();
        })
        //微信支付方式弹层
        $('.gjf_tc').click(function () {
            $('.bg_tc').show()
            $('body,html').animate({scrollTop:0},500);
        })
        $('.gjf_tc_bg').click(function () {
            $('.bg_tc').hide()
        })
        //右侧客服悬停
        $('.landing_kf_bg1').mouseover(function () {
            $('.landing_kf_bg1 div img').attr('src','https://image.ka-cn.com/landing/img/kf_3.png')
        }).mouseout(function () {
            $('.landing_kf_bg1 div img').attr('src','https://image.ka-cn.com/landing/img/kf_6.png')
        })
        //右侧微信悬停
        $('.landing_kf_bg2').mouseover(function () {
            $('.landing_kf_img2').attr('src','https://image.ka-cn.com/landing/img/kf_2.png')
            $('.landing_app').stop(true,true).fadeIn()
        }).mouseout(function () {
            $('.landing_kf_img2').attr('src','https://image.ka-cn.com/landing/img/kf_5.png')
            $('.landing_app').hide()
        })
        //返回顶部
        $('.landing_kf_bg3').mouseover(function () {
            $('.landing_kf_bg3 div img').attr('src','https://image.ka-cn.com/landing/img/kf_1.png')
        }).mouseout(function () {
            $('.landing_kf_bg3 div img').attr('src','https://image.ka-cn.com/landing/img/kf_4.png')
        })
        $(".landing_kf_bg3").click(function() {
            $("html,body").animate({scrollTop:0}, 500);
        });
        //头部联系客服点击下拉
        $('.tgdjh_p2').click(function(){
            if( $(".tgdjh_div_div1").hasClass("show") ){
                // 执行隐藏
                $(".tgdjh_div_div1").hide().removeClass("show");
                $('.tgdjh_div').removeClass('js_tgdjh_div')
                $('.tgdjh_p2').removeClass('js_tgdjh_p2')
                // 其他
            }else{
                // 显示
                $(".tgdjh_div_div1").show().addClass("show");
                $('.tgdjh_div').addClass('js_tgdjh_div')
                $('.tgdjh_p2').addClass('js_tgdjh_p2')
            }
        })
        //防止其他金额变红
        $('.landing_me_list').click(function () {
            $(document).one("click", function() {
                $('.landing_me_qt').removeClass('js_border_red');
                $('.landing_fixed2').hide();
                $('#other').blur();
                event.stopPropagation(); //阻止事件向上冒泡
            })

        })
        //其他金额的点击
        $('.landing_me_qt').click(function () {
            var _this = $(this);
            $('.landing_cz_center_div1').addClass('js_value');
            $('.landing_cz_center_div1 input').attr('disabled','true');
            _this.find('.landing_me_p2').focus();
            $(document).one("click", function() {
                if(_this.find('.landing_me_p2').val()==''){
                    $('.landing_me_qt').addClass('js_border_red');
                    $('.landing_me_qt').removeClass('js_landing_me_list');
                    $('.landing_fixed2').show();
                    $(".otherFn_money").html('无');
                    //_this.find('.landing_me_p2').focus();
                }
            });
            event.stopPropagation(); //阻止事件向上冒泡
        })
        //提交
        $('.landing_cz_right_btn').click(function(){
            //其他金额合法性判断
            if($("#other_id_val").val()==1){
                /*if($('.landing_me_p2').val()==''){
                 $('.landing_me_qt').addClass('js_border_red');
                 $('.landing_me_qt').removeClass('js_landing_me_list');
                 $('.landing_fixed2').show();
                 $('.landing_me_p2').focus();
                 return false;
                 }*/
            }

            var type = $("#buy_type").val();
            if(type =='pg'){console.log("c");
                type='app';
            }
            addToCart('', '', type)	;
            //$(this).addClass('tgdjh_cz_btn2');
        });
        //扫码收款
        $('.js_img_show').mouseover(function () {
            $('.landing_tab_img2').addClass('js_landing_tab_img2')
            if(!$(this).hasClass('selected')){
                $(this).mouseout(function () {
                    $('.landing_tab_img2').removeClass('js_landing_tab_img2')
                })
            }
        })
        $('.js_img_show').click(function () {
            $('.landing_tab_img2').addClass('js_landing_tab_img2')
            $('.js_img_show').unbind('mouseout')
        })
        $('.js_img_hide').click(function () {
            $('.landing_tab_img2').removeClass('js_landing_tab_img2')
        })
    })

    //满足红包判断
    if($("#dg_money").length>0){
        $("#dg_money").bind('propertychange', function(e) {
            showBonus($(e.target).html());
        });
        $("#dg_money").bind('DOMNodeInserted', function(e) {
            showBonus($(e.target).html());
        });
        showBonus($('#dg_money').html());
    }
    //超级VIP
    if($("#svip_money").length>0){
        $("#svip_money").bind('propertychange', function(e) {
            showBonus($(e.target).html());
        });
        $("#svip_money").bind('DOMNodeInserted', function(e) {
            showBonus($(e.target).html());
        });
        showBonus($('#svip_money').html());
    }


    function showBonus(money) {

    }
</script>

<script>
    var _hmt = _hmt || [];
    (function() {
        var hm = document.createElement("script");
        hm.src = "//hm.baidu.com/hm.js?66b2b168302d5e0b6d22cf27371def23";
        var s = document.getElementsByTagName("script")[0];
        s.parentNode.insertBefore(hm, s);
    })();
</script>

<script async src="https://www.googletagmanager.com/gtag/js?id=UA-22446201-1"></script>
<script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-22446201-1');
</script>


<script async src="https://www.googletagmanager.com/gtag/js?id=AW-1043196135"></script>
<script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'AW-1043196135');
</script>

<script>
    !function(f,b,e,v,n,t,s)
    {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
        n.callMethod.apply(n,arguments):n.queue.push(arguments)};
        if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
        n.queue=[];t=b.createElement(e);t.async=!0;
        t.src=v;s=b.getElementsByTagName(e)[0];
        s.parentNode.insertBefore(t,s)}(window,document,'script',
        'https://connect.facebook.net/en_US/fbevents.js');
    fbq('init', '103209330554810');
    fbq('track', 'PageView');
</script>
<noscript>
    <img height="1" width="1"
         src="https://www.facebook.com/tr?id=103209330554810&ev=PageView
&noscript=1"/>
</noscript>
<script>
    gtag('event','view_item', {
        'items': {"id":"CC002296","google_business_vertical":"custom"}        });
</script>
{{--//自己 写到jq--}}
<script src="/js/jquery.js"></script>
<script>
    $(function () {
        //加
        $(document).on("click","#add",function () {
            var num=$(".pin").attr("num")
            if(num===undefined){
                alert("选择充值商品")
                return
            }
            var month=$("#month").val()
            $("#month").val(parseInt(month)+1)
            $("#price").html("￥"+parseInt(num)*(parseInt(month)+1))
        })
        //减
        $(document).on("click","#del",function () {
            var num=$(".pin").attr("num")
            if(num===undefined){
                alert("选择充值商品")
                return
            }
            var month=$("#month").val()
            if(parseInt(month)-1<=0){
                alert("我也是有底线的！！！")
                return
            }
            $("#month").val(parseInt(month)-1)
            $("#price").html("￥"+parseInt(num)*(parseInt(month)-1))
        })
        $(document).on("click","#pin",function () {
            $(".pin").removeClass("pin");
            $(this).addClass("pin")
            var num=$(".pin").attr("num")
            $("#month").val(1)
            $("#price").html("￥"+num)
        })
        $(document).on("click",".send",function () {
            var vip=$(".pin").children().next().next().html()
            var month=$("#month").val()
            if(vip===undefined){
                alert("选择充值商品")
                return
            }
            if(month===undefined){
                alert("选择数量")
                return
            }
            location.href="/index/vip/payAjax?vip_name="+vip+"&month="+month
        })
    })
</script>
</body>
</html>