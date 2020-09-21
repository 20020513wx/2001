<?php $__env->startSection('title','管理员添加'); ?>
<?php $__env->startSection('content'); ?>

  <center><h1 style="color:red;">修改展示</h1></center>
    <div style="padding: 15px;">
       <?php if($errors->any()): ?>
        <div class="alert alert-danger" style="padding-bottom: 20px;padding-left: 20px">
        <ul>
        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <li style="margin-top: 10px;color: #ff0000;"><?php echo e($error); ?></li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
        </div>
      <?php endif; ?>
      <form class="layui-form" action="<?php echo e(url('admin/admin/update/'.$admin->admin_id)); ?>" method="post" enctype="multipart/form-data">
      <?php echo csrf_field(); ?>
      <div class="layui-form-item">
        <label class="layui-form-label">管理员名称:</label>
        <div class="layui-input-block">
          <input type="text" name="admin_name" value="<?php echo e($admin->admin_name); ?>" lay-verify="title" autocomplete="off" placeholder="请输入管理员名称" class="layui-input">
          <font color="red"></font>
        </div>
      </div>
      <div class="layui-form-item">
        <label class="layui-form-label">管理员电话:</label>
        <div class="layui-input-block">
          <input type="text" name="admin_tel" value="<?php echo e($admin->admin_tel); ?>" lay-verify="title" autocomplete="off" placeholder="请输入管理员电话" class="layui-input">
          <font color="red"></font>
        </div>
      </div>
      <div class="layui-form-item">
        <label class="layui-form-label">管理员邮箱:</label>
        <div class="layui-input-block">
          <input type="text" name="admin_email" value="<?php echo e($admin->admin_email); ?>" lay-verify="title" autocomplete="off" placeholder="请输入管理员邮箱" class="layui-input">
          <font color="red"></font>
        </div>
      </div>
      <div class="layui-form-item">
        <label class="layui-form-label">管理员密码:</label>
        <div class="layui-input-block">
          <input type="password" name="admin_pwd" lay-verify="title" autocomplete="off" placeholder="请输入管理员密码" class="layui-input">
          <font color="red"></font>
        </div>
      </div>
      <input type="submit" value="点击修改">
    </form>
  </div>
    </div>
  </div>
  




<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /wwwroot/2001/resources/views/admin/admin/edit.blade.php ENDPATH**/ ?>