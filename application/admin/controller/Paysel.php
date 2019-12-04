<?php
namespace app\admin\controller;
use think\Controller;
use app\admin\controller\Base;

class Paysel extends Base
{
    public function list()
    {
        //查询商品分类列表
        $list=db('payconfig')
             ->paginate(10);
        //赋值给面板
        $this->assign([
            'list'=>$list,
        ]);

        return view();
    }

    public function edit()
    {
        //接收需要修改id
        $id=input('id');
        //通过id查询当前数据
        $list=db('payconfig')
            ->find($id);
        //检测是有提交
        if(request()->isPost()){
            //接收提交数据
            $data=input('post.');

            //添加至数据库
            $edit=db('payconfig')
                ->update($data);

            //判断是否成功
            if($edit !== false){
                $this->success('编辑支付渠道成功','admin/paysel/list');
            }else{
                $this->error('编辑支付渠道失败');
            }
        }

        //将查询到的当前数据 赋值给面板
        $this->assign([
            'list'=>$list,
        ]);
        return view();
    }

}
