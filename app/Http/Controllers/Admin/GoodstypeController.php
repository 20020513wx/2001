<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Attribute;
use App\Model\Goodstype;
class GoodstypeController extends Controller
{
    //类型列表
    public function index(){
        $goodstype=Goodstype::get();
        // dd($goodstype);
        return view("admin.goodstype.index",["goodstype"=>$goodstype]);
    }
    //类型添加
    public function create(){
        return view("admin.goodstype.create");
    }
    //类型添加执行
    public function store(){
        $data=request()->except("_token");
        $res=Goodstype::insert($data);
        if($res){
            return redirect("admin/goodstype/index");
        }
    }
    //给类型添加属性列表
    public function attribute(){
        $cat_id=request()->cat_id;
        $where=[
            ["cat_id","=",$cat_id]
        ];
        $attribute=Attribute::where($where)->get();
        return view("admin.goodstype.attribute",["attribute"=>$attribute,'cat_id'=>$cat_id]);
    }
    //给类型添加属性
    public function attributeDo(){
        $cat_id=request()->cat_id;
        return view("admin.goodstype.attributes",["cat_id"=>$cat_id]);
    }
    //给类型添加属性执行
    public function attributeDos(){
        $cat_id=request()->cat_id;
        $data=request()->except("_token");
        $res=[
            "cat_id"=>$cat_id,
            "attr_name"=>$data["attr_name"]
        ];
        $attribute=Attribute::insert($res);
        if($attribute){
            return redirect("admin/goodstype/index");
        }
    }
}
