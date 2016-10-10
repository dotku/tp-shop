<?php if (!defined('THINK_PATH')) exit();?>
<?php if(count($address_list) > 0): ?><!--默认选中的地址-->
     <div class="order-address-list ">
            <table width="100%" cellspacing="0" cellpadding="0" border="1" class="address">
                  <tbody>
                      <tr>
                        <td width="5%"  class="default"><i></i></td>
                        <td width="5%"  class="co-red default">自提点</td>
 
                        <td width="5%"  class="address_id"><input type="radio" onclick="swidth_address(this)" name="address_id" value="<?php echo ($address_list['address_id']); ?>"/></td>
 
                        <td width="15%"  class="consignee"><b>收货人:<?php echo ($address_list['consignee']); ?></b></td>
                        <td width="40%"  class="address2"><span>地址:<?php echo ($address_list['province_name']); ?> <?php echo ($address_list['city_name']); ?> <?php echo ($address_list['district_name']); ?> <?php echo ($address_list['address']); ?></span></td>
                        <td width="20%"  class="mobile"><span>电话：<?php echo ($address_list[mobile]); ?></span></td>
                        <td width="15%"  class="wi100"><span><a onclick="replace_pickup(<?php echo ($address_list['province']); ?>,<?php echo ($address_list['city']); ?>,<?php echo ($address_list['district']); ?>);">更换自提点</a></span></td>
                      </tr>
                  </tbody>
              </table>
        </div><?php endif; ?>
<?php if(count($pickup_list) > 0): ?><div class="order-address-list">
            <table width="100%" cellspacing="0" cellpadding="0" border="1" class="address">
              <tbody>
                  <tr>
                        <td width="5%"  class="default"><i></i></td>
                        <td width="10%"  class="address_id"><input style="cursor: pointer; background: WHITE; border: 1px solid #dedede; padding: 6px; color: #666;" type="button" data-province-id="<?php echo ($pickup_list['province_id']); ?>" onclick="replace_pickup(<?php echo ($pickup_list['province_id']); ?>,<?php echo ($pickup_list['city_id']); ?>,<?php echo ($pickup_list['district_id']); ?>);" value="匹配推荐点" data-city-id="<?php echo ($pickup_list['city_id']); ?>" data-district-id="<?php echo ($pickup_list['district_id']); ?>" /></td>
                        <td width="15%" class="consignee"><b><?php echo ($pickup_list['pickup_name']); ?></b></td>
                        <td width="60%"  class="address2"><span>地址:<?php echo ($pickup_list['province_name']); ?> <?php echo ($pickup_list['city_name']); ?> <?php echo ($pickup_list['district_name']); ?> <?php echo ($pickup_list['pickup_address']); ?></span></td>
                        <td width="5%"  class="wi100"><span><a onclick="replace_pickup(<?php echo ($pickup_list['province_id']); ?>,<?php echo ($pickup_list['city_id']); ?>,<?php echo ($pickup_list['district_id']); ?>);">更换自提点</a></span></td>
                  </tr>
               </tbody>
             </table>
       </div><?php endif; ?>
<?php if($_GET['show'] == 1): ?><script>
    $("#ajax_pickup").find("td input[type=radio]:first-child").trigger('click');
</script><?php endif; ?>