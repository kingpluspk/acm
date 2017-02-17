<?php
    // 插入排序：假设前面的数已经是排好顺序的，现在要把第n个数插到前面的有序数中，使得这n个数也是排好顺序的
    // 从小到大排序
    function insert_sort($arr){
        $len = count($arr);
        for($i = 1; $i < $len; $i++){
            $tmp = $arr[$i];
            for($j = $i - 1; $j >= 0; $j--){
                // 发现插入的元素要小，交换位置，将后边的元素与前面的元素互换
                if($tmp < $arr[$j]){
                    list($arr[$j + 1], $arr[$j]) = array($arr[$j], $tmp);
                } else{ // 如果碰到不需要移动的元素，由于是已经排序好是数组，则前面的也不需要再次比较
                    break;
                }
            }
        }
        return $arr;
    }
    
    $arr = [8, 6, 6, 7, 5, 9];
    $arr = insertSort($arr);

    var_dump($arr);



