<?php $__env->startSection('title','品牌列表'); ?>
<?php $__env->startSection('content'); ?>

<!-- class="layui-form" -->
<div style="padding: 15px;">
    <form>
        搜索标题<input type="text" name="brand_name" value="<?php echo e($brand_name); ?>">
        搜索地址<input type="text" name="brand_url" value="<?php echo e($brand_url); ?>">
        <input type="submit" value="搜索">
    </form>
    <button class="delete">点击删除</button>
    <table class="layui-table">
        <colgroup>
        <col width="150">
        <col width="150">
        <col width="200">
        <col>
        </colgroup>
        <thead>
            <tr>
                <th><input type="checkbox" name="allbox" class="boxs"></th>
                <th>品牌ID</th>
                <th>品牌名称</th>
                <th>品牌网址</th>
                <th>品牌logo</th>
                <th>品牌内容</th>
                <th>操作</th>
            </tr> 
        </thead>
        <tbody class="aaa">
        <?php $__currentLoopData = $brandInfo; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><input type="checkbox" name="abox" class="box"></td>
                <td brand_id="<?php echo e($v->brand_id); ?>"><?php echo e($v->brand_id); ?></td>
                <td brand_id="<?php echo e($v->brand_id); ?>">
                    <span class="brand_name"><?php echo e($v->brand_name); ?> </span>
                </td>
                <td><?php echo e($v->brand_url); ?></td>
                <td><img src="/upload/<?php echo e($v->brand_logo); ?>"></td>
                <td><?php echo e($v->brand_desc); ?></td>
                <td>
                    <button><a href="<?php echo e(url('admin/brand/edit/'.$v->brand_id)); ?>">点击去修改</a></button>
                </td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td colspan="6">
                <?php echo e($brandInfo->appends(['brand_name'=>$brand_name,'brand_url'=>$brand_url])->links('vendor.pagination.adminshop')); ?>

            </td>
        </tr>
        </tbody>
        
    </table>
</div>
<script src="/jquery.js"></script>
<script src="/static/admin/js/jquery.min.js"></script>
<script>
    $(function(){
        //品牌名称即点即改
        $(document).on("click",".brand_name",function(){
            var _this=$(this)
            
            var vals=_this.text();
            _this.parent().html('<input type="text" class="bname" value='+vals+'>');
            $(".bname").val('').focus().val(vals)
        });
        //品牌名称即点即改
        $(document).on("blur",".bname",function(){
            var _this=$(this)
                var val=$(".bname").val();
                if(val==""){
                    alert("修改的内容不能为空")
                    return false;
                }
                var brand_id=_this.parent().attr("brand_id")
                $.ajax({
                    url:"<?php echo e(url('admin/brand/update2')); ?>",
                    data:{brand_id:brand_id,val:val},
                    type:"post",
                    success:function(res){
                        // console.log(res)
                        if(res=="ok"){
                            _this.parent().html('<span class="brand_name">'+val+'</span>');
                        }else if(res=="err"){
                            alert("品牌名称已存在");
                        }else{
                            alert("修改失败");
                        }
                    }
                })
            })
        //点击删除
            $(document).on("click",".delete",function(){
                var box=$(".box:checked");
                var brand_id="";
                box.each(function(index){
                    brand_id+=$(this).parent().next().attr("brand_id")+',';
                })
                brand_id=brand_id.substr(0,brand_id.length-1);
                if(brand_id==""){
                    alert("未选中品牌进行删除")
                    return false;
                }
                location.href="/admin/brand/delete/"+brand_id;
                
            })
        //无刷新分页
        $(document).on("click",".layui-laypage a",function(){
            var url=$(this).attr("href");
            $.get(url,function(res){
                $("tbody").html(res);
            });
            return false;
        })
        //全选
        $(document).on("click",".boxs",function(){
            var _this=$(this)
            var checked=$(".boxs").prop("checked")
            if(checked==true){
                _this.parent().parent().parent().next().children().children().children().prop("checked",true);
            }else{
                _this.parent().parent().parent().next().children().children().children().prop("checked",false);
            }
            
        })

    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /wwwroot/2001/resources/views/admin/brand/index.blade.php ENDPATH**/ ?>