<?php
    /**
    * 观察者模式（有时又被称为发布（publish ）-订阅（Subscribe）模式、模型-视图（View）模式、源-收听者(Listener)模式或从属者模式）是软件设计模式的一种。
    * 在此种模式中，一个目标物件管理所有相依于它的观察者物件，并且在它本身的状态改变时主动发出通知。
    * 优点：1）观察者和主题之间的耦合度较小；2）支持广播通信；
    * 缺点：于观察者并不知道其它观察者的存在，它可能对改变目标的最终代价一无所知。这可能会引起意外的更新；
    */
    
    // 主题接口
    interface Subject{
        public function attach(Observer $obser);
        public function detach(Observer $obser);
        public function notify();
    }
    // 观察者接口
    interface Observer{
        public function watch(Subject $sub);
    }

    // 主题
    class Good implements Subject{
        private $_storage = array();
        public $good = 'fish';
        
        // 添加观察者
        public function attach(Observer $obser){
            $this->_storage[] = $obser;
        }
        
        // 删除观察者
        public function detach(Observer $obser){
            foreach($this->_storage as $key => $value){
                if($obser == $value){
                    unset($this->_storage[$key]);
                }
            }
        }
        
        // 更新主题的状态
        // 主题的状态发生变化，需要通知相应的观察者
        public function distributeGood(){
            if($this->good == 'bone'){
                $this->good = 'fish';
            } else{
                $this->good = 'bone';
            }
            $this->notify();
        }
        
        // 通知相应的观察者
        public function notify(){
            foreach($this->_storage as $obser){
                $obser->watch($this);
            }
        }
    }

    // 观察者
     class Dog implements Observer{
        public function watch(Subject $sub){
            echo 'I am a dog and get the food:' . $sub->good . "\n";
            echo 'Like or not ... ' . "\n";
        }
     }
    // 观察者
     class Cat implements Observer{
        public function watch(Subject $sub){
            echo 'I am a cat and get the food:' . $sub->good . "\n";
            echo 'Like or not ... ' . "\n";
        }
     }

     $good = new Good();
     $dog  = new Dog();
     $cat  = new Cat();
     $good->attach($dog);
     $good->attach($cat);
     $good->distributeGood();
     echo "======\n";
     $good->distributeGood();
     echo "======\n";
     $good->distributeGood();


