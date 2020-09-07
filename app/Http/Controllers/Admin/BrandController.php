<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Brand;
class BrandController extends Controller
{
    //品牌展示
    public function index(){
        $brandInfo=Brand::paginate(2);
        return view("admin.brand.index",['brandInfo'=>$brandInfo]);
    }
    //品牌添加
    public function create(){
        return view("admin.brand.create");
    }
    //添加执行
    public function store(){
        $data=request()->except("_token");
        if(request()->hasFile("brand_logo")){
            $data['brand_logo']=$this->upload("brand_logo");
        }
        
        $res=Brand::insert($data);
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
}
