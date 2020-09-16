@extends('admin.layout')
@section('title','主页')
@section('content')


    <div style="padding: 15px;">
      <form class="layui-form" action="{{url('admin/role/update/'.$res->role_id)}}" method="post" enctype="multipart/form-data">
      @csrf
      <div class="layui-form-item">
        <label class="layui-form-label">角色名称</label>
        <div class="layui-input-block">
          <input type="text" name="role_name" value="{{$res->role_name}}" lay-verify="title" autocomplete="off" placeholder="请输入角色名称" class="layui-input">
          <!-- <font color="red">{{$errors->first("role_name")}}</font> -->
        </div>
      </div>
      
      <div class="layui-form-item">
        <label class="layui-form-label">角色内容</label>
        <div class="layui-input-block">
          <input type="text" name="role_desc"  value="{{$res->role_desc}}" lay-verify="title" autocomplete="off" placeholder="请输入角色内容" class="layui-input">
        </div>
      </div>
      <input type="submit" value="点击修改">
    </form>
  </div>
    </div>
  </div>
  




@endsection