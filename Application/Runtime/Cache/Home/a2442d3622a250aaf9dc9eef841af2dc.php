<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html>
<html>
<head>
<meta content="IE=edge" http-equiv="X-UA-Compatible">
<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
<meta content="zh-cn" http-equiv="content-language">
<meta name="renderer" content="webkit|ie-comp|ie-stand" />
<meta http-equiv="Cache-control" content="public" max-age="no-cache" />
<title>首页-<?php echo ($tpshop_config['shop_info_store_title']); ?></title>
<meta http-equiv="keywords" content="<?php echo ($tpshop_config['shop_info_store_keyword']); ?>" />
<meta name="description" content="<?php echo ($tpshop_config['shop_info_store_desc']); ?>" />
</head>
<body>
<script type="text/javascript" src="/Public/js/jquery-1.10.2.min.js"></script>
<script src="/Public/js/global.js"></script>
<script src="/Public/js/layer/layer.js"></script> 
<link rel="stylesheet" type="text/css" href="/Template/pc/soubao/Static/css/common.min.css">
<link rel="stylesheet" type="text/css" href="/Template/pc/soubao/Static/css/main.min.css">
<div class="fn-cms-top">
<?php $pid =1;$ad_position = M("ad_position")->cache(true,TPSHOP_CACHE_TIME)->getField("position_id,position_name,ad_width,ad_height");$result = D("ad")->where("pid=$pid  and enabled = 1 and start_time < 1475222400 and end_time > 1475222400 ")->order("orderby desc")->cache(true,TPSHOP_CACHE_TIME)->limit("1")->select(); if(!in_array($pid,array_keys($ad_position)) && $pid) { M("ad_position")->add(array( "position_id"=>$pid, "position_name"=>CONTROLLER_NAME."页面自动增加广告位 $pid ", "is_open"=>1, "position_desc"=>CONTROLLER_NAME."页面", )); delFile(RUNTIME_PATH); } $c = 1- count($result); if($c > 0 && $_GET[edit_ad]) { for($i = 0; $i < $c; $i++) { $result[] = array( "ad_code" => "/Public/images/not_adv.jpg", "ad_link" => "/index.php?m=Admin&c=Ad&a=ad&pid=$pid", "title" =>"暂无广告图片", "not_adv" => 1, "target" => 0, ); } } foreach($result as $key=>$v): $v[position] = $ad_position[$v[pid]]; if($_GET[edit_ad] && $v[not_adv] == 0 ) { $v[style] = "filter:alpha(opacity=50); -moz-opacity:0.5; -khtml-opacity: 0.5; opacity: 0.5"; $v[ad_link] = "/index.php?m=Admin&c=Ad&a=ad&act=edit&ad_id=$v[ad_id]"; $v[title] = $ad_position[$v[pid]][position_name]."===".$v[ad_name]; $v[target] = 0; } ?><div fnp="m-top-banner" style="background:<?php echo ($v["bgcolor"]); ?>;" class="m-top-banner rel editable" moduleId="2010053" style="position:relative;min-height:35px;">
	 <div class="bar container">
	 	<a class="img-small" <?php if($v['target'] == 1): ?>target="_blank"<?php endif; ?> href="<?php echo ($v["ad_link"]); ?>"> <img class="img100" src="<?php echo ($v[ad_code]); ?>"  title="<?php echo ($v[title]); ?>" style="<?php echo ($v[style]); ?>"/></a>   
	 </div>
	 <i data-role="close" class="icon icon-close"></i>
</div><?php endforeach; ?>
<div class="m-top-bar editable" moduleId="1539923" style="position:relative;min-height:25px;">
  <div class="container">
    <ul class="fl">
      <li class="fl J_login_status dn nologin">
      	<a class="menu-item fl J_do_login J_chgurl" href="<?php echo U('Home/user/login');?>">
        <span>Hi，请登录</span> </a><a class="menu-item fl ht" href="<?php echo U('Home/user/reg');?>">免费注册</a>
      </li>
      <li class="fl J_login_status dn islogin"><a href="<?php echo U('Home/user/index');?>" class="userinfo" title="" target="_self"></a>
      	<a href="<?php echo U('Home/user/logout');?>" style="margin:0 10px;" title="退出" target="_self">退出</a></li>
      <li class="fl sep"></li>
      <!-- 
      <li class="fl select-city dropdown">
        <span class="menu-item">
        <span>送货至：</span>
        <a title="" alt="" href="" class="J_cur_place"></a><i class="dd"></i></span>
      </li>-->
    </ul>
    <ul class="fr bar-right">
      <li class="fl dropdown my-feiniu"><a class="menu-item" target="_blank" href="<?php echo U('/Home/User/index');?>">
        <span>我的商城</span>
        <i class="dd"></i></a>
        <ul class="sub-panel">
          <li><a class="J_chgurl" target="_blank" href="<?php echo U('/Home/User/order_list');?>">我的订单</a></li>
          <li><a class="J_chgurl" target="_blank" href="<?php echo U('/Home/User/account');?>">我的积分</a></li>
          <li><a class="J_chgurl" target="_blank" href="<?php echo U('/Home/User/coupon');?>">我的优惠券</a></li>
          <li><a class="J_chgurl" target="_blank" href="<?php echo U('/Home/User/goods_collect');?>">我的收藏夹</a></li>
          <li><a class="J_chgurl" target="_blank" href="<?php echo U('/Home/User/comment');?>">我的评论</a></li>
        </ul>
      </li>
      <li class="fl sep"></li> 
      <li class="fl dropdown mobile-feiniu"><a class="menu-item" href=""><i class="fl ico"></i>
        <span class="fl">手机TPshop网</span>
        <i class="dd"></i></a>
        <div class="sub-panel m-lst">
          <p>扫一扫，下载TPshop客户端</p>
          <dl>
            <dt class="fl mr10"><a target="_blank" href=""><img height="80" width="80" src="/Template/pc/soubao/Static/images/qrcode_vmall_app01.png"></a></dt>
            <dd class="fl mb10"><a target="_blank" href=""><i class="andr"></i> Andiord</a></dd>
            <dd class="fl"><a target="_blank" href=""><i class="iph"></i> iPhone</a></dd>
          </dl>
        </div>
      </li>
      <li class="fl sep"></li>
      <li class="fl"><a class="menu-item" href="<?php echo U('Home/Article/detail',array('article_id'=>17));?>" target="_blank">
        <span>帮助中心</span></a></li>
      <li class="fl sep"></li>
      <li class="fl about-us"><a class="txt fl" style="line-height:unset;" href="">关注我们：</a></li>
      <li class="fl dropdown weixin"><a href="" class="fl ico"></a>
        <div class="sub-panel wx-box">
          <span class="arrow-b">◆</span>
          <span class="arrow-a">◆</span>
          <p class="n"> 扫描二维码 <br>	关注TPshop网官方微信 </p>
          <img src="/Template/pc/soubao/Static/images/qrcode_vmall_app01.png"></div>
      </li>
    </ul>
  </div>
</div>


