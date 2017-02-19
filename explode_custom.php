<?php
    function explode_custom($delimiter, $string){
        $arr = array();
        $delimiterLen = strlen($delimiter);
        while($string){
            $pos = strpos($string, $delimiter);
            if($pos === false){
                $arr[]  = $string;
                $string = '';
                break;
            } else{
                $arr[]  = substr($string, 0, $pos);
                $string = substr($string, $pos+$delimiterLen);
            }
        }

        return $arr;
    }

    print_r(explode_custom('|', 'I|love|you'));


