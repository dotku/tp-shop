<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html >
<html>
<head>
<meta name="Generator" content="tpshop" />
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width">
<title>购物流程-<?php echo ($tpshop_config['shop_info_store_title']); ?></title>
<meta http-equiv="keywords" content="<?php echo ($tpshop_config['shop_info_store_keyword']); ?>" />
<meta name="description" content="<?php echo ($tpshop_config['shop_info_store_desc']); ?>" />
<meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=0"/>
<link rel="stylesheet" href="/Template/mobile/new/Static/css/public.css">
<link rel="stylesheet" href="/Template/mobile/new/Static/css/flow.css">
<link rel="stylesheet" href="/Template/mobile/new/Static/css/style_jm.css">
<script type="text/javascript" src="/Template/mobile/new/Static/js/jquery.js"></script>
<script src="/Public/js/global.js"></script>
<script src="/Public/js/mobile_common.js"></script>
<script src="/Template/mobile/new/Static/js/common.js"></script>
</head>
<body style="background: rgb(235, 236, 237);position:relative;">
<div class="tab_nav">
  <div class="header">
    <div class="h-left"> <a class="sb-back" href="javascript:history.back(-1)" title="返回"></a> </div>
    <div class="h-mid"> 确认订单 </div>
  </div>
</div>
<div class="screen-wrap fullscreen login"> 
<form name="cart2_form" id="cart2_form" method="post">
    <section class="content" style="min-height: 294px;">
    <div class="wrap">
    <div class="active" style="min-height: 294px;">
    <div class="content-buy">
    <div class="wrap order-buy">
    <a href="<?php echo U('User/address_list',array('source'=>'cart2'));?>">
	    <section class="address">
	      <div class="address-info" >收货人:
	        <p class="address-name"><?php echo ($address["consignee"]); ?></p>
	        <p class="address-phone"><?php echo ($address["mobile"]); ?></p>
	      </div>
	      <div class="address-details">收货地址：<?php echo ($address["address"]); ?></div>
          <input type="hidden" value="<?php echo ($address["address_id"]); ?>" name="address_id" />
	    </section>
    </a>
    <section class="order " id="order4">
      <div  class="order-info" style="margin-top:0;">
      <!--
        	<h4 class="seller-name" > <img src="/Template/mobile/new/Static/images/flow/dingdan.png" width="28"> 
        		订单详情 <a class="modify" href="<?php echo U('Cart/cart');?>">修改</a></h4>
      -->          
      </div>
      <section class="order-info" style=" margin-top:0px;">
        <div class="order-list">
          <div class="goods-list-title"> 网站自营</div>
          <ul class="order-list-info">
           <?php if(is_array($cartList)): foreach($cartList as $k=>$v): if($v[selected] == '1'): ?><li class="item" >
              <div class="itemPay list-price-nums" id="itemPay17">
                <p class="price">￥<?php echo ($v["member_goods_price"]); ?>元</p>
                <p class="nums">x<?php echo ($v["goods_num"]); ?></p>
              </div>
              <div class="itemInfo list-info" id="itemInfo12">
                <div class="list-img"> <a href="<?php echo U('Mobile/Goods/goodsInfo',array('id'=>$v[goods_id]));?>"> <img src="<?php echo (goods_thum_images($v["goods_id"],200,200)); ?>"></a> </div>
                <div class="list-cont">
                  <h5 class="goods-title"><?php echo ($v["goods_name"]); ?> </h5>
                  <p class="godds-specification"><?php echo ($v["spec_key_name"]); ?></p>
                </div>
              </div>
            </li><?php endif; endforeach; endif; ?>
            <li class="flow_youhui_no">如果是会员<font color=red></font>，可以享受会员折扣价</li>
            <li class="flow_youhui_no">
              <div class="checkout_other">
                <div class="jmbag" href="javascript:void(0);" onClick="showCheckoutOther(this);"><span class="right_arrow_flow"></span>使用优惠券</div>
                <table class="subbox_other sub_bonus" width="100%">
                  <tr>
                    <td  colspan="2">
                    <input type="radio" class="radio vam ma-ri-10" name="couponTypeSelect" checked value="1"  onClick="ajax_order_price();" />
                     <select id="coupon_id" name="coupon_id" class="vam ou-no" onChange="ajax_order_price();">                                                     
                         <option value="0">选择优惠券</option>
                          <?php if(is_array($couponList)): foreach($couponList as $k=>$v): ?><option value="<?php echo ($v['id']); ?>"><?php echo ($v['name']); ?></option><?php endforeach; endif; ?>   
                     </select>                    
                    </td>
                    <td>
                    &nbsp;或 &nbsp;
                    <input type="radio" class="radio vam ma-ri-10" name="couponTypeSelect"  value="2"  onClick="ajax_order_price();javascript:document.getElementById('Bonus_span_0').style.display='block';" />
                    <a href="javascript:void(0);"  class="a_other1_h" id="Bonus_a_0">直接输入优惠券号</a>
                    </td>
                    <td>
                      <label id="Bonus_span_0" style="display:none;">
                        <input name="couponCode" id="bonus_sn_0" type="text"   value="" placeholder="输入优惠券"  class="txt1" style="width:100px;"/>
                        <input name="validate_bonus" type="button" value="使用" onClick="ajax_order_price();" class="BonusButton" />
                      </label>
                    </td>
                  </tr>
                </table>
              </div>
            </li>
            <li class="flow_youhui_no">
       			<label id="Bonus_span_0">
       			   使用余额：
                   <input id="user_money" name="user_money"  type="text"   placeholder="输入余额" onpaste="this.value=this.value.replace(/[^\d]/g,'')" onKeyUp="this.value=this.value.replace(/[^\d]/g,'')" class="txt1" style="width:100px;"/>
                   <input name="validate_bonus" type="button" value="使用" onClick="ajax_order_price();" class="BonusButton" />
                 	您的可用余额<em><?php echo ($user['user_money']); ?></em>
                 </label>
            </li>
            
            <li class="flow_youhui_no">
       			<label id="Bonus_span_0">
       			   使用积分：
                   <input id="pay_points" name="pay_points" type="text"   placeholder="输入积分"  onpaste="this.value=this.value.replace(/[^\d]/g,'')" onKeyUp="this.value=this.value.replace(/[^\d]/g,'')" class="txt1" style="width:100px;"/>
                   <input name="validate_bonus" type="button" value="使用" onClick="ajax_order_price();" class="BonusButton" />
                 	您的可用积分<em><?php echo ($user['pay_points']); ?></em>
                 </label>
            </li>
          </ul>
        </div>
      </section>
    </section>
      <section class="order-info">
          <div class="order-list">
            <div class="content ptop0">
              <div class="panel panel-default info-box">
                <div class="panel-body" id="pay_div"  >
                  <div class="title" id="zhifutitle" style="border-bottom:1px solid #eeeeee;"> 
                  	<span class="i-icon-arrow-down i-icon-arrow-up" id="zhifuip"></span>
                   	<span class="text">配送方式</span>  
                   	<em class="qxz" id="emzhifu">请选择配送方式</em> 
                  </div>
                   <ul class="nav nav-list-sidenav" id="zhifu68" style="display:block; border-bottom:none;">
                   <?php if(is_array($shippingList)): foreach($shippingList as $k=>$v): ?><li class="clearfix" name="payment_name">
                      <label>
                      <input type="radio" id="<?php echo ($v["code"]); ?>" name="shipping_code" id="<?php echo ($v["code"]); ?>" value="<?php echo ($v["code"]); ?>"  <?php if($k == 0): ?>checked="checked"<?php endif; ?> onclick="ajax_order_price()" class="c_checkbox_t"/>
                      <div class="fl shipping_title"> <?php echo ($v["name"]); ?> <em>(<?php echo ($v["desc"]); ?>)</em></div>
                      </label>
                    </li><?php endforeach; endif; ?>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </section>
   <section class="order-info">
    <div class="order-list">
      <div class="content ptop0">
        <div class="panel panel-default info-box">
          <div class="orderInfo " >
            <h4 class="seller-name"> <img src="/Template/mobile/new/Static/images/flow/dingdan.png" width="28"> 其他选项 </h4>
          </div>
          <table border=0 cellpadding=0 cellspacing=0 width="100%" class="checkgoods">
            <tr>
              <td colspan=4 class="tdother2" style="border-top:none;"><div class="checkout_other" >
                  <div class="jmbag" href="javascript:void(0);" onClick="showCheckoutOther(this);"><span class="right_arrow_flow"></span>开发票和缺货处理</div>
                  <div class="subbox_other" width="100%">
                    <table id='normal_invoice_tbody' width="100%">
                      <tr>
                        <td align=right style="vertical-align:top" width="84">发票抬头：</td>
                        <td colspan="2">
                          <input class="txt1" style='vertical-align:middle' type="text" name="invoice_title" placeholder="XXX单位 或 XX个人" />
                        </td>
                      </tr>                      
                    </table>                     
                  </div>
                </div>
                </td>
            </tr>                                   
          </table>
        	<div style="height:10px; line-height:10px; clear:both;"></div>
        </div></div></div>
        </section>
        <section class="order-info">
        <div class="order-list">
          <div class="content ptop0">
            <div class="panel panel-default info-box">
              <div class="con-ct fo-con">
                <ul class="ct-list order_total_ul" id="ECS_ORDERTOTAL" >
                  <li class="order_total_li" > 
                  		*该订单完成后，您将获得 <span class="price">相应的</span> 积分<br/>
                  </li>
                  <li>
                   <div class="subtotal">
                      <span class="total-text">商品总额：</span><em class="price">￥<?php echo ($total_price["total_fee"]); ?>元</em><br/>
                      <span class="total-text">配送费用：</span>￥<em class="price" id="postFee"><?php echo ($total_price["shipping_price"]); ?></em>元<br/>
                      <span class="total-text">使用优惠券：</span>-&nbsp;¥&nbsp;<em class="price" id="couponFee">0</em>元<br/>
                      <span class="total-text">使用积分：</span>-&nbsp;¥&nbsp;<em class="price" id="pointsFee">0</em>元<br/>
                      <span class="total-text">使用余额：</span>-&nbsp;¥&nbsp;<em class="price" id="balance">0</em>元<br/>
                      <span class="total-text">优惠活动：</span>-&nbsp;¥&nbsp;<em class="price" id="order_prom_amount">0</em>元<br/>                      
                      <span class="total-text">应付金额：</span>￥<strong class="price_total" id="payables">0</strong>元
                      <span class="total-text" style=""></span> 
                   </div>
                  </li>
                </ul>
              </div>
              <div class="panel panel-default info-box">
                <div class="pay-btn">
                  <input onClick="submit_order();" type="button" class="sub-btn btnRadius" value="提交订单"/>
                </div>
              </div>
            </div>
            </div>
            </div>
         </section>
         </div>
        </div>
      </div>
    </div>
 	</section>
  </form>
  </div>
