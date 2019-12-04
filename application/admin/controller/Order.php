<?php
namespace app\admin\controller;
use think\Controller;
use app\admin\controller\Base;

class Order extends Base
{
    public function list()
    {
        //查询商品分类列表
        $list=db('order')
             ->paginate(10);
        //赋值给面板
        $this->assign([
            'list'=>$list,
        ]);

        return view();
    }

}
