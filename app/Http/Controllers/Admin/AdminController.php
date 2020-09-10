<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //管理员列表
    public function index(){
        return view("admin.admin.index");
    }
    //管理员添加
    public function create(){
        return view("admin.admin.create");
    }
}
