<?php
namespace app\pay\controller;

class Wx
{
    public function pay(){
        $data=input('param.');
        $order=input('order');
        dump($data);
    }

    
}