<section class="f_mask" style="display: none;"></section>
<!--
<div class="footer" >
	      <div class="links"  id="TP_MEMBERZONE"> 
	      		<?php if($user_id > 0): ?><a href="<?php echo U('User/index');?>"><span><?php echo ($user["nickname"]); ?></span></a><a href="<?php echo U('User/logout');?>"><span>退出</span></a>
	      		<?php else: ?>
	      		<a href="<?php echo U('User/login');?>"><span>登录</span></a><a href="<?php echo U('User/reg');?>"><span>注册</span></a><?php endif; ?>
	      		<a href="#"><span>反馈</span></a><a href="javascript:window.scrollTo(0,0);"><span>回顶部</span></a>
		  </div>
	      <ul class="linkss" >
		      <li>
		        <a href="#">
		        <i class="footerimg_1"></i>
		        <span>客户端</span></a></li>
		      <li>
		      <a href="javascript:;"><i class="footerimg_2"></i><span class="gl">触屏版</span></a></li>
		      <li><a href="<?php echo U('Home/Index/index');?>" class="goDesktop"><i class="footerimg_3"></i><span>电脑版</span></a></li>
	      </ul>
	  	 <p class="mf_o4">备案号:<?php echo ($tpshop_config['shop_info_record_no']); ?><br/>&copy; 2005-2016 TPshop多商户V1.2 版权所有，并保留所有权利。</p>
