@extends('admin.layout')
@section('title','类型添加')
@section('content')


    <div style="padding: 15px;">
      <form class="layui-form" action="{{url('admin/goodstype/attributeDos/'.$cat_id)}}" method="post" enctype="multipart/form-data">
      @csrf
      <div class="layui-form-item">
        <label class="layui-form-label">属性名称</label>
        <div class="layui-input-block">
          <input type="text" name="attr_name" lay-verify="title" autocomplete="off" placeholder="请输入属性名称" class="layui-input">
          <!-- <font color="red">{{$errors->first("admin_tel")}}</font> -->
        </div>
      </div>
      <input type="submit" value="点击添加">
    </form>
  </div>
    </div>
  </div>
  




@endsection