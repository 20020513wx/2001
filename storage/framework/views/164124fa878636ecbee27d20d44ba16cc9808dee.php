
<?php $__env->startSection('title','品牌列表'); ?>
<?php $__env->startSection('content'); ?>

<!-- class="layui-form" -->
<div style="padding: 15px;">
    <!-- <button class="delete">点击删除</button> -->
    <table class="layui-table">
        <colgroup>
        <col width="150">
        <col width="150">
        <col width="200">
        <col>
        </colgroup>
        <thead>
            <tr>
                <th>类型ID</th>
                <th>类型名称</th>
                <th>操作</th>
            </tr> 
        </thead>
        <tbody class="aaa">
        <?php $__currentLoopData = $goodstype; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($v->cat_id); ?></td>
                <td><?php echo e($v->cat_name); ?></td>
                <td>
                    <button><a href="<?php echo e(url('admin/goodstype/attribute/'.$v->cat_id)); ?>">点击浏览编辑此类型属性</a></button>
                </td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
        
    </table>
</div>
<script src="/jquery.js"></script>
<script src="/static/admin/js/jquery.min.js"></script>
<script>

</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /wwwroot/2001/resources/views/admin/goodstype/index.blade.php ENDPATH**/ ?>