<?php
////处理分类数据
////function getCateInfo($cateInfo,$pid=0,$level=1){
////    //先默认pid的值 从0开始
////    //静态变量 会循环吧每一次的结果进行保存
////    static $info=[];
////    foreach($cateInfo as $k=>$v){
////        if($v['pid']==$pid){
////            $v['level']=$level;  //获取到定义分类
////            $info[]=$v;
////            $info=getCateInfo($cateInfo,$v['cate_id'],$v['level']+1);
////        }
////    }
////    return $info;
////}
////public function getCateInfo($cate,$parent_id=0){
////    static $info=[];
////    foreach($cate as $k=>$v){
////        if($v['parent_id']==$parent_id){
////            $info[]=$v;
////            $info=$this->getCateInfo($cate,$v['cate_id']);
////        }
////    }
////    return $info;
//}
?>

