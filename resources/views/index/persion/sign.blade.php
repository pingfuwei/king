@extends('layout.index')
@section('content')
    <link rel="stylesheet" href="/index/asset/css/modallayer.min.css">
    <script src="https://cdn.bootcss.com/font-awesome/5.11.2/js/all.min.js"></script>
    <script src="/index/asset/js/modallayer-ie.min.js"></script>
<div style="background-image: url(/img/timg.gif); width: 1250px; height: 500px">
{{--<img src="/img/timg.gif" alt="" style="float: left">--}}
{{--<h1 align="center" ><font style="color: cornflowerblue">签到了</font></h1>--}}
    <center>
    <div>
<h2 style="color: #00a65a">今天你的心情怎么样呢？</h2>
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
    <div>
        对本网站的建议:<textarea  style="width: 200px ; height: 40px" class="content" ></textarea></div>

    <font style="font-size: smaller;color:red" >签到可获得积分哦！！！</font><br>
    <button class="btn layui-btn"  id="msg-button" style="width: 100px; height: 40px; background: cadetblue;">点击签到</button><br>
    </div>
    </center>
</div>
</table>
</body>
</html>
<script src="/js/jquery.min.js"></script>
<script>
    $(".btn").click(function(){
       var val=$('input:radio[name="face"]:checked').val();
        var content=$(".content").val();
//        console.log(content);
        $.get(
            "{{url('index/persion/Dosign')}}",
             {'val':val,'content':content},
              function(res){
//                  console.log(res);return;
                  if(res.code=='000'){
//                      alert(res.msg);
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
                          content: '<i class="fas fa-check" style="color: green"></i>'+res.msg+'',
                      };

                      ModalLayer.msg(option);
                      location.href="{{url('/')}}"
                  }else{
//                      alert(res.msg);
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
                          content: '<i style="color: deepskyblue"></i>'+res.msg+'!',
                      };

                      ModalLayer.msg(option);
                      {{--location.href="{{url('/')}}"--}}
                  }
              }
        )
    })
</script>

@endsection




