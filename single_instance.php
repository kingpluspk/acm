<?php
    /**
    * 单例模式
    * $_instance必须声明为静态私有变量
    * 构造函数和克隆方法必须声明为私有，防止外部程序实例类，从而失去单例模式的意义 
    */
    class SingleInstance{
        private static $_instance = null;
        
        // 创建private construct，只允许对象被内部实例
        private function __construct(){
        }
        
        // 创建private clone，防止对象被复制克隆
        private function __clone(){
        }

        public static function getInstance(){
            if(!(self::$_instance instanceof self)){
                self::$_instance = new self;
            }
            return self::$_instance;
        }

        public function test(){
            echo '调用成功' . "\n";
        }
    }

    $instance = SingleInstance::getInstance();
    $instance->test();


