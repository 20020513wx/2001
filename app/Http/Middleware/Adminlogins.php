<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Route;
use App\Model\Adminrole;
use App\Model\Rolemenu;
use App\Model\Menu;


class Adminlogins
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        //判断登录
        $adminInfo=session("adminInfo");
        // dd($adminInfo);
        if(!$adminInfo){
            return redirect("admin/login");
        }
        //检查权限
        //取路由的别名
        $routename=Route::currentRouteName();
        $role_id=Adminrole::where("admin_id",$adminInfo->admin_id)->pluck('role_id');  // 角色
        $menu_id=Rolemenu::whereIn("role_id",$role_id)->pluck('menu_id');               // 权限      
        $menuInfo=Menu::whereIn("menu_id",$menu_id)->where("is_show",1)->get();         //所属权限路由
        // dd($menuInfo);

        // 
        if($routename!='main' && $adminInfo->admin_tel!="18648949980"){
            $haveMenu=$menuInfo?array_column($menuInfo->toArray(),'urls'):'';
            if(!in_array($routename,$haveMenu)){
                abort(403,'想翻墙先好好干活升官!');
            }
        }



        //左侧菜单展示
        if($adminInfo->admin_tel=='18648949980'){
            $menus=Menu::where('is_show',1)->get()->toArray();
        }else{
            // echo 234;exit;
            $where=[
                ['admin_id',$adminInfo['admin_id']],
                ["is_show","=",1]
            ];
            $menus = Adminrole::leftjoin('rolemenu','adminrole.role_id','=','rolemenu.role_id')
                            ->leftjoin('menu','rolemenu.menu_id','=','menu.menu_id')
                            ->where($where)
                            ->distinct('rolemenu.menu_id')
                            ->get(['rolemenu.menu_id','menu.*']);
        }
        
        $navInfo=$this->list_level($menus);
        view()->share(["navInfo"=>$navInfo,'routename'=>$routename]);
       
        return $next($request);
    }

    //无限极分类
    public function list_level($data,$pid=0)
    {
        if(!$data){
            return;
        }
        $array=[];
        foreach($data as $k=>$v){
            if($pid==$v['parent_id']){
                $array[$k]=$v;
                $array[$k]['son']=$this->list_level($data,$v['menu_id']);
            }
        }
        
        return $array;
    }
}
