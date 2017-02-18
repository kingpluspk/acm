<?php
    // 选择排序：在一组数中找出最小的那个数与第一个数交换位置，在剩下的数种再找出最小的与第二个位置的数交换
    // 从小到大排序
    function select_sort($arr){
        $len = count($arr);
        // 双重循环，外层控制轮数，内层控制比较次数 
        for($i = 0; $i < $len - 1; $i++){
            // 假设最小的值的位置 
            $least = $i;
            for($j = $i + 1; $j < $len; $j++){
                // 比较，发现更小的,记录下最小值的位置；并且在下次比较时采用已知的最小值进行比较
                if($arr[$least] > $arr[$j]){
                    $least = $j;
                }
            }
            // 已经确定了当前的最小值的位置，值为$least。如果发现最小值的位置与当前假设的位置$i不同，则位置互换即可 
            if($least != $i){
                list($arr[$least], $arr[$i]) = array($arr[$i], $arr[$least]);
            }
        }
        return $arr;
    }

    $arr = [8, 6, 6, 7, 5, 9];
    $arr = select_sort($arr);

    var_dump($arr);


