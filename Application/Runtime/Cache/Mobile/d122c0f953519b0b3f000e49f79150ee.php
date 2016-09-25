<?php if (!defined('THINK_PATH')) exit();?><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
 <!---晒单end--> 
<?php if($commentlist != ''): ?><div class="comment_list" id="commentList">
    <ul>
      <?php if(is_array($commentlist)): foreach($commentlist as $k=>$v): ?><li class="comment_item">
        <div class="content_head" <?php if(($k+1) == count($comment_list)): ?>style="border-bottom:0px solid #CCC;"<?php else: ?>style="border-bottom:1px solid #CCC;"<?php endif; ?>>
	          <div class="info">
	            <div class=" comment_star">
	              <div class="one"><em>		<img src="<?php echo ((isset($user['head_pic']) && ($user['head_pic'] !== ""))?($user['head_pic']):" /Template/mobile/new/Static/images/user68.jpg"); ?>"><span><?php echo ($user['nickname']); ?></span></em></div>
	              <div class="name">
	              		
	              		<?php echo ($v["username"]); ?>
	              		<em><img src="/Template/mobile/new/Static/images/stars<?php echo ($v["service_rank"]); ?>.png" alt="" /></em>
	              </div>
	               <div class="two"><?php echo (date('Y-m-d H:i',$v["add_time"])); ?></div>
	            </div>
	          </div>
	          <p> <?php echo (htmlspecialchars_decode($v['content'])); ?></p>         
			 <!---晒单-->   
			<?php if($v['img'] != ''): ?><!--<div class="shaidan">       
			      <h4><?php echo ($value["title"]); ?></h4>
			      <p><?php echo ($value["content"]); ?></p>
			   	</div>-->
					<div class="sd_img">
					<dl id="gallery">
						<?php if(is_array($v['img'])): foreach($v['img'] as $key=>$v2): ?><dd>
						    	<a href="<?php echo ($v2); ?>"><img src="<?php echo ($v2); ?>" width="100px" heigth="100px"></a>
						    </dd><?php endforeach; endif; ?>
					</dl>
					</div><?php endif; ?>

			<!--管理员回复-->  
			<?php if(is_array($replyList)): foreach($replyList as $key=>$val): ?><p style=" color:#F60; border-top:1px dashed #e5e5e5; padding-top:8px; margin-top:10px"><span>管理员<?php echo ($val["username"]); ?>回复：<br></span><?php echo ($val["content"]); ?></p><?php endforeach; endif; ?>          
   		</div>
   	  </li><?php endforeach; endif; ?>
</ul>
<?php if(count($commentlist) > 5): ?><div class="comment_page"> 

		<a href="javascript:<?php echo ($comments["page_prev"]); ?>" class="prev">上一页</a> 

	<a href="javascript:;" class="prev" ><?php echo ($comments["page"]); ?>/<?php echo ($comments["page_count"]); ?></a> 

		<a href="javascript:<?php echo ($comments["page_next"]); ?>" class="next" >下一页</a>

</div><?php endif; ?>
<?php else: ?>
<div class="comment_list" >
	<div class="score">暂时还没有任何用户评论</div>
</div>
</div><?php endif; ?>