@extends('layout.index')
@section('content')
		<div class="main">
		<div class="py-container">
			<!--bread-->
			<div class="bread">
				<ul class="fl sui-breadcrumb">
					<li>
						<a href="#">全部结果</a>
					</li>
					@foreach ($form1 as $v)
					<li class="active"><a href="/index/cate/list?cate_id={{$v['cate_id']}}" style="color: #000;" >{{$v['cate_name']}}</a></li>	
					@endforeach					
				</ul>
				<ul class="tags-choose">
					<li class="tag">全网通<i class="sui-icon icon-tb-close"></i></li>
					<li class="tag">63G<i class="sui-icon icon-tb-close"></i></li>
				</ul>
				<form class="fl sui-form form-dark">
					<div class="input-control control-right">
						<input type="text" />
						<i class="sui-icon icon-touch-magnifier"></i>
					</div>
				</form>
				<div class="clearfix"></div>
			</div>
			<!--selector-->
			<div class="clearfix selector">
				<div class="type-wrap">
					<div class="fl key">{{$form3[0]['cate_name']}}</div>
					<div class="fl value">
						@if($form2)
						@foreach ($form2 as $val)
						<a href="/index/cate/list?cate_id={{$val['cate_id']}}" style="color: #000;">{{$val['cate_name']}}/</a>
						@endforeach
						@elseif(empty($form2))
						<b>该分类下没有没有子分类</b>	
						@endif
						
					</div>
					<div class="fl ext"></div>
				</div>
				<div class="type-wrap logo">
					<div class="fl key brand">品牌</div>
					<div class="value logos">
						<ul class="logo-list">
							@foreach ($arr1 as $val)
							{{$val[0]['brand_name']}}
							@endforeach
<!-- 							<li><img src="/img/_/phone02.png" /></li>
 -->						</ul>
					</div>
					<div class="ext">
						<a href="javascript:void(0);" class="sui-btn">多选</a>
						<a href="javascript:void(0);">更多</a>
					</div>
				</div>
   				@foreach ($arr4 as $key => $value)
   				@foreach ($value as $k => $v)
				<div class="type-wrap">
					<div class="fl key">{{$v['attr_name']}}</div>
					<div class="fl value">
						<ul class="type-list">
							@foreach ($v['data']  as $i => $n)
							<li>
								<a>{{$n['goods_val_name']}}</a>
							</li>
							@endforeach
						</ul>
					</div>
					<div class="fl ext"></div>
				</div>
				@endforeach
				@endforeach
			</div>
			<!--details-->
			<div class="details">
				<div class="sui-navbar">
					<div class="navbar-inner filter">
						<ul class="sui-nav">
							<li class="active">
								<a href="#">综合</a>
							</li>
							<li>
								<a href="#">销量</a>
							</li>
							<li>
								<a href="#">新品</a>
							</li>
							<li>
								<a href="#">评价</a>
							</li>
							<li>
								<a href="#">价格</a>
							</li>
						</ul>
					</div>
				</div>
				<div class="goods-list">
					<ul class="yui3-g">
						@foreach ($data as $val)
						<li class="yui3-u-1-5">
							<div class="list-wrap">
								<div class="p-img">
									<a href="item.html" target="_blank"><img src="{{env('UPLOADS_URL')}}{{$val['goods_img']}}" width="500px" height="500px;"></a>
								</div>
								<div class="price">
									<strong>
											<em>¥</em>
											<i>{{$val['goods_price']}}</i>
										</strong>
								</div>
								<div class="attr">
									<em>{{$val['goods_name']}}</em>
								</div>
								<div class="cu">
									<em><span>促</span>满一件可参加超值换购</em>
								</div>								
								<div class="commit">
									<i class="command">已有2000人评价</i>
								</div>
								<div class="operate">
									<a href="success-cart.html" target="_blank" class="sui-btn btn-bordered btn-danger">加入购物车</a>
									<a href="javascript:void(0);" class="sui-btn btn-bordered">对比</a>
									<a href="javascript:void(0);" class="sui-btn btn-bordered">关注</a>
								</div>
							</div>
						</li>
						@endforeach
					</ul>
				</div>
				<div class="fr page">
					<div class="sui-pagination pagination-large">
						<ul>
							<li class="prev disabled">
								<a href="#">«上一页</a>
							</li>
							<li class="active">
								<a href="#">1</a>
							</li>
							<li>
								<a href="#">2</a>
							</li>
							<li>
								<a href="#">3</a>
							</li>
							<li>
								<a href="#">4</a>
							</li>
							<li>
								<a href="#">5</a>
							</li>
							<li class="dotted"><span>...</span></li>
							<li class="next">
								<a href="#">下一页»</a>
							</li>
						</ul>
						<div><span>共10页&nbsp;</span><span>
      到第
      <input type="text" class="page-num">
      页 <button class="page-confirm" onclick="alert(1)">确定</button></span></div>
					</div>
				</div>
			</div>
			<!--hotsale-->
			<div class="clearfix hot-sale">
				<h4 class="title">热卖商品</h4>
				<div class="hot-list">
					<ul class="yui3-g">
						<li class="yui3-u-1-4">
							<div class="list-wrap">
								<div class="p-img">
									<img src="/img/like_01.png" />
								</div>
								<div class="attr">
									<em>Apple苹果iPhone 6s (A1699)</em>
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
						<li class="yui3-u-1-4">
							<div class="list-wrap">
								<div class="p-img">
									<img src="/img/like_03.png" />
								</div>
								<div class="attr">
									<em>金属A面，360°翻转，APP下单省300！</em>
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
						<li class="yui3-u-1-4">
							<div class="list-wrap">
								<div class="p-img">
									<img src="/img/like_04.png" />
								</div>
								<div class="attr">
									<em>256SSD商务大咖，完爆职场，APP下单立减200</em>
								</div>
								<div class="price">
									<strong>
											<em>¥</em>
											<i>4068.00</i>
										</strong>
								</div>
								<div class="commit">
									<i class="command">已有20人评价</i>
								</div>
							</div>
						</li>
						<li class="yui3-u-1-4">
							<div class="list-wrap">
								<div class="p-img">
									<img src="/img/like_02.png" />
								</div>
								<div class="attr">
									<em>Apple苹果iPhone 6s (A1699)</em>
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
@endsection