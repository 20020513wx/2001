<?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <tr goods_id="<?php echo e($v->goods_id); ?>">
        <td><?php echo e($v->goods_id); ?></td>
        <td><?php echo e($v->goods_name); ?></td>
        <td><?php echo e($v->goods_price); ?></td>
        <td><?php echo e($v->goods_num); ?></td>
        <td><?php echo e($v->cate_name); ?></td>
        <td><?php echo e($v->brand_name); ?></td>
        <td><?php if($v->is_up == 1): ?>是<?php else: ?> 否<?php endif; ?></td>
        <td><?php if($v->is_new == 1): ?>是<?php else: ?> 否<?php endif; ?></td>
        <td><?php if($v->is_best == 1): ?>是<?php else: ?> 否<?php endif; ?></td>
        <td><img src="<?php echo e($v->goods_img); ?>" width="50px"></td>
        <td>
            <?php $__currentLoopData = $v->goods_imgs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $vv): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <img src="<?php echo e($vv); ?>" width="50px">
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </td>
        <td><?php echo e($v->goods_desc); ?></td>
        <td>
            <a href="/admin/goods/edit/<?php echo e($v->goods_id); ?>"><button type="button" class="layui-btn layui-btn-normal">修改</button></a>
            <button type="button" class="layui-btn layui-btn-danger del">删除</button>
        </td>
    </tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<tr>
    <td colspan="13"><?php echo e($data->appends($goods)->links('vendor.pagination.adminshop')); ?></td>
</tr><?php /**PATH /wwwroot/2001/resources/views/admin/goods/goodspage.blade.php ENDPATH**/ ?>