<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>成功提交订单-<?php echo ($tpshop_config['shop_info_store_title']); ?></title>
<meta http-equiv="keywords" content="<?php echo ($tpshop_config['shop_info_store_keyword']); ?>" />
<meta name="description" content="<?php echo ($tpshop_config['shop_info_store_desc']); ?>" />
</head>
<body>
<script src="/Public/js/jquery-1.8.2.min.js"></script>    
<script src="/Public/js/global.js"></script>
<script src="/Public/js/pc_common.js"></script>
<script src="/Public/js/layer/layer.js"></script><!-- 弹窗js 参考文档 http://layer.layui.com/-->
<link rel="stylesheet" href="/Template/pc/default/Static/css/index.css" type="text/css">
<div class="site-topbar">
    <div class="layout">
        <div class="t1-l">
            <ul class="t1-l-ul">
                <li class="t1font"><a target="_blank" href="<?php echo U('/Home/Article/detail',array('article_id'=>22));?>">在线客服</a></li>
                <li class="t1img">&nbsp;</li>
                <li class="t1font"><a href="javascript:void();">TPshop</a></li>
                <li class="t1img">&nbsp;</li>
            </ul>
        </div>
        <div class="t1-r">
            <ul class="t1-r-ul islogin" style="display:none;">
                <li class="t1font"> <a href="<?php echo U('Home/User/index');?>" class="logon userinfo"></a></li>
                <li class="t1img"><a href="<?php echo U('Home/user/logout');?>">安全退出</a></li>                    
                <li class="t1img">&nbsp;</li>
                <li class="t1img">&nbsp;</li>                
                <li class="t1font"><a href="<?php echo U('Home/User/order_list');?>">我的订单</a></li>
                <li class="t1img">&nbsp;</li>
                <li class="t1font"><a href="<?php echo U('Home/Cart/cart');?>">购物车</a></li>
                <li class="t1img">&nbsp;</li>
                <li class="t1font"><a href="#">网站地图</a></li>
                <li class="t1img">&nbsp;</li>                
            </ul>
            <ul class="t1-r-ul nologin" style="display:none;">
                <li class="t1font"><a href="<?php echo U('Home/user/login');?>">登录</a></li>
                <li class="t1img">&nbsp;</li>
                <li class="t1font"><a href="<?php echo U('Home/Cart/cart');?>">购物车</a></li>
                <li class="t1img">&nbsp;</li>
                <li class="t1font"><a href="#">网站地图</a></li>
                <li class="t1img">&nbsp;</li> 
            </ul>
        </div>
    </div>
</div>    
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
        	<i class="icon-succ"></i>
            <h3>订单提交成功，请您尽快付款！</h3>
            <p class="succ-p">
            订单号：&nbsp;&nbsp;<?php echo ($order['order_sn']); ?>&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;
            付款金额（元）：&nbsp;&nbsp;<b><?php echo ($order['order_amount']); ?></b>&nbsp;<b>元</b></p>
            <div class="succ-tip">
            	请您在&nbsp;&nbsp;<b><?php echo ($pay_date); ?></b>&nbsp;完成支付，否则订单将自动取消
            </div>
        </div>
        <div class="ddxq-xiaq">
        	<a href="<?php echo U('Home/User/order_detail',array('id'=>$order['order_id']));?>">
            	订单详情
                <i></i>
            </a>
        </div>
        <form action="<?php echo U('Home/Payment/getCode');?>" method="post" name="cart4_form" id="cart4_form">
        <div class="orde-sjyy">
        	<h3 class="titls">选择支付方式</h3>
            <div class="bsjy-g">
            	<dl>
            		<dd>
						
						<div class="order-payment-area">
                        	<div class="dsfzfpte">
                            	<b>选择支付方式</b>                               
                            </div>
                            <div class="po-re dsfzf-ee">
                            	<ul>
                                <?php if(is_array($paymentList)): foreach($paymentList as $k=>$v): ?><li>
                                    	<div class="payment-area">
                                        	<input type="radio" id="input-ALIPAY-1" value="pay_code=<?php echo ($v['code']); ?>" class="radio vam" name="pay_radio" >
                                            <label for="">
                                            	<img src="/plugins/<?php echo ($v['type']); ?>/<?php echo ($v['code']); ?>/<?php echo ($v['icon']); ?>" width="120" height="40" onClick="change_pay(this);" />
                                            </label>
                                        </div>
                                    </li><?php endforeach; endif; ?>                                                            		 
                            	</ul>
                            </div>
                        </div>  
                        
                    <!--第三方网银支付 start-->
                      <?php if(is_array($bankCodeList)): foreach($bankCodeList as $k=>$v): ?><div class="order-payment-area">
                        	<div class="dsfzfpte">
                                    <b><?php echo ($paymentList[$k]['name']); ?></b>
                                    <em>网银支付</em>
                                </div>
                            <div class="po-re dsfzf-ee">
                                    <ul>
				                      <?php if(is_array($v)): foreach($v as $k2=>$v2): ?><li>
                                            <div class="payment-area">
                                                <input type="radio" name="pay_radio" class="radio vam" value="pay_code=<?php echo ($k); ?>&bank_code=<?php echo ($v2); ?>" id="input-ALIPAY-1">
                                                <label for="">
                                            	<img src="/Template/pc/default/Static/images/images-out/<?php echo ($bank_img[$k2]); ?>" width="120" height="40" onClick="change_pay(this);"/>
                                                </label>
                                            </div>
                                        </li><?php endforeach; endif; ?>                                                           
                                    </ul>
                            </div> 
                        </div><?php endforeach; endif; ?>                   
                    <!--第三方网银支付 end -->
                                                             	
                    </dd>
            	</dl>
                <div class="order-payment-action-area">                    
                    <a class="button-style-5 button-confirm-payment" href="javascript:void(0);" onClick="$('#cart4_form').submit();" >确认支付方式</a>
                </div>
            </div>
        </div>
        <input type="hidden" name="order_id" value="<?php echo ($order['order_id']); ?>" />
       </form>
    </div>
