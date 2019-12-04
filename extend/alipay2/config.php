<?php
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
