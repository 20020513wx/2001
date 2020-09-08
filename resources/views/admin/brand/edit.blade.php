@extends('admin.layout')
@section('title','主页')
@section('content')


    <div style="padding: 15px;">
      <form class="layui-form" action="{{url('admin/brand/update/'.$res->brand_id)}}" method="post" enctype="multipart/form-data">
      @csrf
      <div class="layui-form-item">
        <label class="layui-form-label">品牌名称</label>
        <div class="layui-input-block">
          <input type="text" name="brand_name" value="{{$res->brand_name}}" lay-verify="title" autocomplete="off" placeholder="请输入品牌名称" class="layui-input">
          <font color="red">{{$errors->first("brand_name")}}</font>
        </div>
      </div>
      <div class="layui-form-item">
        <label class="layui-form-label">品牌网址</label>
        <div class="layui-input-block">
          <input type="text" name="brand_url"  value="{{$res->brand_url}}" lay-verify="title" autocomplete="off" placeholder="请输入品牌网址" class="layui-input">
          <font color="red">{{$errors->first("brand_url")}}</font>
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
          <input type="text" name="brand_desc"  value="{{$res->brand_desc}}" lay-verify="title" autocomplete="off" placeholder="请输入品牌内容" class="layui-input">
        </div>
      </div>
      <input type="submit" value="点击修改">
    </form>
  </div>
    </div>
  </div>
  




@endsection