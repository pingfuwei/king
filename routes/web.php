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
//后台路由
Route::prefix("admin")->group(function(){
    Route::get("login","admin\LoginController@login");//登录
    Route::any("loginis","admin\LoginController@loginis");//登录执行
});
Route::prefix("admin")->middleware("adminlogin")->group(function (){//后台
    Route::any('index','admin\IndexController@index');//首页
        Route::prefix("vip")->group(function (){
            Route::any('/create','admin\VipController@create');//vip添加
            Route::any('/createDo','admin\VipController@createDo');//执行vip添加
            Route::any('/index','admin\VipController@index');//执行vip添加
        });
        Route::prefix("brand")->group(function (){//品牌模块
            Route::any('create','admin\BrandController@create');//品牌添加页面
            Route::any('createDo','admin\BrandController@createDo');//品牌添加
            Route::any('index','admin\BrandController@index');//用户展示

        });
    Route::prefix("vip")->group(function (){
        Route::any('/create','admin\VipController@create');//vip添加
        Route::any('/createDo','admin\VipController@createDo');//执行vip添加
        Route::any('/index','admin\VipController@index');//执行vip添加
    });

        Route::prefix("admin")->group(function (){//后台登陆
            Route::any('create','admin\AdminController@create');//用户添加
            Route::any('createDo','admin\AdminController@createDo');//用户添加
            Route::any('index','admin\AdminController@index');//用户添加
        });
    //品优购快报
        Route::prefix("news")->group(function (){
            Route::any('create','admin\NewsController@create');//品优购快报添加页面
            Route::any('createDo','admin\NewsController@createDo');//品优购快报入库
            Route::any('index','admin\NewsController@index');//品优购快报列表
            Route::any('del','admin\NewsController@del');//品优购快报删除
            Route::any('upd/{id}','admin\NewsController@upd');//品优购快报修改页面
            Route::any('updDo','admin\NewsController@updDo');//品优购快报执行修改
        });
        Route::prefix("category")->group(function (){//分类
            Route::any('create','admin\CategoryController@create');//分类添加
            Route::any('createDo','admin\CategoryController@createDo');//分类添加执行
            Route::any('index','admin\CategoryController@index');//分类展示

        });
    });

