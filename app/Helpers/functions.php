<?php
    //无限极分类
    function getCateInfo($cate,$p_id=0,$level=0){
        // dd($cate);
        //判断接受的分类信息是否为空
        if(!$cate){
            //如为空则停止执行
            return;
        }
        // 3.定义个静态的空数组
        static $cateArray=[];
        //1.循环分类信息
        foreach($cate as $v){
            // dump($v);
            //2.判断循环后的分类信息是否等于定义的pid
            if($v->p_id==$p_id){
                // dump($v);
                //自定义个level存进$v中
                $v->level = $level;
                //4.将循环后的信息存进数组中
                $cateArray[] = $v;
                //再次调用方法的自己本身
                getCateInfo($cate,$v->cate_id,$level+1);
            }
        }
        // print_r($cateArray);exit;
        //将数组中的信息返回
        return $cateArray;
    }
    // function getCateInfo($cate){

    // }



?>
