<?php
    // 实现大数相加
    function add($a, $b){
        $lenA = strlen($a);
        $lenB = strlen($b);

        $j = 0;
        $res = '';
        for($indexA = $lenA - 1, $indexB = $lenB - 1; ($indexA >= 0 || $indexB >= 0); $indexA--, $indexB--){
            $itemA = ($indexA >= 0) ? (int)$a[$indexA] : 0;
            $itemB = ($indexB >= 0) ? (int)$b[$indexB] : 0;
            $sum = $itemA + $itemB + $j;
            if($sum > 9){
                $j = 1;
                $sum = $sum - 10;
            } else{
                $j = 0;
            }

            $res = (string)$sum . $res;
        }

        if($j > 0) $res = (string)$j . $res;

        return $res;
    }
    
    echo add('190', '10') . "\n";


