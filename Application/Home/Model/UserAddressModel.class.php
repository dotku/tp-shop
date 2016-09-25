<?php
/**
 * tpshop
 * ============================================================================
 * 版权所有 2015-2027 深圳搜豹网络科技有限公司，并保留所有权利。
 * 网站地址: http://www.tp-shop.cn
 * ----------------------------------------------------------------------------
 * 这不是一个自由软件！您只能在不用于商业目的的前提下对程序代码进行修改和使用 .
 * 不允许对程序代码以任何形式任何目的的再发布。
 * ============================================================================
 * Author: dyr
 * Date: 2016-08-23
 */

namespace Home\Model;

use Think\Model\RelationModel;

/**
 * Class UserAddressModel
 * @package Home\Model
 */
class UserAddressModel extends RelationModel
{
    protected $tableName = 'user_address';
    protected $_validate = array(
        array('user_id', 'require', '用户id必须'), //默认情况下用正则进行验证
        array('consignee', 'require', '收货人必须填写'), // 在新增的时候验证name字段是否唯一
        array('email','email','email格式错误'),
        array('province', 'require', '省份必须选择'),
        array('city', 'require', '省份必须选择'),
        array('district', 'require', '省份必须选择'),
        array('address', 'require', '地址必须填写'),
        array('mobile','/^1[3|4|5|8][0-9]\d{4,8}$/','手机号码错误！','0','regex',1)
    );


    /**
     * 获取用户自提点
     * @time 2016/08/23
     * @author
     * @param $user_id
     * @return mixed
     */
    public function getUserPickup($user_id)
    {
        $model = M('');
        $db_prefix = C('DB_PREFIX');
        $user_pickup_where = array(
            'ua.user_id' => $user_id,
            'ua.is_pickup' => 1
        );
        $user_pickup_list = $model
            ->field('ua.*,r1.name AS province_name,r2.name AS city_name,r3.name AS district_name')
            ->table($db_prefix . 'user_address ua')
            ->join('INNER JOIN ' . $db_prefix . 'region AS r1 ON r1.id = ua.province')
            ->join('INNER JOIN ' . $db_prefix . 'region AS r2 ON r2.id = ua.city')
            ->join('INNER JOIN ' . $db_prefix . 'region AS r3 ON r3.id = ua.district')
            ->where($user_pickup_where)
            ->find();
        return $user_pickup_list;
    }
}