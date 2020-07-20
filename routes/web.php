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
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 7fee95c2d0a3dfe9e708613c4f364bffff41cea8
>>>>>>> 997aa61ee26e56fd2beede77cc60243b8ec64312
        Route::prefix("vip")->group(function (){
            Route::any('/create','admin\VipController@create');//vip添加
            Route::any('/createDo','admin\VipController@createDo');//执行vip添加
            Route::any('/index','admin\VipController@index');//执行vip添加
        });
        Route::prefix("brand")->group(function (){//品牌模块
            Route::any('create','admin\BrandController@create');//品牌添加页面
            Route::any('createDo','admin\BrandController@createDo');//品牌添加
            Route::any('index','admin\BrandController@index');//用户展示
<<<<<<< HEAD
    });
=======
>>>>>>> 997aa61ee26e56fd2beede77cc60243b8ec64312

        });
>>>>>>> c83b1f32d9a97026ced4900a359eb4790b6cab38
    Route::prefix("vip")->group(function (){
        Route::any('/create','admin\VipController@create');//vip添加
        Route::any('/createDo','admin\VipController@createDo');//执行vip添加
        Route::any('/index','admin\VipController@index');//执行vip添加
    });
<<<<<<< HEAD
    Route::prefix("admin")->group(function (){//后台登陆
=======

        Route::prefix("admin")->group(function (){//后台登陆
>>>>>>> c83b1f32d9a97026ced4900a359eb4790b6cab38
            Route::any('create','admin\AdminController@create');//用户添加
            Route::any('createDo','admin\AdminController@createDo');//用户添加
            Route::any('index','admin\AdminController@index');//用户添加
<<<<<<< HEAD
            Route::any('edit/{id?}','admin\AdminController@edit');//用户修改
            Route::any('editDo','admin\AdminController@editDo');//用户修改执行
            Route::any('del','admin\AdminController@del');//用户删除

=======
>>>>>>> 997aa61ee26e56fd2beede77cc60243b8ec64312
        });
<<<<<<< HEAD
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
=======
    //品优购快报
        Route::prefix("news")->group(function (){
            Route::any('create','admin\NewsController@create');//品优购快报添加页面
            Route::any('createDo','admin\NewsController@createDo');//品优购快报入库
            Route::any('index','admin\NewsController@index');//品优购快报列表
<<<<<<< HEAD
            Route::any('del','admin\NewsController@del');//品优购快报删除
            Route::any('upd/{id}','admin\NewsController@upd');//品优购快报修改页面
            Route::any('updDo','admin\NewsController@updDo');//品优购快报执行修改
=======
>>>>>>> c83b1f32d9a97026ced4900a359eb4790b6cab38

>>>>>>> 7fee95c2d0a3dfe9e708613c4f364bffff41cea8
        });
        Route::prefix("category")->group(function (){//分类
            Route::any('create','admin\CategoryController@create');//分类添加
            Route::any('createDo','admin\CategoryController@createDo');//分类添加执行
            Route::any('index','admin\CategoryController@index');//分类展示

<<<<<<< HEAD
        });
});
=======
<<<<<<< HEAD

    });


=======
        });
    });
>>>>>>> c83b1f32d9a97026ced4900a359eb4790b6cab38

>>>>>>> 997aa61ee26e56fd2beede77cc60243b8ec64312
