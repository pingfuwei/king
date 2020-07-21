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

});
Route::prefix("admin")->middleware("adminlogin")->group(function (){//后台
        Route::any("indexs", "admin\LoginController@indexs");//首页照片
        Route::any('index','admin\IndexController@index');//首页
});

Route::prefix("admin")->middleware("adminlogin")->group(function (){//后台
    Route::any('index','admin\IndexController@index');//首页
        Route::prefix("vip")->group(function (){
            Route::any('/create','admin\VipController@create');//vip添加
            Route::any('/createDo','admin\VipController@createDo');//执行vip添加
            Route::any('/index','admin\VipController@index');//执行vip添加
            Route::any('/upd','admin\VipController@upd');//vip修改
        });
        Route::prefix("brand")->group(function (){//品牌模块
            Route::any('create','admin\BrandController@create');//品牌添加页面
            Route::any('createDo','admin\BrandController@createDo');//品牌添加
            Route::any('index','admin\BrandController@index');//用户展示
            Route::any('upd','admin\BrandController@upd');//用户修改
        });
        Route::prefix("admin")->group(function (){//后台登陆
            Route::any('create','admin\AdminController@create');//用户添加
            Route::any('createDo','admin\AdminController@createDo');//用户添加
            Route::any('index','admin\AdminController@index');//用户添加
            Route::any('upd','admin\AdminController@upd');//用户修改

        });
    Route::prefix("role")->group(function (){
        Route::any('/create','admin\DeveloperController@create');//角色添加
        Route::any('/createDo','admin\DeveloperController@createDo');//执行角色添加
        Route::any('/index','admin\DeveloperController@index');//列表展示
        Route::any('/role/{admin_id}','admin\DeveloperController@role');//用户添加角色
        Route::any('/roleDo','admin\DeveloperController@roleDo');//执行添加角色
         });
    Route::prefix("power")->group(function (){
        Route::any('/create','admin\DeveloperController@power_create');//权限添加
        Route::any('/createDo','admin\DeveloperController@power_createDo');//执行权限添加
        Route::any('/index','admin\DeveloperController@power_index');//列表展示
        Route::any('/power/{role_id}','admin\DeveloperController@power');//给角色赋权限
        Route::any('/powerDo','admin\DeveloperController@powerDo');//执行角色赋权限
    });
    //品优购快报
        Route::prefix("news")->group(function (){
            Route::any('create','admin\NewsController@create');//品优购快报添加页面
            Route::any('createDo','admin\NewsController@createDo');//品优购快报入库
            Route::any('index','admin\NewsController@index');//品优购快报列表
            Route::any('del','admin\NewsController@del');//品优购快报删除
            Route::any('upd/{id}','admin\NewsController@upd');//品优购快报修改页面
            Route::any('updDo','admin\NewsController@updDo');//品优购快报执行修改
            Route::any('updTo','admin\NewsController@updTo');//品优购快报即点即改
        });
        Route::prefix("category")->group(function (){//分类
            Route::any('create','admin\CategoryController@create');//分类添加
            Route::any('createDo','admin\CategoryController@createDo');//分类添加执行
            Route::any('index','admin\CategoryController@index');//分类展示
            Route::any('upd','admin\CategoryController@upd');//分类修改
        });
        Route::prefix("goods")->group(function (){//商品
            Route::any('create','admin\GoodsController@create');//商品添加
            Route::any('createDo','admin\GoodsController@createDo');//商品添加执行
            Route::any('index','admin\GoodsController@index');//商品展示
            Route::any('upd','admin\GoodsController@upd');//商品修改
            Route::any('updates','admin\GoodsController@updates');//商品修改执行
            Route::any('del','admin\GoodsController@del');//商品修改
        });
        Route::prefix("goods_attr")->group(function (){//商品属性
            Route::any('create','admin\Goods_attrController@create');//商品添加属性
            Route::any('createDo','admin\Goods_attrController@createDo');//商品属性添加执行
            Route::any('index','admin\Goods_attrController@index');//商品属性展示
            Route::any('upd','admin\Goods_attrController@upd');//商品属性修改

        });
        Route::prefix("goods_val")->group(function (){//商品属性值
            Route::any('create','admin\Goods_valController@create');//商品属性值添加
            Route::any('createDo','admin\Goods_valController@createDo');//商品属性值添加执行
            Route::any('index','admin\Goods_valController@index');//商品属性值展示
            Route::any('upd','admin\Goods_valController@upd');//商品属性值修改
        });
});


