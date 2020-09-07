@extends('admin.layout')
@section('title','主页')
@section('content')


    <div style="padding: 15px;">
      <form class="layui-form" action="{{url('admin/brand/store')}}" method="post" enctype="multipart/form-data">
      @csrf
      <div class="layui-form-item">
        <label class="layui-form-label">品牌名称</label>
        <div class="layui-input-block">
          <input type="text" name="brand_name" lay-verify="title" autocomplete="off" placeholder="请输入标题" class="layui-input">
        </div>
      </div>
      <div class="layui-form-item">
        <label class="layui-form-label">品牌网址</label>
        <div class="layui-input-block">
          <input type="text" name="brand_url" lay-verify="title" autocomplete="off" placeholder="请输入标题" class="layui-input">
        </div>
      </div>
      <div class="layui-form-item">
        <label class="layui-form-label">品牌logo</label>
        <div class="layui-input-block">
          <input type="file" name="brand_logo" lay-verify="title" autocomplete="off" class="layui-input">
        </div>
      </div>
      
      <div class="layui-form-item">
        <label class="layui-form-label">品牌内容</label>
        <div class="layui-input-block">
          <input type="text" name="brand_desc" lay-verify="title" autocomplete="off" placeholder="请输入标题" class="layui-input">
        </div>
      </div>
      <input type="submit" value="点击添加">
    </form>
  </div>
    </div>
  </div>
  




@endsection