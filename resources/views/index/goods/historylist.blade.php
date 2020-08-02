<div class="tbar-panel-content J-panel-content" id="btn">
    <div class="jt-history-wrap ">
        <ul>
            @foreach($datas as $k=>$v)
                <li class="jth-item but">
                    <a href="#" class="img-wrap"> <img src="{{env("UPLOADS_URL")}}{{$v->goods_img}}" height="100" width="100" /> </a>
                    <a class="add-cart-button" href="#" target="_blank">加入购物车</a>
                    <a href="#" target="_blank" class="price">￥{{$v->goods_price}}</a>
                    <div height="10" width="100" style="background: plum"><a ><b class="del" his_id="{{$v->his_id}}" style="align-content: center">删除记录</b></a></div>
                </li>
            @endforeach
        </ul>
        <a href="#" class="history-bottom-more" target="_blank">查看更多足迹商品 &gt;&gt;</a>

    </div>
</div>