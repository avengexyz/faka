<?php
namespace app\pay\controller;
require_once('../extend/alipay/pagepay/service/AlipayTradeService.php');


class Notify
{
    public function pay(){
        //接收接口返回的数据
        // $data=input('param.');

        // //将接收数据写入txt
        // $file_path="./1.txt"; //定义一个路径 tp默认在public
        // if(file_exists($file_path)){
        // //如果追加内容则使用a+
        // $fp=fopen($file_path,"a+");//打开文件追加操作
        // $con=print_r($data,1);//因为只能写入字符串 不能写入数组什么的所以需要转换一下
        // fwrite($fp,$con);//进行写入操作
        // }else{
        // }
        // fclose($fp);//关闭文件
        // die;
        /* *
        * 功能：支付宝服务器异步通知页面
        * 版本：2.0
        * 修改日期：2017-05-01
        * 说明：
        * 以下代码只是为了方便商户测试而提供的样例代码，商户可以根据自己网站的需要，按照技术文档编写,并非一定要使用该代码。

        *************************页面功能说明*************************
        * 创建该页面文件时，请留心该页面文件中无任何HTML代码及空格。
        * 该页面不能在本机电脑测试，请到服务器上做测试。请确保外部可以访问该页面。
        * 如果没有收到该页面返回的 success 信息，支付宝会在24小时内按一定的时间策略重发通知
        */

        // require_once 'config.php';
        // require_once 'pagepay/service/AlipayTradeService.php';
        $config = array (	
            //应用ID,您的APPID。
            'app_id' => "2016101700708638",

            //商户私钥
            'merchant_private_key' => "MIIEpQIBAAKCAQEAtF7nN+0+BvrA9YNxMWIzPIKObt4MyLG30ybWLJ3Qp/qE8JqZEm8vXKJ8FNxWm9Qq5ZQWE2qVernXEWaKvuw38ld068GQBSUtGfv7TvqDG6Ue0ISNvSmzg2MqEWciURcQyLuksUImQq7Clzhg7LgH7ng+PBZqCs6hISwfEg7wWj2XSX2aEKrJ+ZRhXZSSwn0ARMQYzSAKlLZyotmZ51pu7yoYPjWX10YQAoJBYI6sBVe2bkMV15C1yBwvQXuEnCi3t3c9mjm5NIAXmaQj6itd9FbTHAW3pAFiyMc+oAVcKWGkY9/oLfv7ZW4VdB8UPF3wcON6HM9mAaMVIIbzJk1obQIDAQABAoIBAQCPtW2T6boZ5YAIHQn6xrr74ymIu/KDlNVZrv/F3Jd6vudcrFB5l4ysyekC1etLjOgAstRD9A/VEGyCuKijJaINvBC0JiyRbOVaZqH8cywywoSirnof1THp5QCHjRySb0Y4KQk3EfVZ+9OemJThBl+LaNJtHY6vvaIzw+udf7mQq1ttxM7WTIQ5Bs/Tv2qbcf+51NC++93jtNlv9AVuz11tMTaHbmoUuJh6lAjNz4xidUqNZk9P8lE3hbJz3xSJSymbvcp19xJh/mcH4BUBZYWZJao0vZvDnLxarGqct6bQfQpRcpOh3GRbv9IMD21yOBFyUqygPBMWV6Sjk180dK8BAoGBANyMkDFlQin5mrTIBajXy6gA84JXGpjS7zjq65kiAyWhgo2Ch4fTyzC0M0HLJ4NkW5owvxAbLrDD3kRQrJN8tb06SWNh2ZdzCzKSD72BK1tiRWpjhpdcC4nhDNkpMeuJlTuFaPvfGzrKD+3dhUqKTgSa7RPeGW6RNebLwj2iVxBFAoGBANFdB3f9caw/xiwAwT5EwyzT5J4NKLhRoUXaiSM7nC2XKZ8+L3yaZFVjCOSC94/tz9f7OhEARITo1Ms96SPVrLLWGP7Lr0ePZ+hBFUIzh0pkW9Xc5S2wXbTdBE2mqlF7Q6E87PSZ8rmB0GEHby+L1U5ZVcCi/0t6unjqPgITut4JAoGAcjJeHxV9MtrJXj4LoCdMjksfyydq4CKoN2J8ZygTVRLR1I/3uT7TAP7tY23boc7/F1GSPLa2cFSa6+iR0zRJrhdWFJ1/20l4TNEQUWFmn8S8iJ/L+udwGg5rZq5L6Neua8liWLhnEwO5R8Lh13zRdNT7WMQxiuypaj2q79r1FbkCgYEArtIDnoofFTnbfHrU4e4BG7mDuQY77k0bYXzt7mGkM915f+MpO96f0Tz0+/rwRVrKpwq8nd2fWWwh4+Q6fRW7M0nbbUcfgZ2ZojJWUgU8/z12AcqGA/S1CoVTRpPYvFk1S7nYExdJuuVO3vaaPRWCc/3cwRJaIujENJtEU++tpiECgYEAuLi3BVGdc/hvDyncslQN/efVhJ/NvEZ6J93JC5Molsqp236tprcSwySSMpdIEVyWvooKGJcjSq30XCV0YS14vZFl23zmY9OqYE38NjUu2zh98bEayqtpp2IM0y9jjdnT1sSooNN6EGEi1BdrUjpIbYNzljTG5ItoQwvKnYceMu0=",
            
            //异步通知地址
            // 'notify_url' => "http://外网可访问网关地址/alipay.trade.page.pay-PHP-UTF-8/notify_url.php",
            'notify_url' => "https://f.800038.xyz/pay/notify/pay",

            //同步跳转
            // 'return_url' => "http://外网可访问网关地址/alipay.trade.page.pay-PHP-UTF-8/return_url.php",
            'return_url' => "https://f.800038.xyz/pay/ret/pay",

            //编码格式
            'charset' => "UTF-8",

            //签名方式
            'sign_type'=>"RSA2",

            //支付宝网关
            'gatewayUrl' => "https://openapi.alipaydev.com/gateway.do",

            //支付宝公钥,查看地址：https://openhome.alipay.com/platform/keyManage.htm 对应APPID下的支付宝公钥。
            'alipay_public_key' => "MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAml0sHLsgqi2W3iqCg5Sg4p3fKfsPIbibJ3NwoyI6fKbRKdSDu0qhBfWjDTSj1Vdgim26UgKFvDaIuM7PCwCew6X1y/DChMzBkWpzmZIxoCbfxvBHjlr/E8cbwCcPlgR2hIrkldcyWzl4nTNbjm1blpO2E1qfuTIIooGqi50bAIVu4bWSCKCgZNJCnU9YQfoDQkbWaG5NuP3hYTV7xsy3B+892JokCdldJJpuL8Wb5Jh0oK9keCeZ+jRUyQxabwld1XtE4SljCIGdgtaJ4WXk6Pq00+Y5vucnitQPvRxUzLhR+OODfqzyAsU6Iew2B6sn6fRe1YsXqrC6laL+kyGjcwIDAQAB",
        );

        $arr=$_POST;
        $alipaySevice = new \AlipayTradeService($config); 
        $alipaySevice->writeLog(var_export($_POST,true));
        $result = $alipaySevice->check($arr);

        /* 实际验证过程建议商户添加以下校验。
        1、商户需要验证该通知数据中的out_trade_no是否为商户系统中创建的订单号，
        2、判断total_amount是否确实为该订单的实际金额（即商户订单创建时的金额），
        3、校验通知中的seller_id（或者seller_email) 是否为out_trade_no这笔单据的对应的操作方（有的时候，一个商户可能有多个seller_id/seller_email）
        4、验证app_id是否为该商户本身。
        */
        if($result) {//验证成功
            /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
            //请在这里加上商户的业务逻辑程序代

            
            //——请根据您的业务逻辑来编写程序（以下代码仅作参考）——
            
            //获取支付宝的通知返回参数，可参考技术文档中服务器异步通知参数列表
            
            //商户订单号

            $out_trade_no = $_POST['out_trade_no'];

            //支付宝交易号

            $trade_no = $_POST['trade_no'];

            //交易状态
            $trade_status = $_POST['trade_status'];


            if($_POST['trade_status'] == 'TRADE_FINISHED') {

                //判断该笔订单是否在商户网站中已经做过处理
                    //如果没有做过处理，根据订单号（out_trade_no）在商户网站的订单系统中查到该笔订单的详细，并执行商户的业务程序
                    //请务必判断请求时的total_amount与通知时获取的total_fee为一致的
                    //如果有做过处理，不执行商户的业务程序
                        
                //注意：
                //退款日期超过可退款期限后（如三个月可退款），支付宝系统发送该交易状态通知
            }
            else if ($_POST['trade_status'] == 'TRADE_SUCCESS') {
                //判断该笔订单是否在商户网站中已经做过处理
                    //如果没有做过处理，根据订单号（out_trade_no）在商户网站的订单系统中查到该笔订单的详细，并执行商户的业务程序
                    //请务必判断请求时的total_amount与通知时获取的total_fee为一致的
                    //如果有做过处理，不执行商户的业务程序			
                //注意：
                //付款完成后，支付宝系统发送该交易状态通知
            }
            //——请根据您的业务逻辑来编写程序（以上代码仅作参考）——
            echo "success";	//请不要修改或删除
        }else {
            //验证失败
            echo "fail";

        }
    }
}