<?php /*a:1:{s:64:"C:\phpstudy_pro\WWW\WWW\application\index\view\index\return.html";i:1574878730;}*/ ?>
<!DOCTYPE html>
<html lang="zh">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo htmlentities($conf['sitename']); ?></title>
    <meta name="keywords" content="<?php echo htmlentities($conf['keywords']); ?>">
    <meta name="Description" content="<?php echo htmlentities($conf['desc']); ?>">
    <link rel="stylesheet" href="/static/index/tem1/style/index.css">
    <script src="/static/index/tem1/style/jquery-1.12.4.min.js"></script>
</head>
<body>
    <div id="top">
        <div id="topbar">
            <div id="topleft">
                    <img src="<?php echo htmlentities($conf['logo']); ?>" alt="">
            </div>
            <div id="topright">
                <a href="<?php echo url('index/index/sel'); ?>">订单查询</a>
            </div>
        </div>
    </div>
   
    <div id="order">
        <h1>订单信息</h1>
        <h2>订单号:<?php echo htmlentities($data); ?></h2>
        <p>说明:请勿关闭此页面</p>
        <p>您的订单已支付完成,因支付宝收款有延迟,请复制或截图保存此订单号.</p>
        <p>保存后可在右上角查询订单以提取卡密,或者提取卡密失败联系客服人员.</p>
    </div>

 


    <div id="msg">
        <div id="msg_title">
            <h1>提示信息</h1>
        </div>
        <div id="msg_content">
            <h1 style="color: red;font-size: 16px;" id="msg_msg">提示信息</h1>
            <input id="msg_submit" type="button" value="确认">
        </div>
    </div>

</body>
</html>