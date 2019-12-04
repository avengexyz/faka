<?php
namespace app\admin\controller;
use think\Controller;
use app\admin\controller\Base;

class Type extends Base
{
    public function list()
    {
        //查询商品分类列表
        $list=db('type')
             ->paginate(10);
        //赋值给面板
        $this->assign([
            'list'=>$list,
        ]);

        return view();
    }

    public function add()
    {
        //检测是否有提交
        if(request()->isPost()){
            //接收提交数据
            $data=input('post.');
           
            //数据库添加
            $add=db('type')
                ->insert($data);
            //判断是否添加成功
            if($add){
                $this->success('添加商品分类成功','admin/type/list');
            }else{
                $this->error('添加商品分类失败');
            }
        }
        return view();
    }

    public function edit()
    {
        //接收需要修改id
        $id=input('id');
        //通过id查询当前数据
        $list=db('type')
            ->find($id);
        //检测是有提交
        if(request()->isPost()){
            //接收提交数据
            $data=input('post.');

            //添加至数据库
            $edit=db('type')
                ->update($data);

            //判断是否成功
            if($edit !== false){
                $this->success('编辑商品分类成功','admin/type/list');
            }else{
                $this->error('编辑商品分类失败');
            }
        }

        //将查询到的当前数据 赋值给面板
        $this->assign([
            'list'=>$list,
        ]);
        return view();
    }

    public function del()
    {
        //接收需要删除的id
        $id=input('id');

        //进行删除操作
        $del=db('type')
            ->delete($id);
        //判断是否成功
        if($del){
            $this->success('删除商品分类成功','admin/type/list');
        }else{
            $this->error('删除商品分类失败');
        }
    }
}
