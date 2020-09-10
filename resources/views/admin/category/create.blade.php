@extends('admin.layout')
@section('title','分类添加')
@section('content')


    <div style="padding: 15px;">
      <form class="layui-form" action="{{url('admin/brand/store')}}" method="post" enctype="multipart/form-data">
      @csrf
      <div class="layui-form-item">
        <label class="layui-form-label">分类名称</label>
        <div class="layui-input-block">
          <input type="text" name="cate_name" lay-verify="title" autocomplete="off" placeholder="请输入分类名称" class="layui-input">
          <font color="red"></font>
        </div>
      </div>
      <input type="submit" value="点击添加">
    </form>
  </div>
    </div>
  </div>
  




@endsection