<div class="m-top-sidebar m-sdb-sale J-sdb " moduleId="2026855" style="z-index:401;" fnp="m-top-sidebar">
  <div class="t-main">
    <div class="tb-tabs">
      <div class="tb-tabs-up">
      	<a href="<?php echo U('Home/Cart/cart');?>" class="i-cart" data-role="ico-cart">
        <span class="text">购物车</span><span id ="miniCartRightQty" class="num"></span></a>
        <a href="<?php echo U('/Home/User/order_list');?>" target="_blank" class="i-ico i-ico-order" data-role="ico-btn">
        <span>我的订单</span><i class="demo-icon">&#xe807;</i></a>
        <a href="<?php echo U('/Home/User/coupon');?>" target="_blank" class="i-ico i-ico-coupon" data-role="ico-btn">
        <span>我的优惠券</span><i class="demo-icon">&#xe80f;</i></a>
        <a href="<?php echo U('/Home/User/goods_collect');?>" target="_blank" class="i-ico i-ico-fav" data-role="ico-btn">
        <span>我的收藏</span><i class="demo-icon">&#xe808;</i></a>
        <a href="<?php echo U('/Home/User/comment');?>" target="_blank" class="i-ico i-ico-foot" data-role="ico-btn">
        <span>我的评论</span><i class="demo-icon">&#xe805;</i></a>
      </div>
      <div class="tb-tabs-down">
        <a href="" target="_blank" class="i-ico i-ico-ur" data-role="ico-btn">
        <span>意见反馈</span>
        <i></i></a><a href="" class="i-ico i-ico-gotop" data-role="ico-gotop"><em></em>
        <span>返回顶部</span>
        <i></i></a></div>
      <div class="my-cart-shim"></div>
    </div>
    <div class="my-cart">
      <div class="mn-c-top" ><a href="<?php echo U('Home/Cart/cart');?>">我的购物车</a><i data-role="cart-close-btn"></i></div>
      <div class="sub-panel u-fn-cart u-mn-cart">
        <div id="miniCartRight"></div>
        <div class="empty-c fn-hide">
          <span class="ma"><i class="c-i oh"></i>购物车中没有TPshop商品哟！</span>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="m-top-search editable" moduleId="1539927" style="position:relative;min-height:35px;">
  <div class="container">
    <div class="logo fl">
    	<a href="/" target="_blank" class="item fl"><img height="60" width="160" src="<?php echo ($tpshop_config['shop_info_store_logo']); ?>"></a>
    	<!-- <a href="" target="_blank" class="item fl"><img height="60" width="140" src="/Template/pc/soubao/Static/images/csmrrvbluvoamtx8aaeoswlm7gg007.gif"></a>-->
    </div>
    <div fnp="m-top-search-form" class="m-top-search-form fl">
     <form name="sourch_form" id="sourch_form" method="post" action="<?php echo U("/Home/Goods/search");?>">
        <div data-role="form-inner" class="s-form"><i class="s-ico"></i>         
		 <input type="text" data-role="input-search" autocomplete="off" class="fl s-input" name="q" id="q" value="<?php echo I('q'); ?>" placeholder="搜索关键字"/>
          <a data-role="btn" href="javascript:void(0);" class="s-btn fl" onclick="if($.trim($('#q').val()) != '') $('#sourch_form').submit();">搜索</a>
        </div>
        <div class="s-hotword">
        	<?php if(is_array($tpshop_config["hot_keywords"])): foreach($tpshop_config["hot_keywords"] as $k=>$wd): ?><a href="<?php echo U('Home/Goods/search',array('q'=>$wd));?>" <?php if($k == 0): ?>class="ht"<?php endif; ?>><?php echo ($wd); ?></a><?php endforeach; endif; ?>
        </div>
        <ul data-role="tip-list" class="s-tip-list">
        </ul>
      </form>
    </div>
    <div class="my-cart fr" id="hd-my-cart">
      <p class="c-n fl">我的购物车</p>
      <p class="c-num fl quantity">(<span class="count cart_quantity" id="cart_quantity"></span>) <i class="i-c oh"></i></p>
      <div id="show_minicart" class="sub-panel u-fn-cart u-mn-cart">
        <div id="minicart" class="minicartContent">

        </div>
      </div>
    </div>
  </div>
</div>

<div class="m-top-nav editable" moduleId="1539926" style="position:relative;min-height:35px;">
  <div class="main-container new-year">
    <div class="main-title-wrap"><a href="" target="_blank" class="main-title">
      <span class="ico"><i class="il il-lt"></i><i class="il il-lc"></i><i class="il il-lb"></i>
      <i class="il il-rt"></i><i class="il il-rc"></i><i class="il il-rb"></i></span>商城商品分类</a>
      <!--  <div class="nav-list" fnp="nav-list">
        <ul class="nav-list-warpper">
        </ul>
      </div>-->
    </div>
    <ul class="main-nav">
      <li class="nav-item"><a class="menu-item menu-item-active" target="_blank" href="/" style="overflow: visible;">首页 </a></li>
      <?php
 $md5_key = md5("SELECT * FROM `__PREFIX__navigation` where is_show = 1 ORDER BY `sort` DESC"); $sql_result_v = S("sql_".$md5_key); if(empty($sql_result_v)) { $Model = new \Think\Model(); $result_name = $sql_result_v = $Model->query("SELECT * FROM `__PREFIX__navigation` where is_show = 1 ORDER BY `sort` DESC"); S("sql_".$md5_key,$sql_result_v,TPSHOP_CACHE_TIME); } foreach($sql_result_v as $k=>$v): ?><li class="nav-item"><a class="menu-item " <?php if($v[is_new] == 1): ?>target="_blank"<?php endif; ?> href="<?php echo ($v[url]); ?>" style="overflow: visible;"><?php echo ($v[name]); ?> </a></li><?php endforeach; ?>
      <li class="nav-item"><a class="menu-item " href="#" style="overflow: visible;">TPshop商城<i class="e-hot"></i></a></li>
    </ul>     
    </div>
</div>
<div>
  <div class="J_side_nav_trigger"></div>
</div>
</div>
<script type="text/javascript"> 
$(document).ready(function(){
	get_cart_num();
	var uname= getCookie('uname');
	if(uname == ''){
		$('.islogin').remove();
		$('.nologin').show();
	}else{
		$('.nologin').remove();
		$('.islogin').show();
		$('.userinfo').html(decodeURIComponent(uname));
	}
});

