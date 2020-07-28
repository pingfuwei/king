
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
<h2 align="center">签到</h2>
<h3>今天你的心情怎么样呢？</h3>
<input type="radio" value="face2.gif" name="face" checked="checked">
<img border="0" src="/index/images/face2.gif">
<input type="radio" value="face1.gif" name="face">
<img border="0" src="/index/images/face1.gif">
<input type="radio" value="face3.gif" name="face">
<img border="0" src="/index/images/face3.gif">
<input type="radio" value="face4.gif" name="face">
<img border="0" src="/index/images/face4.gif">
<input type="radio" value="face5.gif" name="face">
<img border="0" src="/index/images/face5.gif">
<input type="radio" value="face6.gif" name="face">
<img border="0" src="/index/images/face6.gif">
<input type="radio" value="face7.gif" name="face">
<img border="0" src="/index/images/face7.gif">
<input type="radio" value="face8.gif" name="face">
<img border="0" src="/index/images/face8.gif">
<input type="radio" value="face9.gif" name="face">
<img border="0" src="/index/images/face9.gif">
<input type="radio" value="face10.gif" name="face">
<img border="0" src="/index/images/face10.gif"><br>
<button class="btn">签到</button><br>

</body>
</html>
<script src="/js/jquery.min.js"></script>
<script>
    $(".btn").click(function(){
       var val=$('input:radio[name="face"]:checked').val();
        $.get(
            "{{url('index/persion/Dosign')}}",
             {'val':val},
              function(res){
                  if(res.code=='000'){
                      alert(res.msg);
                      location.href="{{url('/')}}"
                  }else{
                      alert(res.msg);
                  }
              }
        )
    })
</script>