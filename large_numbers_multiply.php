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
    
    // 实现大数相乘
    // 模拟竖式计算方法
    function multiply($a, $b){
        if($a == 0 || $b == 0) return 0;

        $lenA = strlen($a);
        $lenB = strlen($b);

        $result = '0';
        for($indexA = $lenA - 1; $indexA >= 0; $indexA--){
            $res = ''; // 竖式计算每一项乘积得到的结果
            // 每次相乘之后，增加多少个零提升多少倍数
            for($i = $indexA + 1; $i < $lenA; $i ++){
                $res = '0' . $res;
            }

            $j = 0;
            for($indexB = $lenB - 1; $indexB >= 0; $indexB --){
                $mul = (int)$a[$indexA] * (int)$b[$indexB] + $j;
                if($mul >= 10){
                    $j   = floor($mul / 10);
                    $mul = $mul - $j * 10;
                } else{
                    $j = 0;
                }
                $res = (string)$mul . $res; // 将每次乘积的结果链接起来，得到最终结果
            }
            if($j > 0) $res = (string)$j . $res;
            
            $result = add($result, $res);
        }

        return $result;
    }

    echo multiply('190', '10') . "\n";


