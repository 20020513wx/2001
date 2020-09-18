@extends('admin.layout')
@section('title','主页')
@section('content')


    <div style="padding: 15px;">
      <form class="layui-form" action="{{url('admin/menu/store')}}" method="post" enctype="multipart/form-data">
      @csrf
      <div class="layui-form-item">
        <label class="layui-form-label">权限名称</label>
        <div class="layui-input-block">
          <input type="text" name="menu_name" lay-verify="title" autocomplete="off" placeholder="请输入权限名称" class="layui-input">
          <font color="red"></font>
        </div>
      </div>
      <div class="layui-form-item">
        <label class="layui-form-label">权限路由</label>
        <div class="layui-input-block">
          <input type="text" name="url" lay-verify="title" autocomplete="off" placeholder="请输入权限路由" class="layui-input">
        </div>
      </div>
      <div class="layui-form-item">
        <label class="layui-form-label">路由别名</label>
        <div class="layui-input-block">
          <input type="text" name="urls" lay-verify="title" autocomplete="off" placeholder="请输入路由别名" class="layui-input">
        </div>
      </div>
      
      <div class="layui-form-item">
          <label class="layui-form-label">添加权限</label>
          <div class="layui-input-block">
            <select name="parent_id" lay-filter="aihao">
              <option value="0">顶级权限</option>
              @foreach($menu as $k=>$v)
              <option value="{{$v->menu_id}}">{{str_repeat('|--',$v->level)}}{{$v->menu_name}}</option>
              @endforeach
            </select>
          </div>
        </div>
      <input type="submit" value="点击添加">
    </form>
  </div>
    </div>
  </div>
  




@endsection