<?php
namespace app\pay\controller;
require_once('../extend/alipay/aop/AopClient.php');
require_once('../extend/alipay/aop/request/AlipayTradeAppPayRequest.php');

class Alipay
{
    public function pay(){
        //接收订单数据
        $order=input('order');
        //查询出订单信息
        $pay=db('order')
            ->where('order',$order)
            ->find();
        
        //查询出配置信息
        $config=db('pay')
                ->find();
        //商户订单号，商户网站订单系统中唯一订单号，必填
        $out_trade_no = $pay['order'];

        //订单名称，必填
        $subject = $pay['goodname'];

        //付款金额，必填
        $total_amount = $pay['money'];

        //商品描述，可空
        $body = $pay['gooddesc'];

        //构建订单
        $bizcontent = "{\"body\":\"我是测试数据\","
            . "\"subject\": \"App支付测试\","
            . "\"out_trade_no\": \"20170125test01\","
            . "\"timeout_express\": \"30m\","
            . "\"total_amount\": \"0.01\","
            . "\"product_code\":\"QUICK_MSECURITY_PAY\""
            . "}";

        $aop = new \AopClient();

        $aop->gatewayUrl = "https://openapi.alipaydev.com/gateway.do";
        $aop->appId = "2016101700708638";  // APPID
        $aop->rsaPrivateKey = 'MIIEpQIBAAKCAQEAtF7nN+0+BvrA9YNxMWIzPIKObt4MyLG30ybWLJ3Qp/qE8JqZEm8vXKJ8FNxWm9Qq5ZQWE2qVernXEWaKvuw38ld068GQBSUtGfv7TvqDG6Ue0ISNvSmzg2MqEWciURcQyLuksUImQq7Clzhg7LgH7ng+PBZqCs6hISwfEg7wWj2XSX2aEKrJ+ZRhXZSSwn0ARMQYzSAKlLZyotmZ51pu7yoYPjWX10YQAoJBYI6sBVe2bkMV15C1yBwvQXuEnCi3t3c9mjm5NIAXmaQj6itd9FbTHAW3pAFiyMc+oAVcKWGkY9/oLfv7ZW4VdB8UPF3wcON6HM9mAaMVIIbzJk1obQIDAQABAoIBAQCPtW2T6boZ5YAIHQn6xrr74ymIu/KDlNVZrv/F3Jd6vudcrFB5l4ysyekC1etLjOgAstRD9A/VEGyCuKijJaINvBC0JiyRbOVaZqH8cywywoSirnof1THp5QCHjRySb0Y4KQk3EfVZ+9OemJThBl+LaNJtHY6vvaIzw+udf7mQq1ttxM7WTIQ5Bs/Tv2qbcf+51NC++93jtNlv9AVuz11tMTaHbmoUuJh6lAjNz4xidUqNZk9P8lE3hbJz3xSJSymbvcp19xJh/mcH4BUBZYWZJao0vZvDnLxarGqct6bQfQpRcpOh3GRbv9IMD21yOBFyUqygPBMWV6Sjk180dK8BAoGBANyMkDFlQin5mrTIBajXy6gA84JXGpjS7zjq65kiAyWhgo2Ch4fTyzC0M0HLJ4NkW5owvxAbLrDD3kRQrJN8tb06SWNh2ZdzCzKSD72BK1tiRWpjhpdcC4nhDNkpMeuJlTuFaPvfGzrKD+3dhUqKTgSa7RPeGW6RNebLwj2iVxBFAoGBANFdB3f9caw/xiwAwT5EwyzT5J4NKLhRoUXaiSM7nC2XKZ8+L3yaZFVjCOSC94/tz9f7OhEARITo1Ms96SPVrLLWGP7Lr0ePZ+hBFUIzh0pkW9Xc5S2wXbTdBE2mqlF7Q6E87PSZ8rmB0GEHby+L1U5ZVcCi/0t6unjqPgITut4JAoGAcjJeHxV9MtrJXj4LoCdMjksfyydq4CKoN2J8ZygTVRLR1I/3uT7TAP7tY23boc7/F1GSPLa2cFSa6+iR0zRJrhdWFJ1/20l4TNEQUWFmn8S8iJ/L+udwGg5rZq5L6Neua8liWLhnEwO5R8Lh13zRdNT7WMQxiuypaj2q79r1FbkCgYEArtIDnoofFTnbfHrU4e4BG7mDuQY77k0bYXzt7mGkM915f+MpO96f0Tz0+/rwRVrKpwq8nd2fWWwh4+Q6fRW7M0nbbUcfgZ2ZojJWUgU8/z12AcqGA/S1CoVTRpPYvFk1S7nYExdJuuVO3vaaPRWCc/3cwRJaIujENJtEU++tpiECgYEAuLi3BVGdc/hvDyncslQN/efVhJ/NvEZ6J93JC5Molsqp236tprcSwySSMpdIEVyWvooKGJcjSq30XCV0YS14vZFl23zmY9OqYE38NjUu2zh98bEayqtpp2IM0y9jjdnT1sSooNN6EGEi1BdrUjpIbYNzljTG5ItoQwvKnYceMu0=';  //私钥
        $aop->format = "json";
        $aop->charset = "UTF-8";
        $aop->signType = "RSA2";
        $aop->alipayrsaPublicKey = 'MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAml0sHLsgqi2W3iqCg5Sg4p3fKfsPIbibJ3NwoyI6fKbRKdSDu0qhBfWjDTSj1Vdgim26UgKFvDaIuM7PCwCew6X1y/DChMzBkWpzmZIxoCbfxvBHjlr/E8cbwCcPlgR2hIrkldcyWzl4nTNbjm1blpO2E1qfuTIIooGqi50bAIVu4bWSCKCgZNJCnU9YQfoDQkbWaG5NuP3hYTV7xsy3B+892JokCdldJJpuL8Wb5Jh0oK9keCeZ+jRUyQxabwld1XtE4SljCIGdgtaJ4WXk6Pq00+Y5vucnitQPvRxUzLhR+OODfqzyAsU6Iew2B6sn6fRe1YsXqrC6laL+kyGjcwIDAQAB'; //公钥

        $request = new \AlipayTradeAppPayRequest();
        $notify_url='http://test4.zj1112.com/notify_url.php';
        $request->setNotifyUrl($notify_url);
        $request->setBizContent($bizcontent);
        $response = $aop->sdkExecute($request);

        $result = $aop->pageExecute ($request);
        return $response;


        
    }

   
}