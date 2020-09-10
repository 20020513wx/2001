<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GoodsController extends Controller
{
    //商品列表
    public function index(){
        return view("admin.goods.index");
    }
    //商品添加
    public function create(){
        return view("admin.goods.create");
    }
}
