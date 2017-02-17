<?php
    // 归并排序，升序
    function merge_sort($arr){
        $len = count($arr);
        if($len <= 1)
            return $arr; // 递归结束条件,到达这步的时候,数组就只剩下一个元素，即完成数组的拆分
        
        $mid = floor($len/2);
        $leftArr  = array_slice($arr, 0, $mid); // 拆分数组，不包括$mid
        $rightArr = array_slice($arr, $mid);

        $leftArr  = merge_sort($leftArr); // 左边拆分完后开始递归合并往上走
        $rightArr = merge_sort($rightArr);

        $arr = merge($leftArr, $rightArr);
        return $arr;
    }

    function merge($leftArr, $rightArr){
        $tmpArr = array();

        while(count($leftArr) && count($rightArr)){
            $tmpArr[] = $leftArr[0] < $rightArr[0] ? array_shift($leftArr) : array_shift($rightArr);
        }
        return array_merge($tmpArr, $leftArr, $rightArr);
    }


    $arr = array(8, 6, 5, 7, 8, 8);
    $resultArr = merge_sort($arr);
    print_r($resultArr);


