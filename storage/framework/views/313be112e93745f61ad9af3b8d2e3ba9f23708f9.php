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
                    <a href="javascript:void(0)" onclick="deleteById(<?php echo e($v->admin_id); ?>)" class="layui-btn layui-btn-danger">删除</a>
                </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <tr>
            <td colspan="7">
                <?php echo e($admin->links('vendor.pagination.adminshop')); ?>

                <button type="button" class="layui-btn layui-btn-warm moredel">批量删除</button>
            </td>
        </tr><?php /**PATH /wwwroot/2001/resources/views/admin/admin/ajaxpage.blade.php ENDPATH**/ ?>