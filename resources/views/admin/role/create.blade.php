@extends('admin.layout')
@section('title','主页')
@section('content')


    <div style="padding: 15px;">
      <form class="layui-form" action="{{url('admin/role/store')}}" method="post" enctype="multipart/form-data">
      @csrf
      <div class="layui-form-item">
        <label class="layui-form-label">角色名称</label>
        <div class="layui-input-block">
          <input type="text" name="role_name" lay-verify="title" autocomplete="off" placeholder="请输入角色名称" class="layui-input">
          <font color="red"></font>
        </div>
      </div>
      <div class="layui-form-item">
        <label class="layui-form-label">角色内容</label>
        <div class="layui-input-block">
          <input type="text" name="role_desc" lay-verify="title" autocomplete="off" placeholder="请输入角色内容" class="layui-input">
        </div>
      </div>
      <input type="submit" value="点击添加">
    </form>
  </div>
    </div>
  </div>
  




@endsection