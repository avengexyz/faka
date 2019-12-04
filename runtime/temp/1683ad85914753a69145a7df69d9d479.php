<?php /*a:1:{s:63:"C:\phpstudy_pro\WWW\WWW\application\admin\view\login\login.html";i:1572766456;}*/ ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>管理面板</title>
    <meta name="description" content="login page">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!--基本 样式-->
    <link href="/static/admin/style/bootstrap.css" rel="stylesheet">
    <link href="/static/admin/style/font-awesome.css" rel="stylesheet">
    <!--Beyond 样式-->
    <link id="beyond-link" href="/static/admin/style/beyond.css" rel="stylesheet">
    <link href="/static/admin/style/demo.css" rel="stylesheet">
    <link href="/static/admin/style/animate.css" rel="stylesheet">
</head>

<body>
    <div class="login-container animated fadeInDown">
        <form action="" method="post">
            <div class="loginbox bg-white">
                <div class="loginbox-title">SIGN IN</div>
                <div class="loginbox-textbox">
                    <input class="form-control" placeholder="账号" name="username" type="text">
                </div>
                <div class="loginbox-textbox">
                    <input class="form-control" placeholder="密码" name="password" type="password">
                </div>

                <div class="loginbox-textbox">
                    <input class="form-control" placeholder="验证码" name="code" type="text">
                    <img src="<?php echo captcha_src(); ?>" alt="captcha" onclick="this.src='<?php echo captcha_src(); ?>?'+Math.random();"  />
                </div>

                <div class="loginbox-submit">
                    <input class="btn btn-primary btn-block" value="登录" type="submit">
                </div>
            </div>
            <div class="logobox">
                <p class="text-center">管理面板4</p>
            </div>
        </form>
    </div>
    <!--基本 js-->
    <script src="/static/admin/style/jquery.js"></script>
    <script src="/static/admin/style/bootstrap.js"></script>
    <script src="/static/admin/style/jquery_002.js"></script>
    <!--Beyond js-->
    <script src="/static/admin/style/beyond.js"></script>




</body>

</html>