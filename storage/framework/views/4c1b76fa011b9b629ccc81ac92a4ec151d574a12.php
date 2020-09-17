<?php $__env->startSection('title','分类添加'); ?>
<?php $__env->startSection('content'); ?>

    <div style="padding: 15px;">
      <form class="layui-form" action="<?php echo e(url('admin/category/store')); ?>" method="post" enctype="multipart/form-data">
      <?php echo csrf_field(); ?>
        <div class="layui-form-item">
          <label class="layui-form-label">分类名称</label>
          <div class="layui-input-block">
            <input type="text" name="cate_name" lay-verify="title" autocomplete="off" placeholder="请输入分类名称" class="layui-input">
            <font color="red"></font>
          </div>
        </div>
        <div class="layui-form-item">
          <label class="layui-form-label">单行选择框</label>
          <div class="layui-input-block">
            <select name="parent_id" lay-filter="aihao">
              <option value="0">顶级分类</option>
              <?php $__currentLoopData = $cate; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=>$v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <option value="<?php echo e($v->cate_id); ?>"><?php echo e(str_repeat('--',$v->level*3)); ?><?php echo e($v->cate_name); ?></option>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
          </div>
        </div>
        <div class="layui-form-item">
          <label class="layui-form-label">分类描述</label>
          <div class="layui-input-block">
            <textarea name="cate_desc" id="" cols="30" rows="90" class="layui-input">
            </textarea>
            <font color="red"></font>
          </div>
        </div>
        <div class="layui-form-item">
          <label class="layui-form-label">分类是否显示</label>
          <div class="layui-input-block">
            <input type="radio" name="is_show" value="1" title="是" checked="">
            <input type="radio" name="is_show" value="2" title="否">
          </div>
        </div>
        <div class="layui-form-item">
          <label class="layui-form-label">分类是否在导航显示</label>
          <div class="layui-input-block">
            <input type="radio" name="is_show_nav" value="1" title="是" checked="">
            <input type="radio" name="is_show_nav" value="2" title="否">
          </div>
        </div>

      <input type="submit" class="layui-btn layui-btn-normal"  value="点击添加">
      </form>
  </div>
    </div>
  </div>





<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /wwwroot/2001/resources/views/admin/category/create.blade.php ENDPATH**/ ?>