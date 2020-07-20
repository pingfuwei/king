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
        Route::prefix("brand")->group(function (){//品牌模块
            Route::any('create','admin\BrandController@create');//品牌添加页面
            Route::any('createDo','admin\BrandController@createDo');//品牌添加
            Route::any('index','admin\BrandController@index');//用户展示

        });

    });