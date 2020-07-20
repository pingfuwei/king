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
        Route::prefix("admin")->group(function (){//后台登陆
            Route::any('create','admin\AdminController@create');//用户添加
            Route::any('createDo','admin\AdminController@createDo');//用户添加
            Route::any('index','admin\AdminController@index');//用户添加

        });
    //品优购快报
        Route::prefix("news")->group(function (){
            Route::any('create','admin\NewsController@create');//品优购快报添加
            Route::any('createDo','admin\NewsController@createDo');//品优购快报入库
            Route::any('index','admin\NewsController@index');//品优购快报列表

        });
    });