<?php
namespace app\admin\controller;
use think\Controller;
use app\admin\controller\Base;

class Goods extends Base
{
    public function list()
    {
        //查询商品分类列表
        $list=db('goods')
             ->paginate(10);
        //赋值给面板
        $this->assign([
            'list'=>$list,
        ]);

        return view();
    }

    public function add()
    {
        //查询商品分类
        $type=db('type')
            ->select();
        //检测是否有提交
        if(request()->isPost()){
            //接收提交数据
            $data=input('post.');

            //如果是自动发货商品 并且商品总数大于0 退回不允许添加库存
            if($data['goodship']==0 && $data['goodcount'] > 0){
                $this->error('自动发货商品不允许添加库存');
            }

            //数据库添加
            $add=db('goods')
                ->insert($data);
            //判断是否添加成功
            if($add){
                $this->success('添加商品成功','admin/goods/list');
            }else{
                $this->error('添加商品失败');
            }
        }
        //赋值给面板
        $this->assign([
            'type'=>$type,
        ]);
        return view();
    }

    public function edit()
    {
        //查询商品分类
        $type=db('type')
            ->select();
        //接收需要修改id
        $id=input('id');
        //通过id查询当前数据
        $list=db('goods')
            ->find($id);
        //检测是有提交
        if(request()->isPost()){
            //接收提交数据
            $data=input('post.');

            //添加至数据库
            $edit=db('goods')
                ->update($data);

            //判断是否成功
            if($edit !== false){
                $this->success('编辑商品成功','admin/goods/list');
            }else{
                $this->error('编辑商品失败');
            }
        }

        //将查询到的当前数据 赋值给面板
        $this->assign([
            'list'=>$list,
            'type'=>$type,
        ]);
        return view();
    }

    public function del()
    {
        //接收需要删除的id
        $id=input('id');

        //进行删除操作
        $del=db('goods')
            ->delete($id);
        //判断是否成功
        if($del){
            $this->success('删除商品成功','admin/goods/list');
        }else{
            $this->error('删除商品失败');
        }
    }
}
