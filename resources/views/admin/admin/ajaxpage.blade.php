 @foreach($admin as $v)
            <tr>
                <td><input type="checkbox" name="admincheck[]" lay-skin="primary" value="{{$v->admin_id}}"></td>
                <td>{{$v->admin_id}}</td>
                <td id="{{$v->admin_id}}" oldval="{{$v->admin_name}}"><span class="admin_name">{{$v->admin_name}}</td>
                <td>{{substr_replace($v->admin_tel,'****',3,4)}}</td>
                <td>{{substr_replace($v->admin_email,'****',3,3)}}</td>
                <td>{{date('Y-m-d H:i:s',$v->admin_time)}}</td>
                 <td> 
                    <a href="{{url('/admin/admin/edit/'.$v->admin_id)}}" class="layui-btn layui-btn-warm">修改</a>
                    <a href="javascript:void(0)" onclick="deleteById({{$v->admin_id}})" class="layui-btn layui-btn-danger">删除</a>
                </td>
            </tr>
            @endforeach
            <tr>
            <td colspan="7">
                {{$admin->links('vendor.pagination.adminshop')}}
                <button type="button" class="layui-btn layui-btn-warm moredel">批量删除</button>
            </td>
        </tr>