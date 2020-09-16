<?php $__env->startSection('title','分类列表'); ?>
<?php $__env->startSection('content'); ?>

<!-- class="layui-form" -->
<div style="padding: 15px;">
    <table class="layui-table">
        <colgroup>
        <col width="150">
        <col width="150">
        <col width="200">
        <col>
        </colgroup>
        <thead>
            <tr>
                <th>分类ID</th>
                <th>分类名称</th>
                <th>分类是否显示</th>
                <th>分类是否在导航显示</th>
                <th>操作</th>
            </tr> 
        </thead>
        <tbody>
        <?php $__currentLoopData = $res; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr style="display: none" cate_id="<?php echo e($v->cate_id); ?>" parent_id="<?php echo e($v->parent_id); ?>">
                <td><?php echo e($v->cate_id); ?></td>
                <td>
                    <a href="javascript:;" class="showHide">+</a>
                    <?php echo e(@str_repeat($v->level*2)); ?>

                    <?php echo e($v->cate_name); ?>

                </td>
                <td><?php echo e($v->is_show==1?"是":"否"); ?></td>
                <td><?php echo e($v->is_show_nav==1?"是":"否"); ?></td>
                <td>
                    
                    
                    <button class="layui-btn layui-btn-danger" id="del" cate_id="<?php echo e($v->cate_id); ?>">删除</button>
                </td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
        
    </table>
</div>
<script src="/jquery.js"></script>
<script>
    //删除
    $(document).on('click','#del',function(){
            var cate_id=$(this).attr('cate_id');
//            alert(cate_id);
        if(window.confirm('是否删除')){
            $.get('/admin/category/delete/'+cate_id,function(res){
                alert(res.msage);
            })
        }
    })
    //顶级
    $(document).ready(function(){
        $("tr[parent_id='0']").show();
    })

    //子级
    $(document).on("click",'.showHide',function(){
//        alert(21212);
        var _this=$(this);
        var _sign=_this.text();
//        alert(_sign);
        var cate_id=_this.parents("tr").attr("cate_id");
//        alert(cate_id);
//        if(_sign=="+"){
//            var child=$("tr[parent_id='"+cate_id+"']");
////            console.log(child);
//                alert(child);
//            if(child.length>0){
//                child.show();
//                _this.text("-");
//            }else if(child.length<0){
//                $("tr[parent_id='"+cate_id+"']").hide();
//                _this.text("+");
//            }
//        }
        if(_sign=="+"){
            var child=$("tr[parent_id='"+cate_id+"']");
            if(child.length>0){
                child.show();
                _this.text("-");
            }
        }else{
            $("tr[parent_id='"+cate_id+"']").hide();
            _this.text("+");
        }
    })
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /wwwroot/2001/resources/views/admin/category/index.blade.php ENDPATH**/ ?>