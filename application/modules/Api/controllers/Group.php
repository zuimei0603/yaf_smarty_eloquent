<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/1/8 0008
 * Time: 下午 16:55
 */
class GroupController extends Yaf_Controller_Abstract {
    public $actions = array(
        'grouplist' => 'modules/api/actions/group/GroupList.php',
    );
}