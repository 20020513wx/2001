
<?php $__env->startSection('title','品牌列表'); ?>
<?php $__env->startSection('content'); ?>
<center>
    <h1>类型的属性列表</h1>
</center>
<!-- class="layui-form" -->
<div style="padding: 15px;">
<form action="<?php echo e(url('admin/goodstype/attributeDo/'.$cat_id)); ?>">
    <input type="submit" value="添加属性">
</form>
    <table class="layui-table">
        <colgroup>
        <col width="150">
        <col width="150">
        <col width="200">
        <col>
        </colgroup>
        <thead>
            <tr>
                <th>属性ID</th>
                <th>属性名称</th>
                <th>操作</th>
            </tr> 
        </thead>
        <tbody class="aaa">
        <?php $__currentLoopData = $attribute; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($v->attr_id); ?></td>
                <td><?php echo e($v->attr_name); ?></td>
                <td>
                    
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
<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /wwwroot/2001/resources/views/admin/goodstype/attribute.blade.php ENDPATH**/ ?>