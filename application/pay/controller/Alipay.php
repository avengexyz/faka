<?php
namespace app\pay\controller;
//引入支付宝sdk连接类文件
require_once('../extend/alipay/aop/AopClient.php');
//引入支付宝sdk(pc网站支付)类文件
require_once('../extend/alipay/aop/request/AlipayTradePagePayRequest.php');

class Alipay
{
    public function pay(){
        //接收订单数据
        $order=input('order');
        //通过传过来的订单号在数据库查询出订单信息
        $pay=db('order')
            ->where('order',$order)
            ->find();
        
        //查询出支付配置信息
        $config=db('payconfig')
                ->find();

        /*
        *构建订单
        *body 商品描述(可空)
        *timeout_express 订单支付有效期
        *subject 订单名称(商品名称,必填)
        *out_trade_no 商户订单号，商户网站订单系统中唯一订单号(必填)
        *total_amount 付款金额(必填)
        *product_code 产品码 pc网站支付必须为(FAST_INSTANT_TRADE_PAY) app/手机网站等为其它
        */
        $biz_content = array(
            'body' => $pay['gooddesc'],
            'timeout_express' => '10m',
            'subject' => $pay['goodname'],
            'out_trade_no' => $pay['order'],
            'total_amount' => $pay['money'],
            'product_code' => 'FAST_INSTANT_TRADE_PAY',
        );
        //将生成的订单转为json
        $bizcontent=json_encode($biz_content);

        //实例化支付宝sdk连接类
        $aop = new \AopClient();

        $aop->gatewayUrl = "https://openapi.alipaydev.com/gateway.do";//支付宝网关(现在为沙盒环境正式环境没有dev)
        $aop->appId = $config['appid'];  // 应用id
        $aop->rsaPrivateKey = $config['rsakey'];  //用户私钥
        $aop->format = "json";//公共请求参数此参数仅支持JSON格式
        $aop->charset = "UTF-8";//编码格式
        $aop->signType = "RSA2";//签名方式
        $aop->alipayrsaPublicKey = $config['publickey']; //支付宝公钥

        //实例化支付宝sdk(pc网站支付)类
        $request = new \AlipayTradePagePayRequest();
        $request->setReturnUrl('https://f.800038.xyz/pay/alipay/return');//同步回调地址  
        $request->setNotifyUrl('https://f.800038.xyz/pay/alipay/notify'); //异步回调地址 
        $request->setBizContent($bizcontent);//订单信息
        //调用页面执行方法
        $result = $aop->pageExecute ($request,"post");


        //输出最终跳转url
        echo $result;

    }

   public function return(){
        //查询出支付配置信息
        $config=db('payconfig')
        ->find();
        //接收参数
        $data=$_GET;
        //实例化支付宝sdk连接类
        $aop = new \AopClient();
        $aop->alipayrsaPublicKey = trim($config['publickey']); //支付宝公钥(不去除两端多余字符会导致数据库查询结果比实际多一个字节)
        //调用验签方法
        $flag = $aop->rsaCheckV1($data,null,"RSA2");
        //判断验签是否通过
        if($flag){
            //验签通过跳转至显示订单号界面
            $link=url('index/index/return',['order'=>$data['out_trade_no']]);
            header("location:$link");
        }else{
            //验签失败说明是非法请求
            echo '非法请求';
        }
        
   }

   public function notify(){
        //接收参数
        $data=$_POST;

        //查询出支付配置信息
        $config=db('payconfig')
                ->find();
        //实例化支付宝sdk连接类
        $aop = new \AopClient();
        $aop->alipayrsaPublicKey = trim($config['publickey']); //支付宝公钥(不去除两端多余字符会导致数据库查询结果比实际多一个字节)
 
        /*
        *调用验签方法
        * rsaCheckV1验签方法 主要用于支付接口的返回参数的验签比如：当面付，APP支付，手机网站支付，电脑网站支付
        * rsaCheckV2验签方法 主要是用于生活号相关的事件消息和口碑服务市场订购信息等发送到应用网关地址的异步信息的验签
        */
        $flag = $aop->rsaCheckV1($data,null,"RSA2");

        //判断验签是否通过
        if($flag){
            //通过验签判断支付状态
            if($data['trade_status'] == 'TRADE_FINISHED' || $data['trade_status'] == 'TRADE_SUCCESS'){
                //支付成功
                //修改订单状态
                db('order')
                ->where('order',$data['out_trade_no'])
                ->update([
                    'status' => 1,
                    'paytime' => time(),
                ]);
                //查询订单信息
                $order=db('order')
                ->where('order',$data['out_trade_no'])
                ->find();
                //修改卡密状态
                db('card')
                ->where('status',0)
                ->where('gid',$order['goodid'])
                ->limit($order['goodcount'])
                ->update([
                    'status' => 1,
                    'order' => $data['out_trade_no'],
                ]);
                //减库存
                db('goods')
                ->where('id',$order['goodid'])
                ->setInc('goodsold',$order['goodcount']);

                //验证成功
                echo "success";	//请不要修改或删除
            }else{
                //验证失败
                echo "fail";
            }
            
        }else{
            //验证失败
            echo "fail";
        }

   }
}