function get_cart_num(){
   var cart_cn = getCookie('cn');
   if(cart_cn == ''){
	$.ajax({
		type : "GET",
		url:"/index.php?m=Home&c=Cart&a=header_cart_list",//+tab,
		success: function(data){								 
			cart_cn = getCookie('cn');
			$('#cart_quantity').html(cart_cn);					
		}
	});	
  }
  $('#cart_quantity').html(cart_cn);
  $('#miniCartRightQty').html(cart_cn);
}
</script>
<div id="pageContent">
  <div class="fn-mall">
	<style>
	.s-pg a {
	    display: block; width: 24px; height: 62px;line-height: 62px;
	    background: #000;opacity: .2; z-index: 1;left: 50%; top: 50%;
	    margin-top: -31px;padding-left:10px;color: #fff;position: absolute;
	    font-size: 30px;font-weight: 400; font-family: SimSun;filter: alpha(opacity=20);
	    -webkit-transition: opacity .2s linear 0s;transition: opacity .2s linear 0s;
	}
	.s-pg a.s-prev {margin-left: -395px;}
	.s-pg a.s-next {margin-left: 357px;}
	</style>    
    <div class="module">
      <div class="main-slider" style ="overflow:unset">
        <div class="container rel">
          <div fnp="main-slide" class="ui-switchable eidtModule" moduleId="bannerBig">
            <ul data-role="content" class="ui-switchable-content">
              <?php $pid =10;$ad_position = M("ad_position")->cache(true,TPSHOP_CACHE_TIME)->getField("position_id,position_name,ad_width,ad_height");$result = D("ad")->where("pid=$pid  and enabled = 1 and start_time < 1475222400 and end_time > 1475222400 ")->order("orderby desc")->cache(true,TPSHOP_CACHE_TIME)->limit("6")->select(); if(!in_array($pid,array_keys($ad_position)) && $pid) { M("ad_position")->add(array( "position_id"=>$pid, "position_name"=>CONTROLLER_NAME."页面自动增加广告位 $pid ", "is_open"=>1, "position_desc"=>CONTROLLER_NAME."页面", )); delFile(RUNTIME_PATH); } $c = 6- count($result); if($c > 0 && $_GET[edit_ad]) { for($i = 0; $i < $c; $i++) { $result[] = array( "ad_code" => "/Public/images/not_adv.jpg", "ad_link" => "/index.php?m=Admin&c=Ad&a=ad&pid=$pid", "title" =>"暂无广告图片", "not_adv" => 1, "target" => 0, ); } } foreach($result as $key=>$v): $v[position] = $ad_position[$v[pid]]; if($_GET[edit_ad] && $v[not_adv] == 0 ) { $v[style] = "filter:alpha(opacity=50); -moz-opacity:0.5; -khtml-opacity: 0.5; opacity: 0.5"; $v[ad_link] = "/index.php?m=Admin&c=Ad&a=ad&act=edit&ad_id=$v[ad_id]"; $v[title] = $ad_position[$v[pid]][position_name]."===".$v[ad_name]; $v[target] = 0; } ?><li style="background:<?php echo ($v["bgcolor"]); ?>" class="panel slider-panel"><a href="<?php echo ($v["ad_link"]); ?>" <?php if($v['target'] == 1): ?>target="_blank"<?php endif; ?> >
              	<img class="img100 prod"  src="<?php echo ($v[ad_code]); ?>" title="<?php echo ($v[title]); ?>" style="<?php echo ($v[style]); ?>"/></a>
              </li><?php endforeach; ?>
            </ul>
            <div class="ctrl-wrapper">
              <ul class="ui-switchable-nav" data-role="nav">
             	<?php $pid =10;$ad_position = M("ad_position")->cache(true,TPSHOP_CACHE_TIME)->getField("position_id,position_name,ad_width,ad_height");$result = D("ad")->where("pid=$pid  and enabled = 1 and start_time < 1475222400 and end_time > 1475222400 ")->order("orderby desc")->cache(true,TPSHOP_CACHE_TIME)->limit("6")->select(); if(!in_array($pid,array_keys($ad_position)) && $pid) { M("ad_position")->add(array( "position_id"=>$pid, "position_name"=>CONTROLLER_NAME."页面自动增加广告位 $pid ", "is_open"=>1, "position_desc"=>CONTROLLER_NAME."页面", )); delFile(RUNTIME_PATH); } $c = 6- count($result); if($c > 0 && $_GET[edit_ad]) { for($i = 0; $i < $c; $i++) { $result[] = array( "ad_code" => "/Public/images/not_adv.jpg", "ad_link" => "/index.php?m=Admin&c=Ad&a=ad&pid=$pid", "title" =>"暂无广告图片", "not_adv" => 1, "target" => 0, ); } } foreach($result as $k=>$v): $v[position] = $ad_position[$v[pid]]; if($_GET[edit_ad] && $v[not_adv] == 0 ) { $v[style] = "filter:alpha(opacity=50); -moz-opacity:0.5; -khtml-opacity: 0.5; opacity: 0.5"; $v[ad_link] = "/index.php?m=Admin&c=Ad&a=ad&act=edit&ad_id=$v[ad_id]"; $v[title] = $ad_position[$v[pid]][position_name]."===".$v[ad_name]; $v[target] = 0; } ?><li class="ui-switchable-trigger slider-item"><span><?php echo ($k); ?></span></li><?php endforeach; ?>
              </ul>
            </div>
            <div class="s-pg J_page_box" style="display:block;">
	            <a href="javascript:;" class="s-prev slider-prev">&lt;</a>
	            <a href="javascript:;" class="s-next slider-next">&gt;</a>
            </div>
          </div>
          <div class="popup imgbox eidtModule" moduleId="bannerright">
          	    <?php $pid =15;$ad_position = M("ad_position")->cache(true,TPSHOP_CACHE_TIME)->getField("position_id,position_name,ad_width,ad_height");$result = D("ad")->where("pid=$pid  and enabled = 1 and start_time < 1475222400 and end_time > 1475222400 ")->order("orderby desc")->cache(true,TPSHOP_CACHE_TIME)->limit("2")->select(); if(!in_array($pid,array_keys($ad_position)) && $pid) { M("ad_position")->add(array( "position_id"=>$pid, "position_name"=>CONTROLLER_NAME."页面自动增加广告位 $pid ", "is_open"=>1, "position_desc"=>CONTROLLER_NAME."页面", )); delFile(RUNTIME_PATH); } $c = 2- count($result); if($c > 0 && $_GET[edit_ad]) { for($i = 0; $i < $c; $i++) { $result[] = array( "ad_code" => "/Public/images/not_adv.jpg", "ad_link" => "/index.php?m=Admin&c=Ad&a=ad&pid=$pid", "title" =>"暂无广告图片", "not_adv" => 1, "target" => 0, ); } } foreach($result as $k=>$v): $v[position] = $ad_position[$v[pid]]; if($_GET[edit_ad] && $v[not_adv] == 0 ) { $v[style] = "filter:alpha(opacity=50); -moz-opacity:0.5; -khtml-opacity: 0.5; opacity: 0.5"; $v[ad_link] = "/index.php?m=Admin&c=Ad&a=ad&act=edit&ad_id=$v[ad_id]"; $v[title] = $ad_position[$v[pid]][position_name]."===".$v[ad_name]; $v[target] = 0; } ?><a class="item item-02" href="<?php echo ($v["ad_link"]); ?>" <?php if($v['target'] == 1): ?>target="_blank"<?php endif; ?>>
	          	   	  <img class="img100 prod" src="<?php echo ($v[ad_code]); ?>" title="<?php echo ($v[title]); ?>" style="<?php echo ($v[style]); ?>">
	          	   </a><?php endforeach; ?>
		  </div>
          <div fnp="nav-list" class="nav-list eidtModule" moduleId="nav">
            <ul class="nav-list-warpper">
              <?php if(is_array($goods_category_tree)): foreach($goods_category_tree as $k=>$vo): ?><li data-role="nav-item" class="nav-item" index="<?php echo ($vo["id"]); ?>">
	                <span class="nav-menu-item"><i class="iconfont icon"></i>
	                <span class="title"><a href="<?php echo U('Home/Channel/index',array('id'=>$vo[id]));?>" target="_blank"><?php echo ($vo["name"]); ?></a></span>
	                </span>
	              </li><?php endforeach; endif; ?>
            </ul>
           <?php if(is_array($goods_category_tree)): foreach($goods_category_tree as $k=>$vo): ?><div data-role="menu-sub" class="menu-sub" index ="<?php echo ($k); ?>">
		        <div class="sub-columns">
		        	<?php if(is_array($vo["tmenu"])): foreach($vo["tmenu"] as $k2=>$v2): if($k2%3 == 0): ?><div class="fn-clear column-item">
		                  <div class="tlt">
		                    <span class="name"><a href="<?php echo U('Home/Goods/goodsList',array('id'=>$v2[id]));?>" target="_blank"><?php echo ($v2["name"]); ?></a></span>
		                  </div>
		                  <div class="words">
		                  	<?php if(is_array($v2["sub_menu"])): foreach($v2["sub_menu"] as $key=>$v3): ?><a href="<?php echo U('Home/Goods/goodsList',array('id'=>$v3[id]));?>" <?php if($v3[is_hot] == 1): ?>class="lh"<?php endif; ?> target="_blank"><?php echo ($v3["name"]); ?></a><?php endforeach; endif; ?>
		                  </div>
		                </div><?php endif; endforeach; endif; ?>
	            </div>	            
	            <div class="sub-columns">
		        	<?php if(is_array($vo["tmenu"])): foreach($vo["tmenu"] as $k2=>$v2): if($k2%3 == 1): ?><div class="fn-clear column-item">
		                  <div class="tlt">
		                    <span class="name"><a href="<?php echo U('Home/Goods/goodsList',array('id'=>$v2[id]));?>" target="_blank"><?php echo ($v2["name"]); ?></a></span>
		                  </div>
		                 <div class="words">
		                  	<?php if(is_array($v2["sub_menu"])): foreach($v2["sub_menu"] as $key=>$v3): ?><a href="<?php echo U('Home/Goods/goodsList',array('id'=>$v3[id]));?>" <?php if($v3[is_hot] == 1): ?>class="lh"<?php endif; ?> target="_blank"><?php echo ($v3["name"]); ?></a><?php endforeach; endif; ?>
		                  </div>
		                </div><?php endif; endforeach; endif; ?>
	            </div>
	            
		        <div class="sub-columns">
		        	<?php if(is_array($vo["tmenu"])): foreach($vo["tmenu"] as $k2=>$v2): if($k2%3 == 2): ?><div class="fn-clear column-item">
		                  <div class="tlt">
		                    <span class="name"><a href="<?php echo U('Home/Goods/goodsList',array('id'=>$v2[id]));?>" target="_blank"><?php echo ($v2["name"]); ?></a></span>
		                  </div>
		                  <div class="words">
		                  	<?php if(is_array($v2["sub_menu"])): foreach($v2["sub_menu"] as $key=>$v3): ?><a href="<?php echo U('Home/Goods/goodsList',array('id'=>$v3[id]));?>" <?php if($v3[is_hot] == 1): ?>class="lh"<?php endif; ?> target="_blank"><?php echo ($v3["name"]); ?></a><?php endforeach; endif; ?>
		                  </div>
		                </div><?php endif; endforeach; endif; ?>
	            </div>
	            <div class="right-wrap">
                <ul class="li-item">
	              <?php if(is_array($brand_list)): $i = 0; $__LIST__ = $brand_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v2): $mod = ($i % 2 );++$i; if(($v2[parent_cat_id] == $vo[id]) AND ($v2[is_hot] == 1)): ?><li class="item <?php if(($mod) == "1"): ?>even<?php endif; ?>">
	                  	<a href="<?php echo U('Goods/goodsList',array('brand_id'=>$v2[id]));?>" target="_blank">
	                  	<img class="nav-prod" src="/Template/pc/soubao/Static/images/loading.gif" alt="" data-images="<?php echo ($v2["logo"]); ?>"></a>
	                  </li><?php endif; endforeach; endif; else: echo "" ;endif; ?>
                </ul>
                <?php $pid =80+$k;$ad_position = M("ad_position")->cache(true,TPSHOP_CACHE_TIME)->getField("position_id,position_name,ad_width,ad_height");$result = D("ad")->where("pid=$pid  and enabled = 1 and start_time < 1475222400 and end_time > 1475222400 ")->order("orderby desc")->cache(true,TPSHOP_CACHE_TIME)->limit("1")->select(); if(!in_array($pid,array_keys($ad_position)) && $pid) { M("ad_position")->add(array( "position_id"=>$pid, "position_name"=>CONTROLLER_NAME."页面自动增加广告位 $pid ", "is_open"=>1, "position_desc"=>CONTROLLER_NAME."页面", )); delFile(RUNTIME_PATH); } $c = 1- count($result); if($c > 0 && $_GET[edit_ad]) { for($i = 0; $i < $c; $i++) { $result[] = array( "ad_code" => "/Public/images/not_adv.jpg", "ad_link" => "/index.php?m=Admin&c=Ad&a=ad&pid=$pid", "title" =>"暂无广告图片", "not_adv" => 1, "target" => 0, ); } } foreach($result as $key=>$vv): $vv[position] = $ad_position[$vv[pid]]; if($_GET[edit_ad] && $vv[not_adv] == 0 ) { $vv[style] = "filter:alpha(opacity=50); -moz-opacity:0.5; -khtml-opacity: 0.5; opacity: 0.5"; $vv[ad_link] = "/index.php?m=Admin&c=Ad&a=ad&act=edit&ad_id=$vv[ad_id]"; $vv[title] = $ad_position[$vv[pid]][position_name]."===".$vv[ad_name]; $vv[target] = 0; } ?><a href="<?php echo ($vv["ad_link"]); ?>" <?php if($vv['target'] == 1): ?>target="_blank"<?php endif; ?>>
	          	   	  <img title="<?php echo ($vv[title]); ?>" style="<?php echo ($vv[style]); ?>" data-images="<?php echo ($vv[ad_code]); ?>" class="right-img nav-prod" src="/Template/pc/soubao/Static/images/loading.gif">
	          	   </a><?php endforeach; ?>              
                </div>
	        </div><?php endforeach; endif; ?>
          </div>
        </div>
      </div>
    </div>
    <div class="J_side_nav_trigger"></div>
    <div class="module eidtModule" moduleId="1081037_main" parentModuleId ="1081037" moduleCode="cms-index-cchannel">
      <div class="layout container mt30">
        <div class="layout-hd">
          <div class="layout-title fl">精品推荐</div>
        </div>
        <div class="feture-cates">
          <ul class="cates-left">
            <li class="item"><a href="javascript:void(0);" ><img data-original="http://img16.fn-mart.com/pic/f66d133a5e76dbf94f30/kz8zTT1n_zCdkdVMtT/7imRoGPR2yfaVi/CsmRr1bLr1iACmkcAAA3LNklwOw191.jpg" class="img100 prod" src=""></a></li>
            <li class="item"><a href="javascript:void(0);" ><img data-original="http://img18.fn-mart.com/pic/6992133a5e78dc082e54/Kn6z2212FTflkMVMUz/1iSGSaWacyKYZY/CsmRrlbLshKAPYZ0AAAo4JQxZAM845.jpg" class="img100 prod" src=""></a></li>
            <li class="item"><a href="javascript:void(0);" ><img data-original="http://img18.fn-mart.com/pic/cd89133a5e7ac3e98c41/kTH222sTvTtMhdUlX2/1ioyoRVyua2aZ9/CsmRslbLptiAUqZPAAAuFwkx9Cs342.jpg" class="img100 prod" src=""></a></li>
            <li class="item"><a href="javascript:void(0);" ><img data-original="http://img16.fn-mart.com/pic/9c86133a5e7d195b252a/BT62TT52F2LdKlVlOn/5YeaeGVGVazGji/CsmRsVbLxkKAVWj5AAAmjOqvmHY473.jpg" class="img100 prod" src=""></a></li>
            <li class="item"><a href="javascript:void(0);" ><img data-original="http://img16.fn-mart.com/pic/91aa133a5e76dc008b20/B28nnn5TDnClhgZdfz/1xmGSGWy2GtGVx/CsmRr1bLscCAKBuLAAAxGniOLAE725.jpg" class="img100 prod" src=""></a></li>
            <li class="item"><a href="javascript:void(0);" ><img data-original="http://img17.fn-mart.com/pic/81d1133a5e6c2abb897e/h262TT5T_nfdBlZd3T/59oGmGUGZy2GcG/CsmRslbK2eiAehoAAAAxFIjjhsA455.jpg" class="img100 prod" src=""></a></li>
          </ul>
          <div class="cates-center" fnp="slide">
            <ul class="ui-switchable-content" data-role="content">
              <li class="panel">
                <div class="item"><a href="javascript:void(0);"><img data-original="http://img17.fn-mart.com/pic/a498133a5e7cdc775c6e/Kn8Tnn7zvTCdhduM32/1YoaoRuRuanRZx/CsmRsVbLr-GAOIwcAABOSRgeyOs757.jpg" class="img100 prod" src=""></a></div>
                <div class="item"><a href="javascript:void(0);"><img data-original="http://img16.fn-mart.com/pic/1c4d133a5e7e1988e70e/Kn8Tnn7zvTCdhduMp2/1xmGSG3yfGhGzR/CsmRrFbLx7SAIg59AAA1ru-YC78272.jpg" class="img100 prod" src=""></a></div>
              </li>
              <li class="panel">
                <div class="item"><a href="javascript:void(0);"><img data-original="http://img16.fn-mart.com/pic/b779133a5e77dc50a69c/K282nn7n_TLMKlVgCn/1xoamRPyzGtaZi/CsmRsFbLtLqAWbTjAAAtWnv7gSY438.jpg" class="img100 prod" src=""></a></div>
                <div class="item"><a href="javascript:void(0);"><img data-original="http://img16.fn-mart.com/pic/1d4d133a5e71dc0644df/K28TTT1z_zCMBdugPz/1ioyoRXytaBavy/CsmRrFbLseKAbazfAAAyLIgwk_8587.jpg" class="img100 prod" src=""></a></div>
              </li>
              <li class="panel">
                <div class="item"><a href="javascript:void(0);"><img data-original="http://img17.fn-mart.com/pic/a498133a5e7cdc775c6e/Kn8Tnn7zvTCdhduM32/1YoaoRuRuanRZx/CsmRsVbLr-GAOIwcAABOSRgeyOs757.jpg" class="img100 prod" src=""></a></div>
                <div class="item"><a href="javascript:void(0);"><img data-original="http://img16.fn-mart.com/pic/1c4d133a5e7e1988e70e/Kn8Tnn7zvTCdhduMp2/1xmGSG3yfGhGzR/CsmRrFbLx7SAIg59AAA1ru-YC78272.jpg" class="img100 prod" src=""></a></div>
              </li>
              <li class="panel">
                <div class="item"><a href="javascript:void(0);"><img data-original="http://img16.fn-mart.com/pic/b779133a5e77dc50a69c/K282nn7n_TLMKlVgCn/1xoamRPyzGtaZi/CsmRsFbLtLqAWbTjAAAtWnv7gSY438.jpg" class="img100 prod" src=""></a></div>
                <div class="item"><a href="javascript:void(0);"><img data-original="http://img16.fn-mart.com/pic/1d4d133a5e71dc0644df/K28TTT1z_zCMBdugPz/1ioyoRXytaBavy/CsmRrFbLseKAbazfAAAyLIgwk_8587.jpg" class="img100 prod" src=""></a></div>
              </li>
            </ul>
			<ul class="slide-nav ui-switchable-nav" data-role="nav">
				<li class="ui-switchable-trigger"><span>1</span></li>
				<li class="ui-switchable-trigger"><span>2</span></li>
				<li class="ui-switchable-trigger"><span>3</span></li>
				<li class="ui-switchable-trigger ui-switchable-active"><span>4</span></li>
			</ul>
            <a href="javascript:void(0);" class="ctrl ctrl-prev" data-role="prev"></a>
            <a href="javascript:void(0);" class="ctrl ctrl-next" data-role="next"></a>
          </div>
          <ul class="cates-right">
            <li class="item"><a href="javascript:void(0);" ><img data-original="http://img17.fn-mart.com/pic/bc58133a5e6b29c1b966/hTHnzz1T_2fMKdVlL2/1ioRmyWanataXG/CsmRsFbK0IuAI3K6AAA58m1kdBw174.jpg" class="img100 prod" src=""></a></li>
            <li class="item"><a href="javascript:void(0);" ><img data-original="http://img15.fn-mart.com/group1/M00/F9/A1/CsnBPlZ4spCADIUlAAAh93GWEIE776.jpg" class="img100 prod" src=""></a></li>
          </ul>
        </div>
      </div>
    </div> 
    <?php $pid =99;$ad_position = M("ad_position")->cache(true,TPSHOP_CACHE_TIME)->getField("position_id,position_name,ad_width,ad_height");$result = D("ad")->where("pid=$pid  and enabled = 1 and start_time < 1475222400 and end_time > 1475222400 ")->order("orderby desc")->cache(true,TPSHOP_CACHE_TIME)->limit("1")->select(); if(!in_array($pid,array_keys($ad_position)) && $pid) { M("ad_position")->add(array( "position_id"=>$pid, "position_name"=>CONTROLLER_NAME."页面自动增加广告位 $pid ", "is_open"=>1, "position_desc"=>CONTROLLER_NAME."页面", )); delFile(RUNTIME_PATH); } $c = 1- count($result); if($c > 0 && $_GET[edit_ad]) { for($i = 0; $i < $c; $i++) { $result[] = array( "ad_code" => "/Public/images/not_adv.jpg", "ad_link" => "/index.php?m=Admin&c=Ad&a=ad&pid=$pid", "title" =>"暂无广告图片", "not_adv" => 1, "target" => 0, ); } } foreach($result as $key=>$v): $v[position] = $ad_position[$v[pid]]; if($_GET[edit_ad] && $v[not_adv] == 0 ) { $v[style] = "filter:alpha(opacity=50); -moz-opacity:0.5; -khtml-opacity: 0.5; opacity: 0.5"; $v[ad_link] = "/index.php?m=Admin&c=Ad&a=ad&act=edit&ad_id=$v[ad_id]"; $v[title] = $ad_position[$v[pid]][position_name]."===".$v[ad_name]; $v[target] = 0; } ?><div class="module eidtModule" parentModuleId="" moduleId="" style="min-height: 25px;">
	      <div class="container mt30"><a href="<?php echo ($v["ad_link"]); ?>" <?php if($v['target'] == 1): ?>target="_blank"<?php endif; ?> class="banner-img-single">
	      	<img width="1188" height="80" class="prod" src="<?php echo ($v[ad_code]); ?>" title="<?php echo ($v[title]); ?>" style="<?php echo ($v[style]); ?>" data-original="<?php echo ($v[ad_code]); ?>" alt=""/></a>
	      </div>
	    </div><?php endforeach; ?>    
  
    
    <?php if(is_array($cateList)): foreach($cateList as $k=>$vo): ?><div class="module" moduleId="" parentModuleId="">
      <div class="layout floor floor-0<?php echo ($k+1); ?> container mt30" data-floor="<?php echo ($k+1); ?>">
        <div class="floor-wrapper">
          <div class="floor-left">
            <div class="menu-box">
              <div class="menu-box-hd eidtModule" moduleId="1081777_main"><em><?php echo ($k+1); ?>F</em>
                <p><a><?php echo ($vo["mobile_name"]); ?></a></p>
              </div>
              <div class="menu-box-bd eidtModule" style="overflow:hidden" moduleId="1081777_leftTopClassify">
                <ul class="item-list">
                  <?php if(is_array($vo["tmenu"])): foreach($vo["tmenu"] as $k2=>$v2): if($k2 < 6): ?><li class="item"><a href="<?php echo U('Home/Goods/goodsList',array('id'=>$v2[id]));?>" target="_blank"><?php echo ($v2["name"]); ?></a></li><?php endif; endforeach; endif; ?>
                </ul>
                <ul class="item-list">
                  <?php if(is_array($vo["tmenu"])): foreach($vo["tmenu"] as $k2=>$v2): if($k2 > 5): ?><li class="item"><a href="<?php echo U('Home/Goods/goodsList',array('id'=>$v2[id]));?>" target="_blank"><?php echo ($v2["name"]); ?></a></li><?php endif; endforeach; endif; ?>
                </ul>
              </div>
            </div>
            <div class="slide eidtModule" moduleId="1081777_leftBottomSlide" fnp="slide">
              <div class="slide-container">
                <ul data-role="content">
                <?php $pid =70+$k;$ad_position = M("ad_position")->cache(true,TPSHOP_CACHE_TIME)->getField("position_id,position_name,ad_width,ad_height");$result = D("ad")->where("pid=$pid  and enabled = 1 and start_time < 1475222400 and end_time > 1475222400 ")->order("orderby desc")->cache(true,TPSHOP_CACHE_TIME)->limit("4")->select(); if(!in_array($pid,array_keys($ad_position)) && $pid) { M("ad_position")->add(array( "position_id"=>$pid, "position_name"=>CONTROLLER_NAME."页面自动增加广告位 $pid ", "is_open"=>1, "position_desc"=>CONTROLLER_NAME."页面", )); delFile(RUNTIME_PATH); } $c = 4- count($result); if($c > 0 && $_GET[edit_ad]) { for($i = 0; $i < $c; $i++) { $result[] = array( "ad_code" => "/Public/images/not_adv.jpg", "ad_link" => "/index.php?m=Admin&c=Ad&a=ad&pid=$pid", "title" =>"暂无广告图片", "not_adv" => 1, "target" => 0, ); } } foreach($result as $key=>$v): $v[position] = $ad_position[$v[pid]]; if($_GET[edit_ad] && $v[not_adv] == 0 ) { $v[style] = "filter:alpha(opacity=50); -moz-opacity:0.5; -khtml-opacity: 0.5; opacity: 0.5"; $v[ad_link] = "/index.php?m=Admin&c=Ad&a=ad&act=edit&ad_id=$v[ad_id]"; $v[title] = $ad_position[$v[pid]][position_name]."===".$v[ad_name]; $v[target] = 0; } ?><li class="panel">                   
                   <a href="<?php echo ($v["ad_link"]); ?>" <?php if($v['target'] == 1): ?>target="_blank"<?php endif; ?>>
                    <img class="img100 prod" title="<?php echo ($v[title]); ?>" style="<?php echo ($v[style]); ?>" data-original="<?php echo ($v[ad_code]); ?>" src="<?php echo ($v[ad_code]); ?>">
                   </a>
                   </li><?php endforeach; ?>
                </ul>
              </div>
              <ul class="slide-nav ui-switchable-nav" data-role="nav">
	              <li class="ui-switchable-trigger"><span>1</span></li>
	              <li class="ui-switchable-trigger"><span>2</span></li>
	              <li class="ui-switchable-trigger"><span>3</span></li>
	              <li class="ui-switchable-trigger ui-switchable-active"><span>4</span></li>
              </ul>
            </div>
          </div>
          <div class="floor-right" fnp="tab-switch">
            <div class="layout-hd switch_tab">
              <ul class="tab-nav fl" data-role="tabs">
                <li class="item item-active" rel="goods-list"><a href="javascript:void(0);">热卖商品</a></li>
                <li class="item" rel="pics"><a href="javascript:void(0)">精选活动</a></li>
              </ul>
              <div class="cates-list eidtModule" moduleId="">
               	  <?php if(is_array($vo["hot_cate"])): $kk = 0; $__LIST__ = $vo["hot_cate"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ht): $mod = ($kk % 2 );++$kk; if($kk < 10): ?><a href="<?php echo U('Home/Goods/search',array('q'=>urlencode($ht[name])));?>" class="cates" target="_blank" style="color: <?php if(($mod) == "1"): ?>#da3a4c;<?php endif; ?>"><?php echo ($ht["name"]); ?></a><?php endif; endforeach; endif; else: echo "" ;endif; ?>    
	              <a class="cates" href="<?php echo U('Home/Channel/index',array('id'=>$vo[id]));?>" target="_blank">进入频道&gt;&gt;</a>
              </div>
            </div>
            <div class="layout-bd eidtModule" style="overflow:hidden" data-role="panels">
              <div class="pics pics-01 dn eidtModule" moduleId="1081777_selectedAd">
	              <a class="item item-big" href="javascript:;"><img data-original="http://img17.fn-mart.com/pic/319c133a5e76dc07f7a2/Kn8Tnn7zvTCdhduMp2/5xeamROatRMR3i/CsmRq1bLsg-AQT1BAANNbU3JN2U018.png" src="" class="img100 prod"></a>
	              <a class="item" href="javascript:;"><img data-original="http://img17.fn-mart.com/pic/a9fa133a5e011966d801/h26n22sT_2tMKludLn/1xmyeaWalaBYKR/CsmRsFbCg72AQexlAABPAlWh5uI114.jpg" src="" class="img100 img-effect prod"></a>
	              <a class="item" href="javascript:;"><img data-original="http://img17.fn-mart.com/pic/6aec133a5e7cdca9ea81/kn62zz1zDTflhdZd3z/5iSymGZyZRnyOx/CsmRsVbLuB6ASOw2AABS7FLqBVc029.jpg" src="" class="img100 img-effect prod"></a>
	              <a class="item nbdr" href="javascript:;"><img data-original="http://img17.fn-mart.com/pic/88b9133a5e78dc37a826/Kz6Tnn72FztdBlulUz/1ioRmyjaKat9cG/CsmRrVbLs8qALa3hAABZDDdC9rM099.jpg" src="" class="img100 img-effect prod"></a>
	              <a class="item" href="javascript:;"><img data-original="http://img16.fn-mart.com/pic/342a133a5e79dc3e840d/K28z2212_ntdKdUluz/1YSGmyWGcGKxuY/CsmRrlbLs_6ARqJ3AAA4llKiEas704.jpg" src="" class="img100 img-effect prod"></a>
	              <a class="item" href="javascript:;"><img data-original="http://img16.fn-mart.com/pic/e253133a5e7ddc3f6b3a/h2Hn22szD2CgKMZMtn/7imyeapanyCGu9/CsmRsFbLtB6AAcmUAABZdH4kFx8888.jpg" src="" class="img100 img-effect prod"></a>
	              <a class="item nbdr" href="javascript:;"><img data-original="http://img16.fn-mart.com/pic/1d35133a5e861bd0cf3d/kn62zz1zDTflhdZd3z/5xoGoRUyVaWiV9/CsmRsVbNJfSACasaAAA6Ur4gNrM166.jpg" src="" class="img100 img-effect prod"></a>
	          </div>
              <div class="goods-list eidtModule" style="overflow:hidden" moduleId="1081777_hotCommodity" >
              	<?php if(is_array($vo["hot_goods"])): foreach($vo["hot_goods"] as $key=>$vg): ?><dl class="item" href="" target ="_blank">
	                  <dt class="pic"><a href="<?php echo U('Home/Goods/goodsInfo',array('id'=>$vg[goods_id]));?>" target ="_blank"><img data-original="<?php echo (goods_thum_images($vg["goods_id"],400,400)); ?>" src="" class="hide-prod prod"></a></dt>
	                  <dd class="title"><a href="<?php echo U('Home/Goods/goodsInfo',array('id'=>$vg[goods_id]));?>" target ="_blank" class="break-word"><?php echo ($vg["goods_name"]); ?></a></dd>
	                  <dd class="price">
	                    <span class="curr">¥<font class="p_price" id="100826791_-1081777"><?php echo ($vg["shop_price"]); ?></font></span>
	                    <del class="prev">¥<font><?php echo ($vg["market_price"]); ?></font></del></dd>
	                </dl><?php endforeach; endif; ?>
              </div>
            </div>
          </div>
        </div>
        <div class="banner-img-list eidtModule" moduleId="">
        	<?php $br = '0'; ?>
        	<?php if(is_array($brand_list)): foreach($brand_list as $k2=>$vv): if(($vv[parent_cat_id] == $vo[id]) AND ($br++ < 9)): ?><a href="<?php echo U('Goods/goodsList',array('brand_id'=>$vv[id]));?>" target ="_blank" class="<?php if($br < 9): ?>item<?php endif; ?> item0<?php echo ($k2); ?>">
	        		<img data-original="<?php echo ($vv["logo"]); ?>" src="" style="width:131px;height=:80px" class="img100 prod"/></a><?php endif; endforeach; endif; ?>
	    </div>
      </div>
    </div>
    <?php $pid =100+$k;$ad_position = M("ad_position")->cache(true,TPSHOP_CACHE_TIME)->getField("position_id,position_name,ad_width,ad_height");$result = D("ad")->where("pid=$pid  and enabled = 1 and start_time < 1475222400 and end_time > 1475222400 ")->order("orderby desc")->cache(true,TPSHOP_CACHE_TIME)->limit("1")->select(); if(!in_array($pid,array_keys($ad_position)) && $pid) { M("ad_position")->add(array( "position_id"=>$pid, "position_name"=>CONTROLLER_NAME."页面自动增加广告位 $pid ", "is_open"=>1, "position_desc"=>CONTROLLER_NAME."页面", )); delFile(RUNTIME_PATH); } $c = 1- count($result); if($c > 0 && $_GET[edit_ad]) { for($i = 0; $i < $c; $i++) { $result[] = array( "ad_code" => "/Public/images/not_adv.jpg", "ad_link" => "/index.php?m=Admin&c=Ad&a=ad&pid=$pid", "title" =>"暂无广告图片", "not_adv" => 1, "target" => 0, ); } } foreach($result as $key=>$v): $v[position] = $ad_position[$v[pid]]; if($_GET[edit_ad] && $v[not_adv] == 0 ) { $v[style] = "filter:alpha(opacity=50); -moz-opacity:0.5; -khtml-opacity: 0.5; opacity: 0.5"; $v[ad_link] = "/index.php?m=Admin&c=Ad&a=ad&act=edit&ad_id=$v[ad_id]"; $v[title] = $ad_position[$v[pid]][position_name]."===".$v[ad_name]; $v[target] = 0; } ?><div class="module eidtModule" parentModuleId="" moduleId="" style="min-height: 25px;">
	      <div class="container mt30"><a href="<?php echo ($v["ad_link"]); ?>" <?php if($v['target'] == 1): ?>target="_blank"<?php endif; ?> class="banner-img-single">
	      	<img width="1188" height="80" class="prod" src="<?php echo ($v[ad_code]); ?>" title="<?php echo ($v[title]); ?>" style="<?php echo ($v[style]); ?>" data-original="<?php echo ($v[ad_code]); ?>" alt=""/></a>
	      </div>
	    </div><?php endforeach; endforeach; endif; ?>
    <div class="module eidtModule" moduleId="" parentModuleId ="" moduleCode="cms-index-selection">
      <div class="layout boutique container mt30">
        <div class="layout-hd">
          <div class="layout-title fl">新品推荐</div>
        </div>
        <div class="layout-bd">
          <div class="boutique-left">
          	<?php
 $md5_key = md5("select * from __PREFIX__goods where is_new=1 order by sort limit 7"); $sql_result_v = S("sql_".$md5_key); if(empty($sql_result_v)) { $Model = new \Think\Model(); $result_name = $sql_result_v = $Model->query("select * from __PREFIX__goods where is_new=1 order by sort limit 7"); S("sql_".$md5_key,$sql_result_v,TPSHOP_CACHE_TIME); } foreach($sql_result_v as $k=>$v): ?><div class="item <?php if($k == 0): ?>item-big<?php else: ?>item-small<?php endif; ?> ">
	              <div class="pic"><a href="<?php echo U('Home/Goods/goodsInfo',array('id'=>$v[goods_id]));?>" target="_blank"><img class="img100 prod" src="" data-original="<?php echo (goods_thum_images($v["goods_id"],400,400)); ?>"></a></div>
	              <a class="title" href=""><?php echo ($v["goods_name"]); ?></a>
	              <p class="num" >¥<font class="p_price" id="100395552_-1081039"><?php echo ($v["shop_price"]); ?></font></p>
	            </div><?php endforeach; ?>
          </div>
          <div class="boutique-right">
            <div class="comment-list" fnp="comments">
              <ul data-role="content">
                <li class="comment">
                  <div class="pic"><a href="javascript:;"><img data-original="http://img17.fn-mart.com/pic/2963133a5e812610dc90/B28nnn7z_2CMBgulVz/59eaSG0ahRoGkx/CsmRrlbNYtWAVtlKAAGi4lg8kLE019_400x400.jpg" class="prod selection-prod" src=""></a></div>
                  <div class="info">
                    <p class="author"><img data-original="" class="prod selection-prod" src="/Template/pc/soubao/Static/images/80_80.gif">
                      <span>匿名用户</span>
                    </p>
                    <div class="detail break-word"><a href="javascript:;" target="_blank">正品的，货真价实，包装精美。</a></div>
                  </div>
                </li>
                <li class="comment">
                  <div class="pic"><a href="javascript:;"><img data-original="http://img16.fn-mart.com/group1/M00/75/A7/CsnBPlXvnC2AZoSMAAFWVkDM1Po652_400x400.jpg" class="prod selection-prod" src=""></a></div>
                  <div class="info">
                    <p class="author"><img data-original="" class="prod selection-prod" src="/Template/pc/soubao/Static/images/80_80.gif">
                      <span>匿名用户</span>
                    </p>
                    <div class="detail break-word"><a href="javascript:;">物流特别给力，商品还算不错</a></div>
                  </div>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="module eidtModule" parentModuleId="" moduleId="" style="min-height: 25px;">
      <div class="m-fn-plink container mt30">
        <ul class="oh clearfix">
          <?php
 $md5_key = md5("select * from __PREFIX__goods_category where is_show=1 and image !='' order by sort_order desc limit 9"); $sql_result_v = S("sql_".$md5_key); if(empty($sql_result_v)) { $Model = new \Think\Model(); $result_name = $sql_result_v = $Model->query("select * from __PREFIX__goods_category where is_show=1 and image !='' order by sort_order desc limit 9"); S("sql_".$md5_key,$sql_result_v,TPSHOP_CACHE_TIME); } foreach($sql_result_v as $k=>$v): ?><li>
	            <p class="n"><?php echo ($v["name"]); ?></p>
	            <a href="<?php echo U('Goods/goodsList',array('id'=>$v[id]));?>" target="_blank" class="p"><img src="<?php echo ($v["image"]); ?>" alt="" title="" width="100" height="100"></a>
	          </li><?php endforeach; ?>
        </ul>
      </div>
    </div>
    <!--  
	<div class="J_side_nav mall-side-nav mall-side-nav-show" style="display: block; opacity: 0.95;">
		<div class="side-wrapper">
		<a class="item item-tigger" href="javascript:;"><i class="sep"></i><span class="level">1F</span><span class="text text-twoline">服饰<br>内衣</span></a>
		<a class="item item-tigger" href="javascript:;"><i class="sep"></i><span class="level">2F</span><span class="text text-twoline">鞋靴<br>箱包</span></a>
		<a class="item item-tigger" href="javascript:;"><i class="sep"></i><span class="level">3F</span><span class="text text-twoline">个护<br>清洁</span></a>
		<a class="item item-tigger" href="javascript:;"><i class="sep"></i><span class="level">4F</span><span class="text text-twoline">运动<br>户外</span></a>
		<a class="item item-tigger" href="javascript:;"><i class="sep"></i><span class="level">5F</span><span class="text text-twoline">家电<br>汽配</span></a>
		<a class="item item-tigger" href="javascript:;"><i class="sep"></i><span class="level">6F</span><span class="text text-twoline">生活<br>居家</span></a>
		<a class="item item-tigger item-active" href="javascript:;"><i class="sep"></i><span class="level">7F</span><span class="text text-twoline">母婴<br>馆</span></a>
		<a class="item item-tigger" href="javascript:;"><i class="sep"></i><span class="level">8F</span><span class="text text-twoline">美食<br>城</span></a>
		<a class="item item-tigger" href="javascript:;"><i class="sep"></i><span class="level">9F</span><span class="text text-twoline">图书<br>城</span></a>
		<a class="item item-tigger" href="javascript:;"><i class="sep"></i><span class="level">10F</span><span class="text text-twoline">精选<br>大牌</span></a>
		</div>
	</div>-->
  </div>
