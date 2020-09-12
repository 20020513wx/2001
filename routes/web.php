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
//后台登录
Route::any("admin/login","Admin\LoginController@login");//登录视图
Route::any("admin/loginDo","Admin\LoginController@loginDo");//登录执行
Route::any("admin/reg","Admin\LoginController@reg");//注册视图
Route::any("admin/regDo","Admin\LoginController@regDo");//注册执行
Route::any("admin/quit","Admin\LoginController@quit");//退出登录
Route::any("admin/code","Admin\LoginController@code");//验证码
Route::any("admin/imageCode","Admin\LoginController@imageCode");//验证码
Route::any("admin/getImageCodeUrl","Admin\LoginController@getImageCodeUrl");//验证码

//商品模块
Route::middleware("adminlogin")->get("/","Admin\GoodsController@index");
Route::prefix("admin/goods")->middleware("adminlogin")->group(function(){
    Route::get("create","Admin\GoodsController@create");//添加
    Route::post("store",'Admin\GoodsController@store');//执行添加
    Route::get('/','Admin\GoodsController@index');//展示
    Route::any("upload",'Admin\GoodsController@upload');//上传图片
    Route::any("uploads",'Admin\GoodsController@uploads');//多文件上传
    Route::any("destroy",'Admin\GoodsController@destroy');//删除
    Route::any('edit/{id}','Admin\GoodsController@edit');//修改
    Route::post('update/{id}','Admin\GoodsController@update');//执行修改
});

//品牌模块
Route::prefix("admin/brand")->middleware("adminlogin")->group(function(){
    Route::get("create","Admin\BrandController@create");//添加
    Route::post("store","Admin\BrandController@store");//添加执行
    Route::get("index","Admin\BrandController@index");//列表
    Route::get("delete/{brand_id}","Admin\BrandController@delete");//删除
    Route::get("edit/{brand_id}","Admin\BrandController@edit");//修改视图
    Route::post("update/{brand_id}","Admin\BrandController@update");//修改执行
    Route::any("update2","Admin\BrandController@update2");//即点即改
    Route::any("page","Admin\BrandController@page");//分页
});


//分类模块
Route::prefix("admin/category")->middleware("adminlogin")->group(function(){
    Route::get("create","Admin\CategoryController@create");//添加
    Route::get("index","Admin\CategoryController@index");//列表
});

//管理员模块
Route::prefix("admin/admin")->middleware("adminlogin")->group(function(){
    Route::get("create","Admin\AdminController@create");//添加
    Route::get("index","Admin\AdminController@index");//列表
    Route::post("store","Admin\AdminController@store");//添加
    Route::get("decory/{id?}","Admin\AdminController@destroy");//删除
    Route::get("edit/{id}","Admin\AdminController@edit");
    Route::post("update/{id}","Admin\AdminController@update");
    Route::get("change","Admin\AdminController@change");
});