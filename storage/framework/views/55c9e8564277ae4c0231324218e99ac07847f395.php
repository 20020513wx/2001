
<?php $__env->startSection('title','主页'); ?>
<?php $__env->startSection('content'); ?>


    <div style="padding: 15px;">
      <form class="layui-form" action="<?php echo e(url('admin/role/store')); ?>" method="post" enctype="multipart/form-data">
      <?php echo csrf_field(); ?>
      <div class="layui-form-item">
        <label class="layui-form-label">角色名称</label>
        <div class="layui-input-block">
          <input type="text" name="role_name" lay-verify="title" autocomplete="off" placeholder="请输入角色名称" class="layui-input">
          <font color="red"></font>
        </div>
      </div>
      <div class="layui-form-item">
        <label class="layui-form-label">角色内容</label>
        <div class="layui-input-block">
          <input type="text" name="role_desc" lay-verify="title" autocomplete="off" placeholder="请输入角色内容" class="layui-input">
        </div>
      </div>
      <div class="layui-form-item">
          <label class="layui-form-label">添加权限</label>
          <div class="layui-input-block">
            <select name="parent_id" lay-filter="aihao">
              <option value="0">顶级权限</option>
              <?php $__currentLoopData = $menu; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=>$v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <option value="<?php echo e($v->menu_id); ?>"><?php echo e(str_repeat('|--',$v->level)); ?><?php echo e($v->menu_name); ?></option>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
          </div>
        </div>
      <input type="submit" value="点击添加">
    </form>
  </div>
    </div>
  </div>
  




<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /wwwroot/2001/resources/views/admin/role/create.blade.php ENDPATH**/ ?>