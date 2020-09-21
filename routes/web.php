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
Route::any("admin/login","Admin\LoginController@login")->name("admin.login");//登录视图
Route::any("admin/loginDo","Admin\LoginController@loginDo")->name("admin.loginDo");//登录执行
Route::any("admin/reg","Admin\LoginController@reg")->name("admin.reg");//注册视图
Route::any("admin/regDo","Admin\LoginController@regDo")->name("admin.regDo");//注册执行
Route::any("admin/quit","Admin\LoginController@quit")->name("admin.quit");//退出登录
Route::any("admin/code","Admin\LoginController@code")->name("admin.code");//验证码
Route::any("admin/imageCode","Admin\LoginController@imageCode")->name("admin.imageCode");//验证码
Route::any("admin/getImageCodeUrl","Admin\LoginController@getImageCodeUrl")->name("admin/getImageCodeUrl");//验证码
Route::get('/','Admin\GoodsController@main')->middleware("adminlogins")->name("main");//展示

//商品模块
Route::prefix("/admin/goods/")->middleware("adminlogins")->group(function(){
    Route::get("create","Admin\GoodsController@create")->name("admin.goods.create");//添加
    Route::post("store",'Admin\GoodsController@store')->name("admin.goods.store");//执行添加
    Route::get('index','Admin\GoodsController@index')->name("admin.goods.index");//展示
    Route::any("upload",'Admin\GoodsController@upload')->name("admin.goods.upload");//上传图片
    Route::any("uploads",'Admin\GoodsController@uploads')->name("admin.goods.uploads");//多文件上传
    Route::any("destroy",'Admin\GoodsController@destroy')->name("admin.goods.destroy");//删除
    Route::any('edit/{id}','Admin\GoodsController@edit')->name("admin.goods.edit");//修改
    Route::post('update/{id}','Admin\GoodsController@update')->name("admin.goods.update");//执行修改
});

//品牌模块
Route::prefix("admin/brand")->middleware("adminlogins")->group(function(){
    Route::get("create","Admin\BrandController@create")->name("admin.brand.create");//添加
    Route::post("store","Admin\BrandController@store")->name("admin.brand.store");//添加执行
    Route::get("index","Admin\BrandController@index")->name("admin.brand.index");//列表
    Route::get("delete/{brand_id}","Admin\BrandController@delete")->name("admin.brand.delete");//删除
    Route::get("edit/{brand_id}","Admin\BrandController@edit")->name("admin.brand.edit");//修改视图
    Route::post("update/{brand_id}","Admin\BrandController@update")->name("admin.brand.update");//修改执行
    Route::any("update2","Admin\BrandController@update2")->name("admin.brand.update2");//即点即改
    Route::any("page","Admin\BrandController@page")->name("admin.brand.page");//分页
});


//分类模块
Route::prefix("admin/category")->middleware("adminlogins")->group(function(){
    Route::any("create","Admin\CategoryController@create")->name("admin.category.create");//添加
    Route::get("index","Admin\CategoryController@index")->name("admin.category.index");//列表
    Route::post("store","Admin\CategoryController@store")->name("admin.category.store");//添加执行
    Route::get("delete/{cate_id}","Admin\CategoryController@delete")->name("admin.category.delete"); //删除

});

//管理员模块
Route::prefix("admin/admin")->middleware("adminlogins")->group(function(){
    Route::get("create","Admin\AdminController@create")->name("admin.admin.create");//添加
    Route::get("index","Admin\AdminController@index")->name("admin.admin.index");//列表
    Route::post("store","Admin\AdminController@store")->name("admin.admin.store");//添加执行
    Route::get("decory/{id?}","Admin\AdminController@destroy")->name("admin.admin.decory");//删除
    Route::get("edit/{id}","Admin\AdminController@edit")->name("admin.admin.edit");
    Route::post("update/{id}","Admin\AdminController@update")->name("admin.admin.update");
    Route::get("change","Admin\AdminController@change")->name("admin.admin.change");
});

//角色管理
Route::prefix("admin/role")->middleware("adminlogins")->group(function(){
    Route::get("create","Admin\RoleController@create")->name("admin.role.create");//添加
    Route::post("store","Admin\RoleController@store")->name("admin.role.store");//添加执行
    Route::get("index","Admin\RoleController@index")->name("admin.role.index");//列表
    Route::get("delete/{role_id}","Admin\RoleController@delete")->name("admin.role.delete");//删除
    Route::get("edit/{role_id}","Admin\RoleController@edit")->name("admin.role.edit");//修改视图
    Route::post("update/{role_id}","Admin\RoleController@update")->name("admin.role.update");//修改执行
    Route::any("page","Admin\RoleController@page")->name("admin.role.page");//分页
    Route::any("menu/{role_id}","Admin\RoleController@menu")->name("admin.role.menu");//添加权限列表
    Route::any("menuDo/{role_id}","Admin\RoleController@menuDo")->name("admin.role.menuDo");//添加权限列表
});
//权限管理
Route::prefix("admin/menu")->middleware("adminlogins")->group(function(){
    Route::get("create","Admin\MenuController@create")->name("admin.menu.create");//添加
    Route::post("store","Admin\MenuController@store")->name("admin.menu.store");//添加执行
    Route::get("index","Admin\MenuController@index")->name("admin.menu.index");//列表
    Route::get("delete/{menu_id}","Admin\MenuController@delete")->name("admin.menu.delete");//删除
    Route::get("edit/{menu_id}","Admin\MenuController@edit")->name("admin.menu.edit");//修改视图
    Route::post("update/{menu_id}","Admin\MenuController@update")->name("admin.menu.update");//修改执行
    Route::any("page","Admin\MenuController@page")->name("admin.menu.page");//分页
});

//类型管理
Route::prefix("admin/goodstype")->group(function(){
    Route::any("index","Admin\GoodstypeController@index")->name("admin.goodstype.index");//类型列表
    Route::any("create","Admin\GoodstypeController@create")->name("admin.goodstype.create");//类型添加
    Route::any("store","Admin\GoodstypeController@store")->name("admin.goodstype.store");//类型添加执行
    Route::any("attribute/{cat_id}","Admin\GoodstypeController@attribute")->name("admin.attribute.attribute");//添加类型的属性
    Route::any("attributeDo/{cat_id}","Admin\GoodstypeController@attributeDo")->name("admin.attribute.attributeDo");//添加类型的属性执行
    Route::any("attributeDos/{cat_id}","Admin\GoodstypeController@attributeDos")->name("admin.attributes.attributeDo");//添加类型的属性执行

});
