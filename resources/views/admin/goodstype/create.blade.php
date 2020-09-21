@extends('admin.layout')
@section('title','类型添加')
@section('content')


    <div style="padding: 15px;">
      <form class="layui-form" action="{{url('admin/goodstype/store')}}" method="post" enctype="multipart/form-data">
      @csrf
      <div class="layui-form-item">
        <label class="layui-form-label">类型名称</label>
        <div class="layui-input-block">
          <input type="text" name="cat_name" lay-verify="title" autocomplete="off" placeholder="请输入类型名称" class="layui-input">
          <!-- <font color="red">{{$errors->first("admin_tel")}}</font> -->
        </div>
      </div>
      <input type="submit" value="点击添加">
    </form>
  </div>
    </div>
  </div>
  




@endsection