</div>
<div class="fn-cms-footer">
  <div class="m-footer-g">
    <div class="footer-map">
      <ul class="fn-clear">
        <li class="map"><i class="footer-icon z-icon"></i><strong class="tit">正品低价</strong><br/>
          <span class="desc">正品行货 品质保障</span>
        </li>
        <li class="line"></li>
        <li class="map"><i class="footer-icon q-icon"></i><strong class="tit">品类齐全</strong><br/>
          <span class="desc">品类齐全 选择丰富</span>
        </li>
        <li class="line"></li>
        <li class="map"><i class="footer-icon k-icon"></i><strong class="tit">快速配送</strong><br/>
          <span class="desc">多仓直发 极速配送</span>
        </li>
        <li class="line"></li>
        <li class="map"><i class="footer-icon t-icon"></i><strong class="tit">售后无忧</strong><br/>
          <span class="desc">7天无理由退货</span>
        </li>
      </ul>
    </div>
    <div class="server-list">
      <ul class="fn-clear">
	    <?php
 $md5_key = md5("select * from `__PREFIX__article_cat` where cat_id in(1,2,3,4,7)"); $sql_result_v = S("sql_".$md5_key); if(empty($sql_result_v)) { $Model = new \Think\Model(); $result_name = $sql_result_v = $Model->query("select * from `__PREFIX__article_cat` where cat_id in(1,2,3,4,7)"); S("sql_".$md5_key,$sql_result_v,TPSHOP_CACHE_TIME); } foreach($sql_result_v as $k=>$v): ?><li><i class="list-icon icon<?php echo ($k+1); ?>"></i>
          <dl class="list-item">
            <dt><?php echo ($v[cat_name]); ?></dt>
            <?php
 $md5_key = md5("select * from `__PREFIX__article` where cat_id = $v[cat_id]  and is_open=1"); $sql_result_v2 = S("sql_".$md5_key); if(empty($sql_result_v2)) { $Model = new \Think\Model(); $result_name = $sql_result_v2 = $Model->query("select * from `__PREFIX__article` where cat_id = $v[cat_id]  and is_open=1"); S("sql_".$md5_key,$sql_result_v2,TPSHOP_CACHE_TIME); } foreach($sql_result_v2 as $k2=>$v2): ?><dd><a href="<?php echo U('Home/Article/detail',array('article_id'=>$v2[article_id]));?>"><?php echo ($v2[title]); ?></a></dd><?php endforeach; ?>
          </dl>
        </li><?php endforeach; ?>
        <li class="app-item">
          <p>TPshop官网</p>
          <img width="90" height="90" title="" alt="TPshop网客户端" src="/Template/pc/soubao/Static/images/qrcode_vmall_app01.png">
        </li>
      </ul>
    </div>
    <div class="site-info">
      <div class="foot-nav">
	      <a href="" target="_blank">公司介绍</a>| 
	      <a href="" target="_blank">媒体报道</a>| 
	      <a href="" target="_blank">热搜索词</a>| 
	      <a href="" target="_blank">友情链接</a>| 
	      <a href="" target="_blank">商家入驻</a>| 
	      <a href="" target="_blank">招商标准</a>| 
	      <a href="" style="cursor:default;text-decoration:none;">客服热线 <?php echo ($tpshop_config['shop_info_phone']); ?></a>
	  </div>
      <div class="link">
        <p>
        Copyright © 2016-2025 <?php echo ($tpshop_config['shop_info_store_name']); ?>  版权所有 保留一切权利 备案号:<?php echo ($tpshop_config['shop_info_record_no']); ?>
        
        <!--您好,请您给TPshop留个友情链接-->
        &nbsp;&nbsp;<a href="http://www.tp-shop.cn/">TPshop开源商城</a>
        <!--您好,请您给TPshop留个友情链接-->        
        </p>        
      </div>
      <div class="inline-box logowall"><a href="" class="item shgs" target="_blank"></a><a href="" class="item shwl" target="_blank"></a><a href="" class="item cxwz" target="_blank"></a><a href="" class="item kxwz" target="_blank"></a><a href="" class="item hyyz" target="_blank"></a></div>
    </div>
  </div>
