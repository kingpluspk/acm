<?php
    /**
    * 双向队列
    */
    class DoubleQueue{
        protected $_storage = array();

        // 入头
        public function unshift($element){
            return array_unshift($this->_storage, $element);
        }

        // 入尾
        public function push($element){
            return array_push($this->_storage, $element);
        }

        // 出头
        public function shift(){
            return array_shift($this->_storage);
    
        }
        
        // 出尾
        public function pop(){
            return array_pop($this->_storage);
        }

        // 长度
        public function length(){
            return count($this->_storage);
        }

    }

    $deque = new DoubleQueue();
    $deque->unshift(1);
    $deque->unshift(2);
    $deque->push(9);
    $deque->push(8);
    echo 'the length: ' . $deque->length() . "\n";

    while($element = $deque->pop()){
        echo $element;
    }
    echo "\n";
   

    /*
    $beginTime = microtime(true);
    // other codes
    sleep(2);
    $stopTime = microtime(true);
    $runTime = ($stopTime - $beginTime) * 1000;  // 此时，单位为毫秒
    // echo 'The run time: ' . $runTime . "\n";
    */

