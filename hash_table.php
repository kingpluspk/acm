<?php
    class HashNode{
        private $_key = null;
        private $_value = null;
        private $_nextNode = null;

        public function __construct($key, $value, $nextNode = null){
            $this->_key     = $key;
            $this->_value   = $value;
            $this->_nextNode = $nextNode;
        }
    }

    class HashTable{
        private $_arr   = null;
        private $_size  = 10;
    
        public function __construct(){
        	// SplFixedArray创建的数组比一般的Array()效率更高，因为更接近C的数组。创建时需要指定尺寸
        	$this->_arr = new SplFixedArray($this->_size);
    	}
        
        // key-value的映射规则
    	private function simpleHash($key){
        	$asciiTotal = 0;
        	for($i=0; $i<strlen($key); $i++){
            	$asciiTotal += ord($key[$i]);
        	}
        	return $asciiTotal % $this->_size;
    	}

    	public function set($key, $value){
        	$hash = $this->simpleHash($key);
        	if(isset($this->_arr[$hash])){
            	// 链地址法解决冲突
                // 在单链表的头部插入新节点
            	$newNode = new HashNode($key, $value, $this->_arr[$hash]);
        	}else{
            	$newNode = new HashNode($key, $value, null);
        	}
        	$this->_arr[$hash] = $newNode;
        	return true;
    	}

    	public function get($key){
        	$hash = $this->simpleHash($key);
        	$current = $this->_arr[$hash];
        	while(!empty($current)){
            	if($current->key == $key){
                	return $current->value;
            	}
            	$current = $current->nextNode;
        	}
        	return null;
    	}

    	public function getList(){
        	return $this->_arr;
    	}
    }

    $arr = new HashTable();
	for($i=0; $i<15; $i++){
    	$arr->set('key'.$i, 'value'.$i);
	}
	print_r($arr->getList());


