<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Brand;
use Validator;
class BrandController extends Controller
{
    //品牌展示
    public function index(){
        $brand_name=request()->brand_name;
        $where=[];
        if($brand_name){
            $where[]=["brand_name","like","%$brand_name%"];
        }
        $brand_url=request()->brand_url;
        if($brand_url){
            $where[]=["brand_url","like","%$brand_url%"];
        }
        $brandInfo=Brand::OrderBy("brand_id","desc")->where($where)->paginate(3);
        if(request()->ajax()){
            return view("admin.brand.page",['brandInfo'=>$brandInfo,'brand_name'=>$brand_name,'brand_url'=>$brand_url]);
        }
        return view("admin.brand.index",['brandInfo'=>$brandInfo,'brand_name'=>$brand_name,'brand_url'=>$brand_url]);
    }
    //品牌添加
    public function create(){
        return view("admin.brand.create");
    }
    //添加执行
    public function store(){
        $data=request()->except("_token");
        $validator=Validator::make($data,[
            'brand_name'=>"required|unique:brand",
            'brand_url'=>"required|unique:brand",
        ],[
            'brand_name.required'=>"品牌名称不能为空",
            'brand_name.unique'=>"品牌名称重复",
            'brand_url.required'=>"品牌网址不能为空",
            'brand_url.unique'=>"品牌网址重复",
        ]);
        if($validator->fails()){
            return redirect('admin/brand/create')->withErrors($validator)->withInput();
        }
        if(request()->hasFile("brand_logo")){
            $data['brand_logo']=$this->upload("brand_logo");
        }
        
        $res=Brand::insert($data);
        if($res){
            return redirect("admin/brand/index");
        }
    }
    
    // //删除
    // public function delete(){
    //     $brand_id=request()->brand_id;
    //     $where=[
    //         ["brand_id","=",$brand_id]
    //     ];
    //     $res=Brand::where($where)->delete();
    //     if($res){
    //         return redirect("admin/brand/index");
    //     }
    // }
    //修改视图
    public function edit(){
        $brand_id=request()->brand_id;
        $where=[
            ["brand_id","=",$brand_id]
        ];
        $res=Brand::where($where)->first();
        return view("admin.brand.edit",["res"=>$res]);
    }
    //修改执行
    public function update(){
        $data=request()->except("_token");
        $brand_id=request()->brand_id;
        $validator=Validator::make($data,[
            'brand_name'=>"required|unique:brand",
            'brand_url'=>"required|unique:brand",
        ],[
            'brand_name.required'=>"品牌名称不能为空",
            'brand_name.unique'=>"品牌名称重复",
            'brand_url.required'=>"品牌网址不能为空",
            'brand_url.unique'=>"品牌网址重复",
        ]);
        if($validator->fails()){
            return redirect('admin/brand/create')->withErrors($validator)->withInput();
        }
        if(request()->hasFile("brand_logo")){
            $data['brand_logo']=$this->upload("brand_logo");
        }
        $where=[
            ["brand_id","=",$brand_id]
        ];
        $res=Brand::where($where)->update($data);
        if($res){
            return redirect("admin/brand/index");
        }
    }
    //上传文件
    public function upload($filename){
        if(request()->file($filename)->isValid()){
            $file=request()->$filename;
            $path=$file->store("");
            return $path;
        }
        exit("上传有误");
    }
    //即点即改
    public function update2(){
        $brand_id=request()->brand_id;
        $val=request()->val;
        $where=[
            ["brand_id","=",$brand_id]
        ];
        $res=Brand::where($where)->update(["brand_name"=>$val]);
        if($res){
            echo "ok";
        }
    }
    //批量删除
    public function delete(){
        $brand_id=request()->brand_id;
        $brand_ids=explode(",",$brand_id);
        $res=Brand::whereIn("brand_id",$brand_ids)->delete();
        if($res){
            return redirect("admin/brand/index");
        }
    }
    
}
