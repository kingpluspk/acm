<?php    
interface func{
    public static function handle($next);
}

class FirstStep implements func{
        
    public static  function handle($next){
        // echo "111---";
        $next();
        echo "111+++";
    }
}

class SecondStep implements func{
    
    public static function handle($next){
        // echo '222---';
        echo $next();
        echo '222+++';
    }
}

function goFun(){
    
    return function ($a, $b){
        return function() use ($a, $b){
                $b::handle($a);
        };
    };
}

function then() {
    $step  = [FirstStep::class, SecondStep::class];
    $param = 'hello world';
    $init = function() use ($param){ 
        echo '000';
        return $param;
    };

    // var_dump(array_reduce($step, goFun(), $init));
    call_user_func(array_reduce($step, goFun(), $init));

    // array_reduce
    // 函数向用户自定义函数发送数组中的值，并返回一个字符串。
    // 注释：如果数组是空的且未传递 initial 参数，该函数返回 NULL。
    // 说明：
    // array_reduce() 函数用回调函数迭代地将数组简化为单一的值。
    // 如果指定第三个参数，则该参数将被当成是数组中的第一个值来处理，或者如果数组为空的话就作为最终返回值。

    // call_user_func
    // 第一个参数 callback 是被调用的回调函数，其余参数是回调函数的参数，或者参数为数组，类->方法。
}

then();