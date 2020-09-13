<?php $__env->startSection('title','管理员列表'); ?>
<?php $__env->startSection('content'); ?>

<!-- class="layui-form" -->
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
                <th width="5%"><input type="checkbox" name="allcheckbox" lay-skin="primary"></th>
                <th>管理员ID</th>
                <th>管理员名称</th>
                <th>管理员电话</th>
                <th>管理员邮箱</th>
                <th>时间</th>
                <th>操作</th>
            </tr> 
        </thead>
        <tbody>
            <?php $__currentLoopData = $admin; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><input type="checkbox" name="admincheck[]" lay-skin="primary" value="<?php echo e($v->admin_id); ?>"></td>
                <td><?php echo e($v->admin_id); ?></td>
                <td id="<?php echo e($v->admin_id); ?>" oldval="<?php echo e($v->admin_name); ?>"><span class="admin_name"><?php echo e($v->admin_name); ?></td>
                <td><?php echo e(substr_replace($v->admin_tel,'****',3,4)); ?></td>
                <td><?php echo e(substr_replace($v->admin_email,'****',3,3)); ?></td>
                <td><?php echo e(date('Y-m-d H:i:s',$v->admin_time)); ?></td>
                <td> 
                    <a href="<?php echo e(url('/admin/admin/edit/'.$v->admin_id)); ?>" class="layui-btn layui-btn-warm">修改</a>
                    <!-- <a href="javascript:void(0)" onclick="if(confirm('确定删除此记录吗')){ location.href='<?php echo e(url('/admin/admin/destroy/'.$v->admin_id)); ?>';}" class="layui-btn layui-btn-danger">删除</a> -->
                    <a href="javascript:void(0)" onclick="deleteById(<?php echo e($v->admin_id); ?>)" class="layui-btn layui-btn-danger">删除</a>
                </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <tr>
            <td colspan="7">
                <?php echo e($admin->links('vendor.pagination.adminshop')); ?>

                <button type="button" class="layui-btn layui-btn-warm moredel">批量删除</button>
            </td>
        </tr>
        </tbody>
        
    </table>
</div>
<script src="/jquery.js"></script>
<script>
    //即点即改
    $(document).on('click','.admin_name',function(){
    // $('.admin_name').click(function(){
        var admin_name=$(this).text();
        var id=$(this).parent().attr('id');
        $(this).parent().html('<input type=text class="changename input_name_'+id+'" value='+admin_name+'>');
        $('.input_name').val('').focus().val(admin_name);
    });
   $(document).on('blur','.changename',function(){
        var newname=$(this).val();
         if(!newname){
            alert('内容不能空');return;
          }
        var oldval=$(this).parent().attr('oldval');
        if(newname==oldval){
            $(this).parent().html('<span class="admin_name">'+newname+'</span>');
            return;
        }
        var id=$(this).parent().attr('id');
        var obj=$(this);
        $.get('/admin/admin/change',{id:id,admin_name:newname},function(res){
        //alert(res.msg);
        if(res.code==0){
          obj.parent().html('<span class="admin_name">'+newname+'</span>');
        }
  },'json')
    });


    //全选、反选
    $(document).on('click','.layui-form-checkbox:first',function(){
        var checkedval=$('input[name="allcheckbox"]').prop('checked');
        $('input[name="admincheck[]"]').prop('checked',checkedval);
        if(checkedval){
            $('.layui-form-checkbox:gt(0)').addClass('layui-form-checked');
        }else{
            $('.layui-form-checkbox:gt(0)').removeClass('layui-form-checked');
        }
    });

    //批量删除
    $(document).on('click','.moredel',function(){
        var ids=new Array();
        $('input[name="admincheck[]"]:checked').each(function(i,k){
            ids.push($(this).val());
        });
        $.get('/admin/admin/decory/',{id:ids},function(res){
            alert(res.msg);
            location.reload();
        },'json')
    });


    //ajax删除
    function deleteById(brand_id){
        if(!brand_id){
            return;
        }
        $.get('/admin/admin/decory/'+brand_id,function(res){
            alert(res.msg);
            location.reload();
        },'json')
    }


    //ajax无刷新分页
    $(document).on('click','.layui-laypage a',function(){
        var url=$(this).attr("href");
        $.get(url,function(res){
            $("tbody").html(res);
            layui.use(['element','form'], function(){
                var element = layui.element;
                var form=layui.form;
                form.render();
            });
        })
        return false;
    });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /wwwroot/2001/resources/views/admin/admin/index.blade.php ENDPATH**/ ?>