<script>
$(document).ready(function(){
	 $("input[name='pay_radio']").first().trigger('click');
});
// 切换支付方式
function change_pay(obj)
{
	$(obj).parent().siblings('input[name="pay_radio"]').trigger('click');
}
</script>    
<!--------footer-开始-------------->
<div class="footer">
    <div class="layout quality layer">
        <ul class="footer_quality">
            <li><i></i>品质保证</li>
            <li  class="f2"><i></i>7天退换 15天换货</li>
            <li  class="f3"><i></i>100元起免运费</li>
            <li  class="f4"><i></i>448家维修网点 全国联保</li>
        </ul>
    </div>
    <div class="helpful layout">
    <?php
 $md5_key = md5("select * from `__PREFIX__article_cat` where cat_id in(1,2,3,4,7)"); $sql_result_v = S("sql_".$md5_key); if(empty($sql_result_v)) { $Model = new \Think\Model(); $result_name = $sql_result_v = $Model->query("select * from `__PREFIX__article_cat` where cat_id in(1,2,3,4,7)"); S("sql_".$md5_key,$sql_result_v,TPSHOP_CACHE_TIME); } foreach($sql_result_v as $k=>$v): ?><dl <?php if($k != 0): ?>class="jszc"<?php endif; ?> >
                <dt><?php echo ($v[cat_name]); ?></dt>
                <dd>
                    <ol>
                    	<?php
 $md5_key = md5("select * from `__PREFIX__article` where cat_id = $v[cat_id] and is_open=1"); $sql_result_v2 = S("sql_".$md5_key); if(empty($sql_result_v2)) { $Model = new \Think\Model(); $result_name = $sql_result_v2 = $Model->query("select * from `__PREFIX__article` where cat_id = $v[cat_id] and is_open=1"); S("sql_".$md5_key,$sql_result_v2,TPSHOP_CACHE_TIME); } foreach($sql_result_v2 as $k2=>$v2): ?><li><a href="<?php echo U('Home/Article/detail',array('article_id'=>$v2[article_id]));?>" target="_blank"><?php echo ($v2[title]); ?></a></li><?php endforeach; ?>                        
                    </ol>
                </dd>
            </dl><?php endforeach; ?>
     </div>
     <div class="keep-on-record">
        <p>
        Copyright © 2016-2025 <?php echo ($tpshop_config['shop_info_store_name']); ?>  版权所有 保留一切权利 备案号:<?php echo ($tpshop_config['shop_info_record_no']); ?>
        
        <!--您好,请您给TPshop留个友情链接-->
        &nbsp;&nbsp;<a href="http://www.tp-shop.cn/">TPshop开源商城</a>
        <!--您好,请您给TPshop留个友情链接-->
        </p>
     </div>
 </div>
 

<!--------footer-结束-------------->
</body>
</html>