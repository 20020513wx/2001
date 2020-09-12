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

//商品模块
Route::get("/","Admin\GoodsController@index");
Route::prefix("admin/goods")->group(function(){
    Route::get("create","Admin\GoodsController@create");//添加
});

//品牌模块
Route::prefix("admin/brand")->group(function(){
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
Route::prefix("admin/category")->group(function(){
    Route::get("create","Admin\CategoryController@create");//添加
    Route::get("index","Admin\CategoryController@index");//列表
    Route::post("store","Admin\CategoryController@store");//添加执行
    Route::get("delete/{cate_id}","Admin\CategoryController@delete"); //删除

});

//管理员模块
Route::prefix("admin/admin")->group(function(){
    Route::get("create","Admin\AdminController@create");//添加
    Route::get("index","Admin\AdminController@index");//列表
});

//if(window.confirm('是否删除')){
//    location.href="/admin/category/delete/"+cate_id;
//}