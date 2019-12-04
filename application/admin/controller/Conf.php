<?php
namespace app\admin\controller;
use think\Controller;
use app\admin\controller\Base;

class Conf extends Base
{

    public function conf()
    {
        //通过id查询当前数据
        $list=db('conf')
            ->find();

        //检测是有提交
        if(request()->isPost()){
            //接收提交数据
            $data=input('post.');
            //判断有没有上传图片
            if($_FILES['logo']['tmp_name']){
                //获取表单上传文件
                $file=request()->file('logo');
                //移动文件../是整个根目录
                $info=$file->move('../public/static/uploads');
                //将移动的文件路径写到数组里
                $data['logo']='/static/uploads/'.$info->getSaveName();
            }

            //判断是添加数据还是更新数据
            if($list['id'] == null){
                //添加至数据库
                $edit=db('conf')
                    ->insert($data);
                //判断是否成功
                if($edit){
                    $this->success('编辑网站配置成功','admin/conf/conf');
                }else{
                    $this->error('编辑网站配置失败');
                }
            }

            //添加至数据库
            $edit=db('conf')
                ->update($data);

            //判断是否成功
            if($edit != false){
                $this->success('编辑网站配置成功','admin/conf/conf');
            }else{
                $this->error('编辑网站配置失败');
            }
        }

        //将查询到的当前数据 赋值给面板
        $this->assign([
            'list'=>$list,
        ]);
        return view();
    }

}
