<?php
   /**
   /* 快速排序（升序）
   /* 通过一趟排序将要排序的数据分割成独立的两部分，其中一部分的所有数据都比另外一部分的所有数据都要小，
   * 然后再按此方法对这两部分数据分别进行快速排序，整个排序过程可以递归进行，以此达到整个数据变成有序序列。 
   */
   function quick_sort($arr){
        if(count($arr) <= 1) // 递归结束的条件
            return $arr;
        $pivot = $arr[0];
        $leftArr  = array();
        $rightArr = array();
        for($i = 1; $i < count($arr); $i++){
            if($arr[$i] <= $pivot){
                $leftArr[] = $arr[$i];
            } else{
                $rightArr[] = $arr[$i];
            }
        }

        $leftArr  = quick_sort($leftArr);
        $rightArr = quick_sort($rightArr);

        return array_merge($leftArr, array($pivot), $rightArr);

    }
    $arr = [8, 7, 5, 6, 8];
    $arr = quick_sort($arr);
    print_r($arr);


