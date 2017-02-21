<?php
    /**
    * 一群猴子排成一圈，按1，2，…，n依次编号，共num只猴子，
    * 然后从第1只开始数，数到第x只,把它踢出圈，从它后面再开始数，再数到第x只，在把它踢出去，
    * 如此不停 的进行下去，直到最后只剩下一只猴子为止，那只猴子就叫做大王。
    * 要求编程模拟此过程，输入num、x， 输出最后那个大王的编号。
    */
    function money_king($num, $x){
        $arr = array();
        for($i = 0; $i < $num; $i++){
            $arr[$i] = $i;
        }

        $i = 1;
        while(count($arr) > 1){
            foreach($arr as $key => $value){
                if($i == $x){
                    $i = 1;
                    unset($arr[$key]);
                } else{
                    $i++;
                }
            }
        }

        $newArr = array_values($arr);
        return ($newArr[0] + 1);
    }

    // 猴王的下标为3
    $king = money_king(5, 2);
    echo $king . "\n";


