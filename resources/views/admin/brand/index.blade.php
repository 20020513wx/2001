@extends('admin.layout')
@section('title','主页')
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
            <th><input type="checkbox" class="boxs"></th>
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
            <td><input type="checkbox" class="box"></td>
            <td brand_id="{{$v->brand_id}}">{{$v->brand_id}}</td>
            <td class="brand_name">{{$v->brand_name}} 
                <span>
                    
                </span>
            </td>
            <td>{{$v->brand_url}}</td>
            <td><img src="/upload/{{$v->brand_logo}}"></td>
            <td>{{$v->brand_desc}}</td>
            <td>
                <button class="delete">点击删除</button>
                <button><a href="{{url('admin/brand/edit/'.$v->brand_id)}}">点击去修改</a></button>
            </td>
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
<script src="/jquery.js"></script>
<script>
    $(function(){
        //即点即改
        $(document).on("click",".brand_name",function(){
            var _this=$(this)
            var brand_id=_this.prev().attr("brand_id")
            _this.children().html("<input type='text' class='bname'>");
            $(".bname").blur(function(){
                var val=$(".bname").val();
                _this.children().html("");
                $.ajax({
                    url:"{{url('admin/brand/update2')}}",
                    data:{brand_id:brand_id,val:val},
                    type:"post",
                    success:function(res){
                        if(res=="ok"){
                            _this.text(val);
                        }
                    }
                })
            })
        })
        //点击多选
            $(document).on("click",".box",function(){
                var box=$(".box:checked");
                var brand_id="";
                box.each(function(index){
                    brand_id+=$(this).parent().next().attr("brand_id")+',';
                })
                brand_id=brand_id.substr(0,brand_id.length-1);
                $(".delete").click(function(){
                    location.href="/admin/brand/delete/"+brand_id;
                })
                
            })
        

    });
</script>
@endsection