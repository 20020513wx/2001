
<?php $__env->startSection('title','主页'); ?>
<?php $__env->startSection('content'); ?>


    <div style="padding: 15px;">
      <form class="layui-form" action="<?php echo e(url('admin/menu/update/'.$res->menu_id)); ?>" method="post" enctype="multipart/form-data">
      <?php echo csrf_field(); ?>
      <div class="layui-form-item">
        <label class="layui-form-label">权限名称</label>
        <div class="layui-input-block">
          <input type="text" name="menu_name" value="<?php echo e($res->menu_name); ?>" lay-verify="title" autocomplete="off" placeholder="请输入角色名称" class="layui-input">
          <!-- <font color="red"><?php echo e($errors->first("menu_name")); ?></font> -->
        </div>
      </div>
      
      <div class="layui-form-item">
        <label class="layui-form-label">权限路由</label>
        <div class="layui-input-block">
          <input type="text" name="url"   value="<?php echo e($res->url); ?>" lay-verify="title" autocomplete="off" placeholder="请输入权限路由" class="layui-input">
        </div>
      </div>
      <div class="layui-form-item">
        <label class="layui-form-label">路由别名</label>
        <div class="layui-input-block">
          <input type="text" name="urls"  value="<?php echo e($res->urls); ?>" lay-verify="title" autocomplete="off" placeholder="请输入路由别名" class="layui-input">
        </div>
      </div>
      <input type="submit" value="点击修改">
    </form>
  </div>
    </div>
  </div>
  




<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /wwwroot/2001/resources/views/admin/menu/edit.blade.php ENDPATH**/ ?>