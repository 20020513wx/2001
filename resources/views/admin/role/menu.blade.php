@extends('admin.layout')
@section('title','添加权限')
@section('content')

        <!-- class="layui-form" -->
<div style="padding: 15px;">
    <form action="{{url('admin/role/menuDo/'.$role_id)}}">
    <!-- @csrf -->
    <!-- <input type="hidden" name="{{$role_id}}"> -->
    <input type="submit" value="添加权限">
        <table class="layui-table">
            <colgroup>
                <col width="150">
                <col width="150">
                <col width="200">
                <col>
            </colgroup>
            <thead>
                <tr>
                    <th>菜单名称</th>
                    <th width="5%">
                        <input type="checkbox" class="boxs" name="allcheckbox" lay-skin="primary">
                    </th>
                </tr>
            </thead>
            <tbody>
            @foreach($menu as $v)
                <tr style="display: none" menu_id="{{$v->menu_id}}" parent_id="{{$v->parent_id}}">
                    <td id="{{$v->menu_id}}">
                        <a href="javascript:;" class="showHide">+</a>
                        {{@str_repeat("→",$v->level)}}
                        {{$v->menu_name}}
                    </td>
                    <td>
                        <input class="checkpriv_{{$v->menu_id}}" type="checkbox" parent_id="{{$v->parent_id}}" class="box" name="admincheck[]" lay-skin="primary" value="{{$v->menu_id}}">
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </form>
</div>
<script src="/jquery.js"></script>
<script>
    $(function(){
        var menu_id={{$menu_id}};
        // var menu_ids=$(".box").val();
        for(var i=0;i<menu_id.length;i++){
            $('input[class="checkpriv_'+menu_id[i]+'"]').prop("checked",true);
        }
    })
    //权限分级选中
    $(document).on("click",".box",function(){
        var val=$(this).val();
        var checkval=$(this).prop("checked");
        if(checkval){
            $('input[parent_id="'+val+'"]').prop("checked",checkval)
        }else{
            $('input[parent_id="'+val+'"]').prop("checked",checkval)
        }

        var checkvals=$(this).attr("parent_id");
        var vals=checkvals;
        
        if(checkval){
            $('input[value="'+vals+'"]').prop("checked",checkval)
        }else{
            $('input[value="'+vals+'"]').prop("checked",checkval)
        }
        
    })

    //无限极分类
    //顶级
    $(document).ready(function(){
        $("tr[parent_id='0']").show();
    })
    $(document).on('click','.showHide',function(){
        var _this=$(this);
        var _sign=_this.text();
        //alert(_sign);
        var menu_id=_this.parents("tr").attr("menu_id");
        if(_sign=="+"){
            var child=$("tr[parent_id='"+menu_id+"']");
            if(child.length>0){
                child.show();
                _this.text("-");
            }
        }else{
            $("tr[parent_id='"+menu_id+"']").hide();
            _this.text("+");
        }

    });
    //全选与反选
    $(document).on("click",".boxs",function(){
        var _this=$(this);
        var checked=$(".boxs").prop("checked");
        if(checked){
            $("input[name='admincheck[]']").prop("checked",checked);
        }else{
            $("input[name='admincheck[]']").prop("checked",checked);
        }
        
    })

    //即点即改
    //    $(document).on('click',".menu_name",function(){
    //        var menu_name=$(this).text();
    ////        alert(menu_name);
    //        var menu_id=$(this).parent().attr('id');
    ////        alert(menu_id);
    //        $(this).parent().html('<input type="text" class="namea input_name'+menu_id+'" value="+menu_name+">');
    //        $('.input_name'+menu_id).val('').focus().val(menu_name);
    //    });
    //    $(document).on('blur','.namea',function(){
    //            var name=$(this).val();
    ////        alert(name);
    //        var id=$(this).parent().attr('id');
    ////        alert(id);
    //        var obj=$(this);
    //        $.get('/admin/menu/ang/',{menu_id:id,menu_name:name},function(res){
    //            alert(res.msg);
    //            if(res.code==0){
    //                obj.parent().html('<span class="menu_name">'+name+'</span>');
    //            }
    //        },'json')
    //    });

    //删除
//     $(document).on('click',"#del",function(){
//         var menu_id=$(this).attr('menu_id');
// //        alert(menu_id);
//         if(window.confirm("是否删除")){
//             $.get('/admin/menu/delete/'+menu_id,function(res){
//                 alert(res.msg);
//             });
//         }

//     });

    //无刷新分页
//     $(document).on('click',".layui-laypage a",function(){
//         var url=$(this).attr('href');
// //        alert(url);
//         $.get(url,function(res){
//             $('tbody').html(res);
//         });
//         return false;
//     });
</script>
@endsection
