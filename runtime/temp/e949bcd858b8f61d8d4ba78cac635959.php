<?php /*a:5:{s:61:"C:\phpstudy_pro\WWW\WWW\application\admin\view\conf\conf.html";i:1574685393;s:63:"C:\phpstudy_pro\WWW\WWW\application\admin\view\common\head.html";i:1572934894;s:62:"C:\phpstudy_pro\WWW\WWW\application\admin\view\common\top.html";i:1572768546;s:63:"C:\phpstudy_pro\WWW\WWW\application\admin\view\common\left.html";i:1574874498;s:63:"C:\phpstudy_pro\WWW\WWW\application\admin\view\common\foot.html";i:1572934632;}*/ ?>
<!DOCTYPE html>
<html>

<head>
    <!-- 引入头部样式 -->
    <meta charset="utf-8">
<title>管理面板</title>
<meta name="description" content="Dashboard">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<!--基本 样式-->
<link href="/static/admin/style/bootstrap.css" rel="stylesheet">
<link href="/static/admin/style/font-awesome.css" rel="stylesheet">
<link href="/static/admin/style/weather-icons.css" rel="stylesheet">

<!--Beyond 样式-->
<link id="beyond-link" href="/static/admin/style/beyond.css" rel="stylesheet" type="text/css">
<link href="/static/admin/style/demo.css" rel="stylesheet">
<link href="/static/admin/style/typicons.css" rel="stylesheet">
<link href="/static/admin/style/animate.css" rel="stylesheet">

<script src="/static/admin/style/jquery-1.12.4.min.js"></script>


</head>

<body>
    <!-- 头部 -->
    <!-- 引入头部 -->
    <div class="navbar">
    <div class="navbar-inner">
        <div class="navbar-container">
            <!-- Logo -->
            <div class="navbar-header pull-left">
                <a href="#" class="navbar-brand">
                    <small>
                        <img src="/static/admin/images/logo.png" alt="">
                    </small>
                </a>
            </div>
            <!-- /Logo -->
            <!-- 折叠按钮 -->
            <div class="sidebar-collapse" id="sidebar-collapse">
                <i class="collapse-icon fa fa-bars"></i>
            </div>
            <!-- /折叠按钮 -->
            <!-- 账号及设置区域 -->
            <div class="navbar-header pull-right">
                <div class="navbar-account">
                    <ul class="account-area">
                        <li>
                            <a class="login-area dropdown-toggle" data-toggle="dropdown">
                                <div class="avatar" title="View your public profile">
                                    <img src="/static/admin/images/adam-jansen.jpg">
                                </div>
                                <section>
                                    <h2><span class="profile"><span><?php echo htmlentities(app('request')->session('username')); ?></span></span></h2>
                                </section>
                            </a>
                            <!--登陆及下拉菜单-->
                            <ul class="pull-right dropdown-menu dropdown-arrow dropdown-login-area">
                                <li class="username"><a>David Stevenson</a></li>
                                <li class="dropdown-footer">
                                    <a href="<?php echo url('admin/admin/logout'); ?>">
                                        退出登录
                                    </a>
                                </li>
                                <li class="dropdown-footer">
                                    <a href="<?php echo url('admin/admin/edit',['id'=>app('request')->session('id')]); ?>">
                                        修改密码
                                    </a>
                                </li>
                            </ul>
                            <!--/登陆及下拉菜单-->
                        </li>
                        <!-- /Account Area -->
                        <!--Note: notice that setting div must start right after account area list.
                        no space must be between these elements-->
                        <!-- Settings -->
                    </ul>
                </div>
            </div>
            <!-- /账号及设置区域 -->
        </div>
    </div>
</div>
    <!-- /头部 -->

    <div class="main-container container-fluid">
        <div class="page-container">

            <!-- 左边栏 -->
            <!-- 引入左边栏 -->
            <!-- 页面侧栏 -->
