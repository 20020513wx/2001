<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use App\Model\Role;
use App\Model\Menu;
class RoleController extends Controller
{
    //角色展示
    public function index(){
        $role_name=request()->role_name;
        $where=[];
        if($role_name){
            $where[]=["role_name","like","%$role_name%"];
        }
        $roleInfo=Role::where($where)->get();
        
        return view("admin.role.index",['roleInfo'=>$roleInfo,'role_name'=>$role_name]);
    }
    //角色添加
    public function create(){
        $menu=Menu::get();
        $menu=$this->level($menu);
        return view("admin.role.create",["menu"=>$menu]);
    }
    //无限极分类
    public static function level($data,$parent_id=0,$level=0){
        
        if(empty($data)){
            return;
        }
        static $array=[];
        foreach($data as $k=>$v){
            if($parent_id==$v->parent_id){
                $v->level=$level;
                $array[]=$v;
                self::level($data,$v->menu_id,$level+1);
            }
        }
        return $array;
    }
    //添加执行
    public function store(){
        $data=request()->except("_token");
        $validator=Validator::make($data,[
            'role_name'=>"required|unique:role",
        ],[
            'role_name.required'=>"角色名称不能为空",
            'role_name.unique'=>"角色名称重复",
        ]);
        if($validator->fails()){
            return redirect('admin/role/create')->withErrors($validator)->withInput();
        }
        $res=Role::insert($data);
        if($res){
            return redirect("admin/role/index");
        }
    }
    
    // //删除
    public function delete(){
        $role_id=request()->role_id;
        $where=[
            ["role_id","=",$role_id]
        ];
        $res=role::where($where)->delete();
        if($res){
            return redirect("admin/role/index");
        }
    }
    //修改视图
    public function edit(){
        $role_id=request()->role_id;
        $where=[
            ["role_id","=",$role_id]
        ];
        $res=role::where($where)->first();
        return view("admin.role.edit",["res"=>$res]);
    }
    //修改执行
    public function update(){
        $data=request()->except("_token");
        $role_id=request()->role_id;
        $validator=Validator::make($data,[
            'role_name'=>"required|unique:role",
        ],[
            'role_name.required'=>"角色名称不能为空",
            'role_name.unique'=>"角色名称重复",
        ]);
        if($validator->fails()){
            return redirect('admin/role/create')->withErrors($validator)->withInput();
        }
        $where=[
            ["role_id","=",$role_id]
        ];
        $res=role::where($where)->update($data);
        if($res){
            return redirect("admin/role/index");
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
        $role_id=request()->role_id;
        $val=request()->val;
        $where=[
            ["role_id","=",$role_id]
        ];
        $wheres=[
            ["role_name","=",$val]
        ];
        $info=role::where($wheres)->count();
        if($info){
            echo "err";die;
        }
        $res=role::where($where)->update(["role_name"=>$val]);
        if($res){
            echo "ok";die;
        }else{
            echo "no";die;
        }
    }
}
