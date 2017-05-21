<?php
    /**
    * 求最大子序列的和
    * 给定整数：A1 A2 A3 A4 … An,其中可能有负数，求Ai-Aj的和的最大值
    * 当序列均未负数时，则直接寻找最大值的负数 
    */
    function sub_sequence_sum($arr){
        $current = 0;
        $result  = 0;
        $begin = $end = 0;
        $beginTmp = 0;

        foreach($arr as $k => $v){
            $current += $v;
            if($current < 0){
                $current = 0;
                $beginTmp = $k + 1; // 当总和小于0，对下个序列没有贡献，从下个位置继续寻找序列
            }
            if($current > $result){ // 保存新的子序列和时，同时记录该序列的起始、结束位置
                $result = $current;
                $begin = $beginTmp;
                $end = $k;
            }
        }
        
        $maxSeq = array_slice($arr, $begin, $end - $begin + 1);

        return array($result, $maxSeq);
    }

    $list = array(-1,8,-5,7,-8,-10,-12,5);
    list($result, $maxSeq) = sub_sequence_sum($list);
    var_dump($list);
    echo 'the sum: ' . $result;
    echo "\n";
    var_dump($maxSeq);
