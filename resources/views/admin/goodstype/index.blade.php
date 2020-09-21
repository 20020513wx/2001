@extends('admin.layout')
@section('title','品牌列表')
@section('content')

<!-- class="layui-form" -->
<div style="padding: 15px;">
    <!-- <button class="delete">点击删除</button> -->
    <table class="layui-table">
        <colgroup>
        <col width="150">
        <col width="150">
        <col width="200">
        <col>
        </colgroup>
        <thead>
            <tr>
                <th>类型ID</th>
                <th>类型名称</th>
                <th>操作</th>
            </tr> 
        </thead>
        <tbody class="aaa">
        @foreach($goodstype as $v)
            <tr>
                <td>{{$v->cat_id}}</td>
                <td>{{$v->cat_name}}</td>
                <td>
                    <button><a href="{{url('admin/goodstype/attribute/'.$v->cat_id)}}">点击浏览编辑此类型属性</a></button>
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