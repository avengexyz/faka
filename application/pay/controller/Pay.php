<?php
namespace app\pay\controller;

class Pay
{
    public function pay(){

        //接收订单数据
        $data = input('post.');
            
        //如果商品id为空 返回ajax错误
        if($data['goods']==''){
            $code = 500;
            $errormessage = 'Internal Server Error';
            $status_header = 'HTTP/1.1 ' . $code . ' ' . $errormessage;
            header($status_header);

            // 输出
            $data = array('msg' => '请选择商品');
            exit(json_encode($data));
        }

        //如果购买数量为空 返回ajax错误
        if($data['count']==''){
            $code = 500;
            $errormessage = 'Internal Server Error';
            $status_header = 'HTTP/1.1 ' . $code . ' ' . $errormessage;
            header($status_header);

            // 输出
            $data = array('msg' => '请输入购买数量');
            exit(json_encode($data));
        }

        //如果购买数量不是整数 返回ajax错误
        //is_int($value+0)判断是不是整数 值需要加0 否则参数是0的时候会有问题 返回的true是反的
        if(!is_int($data['count']+0) ){
            $code = 500;
            $errormessage = 'Internal Server Error';
            $status_header = 'HTTP/1.1 ' . $code . ' ' . $errormessage;
            header($status_header);

            // 输出
            $data = array('msg' => '请输入正确购买数量');
            exit(json_encode($data));
        }

        //如果购买数量小于1 返回ajax错误
        if($data['count']<1){
            $code = 500;
            $errormessage = 'Internal Server Error';
            $status_header = 'HTTP/1.1 ' . $code . ' ' . $errormessage;
            header($status_header);

            // 输出
            $data = array('msg' => '请输入正确购买数量');
            exit(json_encode($data));
        }

        //查询出商品数据
        $goods=db('goods')
        ->find($data['goods']);
        //计算库存 总数减去售出
        $count=$goods['goodcount']-$goods['goodsold'];

        //如果购买数量大于库存 返回ajax错误
        if($data['count'] > $count){
            $code = 500;
            $errormessage = 'Internal Server Error';
            $status_header = 'HTTP/1.1 ' . $code . ' ' . $errormessage;
            header($status_header);

            // 输出
            $data = array('msg' => '库存不足');
            exit(json_encode($data));
        }

        //如果联系方式为空 返回ajax错误
        if($data['tel'] == ''){
            $code = 500;
            $errormessage = 'Internal Server Error';
            $status_header = 'HTTP/1.1 ' . $code . ' ' . $errormessage;
            header($status_header);

            // 输出
            $data = array('msg' => '请输入联系方式用于订单查询');
            exit(json_encode($data));
        }

        //如果邮箱为空 返回ajax错误
        if($data['email'] == ''){
            $code = 500;
            $errormessage = 'Internal Server Error';
            $status_header = 'HTTP/1.1 ' . $code . ' ' . $errormessage;
            header($status_header);

            // 输出
            $data = array('msg' => '请输入邮箱 用于接收订单');
            exit(json_encode($data));
        }
        
        //如果支付方式为空 返回ajax错误
        if(!isset($data['paysel'])){
            $code = 500;
            $errormessage = 'Internal Server Error';
            $status_header = 'HTTP/1.1 ' . $code . ' ' . $errormessage;
            header($status_header);

            // 输出
            $data = array('msg' => '请选择支付方式');
            exit(json_encode($data));
        }
        
        //生成一个未支付订单
        //也可以写成time 毫秒级的时间 输出157381003667456
        // $str = time() . str_pad(mt_rand(1, 99999), 5, '0', STR_PAD_LEFT);
        //data输出2019111555737
        $order=[];
        $order['order'] = date('Ymd') . str_pad(mt_rand(1, 99999), 5, '0', STR_PAD_LEFT);//唯一订单号
        $order['goodname'] =$goods['goodname'];//商品名称
        $order['goodprice'] =$goods['goodprice'];//商品单价
        $order['goodcount'] =$data['count'];//购买数量
        $order['money'] =$goods['goodprice']*$data['count'];//订单金额
        $order['gooddesc'] =$goods['gooddesc'];//商品描述
        $order['paysel'] =$data['paysel'];//支付方式
        $order['goodid'] =$goods['id'];//商品id
        $order['status'] = 0;//支付状态0未支付
        $order['addtime'] = time();//订单生成时间

        //将订单入库 在支付直接直接调防止页面篡改
        $money=db('order')
            ->insert($order);

        //创建成功返回数组
        $return['order']=$order['order'];
        if($order['paysel']==1){
            $return['url']='/pay/alipay/pay';
        }else{
            $return['url']='/pay/wx/pay';
        }

        //判断是否入库成功
        if($money){
            return json($return);
        }else{
            $code = 500;
            $errormessage = 'Internal Server Error';
            $status_header = 'HTTP/1.1 ' . $code . ' ' . $errormessage;
            header($status_header);

            // 输出
            $data = array('msg' => '生成订单失败');
            exit(json_encode($data));
        }

    }

   
}