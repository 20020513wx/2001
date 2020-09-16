<?php $__env->startSection('title','商品添加'); ?>
<?php $__env->startSection('content'); ?>
    <div style="padding: 15px;">
      <span class="layui-breadcrumb">
              <a href="/">首页</a>
              <a href="/demo/">商品管理</a>
              <a><cite>商品编辑</cite></a>
            </span>
        <center><h1>商品编辑</h1></center>
        <?php if($errors->any()): ?>
            <div class="alert alert-danger" style="padding-bottom: 20px; padding-left: 30px; background-color: pink">
                <ul>
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li style="color:#ff0000; padding-top: 10px;"><?php echo e($error); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        <?php endif; ?>
        <form class="layui-form" action="/admin/goods/update/<?php echo e($data->goods_id); ?>" method="post" enctype="multipart/form-data" style="padding-top: 15px;">
            <?php echo csrf_field(); ?>
            <input type="hidden" name="goods_id" value="<?php echo e($data->goods_id); ?>">
            <div class="layui-form-item">
                <label class="layui-form-label">商品名称：</label>
                <div class="layui-input-block">
                    <input type="text" name="goods_name" lay-verify="title" autocomplete="off" placeholder="请输入商品名称" value="<?php echo e($data->goods_name); ?>" class="layui-input">
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">商品价格：</label>
                <div class="layui-input-block">
                    <input type="text" name="goods_price" lay-verify="title" autocomplete="off" placeholder="请输入商品价格" value="<?php echo e($data->goods_price); ?>" class="layui-input">
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">商品数量：</label>
                <div class="layui-input-block">
                    <input type="text" name="goods_num" value="<?php echo e($data->goods_num); ?>" lay-verify="title" autocomplete="off" placeholder="请输入商品数量" class="layui-input">
                </div>
            </div>

            <div class="layui-form-item">
                <div class="layui-inline">
                    <label class="layui-form-label">所属分类：</label>
                    <div class="layui-input-inline">
                        <select name="cate_id">
                            <option value="">请选择</option>
                            <?php $__currentLoopData = $cate_info; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($v->cate_id); ?>" <?php if($v->cate_id == $data->cate_id): ?> selected <?php endif; ?>><?php echo e(str_repeat('—',$v->level*3)); ?><?php echo e($v->cate_name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                </div>
                <div class="layui-inline">
                    <label class="layui-form-label">所属品牌：</label>
                    <div class="layui-input-inline">
                        <select name="brand_id">
                            <option value="">请选择</option>
                            <?php $__currentLoopData = $brand_data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($v->brand_id); ?>"<?php if($v->brand_id == $data->brand_id): ?> selected <?php endif; ?>><?php echo e($v->brand_name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">是否显示：</label>
                <div class="layui-input-block">
                    <input type="radio" name="is_up" value="1" title="是" <?php if($data->is_up == 1): ?> checked <?php endif; ?>>
                    <input type="radio" name="is_up" value="2" title="否" <?php if($data->is_up == 2): ?> checked <?php endif; ?>>
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">是否新品：</label>
                <div class="layui-input-block">
                    <input type="radio" name="is_new" value="1" title="是" <?php if($data->is_new == 1): ?> checked <?php endif; ?>>
                    <input type="radio" name="is_new" value="2" title="否" <?php if($data->is_new == 2): ?> checked <?php endif; ?>>
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">是否精品：</label>
                <div class="layui-input-block">
                    <input type="radio" name="is_best" value="1" title="是" <?php if($data->is_best == 1): ?> checked <?php endif; ?>>
                    <input type="radio" name="is_best" value="2" title="否" <?php if($data->is_best == 2): ?> checked <?php endif; ?>>
                </div>
            </div>
            <div class="layui-form-item layui-form-text">
                <label class="layui-form-label">商品简介：</label>
                <div class="layui-input-block">
                    <textarea placeholder="请输入内容" class="layui-textarea" name="goods_desc"><?php echo e($data->goods_desc); ?></textarea>
                </div>
            </div>

            <div class="layui-form-item">
                <label class="layui-form-label">商品图片：</label>
                <div class="layui-upload-drag" id="goods_test10">
                    <i class="layui-icon"></i>
                    <p>点击上传，或将文件拖拽到此处</p>
                    <div <?php if(!$data->goods_img): ?>class="layui-hide"<?php endif; ?> id="uploadDemoView">
                        <hr>
                        <img src="<?php echo e($data->goods_img); ?>" alt="上传成功后渲染" style="max-width: 196px">
                        <input type="hidden" name="goods_img" value="<?php echo e($data->goods_img); ?>">
                    </div>
                </div>
            </div>

            <div class="layui-upload">
                <button type="button" class="layui-btn" id="goods_test2">点击上传相册</button>
                <blockquote class="layui-elem-quote layui-quote-nm" style="margin-top: 10px;">
                    <div class="layui-upload-list" id="demo2">相册展示：<?php if(!empty($data->goods_imgs)): ?> <?php $goods_imgs = explode("|",$data->goods_imgs) ?> <?php $__currentLoopData = $goods_imgs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $vv): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><img src="<?php echo e($vv); ?>" class="layui-upload-img" height="150px" width="150px" > <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> <input type="hidden" name="goods_imgs" value="<?php echo e($data->goods_imgs); ?>"></br> <?php endif; ?>
                        <div style="padding-top: 10px;">上传相册：</div>
                    </div>
                </blockquote>
            </div>

            <button type="submit" class="layui-btn" lay-submit="" lay-filter="demo1">编辑</button>
            <button type="reset" class="layui-btn layui-btn-primary">重置</button>
        </form>
    </div>
    </div>
    </div>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /wwwroot/2001/resources/views/admin/goods/edit.blade.php ENDPATH**/ ?>