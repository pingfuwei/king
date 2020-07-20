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
//后台路由
//->middleware("is_login")->
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
    Route::prefix("admin")->group(function (){//后台登陆
            Route::any('create','admin\AdminController@create');//用户添加
            Route::any('createDo','admin\AdminController@createDo');//用户添加
            Route::any('index','admin\AdminController@index');//用户添加

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



    });



