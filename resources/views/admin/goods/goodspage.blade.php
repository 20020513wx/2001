@foreach($data as $v)
    <tr goods_id="{{$v->goods_id}}">
        <td>{{$v->goods_id}}</td>
        <td>{{$v->goods_name}}</td>
        <td>{{$v->goods_price}}</td>
        <td>{{$v->goods_num}}</td>
        <td>{{$v->cate_name}}</td>
        <td>{{$v->brand_name}}</td>
        <td>@if($v->is_up == 1)是@else 否@endif</td>
        <td>@if($v->is_new == 1)是@else 否@endif</td>
        <td>@if($v->is_best == 1)是@else 否@endif</td>
        <td><img src="{{$v->goods_img}}" width="50px"></td>
        <td>
            @foreach($v->goods_imgs as $vv)
                <img src="{{$vv}}" width="50px">
            @endforeach
        </td>
        <td>{{$v->goods_desc}}</td>
        <td>
            <a href="/admin/goods/edit/{{$v->goods_id}}"><button type="button" class="layui-btn layui-btn-normal">修改</button></a>
            <button type="button" class="layui-btn layui-btn-danger del">删除</button>
        </td>
    </tr>
@endforeach
<tr>
    <td colspan="13">{{$data->appends($goods)->links('vendor.pagination.adminshop')}}</td>
</tr>