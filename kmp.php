<?php
    /**
    * 生成模式匹配表（Next数组），该数组存放着需要匹配的字符串每个位置的最长相同前缀后缀长度k
    * "前缀"指除了最后一个字符以外，一个字符串的全部头部组合；
    * "后缀"指除了第一个字符以外，一个字符串的全部尾部组合；
    * kmp算法的复杂度是O(n+m)(均摊分析)
    */
    function genNextArr($patternStr){
        $patternLen = strlen($patternStr); 
        $next = array();
        $k = 0;
        $next[0] = $k; // 首字符的最长相同前缀后缀为0
        for($i = 1; $i < $patternLen; $i++){
             // 不断递归判断是否存在子对称，k=0说明不再有子对称，
             // Pattern[i] != Pattern[k]说明虽然有子对称，但是对称后面的值和当前的字符值不相等，所以继续递推
            while($k > 0 && $patternStr[$i] != $patternStr[$k])
                $k = $next[$k-1]; // 继续递归
            //找到了这个子对称，或者是直接继承了前面的对称性，这两种都在前面的值k基础上进行加1操作
            if($patternStr[$i] == $patternStr[$k])
                $k++;

            $next[$i] = $k;
        }
        
        echo 'the next array: ' . "\n";
        print_r($next);

        return $next;
    }
    
    /**
    * kmp算法的复杂度是O(n+m)(均摊分析)
    */
    function kmp($searchStr, $patternStr){
        $next = genNextArr($patternStr); // 计算模式匹配表
        
        $searchLen  = strlen($searchStr);
        $patternLen = strlen($patternStr);

        for($i = 0, $pi = 0; $i < $searchLen; $i++){
            // 假设现在字符串patternStr的前i个位置都和从某个位置开始的字符串patternStr匹配，现在比较第i+1个位置。
            // 如果第i+1个位置相同，接着比较第i+2个位置；
            // 如果第i+1个位置不同，则出现不匹配，我们依旧要将长度为i的字符串分割，获得其最长相同前缀后缀长度next[i]，进行位移，
            // 已经匹配的字符串patternStr长度 - 最长相同前缀后缀长度next[i]；
            // 具体实现： 当不匹配时，不断递归模式匹配表next，直到获取新的相等的字符或者回到首字符
            while($pi > 0 && $patternStr[$pi] != $searchStr[$i])
                $pi = $next[$pi-1];
            // echo 'i: ' . $i . ' vs ' . 'pi: ' . $pi . "\n";
            // echo 'sstr: ' . $searchStr[$i] . ' vs ' . 'pstr: ' . $patternStr[$pi] . "\n";
            
            if($patternStr[$pi] == $searchStr[$i])
                $pi++;

             if($pi == $patternLen){
                $index = $i - ($pi - 1) + 1; // $pi - 1 恢复当$patternStr[$pi] = $searchStr[$i]时pi的位置
                return $index;
             }
             // echo '==' . "\n\n";
        }

        return -1;
    }

    $searchStr  = 'BBCABCDABABCDABCABCDABD'; // strlen = 23, 命中的下标为17（下标从0开始）
    $patternStr = 'ABCDABD'; // strlen = 7
    echo 'searchStr:  ' . $searchStr . "\n";
    echo 'patternStr: ' . $patternStr . "\n";
    echo kmp($searchStr, $patternStr) . "\n";

    
