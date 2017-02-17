<?php
    class Node{
        public $data = null;
        public $next = null;
    }
    
    // 逆序单链表
    // 思想是需要保存下三个节点，分别是curNode,second(curNode->next),third(curNode->next->next)
    // 每次要执行的操作只有将next->next指向curNode，然后依次将这三个节点后移，直到next == null
    function reverse_list($head){
        $curNode    = $head;
        $second     = $head->next;
        $head->next = null;

        while($second != null){
            $third        = $second->next;
            $second->next = $curNode;
            
            list($curNode, $second) = array($second, $third);
        }

        return $curNode;    // 最后一个节点变为头节点
    }

    // 遍历单链表
    function traverse($head){
        $curNode = $head;
        while($curNode != null){
            echo $curNode->data . '  ';
            $curNode = $curNode->next;
        }

        echo "\n";
    }

    $head   = new Node();
    $one    = new Node();
    $two    = new Node();
    $three  = new Node();
    $head->data = 0;
    $one->data  = 1;
    $two->data  = 2;
    $three->data = 3;
    $head->next = $one;
    $one->next  = $two;
    $two->next  = $three;
    $three->next = null;

    traverse($head);
    
    $rhead = reverse_list($head);
    traverse($rhead);


