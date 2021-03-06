
<!DOCTYPE html>
<html>

<head>
    <!-- 页面meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>后台管理系统</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no" name="viewport">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- 页面meta /-->

    <link rel="stylesheet" href="/plugins/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/plugins/adminLTE/css/AdminLTE.css">
    <link rel="stylesheet" href="/plugins/adminLTE/css/skins/_all-skins.min.css">
    <link rel="stylesheet" href="/css/style.css">
    <script src="/plugins/jQuery/jquery-2.2.3.min.js"></script>



    <script type="text/javascript">

        function SetIFrameHeight(){
            var iframeid=document.getElementById("iframe"); //iframe id
            if (document.getElementById){
                iframeid.height =document.documentElement.clientHeight;
            }
        }

    </script>

</head>

<body class="hold-transition skin-blue sidebar-mini">

<div class="wrapper">

    <!-- 页面头部 -->
    <header class="main-header">
        <!-- Logo -->
        <a href="index.html" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini"><b>品优购</b></span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><b>品优购</b>商家后台</span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a>

            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <!-- Messages: style can be found in dropdown.less-->
                    <li class="dropdown messages-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-envelope-o"></i>
                            <span class="label label-success">4</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="header">你有4个邮件</li>
                            <li>
                                <!-- inner menu: contains the actual data -->
                                <ul class="menu">
                                    <li>
                                        <!-- start message -->
                                        <a href="#">
                                            <div class="pull-left">
                                                <img src="/img/110.jpg" class="img-circle" alt="User Image">
                                            </div>
                                            <h4>
                                                系统消息
                                                <small><i class="fa fa-clock-o"></i> 5 分钟前</small>
                                            </h4>
                                            <p>欢迎登录系统?</p>
                                        </a>
                                    </li>
                                    <!-- end message -->
                                    <li>
                                        <a href="#">
                                            <div class="pull-left">
                                                <img src="/img/user3-128x128.jpg" class="img-circle" alt="User Image">
                                            </div>
                                            <h4>
                                                团队消息
                                                <small><i class="fa fa-clock-o"></i> 2 小时前</small>
                                            </h4>
                                            <p>你有新的任务了</p>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <div class="pull-left">
                                                <img src="/img/user4-128x128.jpg" class="img-circle" alt="User Image">
                                            </div>
                                            <h4>
                                                Developers
                                                <small><i class="fa fa-clock-o"></i> Today</small>
                                            </h4>
                                            <p>Why not buy a new awesome theme?</p>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <div class="pull-left">
                                                <img src="/img/user3-128x128.jpg" class="img-circle" alt="User Image">
                                            </div>
                                            <h4>
                                                Sales Department
                                                <small><i class="fa fa-clock-o"></i> Yesterday</small>
                                            </h4>
                                            <p>Why not buy a new awesome theme?</p>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <div class="pull-left">
                                                <img src="/img/user4-128x128.jpg" class="img-circle" alt="User Image">
                                            </div>
                                            <h4>
                                                Reviewers
                                                <small><i class="fa fa-clock-o"></i> 2 days</small>
                                            </h4>
                                            <p>Why not buy a new awesome theme?</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="footer"><a href="#">See All Messages</a></li>
                        </ul>
                    </li>
                    <!-- Notifications: style can be found in dropdown.less -->
                    <li class="dropdown notifications-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-bell-o"></i>
                            <span class="label label-warning">10</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="header">你有10个新消息</li>
                            <li>
                                <!-- inner menu: contains the actual data -->
                                <ul class="menu">
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-users text-aqua"></i> 5 new members joined today
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-warning text-yellow"></i> Very long description here that may not fit into the page and may cause design problems
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-users text-red"></i> 5 new members joined
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-shopping-cart text-green"></i> 25 sales made
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-user text-red"></i> You changed your username
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="footer"><a href="#">View all</a></li>
                        </ul>
                    </li>
                    <!-- Tasks: style can be found in dropdown.less -->
                    <li class="dropdown tasks-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-flag-o"></i>
                            <span class="label label-danger">9</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="header">你有9个新任务</li>
                            <li>
                                <!-- inner menu: contains the actual data -->
                                <ul class="menu">
                                    <li>
                                        <!-- Task item -->
                                        <a href="#">
                                            <h3>
                                                Design some buttons
                                                <small class="pull-right">20%</small>
                                            </h3>
                                            <div class="progress xs">
                                                <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                                    <span class="sr-only">20% Complete</span>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <!-- end task item -->
                                    <li>
                                        <!-- Task item -->
                                        <a href="#">
                                            <h3>
                                                Create a nice theme
                                                <small class="pull-right">40%</small>
                                            </h3>
                                            <div class="progress xs">
                                                <div class="progress-bar progress-bar-green" style="width: 40%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                                    <span class="sr-only">40% Complete</span>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <!-- end task item -->
                                    <li>
                                        <!-- Task item -->
                                        <a href="#">
                                            <h3>
                                                Some task I need to do
                                                <small class="pull-right">60%</small>
                                            </h3>
                                            <div class="progress xs">
                                                <div class="progress-bar progress-bar-red" style="width: 60%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                                    <span class="sr-only">60% Complete</span>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <!-- end task item -->
                                    <li>
                                        <!-- Task item -->
                                        <a href="#">
                                            <h3>
                                                Make beautiful transitions
                                                <small class="pull-right">80%</small>
                                            </h3>
                                            <div class="progress xs">
                                                <div class="progress-bar progress-bar-yellow" style="width: 80%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                                    <span class="sr-only">80% Complete</span>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <!-- end task item -->
                                </ul>
                            </li>
                            <li class="footer">
                                <a href="#">View all tasks</a>
                            </li>
                        </ul>
                    </li>
                    <!-- User Account: style can be found in dropdown.less -->
                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <img src="/img/110.jpg" class="user-image" alt="User Image">
                            <span class="hidden-xs">{{session("user.admin_name")}}</span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- User image -->
                            <li class="user-header">
                                <img src="/img/110.jpg" class="img-circle" alt="User Image">

                                <p>
                                    {{session('user.admin_name')}}
                                    <small>最后登录 11:20AM</small>
                                </p>
                            </li>

                            <!-- Menu Footer-->
                            <li class="user-footer">
                                <div class="pull-left">
                                    <a href="#" class="btn btn-default btn-flat">修改密码</a>
                                </div>
                                <div class="pull-right">
                                    <a href="/admin/exit" class="btn btn-default btn-flat">退出</a>
                                </div>
                            </li>
                        </ul>
                    </li>

                </ul>
            </div>
        </nav>
    </header>
    <!-- 页面头部 /-->

    <!-- 导航侧栏 -->
    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <!-- Sidebar user panel -->
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="/img/110.jpg" class="img-circle" alt="User Image">
                </div>
                <div class="pull-left info">
                    <p>{{session("user.admin_name")}}</p>
                    <a href="#"><i class="fa fa-circle text-success"></i> 在线</a>
                </div>
            </div>
            <ul class="sidebar-menu"  >
                <li class="header">菜单</li>
                <li id="admin-index"><a href="/admin/indexs"><i class="fa fa-dashboard"></i> <span>首页</span></a></li>

                <li id="admin-index"><a href="/admin/index"><i class="fa fa-dashboard"></i> <span>控制面板</span></a></li>

                <!-- 菜单 -->
                <li class="treeview">
                    <a href="#">

                        <i class="fa fa-folder"></i>
                        <span>管理员管理</span>
                        <span class="pull-right-container">
				       			<i class="fa fa-angle-left pull-right"></i>
				   		 	</span>
                    </a>
                    <ul class="treeview-menu">

                        <li id="admin-login">

                            <a href="/admin/admin/create">

                                <i class="fa fa-circle-o"></i> 管理员添加
                            </a>
                        </li>
                        <li id="admin-login">
                            <a href="/admin/admin/index">
                                <i class="fa fa-circle-o"></i> 管理员展示
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-folder"></i>
                        <span>开发者管理</span>
                        <span class="pull-right-container">
				       			<i class="fa fa-angle-left pull-right"></i>
				   		 	</span>
                    </a>
                    <ul class="treeview-menu">

                        <li id="admin-login"class="treeview">
                             <a href="#">
                                <i class="fa fa-folder"></i>
                                <span>角色管理</span>
                                    <span class="pull-right-container">
				       			<i class="fa fa-angle-left pull-right"></i>
				   		 	        </span>
                            </a>
                            <ul class="treeview-menu" class="treeview-menu">

                                <li id="admin-login" >
                                    <a href="{{url('admin/role/create')}}">
                                        <i class="fa fa-circle-o"></i> 角色添加
                                    </a>
                                </li>
                                <li id="admin-login">
                                    <a href="{{url('admin/role/index')}}" >
                                        <i class="fa fa-circle-o"></i> 角色管理
                                    </a>
                                </li>
                            </ul>
                            </li>
                        <li>
                            <a href="#">
                                <i class="fa fa-folder"></i>
                                <span>权限管理</span>
                                    <span class="pull-right-container">
				       			<i class="fa fa-angle-left pull-right"></i>
				   		 	        </span>
                            </a>
                            <ul class="treeview-menu" class="treeview-menu">

                                <li id="admin-login">
                                    <a href="{{url('admin/power/create')}}">
                                        <i class="fa fa-circle-o"></i> 权限添加
                                    </a>
                                </li>
                                <li id="admin-login">
                                    <a href="{{url('admin/power/index')}}" >
                                        <i class="fa fa-circle-o"></i> 权限管理
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-folder"></i>
                        <span>VIP管理</span>
                        <span class="pull-right-container">
				       			<i class="fa fa-angle-left pull-right"></i>
				   		 	</span>
                    </a>
                    <ul class="treeview-menu">

                        <li id="admin-login">
                            <a href="{{url('admin/vip/create')}}">
                                <i class="fa fa-circle-o"></i> VIP添加
                            </a>
                        </li>
                        <li id="admin-login">
                            <a href="{{url('admin/vip/index')}}">

                                <i class="fa fa-circle-o"></i> VIP管理
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-folder"></i>
                        <span>用户优惠券管理</span>
                        <span class="pull-right-container">
                       			<i class="fa fa-angle-left pull-right"></i>
                   		 	</span>
                    </a>
                    <ul class="treeview-menu">

                        <li id="admin-login">
                            <a href="{{url('admin/userdis/create')}}">
                                <i class="fa fa-circle-o"></i> 用户优惠券添加
                            </a>
                        </li>
                        <li id="admin-login">
                            <a href="{{url('admin/userdis/index')}}">

                                <i class="fa fa-circle-o"></i> 用户优惠券管理
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="treeview">
                    <a href="/admin/news/index">
                        <i class="fa fa-folder"></i>
                        <span>分类管理</span>
                        <span class="pull-right-container">
                       			<i class="fa fa-angle-left pull-right"></i>
                   		 	</span>
                    </a>
                    <ul class="treeview-menu">
                        <li id="admin-login">
                            <a href="{{url('/admin/category/create')}}">
                                <i class="fa fa-circle-o"></i> 分类添加
                            </a>
                        </li>
                        <li id="admin-login">
                            <a href="{{url('/admin/category/index')}}">
                                <i class="fa fa-circle-o"></i> 分类展示
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-folder"></i>
                        <span>品优购快报管理</span>
                        <span class="pull-right-container">
				       			<i class="fa fa-angle-left pull-right"></i>
				   		 	</span>
                    </a>
                    <ul class="treeview-menu">

                        <li id="admin-login">
                            <a href="/admin/news/create" >
                                <i class="fa fa-circle-o"></i> 品优购添加
                            </a>
                        </li>
                        <li id="admin-login">
                            <a href="/admin/news/index" >
                                <i class="fa fa-circle-o"></i> 品优购展示
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-folder"></i>

                        <span>品牌管理</span>
                        <span class="pull-right-container">
                       			<i class="fa fa-angle-left pull-right"></i>
                   		 	</span>

                    </a>
                    <ul class="treeview-menu">

                        <li id="admin-login">
                            <a href="{{url('/admin/brand/create')}}">
                                <i class="fa fa-circle-o"></i> 品牌添加
                            </a>
                        </li>
                        <li id="admin-login">
                            <a href="{{url('/admin/brand/index')}}">
                                <i class="fa fa-circle-o"></i> 品牌展示
                            </a>
                        </li>
                    </ul>
                </li>
			    <li class="treeview">
                    <a href="#">
                        <i class="fa fa-folder"></i>

                        <span>优惠卷</span>
                        <span class="pull-right-container">
                       			<i class="fa fa-angle-left pull-right"></i>
                   		 	</span>

                    </a>
                    <ul class="treeview-menu">

                        <li id="admin-login">
                            <a href="{{url('/admin/dis/create')}}">
                                <i class="fa fa-circle-o"></i> 优惠卷添加
                            </a>
                        </li>
                        <li id="admin-login">
                            <a href="{{url('/admin/dis/index')}}">
                                <i class="fa fa-circle-o"></i> 优惠卷展示
                            </a>
                        </li>
                    </ul>
                </li>
				

                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-folder"></i>
                        <span>商品管理</span>
                        <span class="pull-right-container">
				       			<i class="fa fa-angle-left pull-right"></i>
				   		 	</span>
                    </a>
                    <ul class="treeview-menu">

                        <li id="admin-login">
                            <a href="#">
                                <i class="fa fa-folder"></i>
                                <span>商品模块</span>
                                <span class="pull-right-container">
				       			<i class="fa fa-angle-left pull-right"></i>
				   		 	</span>
                            </a>
                            <ul class="treeview-menu">

                                <li id="admin-login">
                                    <a href="{{url('admin/goods/create')}}">
                                        <i class="fa fa-circle-o"></i> 商品添加
                                    </a>
                                </li>
                                <li id="admin-login">
                                    <a href="{{url('admin/goods/index')}}" >
                                        <i class="fa fa-circle-o"></i> 商品管理
                                    </a>
                                </li>
                            </ul>
                            </li>
                        <li>
                            <a href="#">
                                <i class="fa fa-folder"></i>
                                <span>商品属性</span>
                                <span class="pull-right-container">
				       			<i class="fa fa-angle-left pull-right"></i>
				   		 	</span>
                            </a>
                            <ul class="treeview-menu">

                                <li id="admin-login">
                                    <a href="{{url('admin/goods_attr/create')}}">
                                        <i class="fa fa-circle-o"></i> 商品属性添加
                                    </a>
                                </li>
                                <li id="admin-login">
                                    <a href="{{url('admin/goods_attr/index')}}" >
                                        <i class="fa fa-circle-o"></i> 商品属性管理
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fa fa-folder"></i>
                                <span>商品属性值</span>
                                <span class="pull-right-container">
				       			<i class="fa fa-angle-left pull-right"></i>
				   		 	</span>
                            </a>
                            <ul class="treeview-menu">

                                <li id="admin-login">
                                    <a href="{{url('admin/goods_val/create')}}">
                                        <i class="fa fa-circle-o"></i> 商品属性值添加
                                    </a>
                                </li>
                                <li id="admin-login">
                                    <a href="{{url('admin/goods_val/index')}}" >
                                        <i class="fa fa-circle-o"></i> 商品属性值管理
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fa fa-folder"></i>
                                <span>商品库存</span>
                                <span class="pull-right-container">
				       			<i class="fa fa-angle-left pull-right"></i>
				   		 	</span>
                            </a>
                            <ul class="treeview-menu">

                                <li id="admin-login">
                                    <a href="{{url('admin/stock/create')}}">
                                        <i class="fa fa-circle-o"></i> 商品库存添加
                                    </a>
                                </li>
                                <li id="admin-login">
                                    <a href="{{url('admin/stock/index')}}" >
                                        <i class="fa fa-circle-o"></i> 商品库存管理
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <!-- 菜单 /-->
            </ul>
        </section>
        <!-- /.sidebar -->
    </aside>
    <!-- 导航侧栏 /-->

    <!-- 内容区域 -->
    <div class="content-wrapper">
        @yield('content')
    </div>
    <!-- 内容区域 /-->

    <!-- 底部导航 -->
    <footer class="main-footer">
        <div class="pull-right hidden-xs">
            <b>Version</b> 1.0.8
        </div>
        <strong>Copyright &copy; 2014-2017 <a href="http://www.itcast.cn">研究院研发部</a>.</strong> All rights reserved.
    </footer>
    <!-- 底部导航 /-->

</div>


</body>

    <script src="/plugins/adminLTE/js/app.min.js"></script>
</html>
{{--<script src="/plugins/jQuery/jquery-2.2.3.min.js"></script>--}}
{{--<script src="/plugins/jQuery/jquery-ui.min.js"></script>--}}
{{--<script>--}}
    {{--$.widget.bridge('uibutton', $.ui.button);--}}
{{--</script>--}}
<script src="/plugins/adminLTE/js/app.min.js"></script>
<script src="/plugins/jQuery/jquery-2.2.3.min.js"></script>
<script src="/plugins/jQueryUI/jquery-ui.min.js"></script>
<script>
    $.widget.bridge('uibutton', $.ui.button);
</script>
<script src="/plugins/adminLTE/js/app.min.js"></script>


</html>
