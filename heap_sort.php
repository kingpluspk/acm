<?php
    // 堆排序，适合大数据的排序
    // 如：实现从1亿个整数中找出最大的1万个元素
    function sort_heap(&$arr){
        build_heap($arr);   // 初始化，建堆，此时，已经成为大顶堆，可以取堆顶（第一个元素）

        $count = count($arr);
        while($count > 1){
            list($arr[0], $arr[$count-1]) = array($arr[$count-1], $arr[0]); // 交换堆顶与最后一个元素
            $count--;   // 去掉最后一个元素，剩余元素进行堆调整

            adjust_heap($arr, $count, 0);
        }
    }

    function build_heap(&$arr){
        $node = floor(count($arr)/2) - 1;   // 下标从0开始，从非叶子节点的最大节点开始建堆
        for($i = $node; $i >= 0; $i--){
            adjust_heap($arr, count($arr), $i);
        }
    }
    
    /**
    * @param $arr array     待调整的数组
    * @param $maxLen int    待调整数组的长度
    * @param $node int      待调整的节点
    * 大顶堆
    */
    function adjust_heap(&$arr, $maxLen, $node){
        $lchild = 2 * $node + 1;
        $rchild = 2 * $node + 1;

        $maxNode = $node; // 设置当前节点为最大值的节点,方便后边最大值节点变化时与当前节点比较,确认是否需要交换
        while($lchild < $maxLen || $rchild < $maxLen){
            // 找到比父节点大的子节点
            if($lchild < $maxLen && $arr[$lchild] > $arr[$maxNode]) $maxNode = $lchild;
            if($rchild < $maxLen && $arr[$rchild] > $arr[$maxNode]) $maxNode = $rchild;

            if($maxNode != $node){
                // 把当前节点切换为最大的子节点
                list($arr[$maxNode], $arr[$node]) = array($arr[$node], $arr[$maxNode]);
                $node = $maxNode; // 迭代被替换的子节点，使其符合堆的特性
                $lchild = 2 * $node + 1;
                $rchild = 2 * $node + 1;
            } else{
                break; // 没有发生交换，即符合堆的特性，直接退出
            }
        }
    }

    $arr = [8, 5, 6, 7, 6];
    sort_heap($arr);
    print_r($arr);


