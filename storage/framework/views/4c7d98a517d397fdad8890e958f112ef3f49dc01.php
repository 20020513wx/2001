<?php $__env->startSection('title','商品列表'); ?>
<?php $__env->startSection('content'); ?>

<!-- class="layui-form" -->
<span class="layui-breadcrumb">
              <a href="/">首页</a>
              <a href="/demo/">商品管理</a>
              <a><cite>商品列表</cite></a>
            </span>
<center><h1>商品列表</h1></center>

<div style="padding: 15px;">
    <form class="layui-form" action="/admin/goods" style="padding-bottom: 10px;padding-left: 10px;">
        商品名称：
        <div class="layui-input-inline">
            <input type="text" name="goods_name"  class="layui-input" value="<?php echo e($goods['goods_name']??''); ?>" placeholder="请输入商品名称......">
        </div>
        <button type="submit" class="layui-btn">搜索</button>
    </form>
    <div class="layui-form">
    <table class="layui-table">

        <thead width="1000px">
            <tr>
                <th width="30px">商品ID</th>
                <th width="100px">商品名称</th>
                <th width="50px">商品价格</th>
                <th width="50px">商品数量</th>
                <th width="50px">所属分类</th>
                <th width="50px">所属品牌</th>
                <th width="50px">是否显示</th>
                <th width="50px">是否新品</th>
                <th width="50px">是否精品</th>
                <th width="50px">商品图片</th>
                <th width="300px">商品相册</th>
                <th width="300px">商品简介</th>
                <th width="200px">操作</th>
            </tr> 
        </thead>
        <tbody>
        <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr goods_id="<?php echo e($v->goods_id); ?>">
                <td><?php echo e($v->goods_id); ?></td>
                <td><?php echo e($v->goods_name); ?></td>
                <td><?php echo e($v->goods_price); ?></td>
                <td><?php echo e($v->goods_num); ?></td>
                <td><?php echo e($v->cate_name); ?></td>
                <td><?php echo e($v->brand_name); ?></td>
                <td><?php if($v->is_up == 1): ?>是<?php else: ?> 否<?php endif; ?></td>
                <td><?php if($v->is_new == 1): ?>是<?php else: ?> 否<?php endif; ?></td>
                <td><?php if($v->is_best == 1): ?>是<?php else: ?> 否<?php endif; ?></td>
                <td><?php if(!empty($v->goods_img)): ?> <img src="<?php echo e($v->goods_img); ?>" width="50px"> <?php endif; ?> </td>
                <td>
                    <?php if(!empty($v->goods_imgs)): ?>
                        <?php $__currentLoopData = $v->goods_imgs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $vv): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <img src="<?php echo e($vv); ?>" width="50px">
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                </td>
                <td><?php echo e($v->goods_desc); ?></td>
                <td>
                    <a href="/admin/goods/edit/<?php echo e($v->goods_id); ?>"><button type="button" class="layui-btn layui-btn-normal">修改</button></a>
                    <button type="button" class="layui-btn layui-btn-danger del">删除</button>
                </td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td colspan="13"><?php echo e($data->appends($goods)->links('vendor.pagination.adminshop')); ?></td>
        </tr>
        </tbody>
        
    </table>
    </div>
</div>
<script src="/jquery.js"></script>
<script>
    //删除
    $(document).on('click','.del',function(){
        var goods_id=$(this).parents('tr').attr('goods_id');
        if(window.confirm("确认删除吗？")){
            $.ajax({
                url:'/admin/goods/destroy',
                data:{goods_id:goods_id},
                type:'post',
                dataType:'json',
                success:function(result){
                    if(result['code']==00000){
                        alert(result['msg']);
                        location.href=result['url'];
                    }else{
                        alert(result['msg']);
                        location.href=result['url'];
                    }
                }
            })
        }
    });
    //无刷新分页
    $(document).on("click",".layui-laypage a",function(){
        var url=$(this).attr("href");
        $.get(url,function(res){
            $("tbody").html(res);
        });
        return false;
    })
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /wwwroot/2001/resources/views/admin/goods/index.blade.php ENDPATH**/ ?>