<?php
namespace app\admin\controller;
use think\Controller;
use app\admin\controller\Base;

class Admin extends Base
{
    public function list()
    {
        //查询管理员列表
        $list=db('admin')
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
            //将密码进行md5加密
            if($data['password']){
                $data['password']=md5($data['password']);
            }
            //数据库添加
            $add=db('admin')
                ->insert($data);
            //判断是否添加成功
            if($add){
                $this->success('添加管理员成功','admin/admin/list');
            }else{
                $this->error('添加管理员失败');
            }
        }
        return view();
    }

    public function edit()
    {
        //接收需要修改id
        $id=input('id');
        //通过id查询当前数据
        $list=db('admin')
            ->find($id);
        //检测是有提交
        if(request()->isPost()){
            //接收提交数据
            $data=[
                'id'=>input('id'),
                'username'=>input('username'),
                'password'=>input('password')
            ];

            //如果密码字段不为空 说明是新密码 进行md5加密
            if($data['password'] != ''){
                $data['password']=md5($data['password']);
            }

            //如果密码字段为空 将原来的密码赋值给接收的数据
            if($data['password'] == ''){
                $data['password']=$list['password'];
            }

            //添加至数据库
            $edit=db('admin')
                ->update($data);

            //判断是否成功
            if($edit != false){
                $this->success('编辑管理员成功','admin/admin/list');
            }else{
                $this->error('编辑管理员失败');
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
        //接收需要删除的管理员id
        $id=input('id');

        //进行删除操作
        $del=db('admin')
            ->delete($id);
        //判断是否成功
        if($del){
            $this->success('删除管理员成功','admin/admin/list');
        }else{
            $this->error('删除管理员失败');
        }
    }

    public function logout(){
        //退出登录直接清空session
        session(null);
        $this->error('退出登录成功','admin/login/index');
    }
}
