
        @foreach($roleInfo as $v)
            <tr>
                <td><input type="checkbox" class="box"></td>
                <td role_id="{{$v->role_id}}">{{$v->role_id}}</td>
                <td class="role_name">{{$v->role_name}} 
                    <span>
                        
                    </span>
                </td>
                <td>{{$v->role_url}}</td>
                <td><img src="/upload/{{$v->role_logo}}"></td>
                <td>{{$v->role_desc}}</td>
                <td>
                    <button class="delete">点击删除</button>
                    <button><a href="{{url('admin/role/edit/'.$v->role_id)}}">点击去修改</a></button>
                </td>
            </tr>
        @endforeach