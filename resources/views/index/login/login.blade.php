<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=9; IE=8; IE=7; IE=EDGE">
    <meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
    <title>品优购，欢迎登录</title>

    <link rel="stylesheet" type="text/css" href="/index/css/webbase.css" />
    <link rel="stylesheet" type="text/css" href="/index/css/pages-login.css" />


<link rel="stylesheet" href="/index/asset/css/modallayer.min.css">
  <script src="https://cdn.bootcss.com/font-awesome/5.11.2/js/all.min.js"></script>
  <script src="/index/asset/js/modallayer-ie.min.js"></script>
</head>

<body>
<div class="login-box">
    <!--head-->
    <div class="py-container logoArea">
        <a href="" class="logo"></a>
    </div>
    <!--loginArea-->
    <div class="loginArea" >
        <div class="py-container login">
            <div class="loginform forget">
                <ul class="sui-nav nav-tabs tab-wraped">
                    <li>
                        <a href="#index" data-toggle="tab">
                            <h3>扫描登录</h3>
                        </a>
                    </li>
                    <li class="active">
                        <a href="#profile" data-toggle="tab">
                            <h3>账户登录</h3>
                        </a>
                    </li>
                </ul>
                <div class="tab-content tab-wraped">
                    <div id="index" class="tab-pane">
                        <p>二维码登录，暂为官网二维码</p>
                        <img src="/index/img/wx_cz.jpg" />
                    </div>
                    <div id="profile" class="tab-pane  active " >
                        <form class="sui-form">
                            <div class="input-prepend"><span class="add-on loginname"></span>
                                <input id="prependedInput" type="text" value="{{request()->cookie("user")}}"  placeholder="用户名/手机号" class="span2 input-xfat user_name">
                            </div>
                            <div class="input-prepend"><span class="add-on loginpwd"></span>
                                <input id="prependedInput" type="password" value="{{request()->cookie("user_pwd")}}" placeholder="请输入密码" class="span2 input-xfat user_pwd">
                            </div>
                            <div class="setting">
                                <label class="checkbox inline">
                                    <input name="m1" type="checkbox" id="che" value="2" checked="">
                                    七天免登录
                                </label>
                                <span class="forget"><a href="javascript:;" id="forget">忘记密码？</a></span>
                            </div>
                            <div class="logined">
                                <a class="sui-btn btn-block btn-xlarge btn-danger" href="javascript:;" id="send" >登&nbsp;&nbsp;录</a>
                            </div>
                        </form>
                        <div class="otherlogin">
                            <div class="types">
                                <ul>
                                    <li><img src="/index/img/qq.png" width="35px" height="35px" /></li>
                                    <li><img src="/index/img/sina.png" /></li>
                                    <li><img src="/index/img/ali.png" /></li>
                                    <li><img src="/index/img/weixin.png" /></li>
                                </ul>
                            </div>
                            <span class="register"><a href="/index/reg/reg" >立即注册</a></span>
                        </div>
                    </div>
                </div>
            </div>
            {{--=========================================================================忘记密码--}}
            <div class="loginform logins" style="display: none">
                <ul class="sui-nav nav-tabs tab-wraped" >
                    <li>
                        <a href="#profile" data-toggle="tab">
                            <h3>修改密码</h3>
                        </a>
                    </li>
                </ul>
                <div class="tab-content tab-wraped">
                    <div id="index" class="tab-pane">
                        <p>二维码登录，暂为官网二维码</p>
                        <img src="/index/img/wx_cz.jpg" />
                    </div>
                    <div id="profile" class="tab-pane  active" >
                        <form class="sui-form">
                            <div class="input-prepend"><span class="add-on loginname"></span>
                                <input id="prependedInput" type="text"   placeholder="用户名/手机号" style="width: 225px;" class="span input-xfat user_tel">
                                <input type="button" value="发送验证码" id="getcode" class="btn btn-success" style="width: 80px;height: 35px;">
                            </div>
                            <div class="input-prepend"><span class="add-on loginpwd"></span>
                                <input id="prependedInput" type="text"  placeholder="验证码" class="span2 input-xfat codes">
                            </div>
                            <div class="input-prepend"><span class="add-on loginpwd"></span>
                                <input id="prependedInput" type="password"  placeholder="请输入密码" class="span2 input-xfat user_pwds">
                            </div>
                            <div class="input-prepend"><span class="add-on loginpwd"></span>
                                <input id="prependedInput" type="password"  placeholder="确认密码" class="span2 input-xfat user_pwdss">
                            </div>
                            <div class="logined">
                                <a class="sui-btn btn-block btn-xlarge btn-danger" href="javascript:;" id="sendPas" >确认&nbsp;&nbsp;更改</a>
                            </div>
                        </form>
                        <div class="otherlogin" >
                            <span class="register" id="msg-button" style="margin-top: -30px;"><a href="/index/login/login" >立即登陆</a></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--foot-->
    <div class="py-container copyright">
        <ul>
            <li>关于我们</li>
            <li>联系我们</li>
            <li>联系客服</li>
            <li>商家入驻</li>
            <li>营销中心</li>
            <li>手机品优购</li>
            <li>销售联盟</li>
            <li>品优购社区</li>
        </ul>
        <div class="address">地址：北京市昌平区建材城西路金燕龙办公楼一层 邮编：100096 电话：400-618-4000 传真：010-82935100</div>
        <div class="beian">京ICP备08001421号京公网安备110108007702
        </div>
    </div>
