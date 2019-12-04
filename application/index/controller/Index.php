<?php
namespace app\index\controller;
use think\Controller;

class Index extends Controller
{
    public function index()
    {
        //查询网站配置
        $conf=db('conf')
            ->find();
        //查询商品分类
        $type=db('type')
            ->select();
        //查询出开启的支付配置信息用于面板支付方式显示
        $pay=db('payconfig')
            ->field('paysel,id')
            ->where('status',1)
            ->select();
        
        //赋值给面板
        $this->assign([
            'conf'=>$conf,
            'type'=>$type,
            'pay'=>$pay,
        ]);

        if($conf['tem']==0){
            return view('index/tem1/index');
        }else if($conf['tem']==01){
            return view('index/tem2/index');
        }
    }

    //根据分类id查询出该分类下所有商品接口
    public function getgoods(){
        //接收商品分类id
        $id=input('typeid');

        //查询分类下所有商品
        $goods=db('goods')
                ->where('typeid',$id)
                ->where('goodstatus',1)
                ->select();
        //返回json数据
        return json($goods);
    }

    //根据商品id查询出该商品价格库存等详细数据接口
    public function getgood(){
        //接收商品id
        $id=input('goodsid');

        //查询分类下所有商品
        $goods=db('goods')
                ->where('id',$id)
                ->find();
        //返回json数据
        return json($goods);
    }

    //支付宝支付同步回调
    public function return(){
        //查询网站配置
        $conf=db('conf')
        ->find();
        //接收支付宝返回的订单号
        $data=input('order');
        //赋值给面板
        $this->assign([
            'data'=>$data,
        ]);
        //赋值给面板
        $this->assign([
            'conf'=>$conf,
        ]);
        return view();
    }

    //查询订单界面
    public function sel(){
        //查询网站配置
        $conf=db('conf')
        ->find();
        //赋值给面板
        $this->assign([
            'conf'=>$conf,
        ]);
        return view();
    }

    //查询订单号接口
    public function selpost(){
        //接收订单号
        $order=input('order');
        //根据订单号查出卡密
            $card=db('card')
            ->where('order',$order)
            ->select();
        //返回json数据
        return json($card);
    }

}
