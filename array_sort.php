<?php
    /**
    * 实现一个二维数组排序算法函数，能够具有通用性，可以调用php内置函数
    * @param $arr array 待排序的二维数组
    * @param $key int 排序的键值
    * @param $order int 排序的规则 1是升序，0是降序
    */
    function array_sort($arr, $key, $order = 0){
        if(!is_array($arr))
            return false;
        $keys_value_arr = array();

        foreach($arr as $k => $v){
            $keys_value_arr[$k] = $v[$key]; // 取第二维的值
        }
        
        if($order == 0)
            arsort($keys_value_arr);
        else
            asort($keys_value_arr);

        reset($keys_value_arr);
        echo 'the keys_value_arr: ' . "\n";
        print_r($keys_value_arr);        
        
        $new_arr = array();
        foreach($keys_value_arr as $k => $v){
            $new_arr[$k] = $arr[$k];
        }

        return $new_arr;
    }

    $arr = array(
        array(5, 8),
        array(7, 6),
        array(6, 7),
    );
    echo 'the raw array: ' . "\n";
    print_r($arr);

    $arr = array_sort($arr, 1, 1); 
    echo 'the sorted array: ' . "\n";
    print_r($arr);


