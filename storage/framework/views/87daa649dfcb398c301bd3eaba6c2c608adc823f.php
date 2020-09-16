<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <title>layout 后台大布局 - Layui</title>
  <link rel="stylesheet" href="/static/admin/css/layui.css">
</head>
<body class="layui-layout-body">
<div class="layui-layout layui-layout-admin">
  <div class="layui-header">
    <div class="layui-logo">layui 后台布局</div>
    <!-- 头部区域（可配合layui已有的水平导航） -->
    <ul class="layui-nav layui-layout-left">
      <li class="layui-nav-item"><a href="">控制台</a></li>
      <li class="layui-nav-item"><a href="">商品管理</a></li>
      <li class="layui-nav-item"><a href="">用户</a></li>
      <li class="layui-nav-item">
        <a href="javascript:;">其它系统</a>
        <dl class="layui-nav-child">
          <dd><a href="">邮件管理</a></dd>
          <dd><a href="">消息管理</a></dd>
          <dd><a href="">授权管理</a></dd>
        </dl>
      </li>
    </ul>
    <ul class="layui-nav layui-layout-right">
      <li class="layui-nav-item">
        <a href="javascript:;">
          <img src="http://t.cn/RCzsdCq" class="layui-nav-img">
          贤心
        </a>
        <dl class="layui-nav-child">
          <dd><a href="">基本资料</a></dd>
          <dd><a href="">安全设置</a></dd>
        </dl>
      </li>
      <li class="layui-nav-item"><a href="<?php echo e(url('admin/quit')); ?>">退了</a></li>
    </ul>
  </div>
  
  <div class="layui-side layui-bg-black">
    <div class="layui-side-scroll">
      <!-- 左侧导航区域（可配合layui已有的垂直导航） -->
      <ul class="layui-nav layui-nav-tree"  lay-filter="test">
        <li class="layui-nav-item">
          <a href="javascript:;">商品</a>
          <dl class="layui-nav-child">
            <dd><a href="<?php echo e(url('/')); ?>">商品列表</a></dd>
            <dd><a href="<?php echo e(url('admin/goods/create')); ?>">商品添加</a></dd>
          </dl>
        </li>
        <li class="layui-nav-item">
          <a href="javascript:;">品牌</a>
          <dl class="layui-nav-child">
            <dd><a href="<?php echo e(url('admin/brand/index')); ?>">品牌列表</a></dd>
            <dd><a href="<?php echo e(url('admin/brand/create')); ?>">品牌添加</a></dd>
          </dl>
        </li>
        <li class="layui-nav-item">
          <a href="javascript:;">分类</a>
          <dl class="layui-nav-child">
            <dd><a href="<?php echo e(url('admin/category/index')); ?>">分类列表</a></dd>
            <dd><a href="<?php echo e(url('admin/category/create')); ?>">分类添加</a></dd>
          </dl>
        </li>
        <li class="layui-nav-item">
          <a href="javascript:;">管理员管理</a>
          <dl class="layui-nav-child">
            <dd><a href="<?php echo e(url('admin/admin/index')); ?>">管理员列表</a></dd>
            <dd><a href="<?php echo e(url('admin/admin/create')); ?>">管理员添加</a></dd>
          </dl>
        </li>
        <li class="layui-nav-item">
          <a href="javascript:;">角色管理</a>
          <dl class="layui-nav-child">
            <dd><a href="<?php echo e(url('admin/role/index')); ?>">角色列表</a></dd>
            <dd><a href="<?php echo e(url('admin/role/create')); ?>">角色添加</a></dd>
          </dl>
        </li>
        <li class="layui-nav-item">
          <a href="javascript:;">菜单</a>
          <dl class="layui-nav-child">
            <dd><a href="<?php echo e(url('admin/menu/index')); ?>">权限列表</a></dd>
            <dd><a href="<?php echo e(url('admin/menu/create')); ?>">权限添加</a></dd>
          </dl>
        </li>
      </ul>
    </div>
  </div>
  
  <div class="layui-body">
    <!-- 内容主体区域 -->
    <div style="padding: 15px;"><?php echo $__env->yieldContent('content'); ?></div>
  </div>
  
  <div class="layui-footer">
    <!-- 底部固定区域 -->
    © layui.com - 底部固定区域
  </div>
</div>
<script src="/static/admin/layui.js"></script>
<script>
  //JavaScript代码区域
  layui.use(['element','form','upload'], function(){
    var element = layui.element,
            form = layui.form,
            upload = layui.upload;
    var $ = layui.jquery
            ,upload = layui.upload;

      //拖拽上传
      upload.render({
        elem: '#goods_test10'
        ,url: '/admin/goods/uploads' //改成您自己的上传接口
        ,done: function(res){
          layer.msg(res.msg);
          layui.$('#uploadDemoView').removeClass('layui-hide').find('img').attr('src',res.store_result);
//                console.log(res)
          layui.$('input[name="goods_img"]').val(res.store_result);
        }
      });

    //多图片上传
    upload.render({
      elem: '#goods_test2'
      ,url: '/admin/goods/uploads' //改成您自己的上传接口
      ,multiple: true
      ,before: function(obj){
        //预读本地文件示例，不支持ie8
        obj.preview(function(index, file, result){
//          $('#demo2').append('<img src="'+ result +'" alt="'+ file.name +'" class="layui-upload-img" height="100px" width="100px" >');
//          layui.$('input[name="file"]').val(result);
        });
      }
      ,done: function(res){
        layer.msg(res.msg);
        //上传完毕
//        console.log(res["store_result"]);
//        return;
        $('#demo2').append('<img src="'+ res["store_result"] +'" class="layui-upload-img" height="150px" width="150px" >');
        $("#demo2").append('<input type="hidden" name="goods_imgs[]" value="'+res["store_result"]+'">');
      }
    });

  });
</script>
</body>
</html><?php /**PATH /wwwroot/2001/resources/views/admin/layout.blade.php ENDPATH**/ ?>