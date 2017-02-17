<?php
    // 查找两个字符串中最大的相同字符串
    function max_sub_str($bstr, $sstr){
        if(strlen($sstr) > strlen($bstr))
            list($bstr, $sstr) = array($sstr, $bstr); // $bstr存放较长的字符串
        
        $len = strlen($bstr);
        for($i = 0; $i < $len; $i++){
            for($a = 0, $b = $len - $i; $b <= $len; $a++, $b++){
                $key = substr($sstr, $a, $b); // 在较短的字符串中截取相应的子串，进而去较长的字符串中查找
                if(strpos($bstr, $key) !== false){
                    return $key;
                }
            }
        }
    }

    $sstr = 'love';
    $bstr = 'iloveyou';
    echo max_sub_str($sstr, $bstr) . "\n";


