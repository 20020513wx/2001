<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use App\Model\Menu;
class MenuController extends Controller
{
    //菜单展示
    public function index(){
        $menu_name=request()->menu_name;
        $where=[];
        if($menu_name){
            $where[]=["menu_name","like","%$menu_name%"];
        }
        $menuInfo=Menu::where($where)->get();
        
        return view("admin.menu.index",['menuInfo'=>$menuInfo,'menu_name'=>$menu_name]);
    }
    //菜单添加
    public function create(){
        
        return view("admin.menu.create");
    }
    //添加执行
    public function store(){
        $data=request()->except("_token");
        $validator=Validator::make($data,[
            'menu_name'=>"required|unique:menu",
            'url'=>"required|unique:menu",
        ],[
            'menu_name.required'=>"菜单名称不能为空",
            'menu_name.unique'=>"菜单名称重复",
            'url.required'=>"路由不能为空",
            'url.unique'=>"路由名称重复",
        ]);
        if($validator->fails()){
            return redirect('admin/menu/create')->withErrors($validator)->withInput();
        }
        $res=Menu::insert($data);
        if($res){
            return redirect("admin/menu/index");
        }
    }
    
    // //删除
    public function delete(){
        $menu_id=request()->menu_id;
        $where=[
            ["menu_id","=",$menu_id]
        ];
        $res=menu::where($where)->delete();
        if($res){
            return redirect("admin/menu/index");
        }
    }
    //修改视图
    public function edit(){
        $menu_id=request()->menu_id;
        $where=[
            ["menu_id","=",$menu_id]
        ];
        $res=menu::where($where)->first();
        return view("admin.menu.edit",["res"=>$res]);
    }
    //修改执行
    public function update(){
        $data=request()->except("_token");
        $menu_id=request()->menu_id;
        $validator=Validator::make($data,[
            'menu_name'=>"required|unique:menu",
            'url'=>"required|unique:menu",
        ],[
            'menu_name.required'=>"菜单名称不能为空",
            'menu_name.unique'=>"菜单名称重复",
            'url.required'=>"路由不能为空",
            'url.unique'=>"路由名称重复",
        ]);
        if($validator->fails()){
            return redirect('admin/menu/create')->withErrors($validator)->withInput();
        }
        $where=[
            ["menu_id","=",$menu_id]
        ];
        $res=menu::where($where)->update($data);
        if($res){
            return redirect("admin/menu/index");
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
        $menu_id=request()->menu_id;
        $val=request()->val;
        $where=[
            ["menu_id","=",$menu_id]
        ];
        $wheres=[
            ["menu_name","=",$val]
        ];
        $info=menu::where($wheres)->count();
        if($info){
            echo "err";die;
        }
        $res=menu::where($where)->update(["menu_name"=>$val]);
        if($res){
            echo "ok";die;
        }else{
            echo "no";die;
        }
    }
}
