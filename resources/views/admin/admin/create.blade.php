@extends('admin.layout')
@section('title','管理员添加')
@section('content')


    <div style="padding: 15px;">
       @if ($errors->any())
        <div class="alert alert-danger" style="padding-bottom: 20px;padding-left: 20px">
        <ul>
        @foreach ($errors->all() as $error)
        <li style="margin-top: 10px;color: #ff0000;">{{ $error }}</li>
        @endforeach
        </ul>
        </div>
      @endif
      <form class="layui-form" action="{{url('admin/admin/store')}}" method="post" enctype="multipart/form-data">
      @csrf
      <div class="layui-form-item">
        <label class="layui-form-label">管理员名称:</label>
        <div class="layui-input-block">
          <input type="text" name="admin_name" lay-verify="title" autocomplete="off" placeholder="请输入管理员名称" class="layui-input">
          <font color="red"></font>
        </div>
      </div>
      <div class="layui-form-item">
        <label class="layui-form-label">管理员电话:</label>
        <div class="layui-input-block">
          <input type="text" name="admin_tel" lay-verify="title" autocomplete="off" placeholder="请输入管理员电话" class="layui-input">
          <font color="red"></font>
        </div>
      </div>
      <div class="layui-form-item">
        <label class="layui-form-label">管理员邮箱:</label>
        <div class="layui-input-block">
          <input type="text" name="admin_email" lay-verify="title" autocomplete="off" placeholder="请输入管理员邮箱" class="layui-input">
          <font color="red"></font>
        </div>
      </div>
      <div class="layui-form-item">
        <label class="layui-form-label">管理员密码:</label>
        <div class="layui-input-block">
          <input type="password" name="admin_pwd" lay-verify="title" autocomplete="off" placeholder="请输入管理员密码" class="layui-input">
          <font color="red"></font>
        </div>
      </div>
      <div class="layui-form-item">
        <label class="layui-form-label">角色:</label>
        <div class="layui-input-block">
        @foreach($role as $v)
          <input type="checkbox" name="role[]" value="{{$v->role_id}}" title="{{$v->role_name}}">
          @endforeach
        </div>
      </div>
      <input type="submit" value="点击添加">
    </form>
  </div>
    </div>
  </div>
  




@endsection