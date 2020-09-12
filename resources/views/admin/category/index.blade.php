@extends('admin.layout')
@section('title','分类列表')
@section('content')

<!-- class="layui-form" -->
<div style="padding: 15px;">
    <table class="layui-table">
        <colgroup>
        <col width="150">
        <col width="150">
        <col width="200">
        <col>
        </colgroup>
        <thead>
            <tr>
                <th>分类ID</th>
                <th>分类名称</th>
                <th>分类是否显示</th>
                <th>分类是否在导航显示</th>
                <th>操作</th>
            </tr> 
        </thead>
        <tbody>
        @foreach($res as $v)
            <tr style="display: none" cate_id="{{$v->cate_id}}" parent_id="{{$v->parent_id}}">
                <td>{{$v->cate_id}}</td>
                <td>
                    <a href="javascript:;" class="showHide">+</a>
                    {{@str_repeat($v->level*2)}}
                    {{$v->cate_name}}
                </td>
                <td>{{$v->is_show==1?"是":"否"}}</td>
                <td>{{$v->is_show_nav==1?"是":"否"}}</td>
                <td>
                    {{--<a href="{{url('admin/category/edit/'.$v->cate_id)}}" class="layui-btn layui-btn-normal">编辑</a>--}}
                    {{--<a href="{{url('admin/category/delete/'.$v->cate_id)}}" class="layui-btn layui-btn-danger">删除</a>--}}
                    <button class="layui-btn layui-btn-danger" id="del" cate_id="{{$v->cate_id}}">删除</button>
                </td>
            </tr>
        @endforeach
        </tbody>
        
    </table>
</div>
<script src="/jquery.js"></script>
<script>
    //删除
    $(document).on('click','#del',function(){
            var cate_id=$(this).attr('cate_id');
//            alert(cate_id);
        if(window.confirm('是否删除')){
            $.get('/admin/category/delete/'+cate_id,function(res){
                alert(res.msage);
            })
        }
    })
    //顶级
    $(document).ready(function(){
        $("tr[parent_id='0']").show();
    })

    //子级
    $(document).on("click",'.showHide',function(){
//        alert(21212);
        var _this=$(this);
        var _sign=_this.text();
//        alert(_sign);
        var cate_id=_this.parents("tr").attr("cate_id");
//        alert(cate_id);
//        if(_sign=="+"){
//            var child=$("tr[parent_id='"+cate_id+"']");
////            console.log(child);
//                alert(child);
//            if(child.length>0){
//                child.show();
//                _this.text("-");
//            }else if(child.length<0){
//                $("tr[parent_id='"+cate_id+"']").hide();
//                _this.text("+");
//            }
//        }
        if(_sign=="+"){
            var child=$("tr[parent_id='"+cate_id+"']");
            if(child.length>0){
                child.show();
                _this.text("-");
            }
        }else{
            $("tr[parent_id='"+cate_id+"']").hide();
            _this.text("+");
        }
    })
</script>
@endsection