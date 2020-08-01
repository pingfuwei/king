@extends('index.persion.index')
@section('contents')
                <!--右侧主内容-->
                <div class="yui3-u-5-6">
                    <div class="body userAddress">
						<div class="address-title">
							<span class="title">个人信息管理</span>
						</div>
						<div class="address-detail">
							<table class="sui-table table-bordered">
								<thead>
								<tr>

									<th>用户名</th>
									<th>{{session("user_name")}}</th>
								</tr>
								<tr>
									<th>地址</th>
									<th>{{$province}}{{$city}}{{$area}}</th>
								</tr>
								<tr>
									<th>性别</th>
									<th>{{$data->sex=="1" ? "男" : "女"}}</th>
								</tr>
								<tr>
									<th>联系电话</th>
									<th>{{$data->tel}}</th>
								</tr>
								<tr>
									<th>会员</th>
									<th>
										@if($vipinfo)
											{{$vipinfo->vip_name}}
										@else
											普通用户
										@endif
									</th>
								</tr>
								</thead>

							</table>
						</div>
						<script src="/layui/bootstrap.min.js"></script>
						<button class="button button3"><a href="{{url('index/persion/pers')}}">修改个人信息</a></button>
						<button class="button button3"><a href="{{url('index/persion/sign')}}">签到</a></button>
                        <!--新增地址弹出层-->
                         <div  tabindex="-1" role="dialog" data-hasfoot="false" class="sui-modal hide fade edit" style="width:580px;">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" data-dismiss="modal" aria-hidden="true" class="sui-close">×</button>
                                        <h4 id="myModalLabel" class="modal-title">新增地址</h4>
                                    </div>
                                    <div class="modal-body">
                                        <form action="" class="sui-form form-horizontal">
                                            <div class="control-group">
                                            <label class="control-label">收货人：</label>
                                            <div class="controls">
                                                <input type="text" class="input-medium">
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label">所在地区：</label>
                                            <div class="controls">
                                                <div data-toggle="distpicker">
                                                <div class="form-group area">
                                                    <select class="form-control" id="province1"></select>
                                                </div>
                                                <div class="form-group area">
                                                    <select class="form-control" id="city1"></select>
                                                </div>
                                                <div class="form-group area">
                                                    <select class="form-control" id="district1"></select>
                                                </div>
                                            </div>
                                            </div>									 
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label">详细地址：</label>
                                            <div class="controls">
                                                <input type="text" class="input-large">
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label">联系电话：</label>
                                            <div class="controls">
                                                <input type="text" class="input-medium">
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label">邮箱：</label>
                                            <div class="controls">
                                                <input type="text" class="input-medium">
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label">地址别名：</label>
                                            <div class="controls">
                                                <input type="text" class="input-medium">
                                            </div>
                                            <div class="othername">
                                                建议填写常用地址：<a href="#" class="sui-btn btn-default">家里</a>　<a href="#" class="sui-btn btn-default">父母家</a>　<a href="#" class="sui-btn btn-default">公司</a>
                                            </div>
                                        </div>
                                        
                                        </form>
                                        
                                        
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" data-ok="modal" class="sui-btn btn-primary btn-large">确定</button>
                                        <button type="button" data-dismiss="modal" class="sui-btn btn-default btn-large">取消</button>
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
