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
Route::prefix("admin")->group(function (){//后台
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


    });