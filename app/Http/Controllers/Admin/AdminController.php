<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Admin;
use App\Model\Role;
use App\Model\Adminrole;
use DB;

class AdminController extends Controller
{
    //管理员列表
    public function index(){
        $admin=Admin::orderBy('admin_id','desc')->paginate(2);
        //dd($admin);
        if(request()->ajax()){
            return view("admin.admin.ajaxpage",['admin'=>$admin]);
        }
        return view("admin.admin.index",['admin'=>$admin]);
    }
    //管理员添加
    public function create(){
        $role=Role::all();
        return view("admin.admin.create",['role'=>$role]);
    }
    public function store(Request $request){
        $request->validate([
            'admin_name' => 'required|unique:admin',
            'admin_tel'=>'digits_between:10,11',
            'admin_email' => 'required',
            'admin_pwd'=>'digits_between:6,20',
            ],[
                'admin_name.required'=>'管理员名称不能为空',
                'admin_name.unique'=>'管理员名称已存在',
                'admin_tel.required'=>'管理员电话不能为空',
                'admin_email.required'=>'管理员邮箱不能为空',
                'admin_pwd.digits_between'=>'密码不能少于6位',
                'admin_tel.digits_between'=>'手机号11位',
            ]);
        DB::beginTransaction();
    	try {
            
            $role=$request->role;
            $post=$request->except(['_token','role']);
            //dd($post);
            $post['admin_time']=time();
            $post['admin_pwd']=encrypt($post['admin_pwd']);
            //dd($post);
            $admin=Admin::insertGetId($post);
            if($admin){
                //添加管理员角色表
                if(count($role)){
                    foreach($role as $v){
                        $adminrole[]=[
                            'admin_id'=>$admin,
                            'role_id'=>$v
                        ];
                    }
                    Adminrole::insert($adminrole);
                }
                DB::commit();
                return redirect('/admin/admin/index');
            }
        } catch (\Exception $e) {
            // dump($e->getMessage());
            DB::rollBack();
            return redirect('/admin/admin/create');
        }
    }
    public function edit($id){
        $admin=Admin::find($id);
        //dd($admin);
        return view("admin.admin.edit",['admin'=>$admin]);
    }

    public function update(Request $request,$id){
        $request->validate([
            'admin_name' => 'required|unique:admin',
            'admin_tel'=>'digits_between:10,11',
            'admin_email' => 'required',
            'admin_pwd'=>'digits_between:6,20',
            ],[
                'admin_name.required'=>'管理员名称不能为空',
                'admin_name.unique'=>'管理员名称已存在',
                'admin_tel.required'=>'管理员电话不能为空',
                'admin_email.required'=>'管理员邮箱不能为空',
                'admin_pwd.digits_between'=>'密码不能少于6位',
                'admin_tel.digits_between'=>'手机号11位',
            ]);
        $post=$request->except('_token');
        $post['admin_time']=time();
        $post['admin_pwd']=encrypt($post['admin_pwd']);
        //dd($post);
        $res=Admin::where('admin_id',$id)->update($post);
        //dd($admin);
        if($res){
            return redirect('/admin/admin/index');
        }
    }

    //即点即改
    public function change(Request $request){
        $admin_name=$request->admin_name;
        $id=$request->id;
        if(!$admin_name || !$id){
            return response()->json(['code'=>3,'msg'=>'缺少参数']);
        }
        $res=Admin::where('admin_id',$id)->update(['admin_name'=>$admin_name]);
        if($res){
            return response()->json(['code'=>0,'msg'=>'修改成功']);
        }
    }
    public function destroy($id=0){
        $id=request()->id?:$id;
        //dd($id);
        if(!$id){
            return;
        }
        $res=Admin::destroy($id);
        //dd($res);
        if(request()->ajax()){
            return response()->json(['code'=>0,'msg'=>'删除成功']);
        }
        if($res){
            return redirect('/admin/admin/index');
        }
    }

    

}
