@extends('admin.layout')
@section('title','品牌列表')
@section('content')
<center>
    <h1>类型的属性列表</h1>
</center>
<!-- class="layui-form" -->
<div style="padding: 15px;">
<form action="{{url('admin/goodstype/attributeDo/'.$cat_id)}}">
    <input type="submit" value="添加属性">
</form>
    <table class="layui-table">
        <colgroup>
        <col width="150">
        <col width="150">
        <col width="200">
        <col>
        </colgroup>
        <thead>
            <tr>
                <th>属性ID</th>
                <th>属性名称</th>
                <th>操作</th>
            </tr> 
        </thead>
        <tbody class="aaa">
        @foreach($attribute as $v)
            <tr>
                <td>{{$v->attr_id}}</td>
                <td>{{$v->attr_name}}</td>
                <td>
                    
                </td>
            </tr>
        @endforeach
        </tbody>
        
    </table>
</div>
<script src="/jquery.js"></script>
<script src="/static/admin/js/jquery.min.js"></script>
<script>

</script>
@endsection