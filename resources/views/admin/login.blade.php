<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8"/>
<title>后台登录</title>
<meta name="author" content="DeathGhost" />
<link rel="stylesheet" type="text/css" href="/login/css/style.css" />
<style>
body{height:100%;background:#16a085;overflow:hidden;}
canvas{z-index:-1;position:absolute;}
</style>
    <script src="/login/js/jquery.js"></script>
    <script src="/login/js/verificationNumbers.js"></script>
    <script src="/login/js/Particleground.js"></script>
 <script src="/login/js/jquery.js"></script>
    <script src="/login/js/jquery.js"></script>
    <script src="/login/js/verificationNumbers.js"></script>
    <script src="/login/js/Particleground.js"></script>
<script>
$(document).ready(function() {
    //粒子背景特效
    $('body').particleground({
        dotColor: '#5cbdaa',
        lineColor: '#5cbdaa'
    });
})
</script>
</head>
<body>
    <div id="app">
<dl class="admin_login">
 <dt>
  <strong>后台管理系统</strong>
  <em>Management System</em>
 </dt>
 <dd class="user_icon">
  <input type="text" placeholder="账号" class="login_txtbx" name="admin_name"/>
 </dd>
 <dd class="pwd_icon">
  <input type="password" placeholder="密码" class="login_txtbx" name="admin_pwd"/>
 </dd>
 <dd class="val_icon">
     <a href="#">欢迎使用后台管理</a>
 </dd>
 <dd>
  <input type="button" id="but" value="立即登陆" class="submit_btn"/>
 </dd>
 <dd>
  <p>© 2015-2016 DeathGhost 版权所有</p>
  <p>陕B2-20080224-1</p>
 </dd>
</dl>
</div>
</body>
</html>

<script>
    $(function(){
        $(document).on("click","#but",function(){
            var data = {};
            data.admin_name = $("input[name='admin_name']").val();
            data.admin_pwd = $("input[name='admin_pwd']").val();
            var url = "/admin/loginis";
            $.ajax({
                type:"post",
                url:url,
                data:data,
                dataType:"json",
                success:function(res){
                    // console.log(res);
                    if(res.status=="true"){
                        alert(res.msg);
                        location.href="indexs";
                    }else{
                        alert(res.msg);
                    }
                }
            })
        })
    })
    $.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});
</script>
</html>