</div>
<script type="text/javascript" src="/Template/pc/soubao/Static/js/jquery.lazyload.js"></script>
<script type="text/javascript" src="/Template/pc/soubao/Static/js/common.js"></script>
<script type="text/javascript">
$(document).ready(function(){	
  $(".m-top-sidebar").hide();
  //当滚动条的位置处于距顶部100像素以下时，跳转链接出现，否则消失
  $(window).scroll(function() {
      if ($(window).scrollTop() > 100) {
          $(".m-top-sidebar").fadeIn(1500);
      } else {
          $(".m-top-sidebar").fadeOut(1500);
      }
  });
  //当点击跳转链接后，回到页面顶部位置
  $(".i-ico-gotop").click(function() {
      $('body,html').animate({
          scrollTop: 0
      },100);
      return false;
  });
  
  $('.switch_tab>.tab-nav>.item').click(function(){
	  $(this).addClass('item-active');
	  $(this).siblings().removeClass('item-active');
	  var showdiv = $(this).attr('rel');
	  var hotlist = $(this).parent().parent().siblings('.eidtModule').children('.goods-list');
	  if(showdiv =='goods-list'){
		  $(this).parent().parent().siblings('.eidtModule').children('.pics').hide();
		  hotlist.show();
	  }else{
		  $(this).parent().parent().siblings('.eidtModule').children('.pics').show();
		  hotlist.hide();
	  }
	  $('.pics-01').find('img').each(function(i,o){
		  if($(o).hasClass('prod')){
			  $(o).attr('src',$(o).attr('data-original'));
			  $(o).removeClass('prod');
			  $(o).removeAttr('data-original');
		  }
	  });
  });
});

  $(document).ready(function() { 
	  var length, 
	  currentIndex = 0, interval, 
	  hasStarted = false, //是否已经开始轮播 
	  t = 3000; //轮播时间间隔 
	  length = $('.slider-panel').length; 
	  //将除了第一张图片隐藏 
	  $('.slider-panel:not(:first)').hide(); 
	  //将第一个slider-item设为激活状态 
	  $('.slider-item:first').addClass('ui-switchable-active'); 
	  //隐藏向前、向后翻按钮 
	  $('.s-pg').hide(); 
	  //鼠标上悬时显示向前、向后翻按钮,停止滑动，鼠标离开时隐藏向前、向后翻按钮，开始滑动 
	  $('.slider-panel, .slider-prev, .slider-next').hover(function() { 
	   		stop(); 
	   		$('.s-pg').show(); 
	  }, function() { 
	     	$('.s-pg').hide(); 
	   	 	start(); 
	  }); 
	  $('.slider-item').hover(function(e) { 
	   	stop(); 
	   	var preIndex = $(".slider-item").filter(".ui-switchable-active").index(); 
	   	currentIndex = $(this).index(); 
	   	play(preIndex, currentIndex); 
	  }, function() { 
	    start(); 
	  }); 
	  
	  $('.slider-prev').unbind('click'); 
	  $('.slider-prev').bind('click', function() { 
	    	prev(); 
	  }); 
	  $('.slider-next').unbind('click'); 
	  $('.slider-next').bind('click', function() { 
	    	next(); 
	  }); 
	  /** 
	   * 向前翻页 
	   */
	  function prev() { 
	   	var preIndex = currentIndex; 
	   	currentIndex = (--currentIndex + length) % length; 
	   	play(preIndex, currentIndex); 
	  } 
	  /** 
	   * 向后翻页 
	   */
	  function next() { 
	   	var preIndex = currentIndex; 
	   	currentIndex = ++currentIndex % length; 
	   	play(preIndex, currentIndex); 
	  } 
	  /** 
	   * 从preIndex页翻到currentIndex页 
	   * preIndex 整数，翻页的起始页 
	   * currentIndex 整数，翻到的那页 
	   */
	  function play(preIndex, currentIndex) { 
	   	$('.slider-panel').eq(preIndex).fadeOut(500).removeClass('zoom-out');
	   	$('.slider-panel').eq(currentIndex).fadeIn(500).addClass('zoom-out');
	   	$('.slider-item').removeClass('ui-switchable-active'); 
	   	$('.slider-item').eq(currentIndex).addClass('ui-switchable-active'); 
	  } 
	  /** 
	   * 开始轮播 
	   */
	  function start() { 
	   	if(!hasStarted) { 
	    hasStarted = true; 
	    interval = setInterval(next, t); 
	   } 
	  } 
	  /** 
	   * 停止轮播 
	   */
	  function stop() { 
		   clearInterval(interval); 
		   hasStarted = false; 
	  } 
	  //开始轮播 
	  start(); 
	});
</script>
<script src="/Public/js/jqueryUrlGet.js"></script><!--获取get参数插件-->
<script> 
set_first_leader(); //设置推荐人 
// 如果是手机浏览器跳到手机
if(isMobileBrowser())
   location.href="<?php echo U('Mobile/Index/index');?>";
</script>
</body>
</html>