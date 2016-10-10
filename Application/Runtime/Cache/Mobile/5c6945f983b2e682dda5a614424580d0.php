<?php if (!defined('THINK_PATH')) exit();?><html>
<head>
<meta charset="utf-8">
<title>支付失败-<?php echo ($tpshop_config['shop_info_store_title']); ?></title>
<meta http-equiv="keywords" content="<?php echo ($tpshop_config['shop_info_store_keyword']); ?>" />
<meta name="description" content="<?php echo ($tpshop_config['shop_info_store_desc']); ?>" />
<link rel="stylesheet" href="/Template/mobile/new/Static/css/success_index.css" type="text/css">
</head>
<body>
<script src="/Public/js/jquery-1.10.2.min.js"></script>
<!--最顶部-->


 <!--------在线客服-------------->

 <!--------在线客服-------------->    
    <div class="order-header">
    	<div class="layout after">
        	<div class="fl">
            	<div class="logo pa-to-36 wi345">
                	<a href="/"><img src="<?php echo ($tpshop_config['shop_info_store_logo']); ?>" alt=""></a>
                </div>
            </div>
        	<div class="fr">
            	<div class="pa-to-36 progress-area">
                	<div class="progress-area-wd" style="display:none">我的购物车</div>
                	<div class="progress-area-tx" style="display:none">填写核对订单信息</div>
                	<div class="progress-area-cg">成功提交订单</div>
                </div>
            </div>
        </div>
    </div>
    <div class="layout after-ta order-ha">
    	<div class="erhuh">
        	<i class="icon-sucsa"></i>
            <h3 style="color:#e01d20">抱歉订单支付失败！</h3>
            <p class="succ-p">订单号：&nbsp;&nbsp;<?php echo ($order['order_sn']); ?>&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;付款金额（元）：&nbsp;&nbsp;<b><?php echo ($order['order_amount']); ?></b>&nbsp;<b>元</b></p>
            <div class="succ-tip">
            	你可以重新支付
            </div>
        </div>
        <div class="ddxq-xiaq">
        	<a href="<?php echo U('/Mobile/User/order_detail',array('id'=>$order['order_id']));?>">订单详情<i></i></a>
        </div>

    </div>
<!--------footer-开始-------------->

<!--------footer-结束-------------->    
</body>
</html>