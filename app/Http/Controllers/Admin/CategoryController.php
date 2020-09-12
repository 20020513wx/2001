<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Category;
class CategoryController extends Controller
{
    //分类列表
    public function index(){
        $Cate=Category::all();
//        dd($Category);
        $Category=$this->list_level($Cate);
//        dd($Category);
        return view("admin.category.index",['res'=>$Category]);
    }
    //分类添加视图
    public function create(){
        $Category=Category::all();
        $Category=self::list_level($Category);
//        dd($Brand);
        return view("admin.category.create",['cate'=>$Category]);
    }
    //添加执行
    public function store(){
//        echo (121213);
        $data=request()->except('_token');
//        dd($data);
        $category=Category::insert($data);
//        dd($category);
        if($category){
            return redirect('admin/category/index');
        }
    }
    //删除
    public function delete(){
//        $da=request()->all();
        $cate_id=request()->cate_id;
//        dd($da);
        $re=Category::where("parent_id",$cate_id)->first();
//        dd($re);
        if($re){
            return  $msage=[
                 'code'=>'000001',
                'msage'=>'该下面有节点不能删除！',
                'success'=>true
            ];
        }
        $del=Category::where("cate_id",$cate_id)->delete();
        if($del){
            return $msage=[
                'code'=>'000000',
                'msage'=>'删除成功！',
                'success'=>true
            ];
        }
    }
    //无限极分类
    public static function list_level($data,$pid=0,$level=0)//三个参数与上面index方法里面穿的参数相对应
    {
        static $array=[];
        foreach($data as $k=>$v){
            if($pid==$v->parent_id){
                $v->level=$level;
                $array[]=$v;
                self::list_level($data,$v->cate_id,$level+1);
            }
        }
        return $array;
    }

}
