<?php
    // 二分查找，前提是数组已经是有序的
    function binary_search($arr, $value){
        $low  = 0;
        $high = count($arr) - 1;
        while($low <= $high){
            $mid = floor(($low + $high)/2);
            if($arr[$mid] == $value){
                return $mid; // 注意数组下标从0开始
            } elseif($arr[$mid] > $value){
                $high = $mid - 1;
            } else{
                $low = $mid + 1;
            }
        }

        return -1;
    }

    $arr = [5, 6, 7, 8, 9];
    $index = binary_search($arr, 8);
    echo $index . "\n";


