
<?php $__env->startSection('title','主页'); ?>
<?php $__env->startSection('content'); ?>


    <div style="padding: 15px;">
      <form class="layui-form" action="<?php echo e(url('admin/brand/store')); ?>" method="post" enctype="multipart/form-data">
      <?php echo csrf_field(); ?>
      <div class="layui-form-item">
        <label class="layui-form-label">品牌名称</label>
        <div class="layui-input-block">
          <input type="text" name="brand_name" lay-verify="title" autocomplete="off" placeholder="请输入品牌名称" class="layui-input">
          <font color="red"><?php echo e($errors->first("admin_tel")); ?></font>
        </div>
      </div>
      <div class="layui-form-item">
        <label class="layui-form-label">品牌网址</label>
        <div class="layui-input-block">
          <input type="text" name="brand_url" lay-verify="title" autocomplete="off" placeholder="请输入品牌网址" class="layui-input">
          <font color="red"><?php echo e($errors->first("brand_url")); ?></font>
        </div>
      </div>
      <div class="layui-form-item">
        <label class="layui-form-label">品牌logo</label>
        <div class="layui-input-block">
          <input type="file" name="brand_logo" lay-verify="title" autocomplete="off" class="layui-input">
        </div>
      </div>
      
      <div class="layui-form-item">
        <label class="layui-form-label">品牌内容</label>
        <div class="layui-input-block">
          <input type="text" name="brand_desc" lay-verify="title" autocomplete="off" placeholder="请输入品牌内容" class="layui-input">
        </div>
      </div>
      <input type="submit" value="点击添加">
    </form>
  </div>
    </div>
  </div>
  




<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /wwwroot/2001/resources/views/admin/brand/create.blade.php ENDPATH**/ ?>