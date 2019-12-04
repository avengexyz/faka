<?php
namespace app\admin\controller;
use think\Controller;


class Base extends Controller
{
    public function initialize()
    {
        if(!session('username')){
            $this->error('未登录,无法进行操作!','admin/login/index');
        }
    }
}
