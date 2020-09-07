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
//商品模块
Route::get("/","Admin\GoodsController@index");

//品牌模块
Route::prefix("admin/brand")->group(function(){
    Route::get("create","Admin\BrandController@create");//添加
    Route::post("store","Admin\BrandController@store");//添加执行

    Route::get("index","Admin\BrandController@index");//列表
});


//分类模块
Route::get("/","Admin\CategoryController@index");

//管理员模块
Route::get("/","Admin\AdminController@index");