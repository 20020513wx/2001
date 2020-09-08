
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
        <tr>
            <td colspan="6">
                {{$brandInfo->appends(['brand_name'=>$brand_name,'brand_url'=>$brand_url])->links('vendor.pagination.adminshop')}}
            </td>
        </tr>