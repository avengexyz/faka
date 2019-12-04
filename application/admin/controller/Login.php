<?php
namespace app\admin\controller;
use think\Controller;

class Login extends Controller
{
    public function index()
    {
        if(request()->isPost()){
            // 检测输入的验证码是否正确，$value为用户输入的验证码字符串
            if( !captcha_check(input('code')))
            {
                // 验证失败
                return $this->error('验证码错误');
            }

            //接收数据
            $data=input('post.');

            //根据用户名查询账号数据
            $user=db('admin')
                ->where('username','=',$data['username'])
                ->find();

            /*
            *进行判断
            *如果没有匹配的用户名退回
            *如果密码匹配不上退回
            */
            if($user){
                if($user['password'] == md5($data['password'])){
                    //如果用户名和密码都匹配则写入session 并跳转到后台首页
                    session('username',$user['username']);
                    session('id',$user['id']);
                    $this->success('登录成功','admin/index/index');
                }else{
                    $this->error('账号或者密码错误');
                }

            }else{
                $this->error('账号或者密码错误');
            }


        }
        return view('login');
    }
}
