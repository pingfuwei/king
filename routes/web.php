<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::get('/', function () {
//    return view('welcome');
//});
//->middleware("is_login")->
Route::prefix("admin")->group(function() {
    Route::get("login", "admin\LoginController@login");//登录
    Route::any("loginis", "admin\LoginController@loginis");//登录执行
    Route::any("exit", "admin\LoginController@exit");//退出登录
});
Route::prefix("admin")->middleware("adminlogin")->group(function (){//后台
        Route::any("indexs", "admin\LoginController@indexs");//首页照片
        Route::any('index','admin\IndexController@index');//首页
});
//->middleware("adminlogin")
Route::prefix("admin")->group(function (){//后台
    Route::any('index','admin\IndexController@index');//首页
        Route::prefix("vip")->group(function (){
            Route::any('/create','admin\VipController@create')->middleware("adminlogin");//vip添加
            Route::any('/createDo','admin\VipController@createDo');//执行vip添加
            Route::any('/index','admin\VipController@index')->middleware("adminlogin");//执行vip添加
            Route::any('/upd/{vip_id}','admin\VipController@upd')->middleware("adminlogin");//vip修改
            Route::any('/updDo','admin\VipController@updDo');//执行vip修改
            Route::any('/del','admin\VipController@del')->middleware("adminlogin");//执行vip删除
            Route::any('/change','admin\VipController@change');//即点即改
            Route::any('/ajaxuniq','admin\VipController@uniq');//唯一性验证
        });
        Route::prefix("brand")->group(function (){//品牌模块
            Route::any('create','admin\BrandController@create')->middleware("adminlogin");//品牌添加页面
            Route::any('createDo','admin\BrandController@createDo');//品牌添加
            Route::any('index','admin\BrandController@index')->middleware("adminlogin");//用户展示
            Route::any('upd','admin\BrandController@upd')->middleware("adminlogin");//用户修改
            Route::any('change','admin\BrandController@change');//即点即改
        });
        Route::prefix("admin")->group(function (){//后台登陆
            Route::any('create','admin\AdminController@create')->middleware("adminlogin");//用户添加
            Route::any('ajaxuniq','admin\AdminController@ajaxuniq');//用户Ajax判断
            Route::any('createDo','admin\AdminController@createDo');//用户添加
            Route::any('index','admin\AdminController@index')->middleware("adminlogin");//用户添加
            Route::any('upd','admin\AdminController@upd')->middleware("adminlogin");//用户修改
            Route::any('updDo','admin\AdminController@updDo');//用户修改执行
            Route::any('del','admin\AdminController@del')->middleware("adminlogin");//用户修改执行
            Route::any('ajaxName','admin\AdminController@ajaxName');//用户即点即改
            Route::any('ajaxNames','admin\AdminController@ajaxNames');//用户即点即改

        });
    Route::prefix("role")->group(function (){
        Route::any('/create','admin\DeveloperController@create');//角色添加
        Route::any('/createDo','admin\DeveloperController@createDo');//执行角色添加
        Route::any('/index','admin\DeveloperController@index');//列表展示
        Route::any('/role/{admin_id}','admin\DeveloperController@role');//用户添加角色
        Route::any('/roleDo','admin\DeveloperController@roleDo');//执行添加角色
        Route::any('upd/{role_id}','admin\DeveloperController@roleupd');//角色修改
        Route::any('updDo','admin\DeveloperController@roleupdDo');//执行角色修改
        Route::any('del','admin\DeveloperController@roledel');//执行角色删除
        Route::any('change','admin\DeveloperController@rolechange');//即点即改
        Route::any('ajaxuniq','admin\DeveloperController@uniq');//验证唯一性
         });
    Route::prefix("power")->group(function (){
        Route::any('/create','admin\DeveloperController@power_create');//权限添加
        Route::any('/createDo','admin\DeveloperController@power_createDo');//执行权限添加
        Route::any('/index','admin\DeveloperController@power_index');//列表展示
        Route::any('/power/{role_id}','admin\DeveloperController@power');//给角色赋权限
        Route::any('/delpower/{role_id}','admin\DeveloperController@delpower');//删除给角色的权限
        Route::any('/powerDo','admin\DeveloperController@powerDo');//执行角色赋权限
        Route::any('upd/{power_id}','admin\DeveloperController@upd');//权限修改
        Route::any('updDo','admin\DeveloperController@updDo');//执行权限修改
        Route::any('del','admin\DeveloperController@del');//执行权限删除
        Route::any('change','admin\DeveloperController@powerchange');//执行权限删除
        Route::any('ajaxuniq','admin\DeveloperController@poweruniq');//权限唯一
        Route::any('ajaxuniqurl','admin\DeveloperController@poweruniqurl');//权限唯一
        Route::any('uniq','admin\DeveloperController@changeuniq');//即点即改权限唯一
        Route::any('dels','admin\DeveloperController@dels');//执行删除给用户的权限
    });
    //品优购快报
        Route::prefix("news")->group(function (){
            Route::any('create','admin\NewsController@create')->middleware("adminlogin");//品优购快报添加页面
            Route::any('createDo','admin\NewsController@createDo');//品优购快报入库
            Route::any('index','admin\NewsController@index')->middleware("adminlogin");//品优购快报列表
            Route::any('del','admin\NewsController@del')->middleware("adminlogin");//品优购快报删除
            Route::any('upd/{id}','admin\NewsController@upd')->middleware("adminlogin");//品优购快报修改页面
            Route::any('updDo','admin\NewsController@updDo');//品优购快报执行修改
            Route::any('updTo','admin\NewsController@updTo');//品优购快报即点即改
            Route::any('unique','admin\NewsController@unique');//商品属性值唯一性
        });
        Route::prefix("category")->group(function (){//分类
            Route::any('create','admin\CategoryController@create')->middleware("adminlogin");//分类添加
            Route::any('ajaxuniq','admin\CategoryController@ajaxuniq');//用户Ajax判断
            Route::any('createDo','admin\CategoryController@createDo');//分类添加执行
            Route::any('index','admin\CategoryController@index')->middleware("adminlogin");//分类展示
            Route::any('ajaxNames','admin\CategoryController@ajaxNames');//分类即点即改唯一性
            Route::any('ajaxName','admin\CategoryController@ajaxName');//分类即点即改
            Route::any('upd','admin\CategoryController@upd')->middleware("adminlogin");//分类修改
            Route::any('updDo','admin\CategoryController@updDo');//分类修改执行
            Route::any('del','admin\CategoryController@del')->middleware("adminlogin");//分类修改执行
        });
        Route::prefix("goods")->group(function (){//商品
            Route::any('create','admin\GoodsController@create')->middleware("adminlogin");//商品添加
            Route::any('ajaxuniq','admin\GoodsController@ajaxuniq');//商品添加
            Route::any('createDo','admin\GoodsController@createDo');//商品添加执行
            Route::any('index','admin\GoodsController@index')->middleware("adminlogin");//商品展示
            Route::any('ajaxNames','admin\GoodsController@ajaxNames');//商品展示即点即改唯一
            Route::any('ajaxName','admin\GoodsController@ajaxName');//商品展示即点即改
            Route::any('ajaxji','admin\GoodsController@ajaxji');//商品展示即点即改是否
            Route::any('upd','admin\GoodsController@upd')->middleware("adminlogin");//商品修改
            Route::any('updates','admin\GoodsController@updates');//商品修改执行
            Route::any('del','admin\GoodsController@del')->middleware("adminlogin");//商品修改
        });
        Route::prefix("goods_attr")->group(function (){//商品属性
            Route::any('create','admin\Goods_attrController@create')->middleware("adminlogin");//商品添加属性
            Route::any('createDo','admin\Goods_attrController@createDo');//商品属性添加执行
            Route::any('index','admin\Goods_attrController@index')->middleware("adminlogin");//商品属性展示
            Route::any('upd/{attr_id}','admin\Goods_attrController@upd')->middleware("adminlogin");//商品属性修改
            Route::any('updDo','admin\Goods_attrController@updDo');//执行商品属性修改
            Route::any('del','admin\Goods_attrController@del')->middleware("adminlogin");//执行商品属性删除
            Route::any('change','admin\Goods_attrController@change');//即点即改
            Route::any('ajaxuniq','admin\Goods_attrController@uniq');//验证唯一性
        });
        Route::prefix("goods_val")->group(function (){//商品属性值
            Route::any('create','admin\Goods_valController@create')->middleware("adminlogin");//商品属性值添加
            Route::any('createDo','admin\Goods_valController@createDo');//商品属性值添加执行
            Route::any('index','admin\Goods_valController@index')->middleware("adminlogin");//商品属性值展示
            Route::any('upd/{id}','admin\Goods_valController@upd')->middleware("adminlogin");//商品属性值修改
            Route::any('updDo','admin\Goods_valController@updDo');//商品属性值执行修改
            Route::any('del','admin\Goods_valController@del')->middleware("adminlogin");//商品属性值删除
            Route::any('updTo','admin\Goods_valController@updTo');//商品属性值极点级改
            Route::any('unique','admin\Goods_valController@unique');//商品属性值唯一性
        });
        Route::prefix("stock")->group(function (){//库存
            Route::any('create','admin\StockController@create');//库存添加
            Route::any('createDo','admin\StockController@createDo');//库存添加执行
            Route::any('index','admin\StockController@index');//库存展示
            Route::any('upd','admin\StockController@upd');//库存修改
            Route::any('updDo','admin\StockController@updDo');//执行商品属性修改
            Route::any('del','admin\StockController@del');//执行商品属性删除
            Route::any('stockAjax','admin\StockController@stockAjax');//执行库存ajax
        });
    Route::prefix("dis")->group(function (){//优惠卷
        Route::any('create','admin\DisController@create');//添加优惠卷
        Route::any('createDo','admin\DisController@createDo');//执行添加
        Route::any('index','admin\DisController@index');//优惠卷展示
        Route::any('upd','admin\DisController@upd');//优惠卷修改
        Route::any('updDo','admin\DisController@updDo');//执行优惠卷修改
        Route::any('del','admin\DisController@del');//优惠卷删除
        //Route::any('stockAjax','admin\StockController@stockAjax');//执行库存ajax
    });
        Route::prefix("userdis")->group(function (){//库存
            Route::any('create','admin\UserdisController@create');//库存添加
            Route::any('createDo','admin\UserdisController@createDo');//库存添加执行
            Route::any('index','admin\UserdisController@index');//库存展示
            Route::any('upd','admin\UserdisController@upd');//库存修改
            Route::any('updDo','admin\UserdisController@updDo');//执行商品属性修改
            Route::any('del','admin\UserdisController@del');//执行商品属性删除
            Route::any('stockAjax','admin\UserdisController@stockAjax');//执行库存ajax
        });
    Route::prefix("index")->group(function (){//控制面板
        Route::any('list','admin\IndexController@list');//积分换购订单展示
        Route::any('listajax','admin\IndexController@listajax');//积分换购改状态ajax

    });
});





























Route::any("/", "index\Index@index")->middleware("IndexLogin");//首页
Route::any("/history/list", "index\Index@history");//浏览历史记录
Route::any("/history/del", "index\Index@del");//浏览历史记录删除
Route::prefix("index")->middleware("IndexLogin")->group(function() {
    Route::prefix("reg")->group(function() {//注册
        Route::any("reg", "index\LoginController@reg");//注册
        Route::any("regDo", "index\LoginController@regDo");//注册执行
        Route::any("ajaxCode", "index\LoginController@ajaxCode");//验证码ajax
    });
    Route::prefix("login")->group(function() {//登陆
        Route::any("login", "index\LoginController@login");//登录
        Route::any("ajaxLogin", "index\LoginController@ajaxLogin");//登录执行
        Route::any("ajaxCode", "index\LoginController@ajaxCodes");//忘记密码短信ajax
        Route::any("forgetPas", "index\LoginController@forgetPas");//忘记密码执行
    });
    Route::prefix("vip")->group(function() {//vip
        Route::any("index", "index\VipController@index");//注册
        Route::any("payAjax", "index\VipController@payAjax");//支付接口
        Route::any("notify_url", "index\VipController@notify_url");//支付接口异步
        Route::any("return_url", "index\VipController@return_url");//支付接口同步

    });
    Route::prefix("news")->group(function() {//品优购
        Route::any("one/{id}", "index\NewsController@one");//品优购快报详情
        Route::any("index/{id}", "index\NewsController@index");//品优购列表
    });
    Route::prefix("goods")->group(function() {//商品
        Route::any("desc", "index\GoodsController@desc");//单个商品详情
        Route::any("price", "index\GoodsController@price");//单个属性商品的库存与单价
    });
    Route::prefix("score")->group(function() {//积分换购
        Route::any("list", "index\Score@list");//积分换购展示
        Route::any("desc", "index\Score@desc");//积分换购详情
        Route::any("descAjax", "index\Score@descAjax");//积分换购详情ajax
        Route::any("settlement", "index\Score@settlement");//结算
        Route::any("settlementAjax", "index\Score@settlementAjax");//结算ajax
        Route::any("addresAjax", "index\Score@addresAjax");//地址ajax
    });

    Route::prefix("cart")->group(function() {//商品
        Route::any("cartcreate", "index\CartController@cartcreate");//购物车添加
        Route::any("cartlist", "index\CartController@cartlist");//购物车列表
        Route::any("cartdel", "index\CartController@cartdel");//购物车列表
        Route::any("total", "index\CartController@total");//购物车小计
        Route::any("updnumber", "index\CartController@updnumber");//购物车购买数量
        Route::any("getmonney", "index\CartController@getmonney");//购物车合计
        Route::any("account", "index\CartController@account");//点击结算
    });

    Route::prefix("persion")->group(function() {//个人中心
        Route::any('sign','index\SignController@sign');//签到
        Route::any('Dosign','index\SignController@Dosign');//签到
        Route::any('addpersion','index\SignController@addpersion');//填写个人信息
        Route::any('persionDo','index\SignController@persionDo');//执行添加个人信息
        Route::any('pers','index\SignController@pers');//修改个人信息
        Route::any('personal','index\SignController@personal');//展示个人信息
        Route::any('area/{id}','index\SignController@area');//三级联动
        Route::any('info','index\SignController@info');//添加用户信息
        Route::any('Consignment','index\SignController@Consignment');//代发货方法
        Route::any('Tobepaid','index\SignController@Tobepaid');//待付款方法
        Route::any('urgeScore','index\SignController@urgeScore');//催发货ajax
        Route::any('gootbr','index\SignController@gootbr');//待收货的方法
        Route::any('gootbrajax','index\SignController@gootbrajax');//待收货的ajax方法
        Route::any('purchase','index\SignController@purchase');//我的购买历史方法
    });


    Route::prefix("address")->group(function() {//地址
        Route::any('add','index\AddressController@add');//地址添加
        Route::any('addDo','index\AddressController@addDo');//执行地址添加
        Route::any('list','index\AddressController@list');//地址列表
        Route::any('is_no/{address_id}','index\AddressController@is_no');//设为默认
        Route::any('upd/{address_id}','index\AddressController@upd');//地址修改
        Route::any('updDo','index\AddressController@updDo');//执行地址修改
        Route::any('del/{address_id}','index\AddressController@del');//地址删除
        Route::any('area/{id}','index\AddressController@area');//三级联动
    });
    Route::prefix("discount")->group(function() {//优惠券
        Route::any('get','index\DiscountController@get');//领取优惠券

    });









    Route::prefix("cate")->group(function() {//个人中心
        Route::any('top','index\CateController@top');//导航栏
        Route::any('list','index\CateController@list');//列表
    });

});
