<?php /*a:1:{s:61:"C:\phpstudy_pro\WWW\WWW\application\index\view\index\sel.html";i:1574878736;}*/ ?>
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
        <h2 id="h2">卡密列表</h2>
        <p>说明:</p>
        <p>如您已付款,但是提取卡密显示未付款</p>
        <p>请凭订单号联系客服</p>
        <form action="" method="post">
        <input type="text" name='order' id="orderinput">
        <div id="submit"><input id="buysubmit" type="submit" value="输入订单号，提取卡密"></div>
        </form>
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
<script>
        $(function(){
            $('#buysubmit').click(function(){
                data = $("form").serialize();
                // console.log(data)
                $.ajax({
                    type:'post',
                    url:"<?php echo url('index/index/selpost'); ?>",
                    data:data,
                    dataType:"json", 
                    success:function(data){
                        // console.log(data)

                        $.each(data,function(i,item){
                            $('#h2').after("<h2>"+item.card+"</h2>");
                            
                        })
                 
                    }
                })
                return false
            })
        })
</script>
</html>