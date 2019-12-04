<?php /*a:1:{s:77:"/www/wwwroot/test.800038.xyz/WWW/application/index/view/index/tem1/index.html";i:1573646133;}*/ ?>
<!DOCTYPE html>
<html lang="zh">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <meta name="keywords" content="lalala">
    <meta name="Description" content="lalala">
    <link rel="stylesheet" href="/static/index/tem1/style/index.css">
    <script src="/static/index/tem1/style/jquery-1.12.4.min.js"></script>
</head>

<body>
    <div id="top">
        <div id="topbar">
            <div id="topleft">
                <img src="/static/index/tem1/images/logo.png" alt="">
            </div>
            <div id="topright">
                <a href="javascript:void(0);" onclick="fn()">订单查询</a>
                <a href="https://www.baidu.com" οnclick="return false;">联系客服</a>
            </div>
        </div>
    </div>
    <form action="<?php echo url('index/alipay/pay'); ?>" method="post" >
    <div id="shop">
        <div id="shopleft">
            <div id="spk">
                <div id="xzsp">
                    <h5>选择商品</h5>
                </div>
                <div>
                    <h6>商品分类</h6>
                    <select name="" id="type">
                        <option value="" selected='selected'>请选择分类</option>
                        <?php if(is_array($type) || $type instanceof \think\Collection || $type instanceof \think\Paginator): $i = 0; $__LIST__ = $type;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$type): $mod = ($i % 2 );++$i;?>
                        <option value="<?php echo htmlentities($type['id']); ?>"><?php echo htmlentities($type['typename']); ?></option>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                    </select>
                </div>
                <div>
                    <h6>商品名称</h6>
                    <select name='goods' id="goods">
                        <option value="">请选择商品</option>
                    </select>
                </div>
                <div>
                    <h6>商品单价</h6>
                    <span id="price" style="color:red;font-size: 18px;">0.00</span>
                    <span>元</span>
                </div>
                <div>
                    <h6>商品库存</h6>
                    <span id='stock'>0.00</span>
                    <span>个</span>
                </div>
                <div>
                    <h6>购买数量</h6>
                    <input type="text" id="count" name='count'>
                </div>
                <div>
                    <h6>联系方式</h6>
                    <input type="text" name='tel'>
                </div>
                <div>
                    <h6>接收邮箱</h6>
                    <input type="text" name='email'>
                </div>
                <div id="money">
                    <h6>您应付总额为</h6>
                    <span id="paymoney" style="color:red; font-size: 18px;">0.00</span>
                    <h6>元</h6>
                </div>
            </div>
        </div>
        <div id="shopright">
            <div id="sdxx">
                <div id="sdxxk">
                    <h5 id="sdxxkk">商店信息</h5>
                </div>
                <div>
                    <h6>详情介绍</h6>
                    <p id="desc">这个小店主营巴拉巴拉</p>
                </div>
            </div>
        </div>
    </div>

    <div id="pay">
        <div id="paysel">
            <h6>支付方式</h6>
            <ul>
                <li>
                    <input type="radio" name='paysel' value='alipay'>
                    <img src="/static/index//img/newali.png" alt="">
                </li>
                <li>
                    <input type="radio" name='paysel' value='wx'>
                    <img src="/static/index//img/newali.png" alt="">
                </li>

            </ul>
            <div id="submit"><input id="buysubmit" type="submit" value="选择支付方式，进行购买"></div>
        </div>
    </div>
</form>
    <div id="footer">
        <h6>版权内容</h6>
    </div>

</body>
<script>
        $(function(){
            //商品类型一变化 请求商品列表数据
            $('#type').change(function(){
                $('#sdxxkk').html('商品信息')
                $('#desc').html('')
                $.ajax({
                    type:'post',
                    url:"<?php echo url('index/index/getgoods'); ?>",
                    data:{'typeid':$('#type').val()},
                    dataType:"json",
                    success:function(data){
                        // console.log(data)
                        var option=$("<option></option>");
                        $(option).val("0");
                        $(option).html("请选择商品");
                        $('#goods').html(option);
                        $.each(data,function(i,item){
                            var option=$("<option></option>");
                            $(option).val(item.id);
                            $(option).html(item.goodname);
                            $('#goods').append(option)
                        })
                    }
                    
                })
            });

            //商品一变化请求价格等商品详细数据
            $('#goods').change(function(){
                $.ajax({
                    type:'post',
                    url:"<?php echo url('index/index/getgood'); ?>",
                    data:{'goodsid':$('#goods').val()},
                    dataType:"json",
                    success:function(data){
                        // console.log(data)
                        // console.log(data.goodcount)
                        $('#price').html(data.goodprice)
                        $('#stock').html(data.goodcount-data.goodsold)
                        $('#desc').html(data.gooddesc)
                    }
                    
                })
            });

            //数量一变化 计算价格
            $('#count').change(function(){
                // console.log($('#count').val())
                // console.log($('#price').html())
                var paymoney = $('#count').val()*$('#price').html()
                // console.log(paymoney.toFixed(2))
                $('#paymoney').html(paymoney.toFixed(2))
            });

            //表单验证
            $('#buysubmit').click(function(){
                data = $("form").serialize();
                console.log(data)
                $.ajax({
                    type:'post',
                    url:'<?php echo url('pay/pay/pay'); ?>',
                    data:data,
                    dataType:'json',
                    success:function(data){
                        console.log(data)
                    }

                })

                return false

            })




        });   

    </script>
</html>