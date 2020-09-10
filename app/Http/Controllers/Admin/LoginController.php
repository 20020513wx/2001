<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    //登录视图
    public function login(){
        return view("admin.login");
    }
    //登录执行
    public function loginDo(){
        
    }
    //注册视图
    public function reg(){
        return view("admin.reg");
    }
    //注册执行
    public function regDo(){
        
    }
}
