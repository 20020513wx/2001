@extends('admin.layout')
@section('title','主页')
@section('content')


    <div style="padding: 15px;">
      <form class="layui-form" action="{{url('admin/menu/update/'.$res->menu_id)}}" method="post" enctype="multipart/form-data">
      @csrf
      <div class="layui-form-item">
        <label class="layui-form-label">权限名称</label>
        <div class="layui-input-block">
          <input type="text" name="menu_name" value="{{$res->menu_name}}" lay-verify="title" autocomplete="off" placeholder="请输入角色名称" class="layui-input">
          <!-- <font color="red">{{$errors->first("menu_name")}}</font> -->
        </div>
      </div>
      
      <div class="layui-form-item">
        <label class="layui-form-label">权限路由</label>
        <div class="layui-input-block">
          <input type="text" name="url"   value="{{$res->url}}" lay-verify="title" autocomplete="off" placeholder="请输入权限路由" class="layui-input">
        </div>
      </div>
      <div class="layui-form-item">
        <label class="layui-form-label">路由别名</label>
        <div class="layui-input-block">
          <input type="text" name="urls"  value="{{$res->urls}}" lay-verify="title" autocomplete="off" placeholder="请输入路由别名" class="layui-input">
        </div>
      </div>
      <input type="submit" value="点击修改">
    </form>
  </div>
    </div>
  </div>
  




@endsection