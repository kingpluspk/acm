<?php
    /**
    * 求数组A-数组B的差集
    * 因为数组是由哈希表实现的，不需要遍历由键经过哈希可得值，查找很快，
    * 而值只是由键组织存放，本身没有索引，每次查找都是遍历；
    * 在遍历和对比数组的值上，如果将键与值反转的进行遍历对比键与值，通常比值与值的比较效率要高的多。
    */
    function custom_array_diff($arr1, $arr2){
        foreach($arr1 as $k => $v){
            if(in_array($v, $arr2, true)){ // 如果 search 参数是字符串，且 type 参数设置为 true，则搜索区分大小写
                unset($arr1[$k]);
            }
        }

        return $arr1;
    }
    function custom_array_diff_nice($arr1, $arr2){
        $arr2 = array_flip($arr2); // 反转/交换数组中所有的键名以及它们关联的键值
        foreach($arr1 as $k => $v){
            if(isset($arr2[$v])){
                unset($arr1[$k]);
            }
        }

        return $arr1;
    }

    $arr1 = array(1, 2, 3, 4, 5);
    $arr2 = array(9, 8, 7, 4, 5);
    $arr  = custom_array_diff_nice($arr1, $arr2);
    print_r($arr);