</div>
-->
<script type="text/javascript">

    $(document).ready(function(){
        ajax_order_price(); // 计算订单价钱
    });

// 获取订单价格
function ajax_order_price()
{
    $.ajax({
        type : "POST",
        url:'/index.php?m=Mobile&c=Cart&a=cart3&act=order_price&t='+Math.random(),
        data : $('#cart2_form').serialize(),
        dataType: "json",
        success: function(data){

            if(data.status != 1)
            {
                alert(data.msg);
                // 登录超时
                if(data.status == -100)
                    location.href ="<?php echo U('Mobile/User/login');?>";

                return false;
            }
            // console.log(data);
            $("#postFee").text(data.result.postFee); // 物流费
            $("#couponFee").text(data.result.couponFee);// 优惠券
            $("#balance").text(data.result.balance);// 余额
            $("#pointsFee").text(data.result.pointsFee);// 积分支付
            $("#payables").text(data.result.payables);// 应付
			$("#order_prom_amount").text(data.result.order_prom_amount);// 订单 优惠活动 									
        }
    });
}

// 提交订单
ajax_return_status = 1; // 标识ajax 请求是否已经回来 可以进行下一次请求
function submit_order()
{
	if(ajax_return_status == 0)
	    return false;
		
	ajax_return_status = 0;	
	
    $.ajax({
        type : "POST",
        url:"<?php echo U('Mobile/Cart/cart3');?>",//+tab,
        data : $('#cart2_form').serialize()+"&act=submit_order",// 你的formid
        dataType: "json",
        success: function(data){

            if(data.status != '1')
            {
                alert(data.msg); //执行有误
                // 登录超时
                if(data.status == -100)
                    location.href ="<?php echo U('Mobile/User/login');?>";
					
				ajax_return_status = 1; // 上一次ajax 已经返回, 可以进行下一次 ajax请求							

                return false;
            }
            // console.log(data);
            $("#postFee").text(data.result.postFee); // 物流费
            $("#couponFee").text(data.result.couponFee);// 优惠券
            $("#balance").text(data.result.balance);// 余额
            $("#pointsFee").text(data.result.pointsFee);// 积分支付
            $("#payables").text(data.result.payables);// 应付
			$("#order_prom_amount").text(data.result.order_prom_amount);// 订单 优惠活动 									
            alert('订单提交成功，跳转支付页面!');
            location.href = "/index.php?m=Mobile&c=Cart&a=cart4&order_id="+data.result;
        }
    });
}
</script>
</body>
</html>