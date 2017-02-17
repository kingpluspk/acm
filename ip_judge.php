<?php
    // 判断Ip的合法性
    function ip_judge($ip){
        $flag = true;
        if(preg_match('/^[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}$/', $ip)){
            $arr = explode('.', $ip);
            if(count($arr) == 4){
                foreach($arr as $value){
                    if($value < '0' || $value > '255'){
                        $flag = false;   
                    }
                }
            } else{
                $flag = false;
            }
        } else{
            $flag = false;
        }

        return $flag;
    }

    $flag = ip_judge('127.0.0.1');
    var_dump($flag);


