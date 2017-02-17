<?php
    /**
    * 冒泡排序
    * 重复地走访过要排序的数列，一次比较两个元素，如果他们的顺序错误就把他们交换过来，
    * 访数列的工作是重复地进行直到没有再需要交换，也就是说该数列已经排序完成。
    * 升序
    */
    function bubble_sort($arr){
        $count = count($arr);
        if($count <= 0)
            return false;

        for($i = 0; $i <= $count - 1; $i++){
            for($j = $count - 2; $j >= $i; $j--){
                if($arr[$j+1] < $arr[$j]){
                    list($arr[$j+1], $arr[$j]) = array($arr[$j], $arr[$j+1]);
                }
            }
        }

        return $arr;
    }

    $arr = [8, 7, 5, 6, 8];
    $arr = bubble_sort($arr);
    print_r($arr);


