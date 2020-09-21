
<?php $__env->startSection('title','类型添加'); ?>
<?php $__env->startSection('content'); ?>


    <div style="padding: 15px;">
      <form class="layui-form" action="<?php echo e(url('admin/goodstype/store')); ?>" method="post" enctype="multipart/form-data">
      <?php echo csrf_field(); ?>
      <div class="layui-form-item">
        <label class="layui-form-label">类型名称</label>
        <div class="layui-input-block">
          <input type="text" name="cat_name" lay-verify="title" autocomplete="off" placeholder="请输入类型名称" class="layui-input">
          <!-- <font color="red"><?php echo e($errors->first("admin_tel")); ?></font> -->
        </div>
      </div>
      <input type="submit" value="点击添加">
    </form>
  </div>
    </div>
  </div>
  




<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /wwwroot/2001/resources/views/admin/goodstype/create.blade.php ENDPATH**/ ?>