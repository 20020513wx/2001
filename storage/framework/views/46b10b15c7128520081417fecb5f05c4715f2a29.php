
<?php $__env->startSection('title','主页'); ?>
<?php $__env->startSection('content'); ?>


    <div style="padding: 15px;">
      <form class="layui-form" action="<?php echo e(url('admin/menu/store')); ?>" method="post" enctype="multipart/form-data">
      <?php echo csrf_field(); ?>
      <div class="layui-form-item">
        <label class="layui-form-label">权限名称</label>
        <div class="layui-input-block">
          <input type="text" name="menu_name" lay-verify="title" autocomplete="off" placeholder="请输入权限名称" class="layui-input">
          <font color="red"></font>
        </div>
      </div>
      <div class="layui-form-item">
        <label class="layui-form-label">权限路由</label>
        <div class="layui-input-block">
          <input type="text" name="url" lay-verify="title" autocomplete="off" placeholder="请输入权限路由" class="layui-input">
        </div>
      </div>
      <div class="layui-form-item">
        <label class="layui-form-label">路由别名</label>
        <div class="layui-input-block">
          <input type="text" name="urls" lay-verify="title" autocomplete="off" placeholder="请输入路由别名" class="layui-input">
        </div>
      </div>
      <input type="submit" value="点击添加">
    </form>
  </div>
    </div>
  </div>
  




<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /wwwroot/2001/resources/views/admin/menu/create.blade.php ENDPATH**/ ?>