<div class="page-sidebar" id="sidebar">

        <!-- 左方搜索栏-->

        <!-- /左方搜索栏 -->

        <!-- 左方菜单 -->
        <ul class="nav sidebar-menu">
            <!--仪表盘-->
            <li class="active">
                <a href="<?php echo url('admin/index/index'); ?>">
                    <i class="menu-icon glyphicon glyphicon-home"></i>
                    <span class="menu-text"> 首页 </span>
                </a>
            </li>
            <!--仪表盘-->
            <li>
                <a href="#" class="menu-dropdown">
                    <i class="menu-icon fa fa-user"></i>
                    <span class="menu-text">管理员</span>
                    <i class="menu-expand"></i>
                </a>
                <ul class="submenu">
                    <li>
                        <a href="<?php echo url('admin/admin/list'); ?>">
                            <span class="menu-text">
                                管理列表 </span>
                            <i class="menu-expand"></i>
                        </a>
                    </li>
                </ul>
            </li>

            <li>
                <a href="#" class="menu-dropdown">
                    <i class="menu-icon fa fa-shopping-cart"></i>
                    <span class="menu-text">商品</span>
                    <i class="menu-expand"></i>
                </a>
                <ul class="submenu">
                    <li>
                        <a href="<?php echo url('admin/type/list'); ?>">
                            <span class="menu-text">
                                商品分类列表 </span>
                            <i class="menu-expand"></i>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo url('admin/goods/list'); ?>">
                            <span class="menu-text">
                                商品列表 </span>
                            <i class="menu-expand"></i>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo url('admin/card/list'); ?>">
                            <span class="menu-text">
                                卡密列表 </span>
                            <i class="menu-expand"></i>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo url('admin/order/list'); ?>">
                            <span class="menu-text">
                                订单列表 </span>
                            <i class="menu-expand"></i>
                        </a>
                    </li>
                </ul>
            </li>

            <li>
                <a href="#" class="menu-dropdown">
                    <i class="menu-icon fa fa-gear"></i>
                    <span class="menu-text">系统</span>
                    <i class="menu-expand"></i>
                </a>
                <ul class="submenu">
                    <li>
                        <a href="<?php echo url('admin/conf/conf'); ?>">
                            <span class="menu-text">
                                网站配置 </span>
                            <i class="menu-expand"></i>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo url('admin/paysel/list'); ?>">
                            <span class="menu-text">
                                支付配置 </span>
                            <i class="menu-expand"></i>
                        </a>
                    </li>
                </ul>
            </li>



        </ul>
        <!-- /左方菜单 -->
    </div>
    <!-- /页面侧栏 -->
            <!-- /左边栏 -->


            <!-- 页面内容容器 -->
            <div class="page-content">
                <!-- 页面面包屑导航 -->
                <div class="page-breadcrumbs">
                    <ul class="breadcrumb">
                        <li>
                            <a href="<?php echo url('admin/index/index'); ?>">主页</a>
                        </li>
                        <li class="active">网站配置</li>
                    </ul>
                </div>
                <!-- /页面面包屑导航 -->

                <!-- 页面内容 -->
                <div class="page-body">

                        <div class="row">
                            <div class="col-lg-12 col-sm-12 col-xs-12">
                                <div class="widget">
                                    <div class="widget-header bordered-bottom bordered-blue">
                                        <span class="widget-caption">编辑网站配置</span>
                                    </div>
                                    <div class="widget-body">
                                        <div id="horizontal-form">
                                            <form class="form-horizontal" role="form" action="" method="post" enctype="multipart/form-data">
                                                <input type="text"style="display:none" name='id' value="<?php echo htmlentities($list['id']); ?>">

                                                <div class="form-group">
                                                    <label for="username"
                                                        class="col-sm-2 control-label no-padding-right">网站名称</label>
                                                    <div class="col-sm-6">
                                                        <input class="form-control" id="username" placeholder=""
                                                            name="sitename"  type="text" value="<?php echo htmlentities($list['sitename']); ?>">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label for="username"
                                                        class="col-sm-2 control-label no-padding-right">网站关键字</label>
                                                    <div class="col-sm-6">
                                                        <textarea class="form-control" name="keywords" cols="30" rows="10"><?php echo htmlentities($list['keywords']); ?></textarea>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label for="username"
                                                        class="col-sm-2 control-label no-padding-right">网站描述</label>
                                                    <div class="col-sm-6">
                                                        <textarea class="form-control" name="desc" cols="30" rows="10"><?php echo htmlentities($list['desc']); ?></textarea>
                                                    </div>
                                                </div>
    
                                                <div class="form-group">
                                                    <label for="username"
                                                        class="col-sm-2 control-label no-padding-right">网站版权信息及备案号</label>
                                                    <div class="col-sm-6">
                                                        <input class="form-control" id="username" placeholder=""
                                                            name="info"  type="text" value="<?php echo htmlentities($list['info']); ?>">
                                                    </div>
                                                    <p class="help-block col-sm-4 red">* 不填则为原密码</p>
                                                </div>

                                                <div class="form-group">
                                                    <label for="username"
                                                        class="col-sm-2 control-label no-padding-right">网站logo</label>
                                                    <div class="col-sm-6">
                                                        <input class="form-control"  placeholder=""
                                                            name="logo"  type="file">
                                                        <img src="<?php echo htmlentities($list['logo']); ?>" alt="">  
                                                    </div>
                                                    <p class="help-block col-sm-4 red">* 不填则为原密码</p>
                                                </div>

                                                <div class="form-group">
                                                    <label for="username"
                                                        class="col-sm-2 control-label no-padding-right">前台模板</label>
                                                    <div class="col-sm-6">
                                                        <select name="tem" id="">
                                                            <option <?php if(($list['tem']==0)): ?>selected<?php endif; ?> value="0">模板1</option>
                                                            <option <?php if(($list['tem']==1)): ?>selected<?php endif; ?> value="1">模板2</option>
                                                        </select>
                                                    </div>
                                                    <p class="help-block col-sm-4 red">* 必填</p>
                                                </div>
    
                                                <div class="form-group">
                                                    <div class="col-sm-offset-2 col-sm-10">
                                                        <button type="submit" class="btn btn-default">编辑网站配置</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
    
                    </div>
            <!-- /页面内容 -->
        </div>
        <!-- /页面内容容器 -->
    </div>

</body>
<!-- 引入底部js -->
    <!--基本 js-->
    <script src="/static/admin/style/jquery_002.js"></script>
    <script src="/static/admin/style/bootstrap.js"></script>
    <script src="/static/admin/style/jquery.js"></script>
    <!--Beyond js-->
    <script src="/static/admin/style/beyond.js"></script>

    
</html>