</div>

<script type="text/javascript" src="/index/js/plugins/jquery/jquery.min.js"></script>
<script type="text/javascript" src="/index/js/plugins/jquery.easing/jquery.easing.min.js"></script>
<script type="text/javascript" src="/index/js/plugins/sui/sui.min.js"></script>
<script type="text/javascript" src="/index/js/plugins/jquery-placeholder/jquery.placeholder.min.js"></script>
<script type="text/javascript" src="/index/js/pages/login.js"></script>
</body>
<script>
        $(function () {
            $(document).on("click","#send",function () {
                var user_name=$(".user_name").val()
                var user_pwd=$(".user_pwd").val()
                var che=$("#che:checked").val()
                if(che!==undefined){
                    che =che;
                }else{
                    che=1
                }
                if(user_name===""){
                    // alert("账户不能为空")
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
                      content: '<i style="color: deepskyblue"></i>账户不能为空!',
                    };

                    ModalLayer.msg(option);
                    return
                }
                if(user_pwd===""){
                    // alert("密码不能为空")
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
                      content: '<i style="color: deepskyblue"></i>密码不能为空!',
                    };

                    ModalLayer.msg(option);
                    return
                }
                var data={user_name:user_name,user_pwd:user_pwd,che:che}
                $.ajax({
                    url:"/index/login/ajaxLogin",
                    data:data,
                    dataType:"json",
                    success:function (res) {
                        // alert(res.font)
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
                          content: '<i class="fas fa-check" style="color: green"></i>'+res.font+'!',
                        };

                        ModalLayer.msg(option);
                        if(res.code==="000"){
                            location.href="http://www.king.com/"
                        }
                    }
                })
            })
            $(document).on("click","#forget",function () {
                $(".forget").hide()
                $(".logins").show()
            })
//            =======================================忘记密码js
            $(document).on("click","#getcode",function () {
                var user_tel=$(".user_tel").val()
                var pattern = /^1[34578]\d{9}$/;
                if(user_tel===""){
                    // alert("手机号必填")
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
                      content: '<i style="color: deepskyblue"></i>手机号必填!',
                    };

                    ModalLayer.msg(option);
                    return
                }
                if(!pattern.test(user_tel)){
                    // alert("格式不对")
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
                      content: '<i style="color: deepskyblue"></i>格式不对!',
                    };

                    ModalLayer.msg(option);
                }else{
                    $("#getcode").val("60s");//这个是吧span里面值改成5s
                    _t=setInterval(vals,1000);//定时器
                    $("#getcode").css("pointer-events", "none")//置灰
                    $.ajax({
                        url:"/index/login/ajaxCode",
                        data:{user_tel:user_tel},
                        success:function (res) {
                            console.log(res)
                            if(res=="ok"){
                                // alert("发送成功")
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
                                  content: '<i class="fas fa-check" style="color: green"></i>发送成功!',
                                };

                                ModalLayer.msg(option);
                            }
                        }
                    })
                }
            })
            $(document).on("click","#sendPas",function () {
                var pattern = /^1[34578]\d{9}$/;
                var user_tel=$(".user_tel").val()
                var codes=$(".codes").val()
                var user_pwds=$(".user_pwds").val()
                var user_pwdss=$(".user_pwdss").val()
                var date={user_tel:user_tel,codes:codes,user_pwds:user_pwds}
                if(user_tel===""){
                    // alert("手机号不能为空")
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
                      content: '<i style="color: deepskyblue"></i>手机号不能为空!',
                    };

                    ModalLayer.msg(option);
                    return
                }else if(!pattern.test(user_tel)){
                    // alert("手机号格式不对")
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
                      content: '<i style="color: deepskyblue"></i>手机号格式不对!',
                    };

                    ModalLayer.msg(option);
                    return
                }
                if(codes===""){
                    // alert("验证码不能为空")
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
                      content: '<i style="color: deepskyblue"></i>验证码不能为空!',
                    };

                    ModalLayer.msg(option);
                    return
                }
                if(user_pwds===""){
                    // alert("密码不能为空")
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
                      content: '<i style="color: deepskyblue"></i>密码不能为空!',
                    };

                    ModalLayer.msg(option);
                    return
                }
                if(user_pwdss===""){
                    // alert("确认密码不能为空")
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
                      content: '<i style="color: deepskyblue"></i>确认密码不能为空!',
                    };

                    ModalLayer.msg(option);
                    return
                }
                if(user_pwds!==user_pwdss){
                    // alert("两次密码不一致")
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
                      content: '<i style="color: deepskyblue"></i>两次密码不一致!',
                    };

                    ModalLayer.msg(option);
                    return
                }
                $.ajax({
                    url:"/index/login/forgetPas",
                    data:date,
                    dataType:"json",
                    success:function (res) {
                        // alert(res.font)
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
                          content: '<i class="fas fa-check" style="color: green"></i>'+res.font+'!',
                        };

                        ModalLayer.msg(option);
                    }
                })

            })




            function vals() {
                s=$("#getcode").val();
                s=parseInt(s);
                if(s<=0){
                    s=$("#getcode").val("获取验证码");
                    clearInterval(_t)
                    $("#getcode").css("pointer-events", "auto")
                }else{
                    s=s-1;
                    s=$("#getcode").val(s+"s");
                    $("#getcode").css("pointer-events", "none")
                }


            }
        })
</script>
</html>
