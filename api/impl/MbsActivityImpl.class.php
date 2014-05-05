<?php
/**
 * @package              V3
 * @subpackage           
 * @author               $Author:   chenchaoyang
 * @file                 $HeadURL$
 * @version              $Rev$
 * @lastChangeBy         $LastChangedBy$
 * @lastmodified         $LastChangedDate$
 * @copyright            Copyright (c) 2013, www.273.cn
 */

//业管用户
require_once API_PATH . '/impl/BaseImpl.class.php';
require_once API_PATH . '/model/MbsActivityModel.class.php';

class MbsActivityImpl extends BaseImpl {
    
    /**
     * @brief 个人信息保存
     * @param int $accoutId  用户名
     * @param string $passwd 新密码
     * @return boolean
     */
    public static function addActivity($params) {
        if (empty($params['title'])) {
            return false;
        }
        $activityModel = self::getModel('MbsActivityModel');
        $ret = $activityModel->insertActivityInfo($params);
        return $ret;
    }
    
    /**
     * @brief 个人信息保存
     * @param int $accoutId  用户名
     * @param string $passwd 新密码
     * @return boolean
     */
    public static function getAllActivity() {
        $activityModel = self::getModel('MbsActivityModel');
        $ret = $activityModel->getAllActivity();
        return $ret;
    }

    public static function deleteActivityById($param) {
        $activityModel = self::getModel('MbsActivityModel');
        $ret = $activityModel->deleteActivityById($param['id']);
        return $ret;
    }

    public static function getActivityById($id){
        $activityModel = self::getModel('MbsActivityModel');
        $ret = $activityModel->getActivityById($id);
        return $ret;
    }

    public static function getActivityOrderBy($param) {
        $searchParam = array();
        $activityModel = self::getModel('MbsActivityModel');
        if (!empty($param['order_by'])) {
            $searchParam = $param['order_by'];
        } 
        if (!empty($param['limit'])) {
            $searchParam = $param['limit'];
        }
        if (!empty($param['offset'])) {
            $searchParam = $param['offset'];
        }
        $ret = $activityModel->getActivityByFilter($param);
        return $ret;
    }
}
