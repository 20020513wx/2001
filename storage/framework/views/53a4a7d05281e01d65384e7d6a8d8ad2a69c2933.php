
<?php $__env->startSection('title','主页'); ?>
<?php $__env->startSection('content'); ?>


    <div style="padding: 15px;">
      <form class="layui-form" action="<?php echo e(url('admin/role/update/'.$res->role_id)); ?>" method="post" enctype="multipart/form-data">
      <?php echo csrf_field(); ?>
      <div class="layui-form-item">
        <label class="layui-form-label">角色名称</label>
        <div class="layui-input-block">
          <input type="text" name="role_name" value="<?php echo e($res->role_name); ?>" lay-verify="title" autocomplete="off" placeholder="请输入角色名称" class="layui-input">
          <!-- <font color="red"><?php echo e($errors->first("role_name")); ?></font> -->
        </div>
      </div>
      
      <div class="layui-form-item">
        <label class="layui-form-label">角色内容</label>
        <div class="layui-input-block">
          <input type="text" name="role_desc"  value="<?php echo e($res->role_desc); ?>" lay-verify="title" autocomplete="off" placeholder="请输入角色内容" class="layui-input">
        </div>
      </div>
      <input type="submit" value="点击修改">
    </form>
  </div>
    </div>
  </div>
  




<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /wwwroot/2001/resources/views/admin/role/edit.blade.php ENDPATH**/ ?>