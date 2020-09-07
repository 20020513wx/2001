@extends('admin.layout')
@section('title','主页')
@section('content')


<div class="layui-form" style="padding: 15px;">
    <table class="layui-table">
        <colgroup>
        <col width="150">
        <col width="150">
        <col width="200">
        <col>
        </colgroup>
        <thead>
        <tr>
            <th>品牌ID</th>
            <th>品牌名称</th>
            <th>品牌网址</th>
            <th>品牌logo</th>
            <th>品牌内容</th>
            <th>操作</th>
        </tr> 
        </thead>
        <tbody>
        @foreach($brandInfo as $v)
        <tr>
            <td>{{$v->brand_id}}</td>
            <td>{{$v->brand_name}}</td>
            <td>{{$v->brand_url}}</td>
            <td><img src="/upload/{{$v->brand_logo}}"></td>
            <td>{{$v->brand_desc}}</td>
            <td></td>
        </tr>
        @endforeach
        </tbody>
        <tr>
      <td colspan="6">
        {{$brandInfo->links('vendor.pagination.adminshop')}}
      </td>
  </tr>
        
    </table>
    
</div>
@endsection