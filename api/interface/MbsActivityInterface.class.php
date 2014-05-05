<?php
/**
 * @package              V3
 * @subpackage           
 * @author               $Author:   chenchaoyang$
 * @file                 $HeadURL$
 * @version              $Rev$
 * @lastChangeBy         $LastChangedBy$
 * @lastmodified         $LastChangedDate$
 * @copyright            Copyright (c) 2013, www.273.cn
 */

//业管用户接口
require_once API_PATH . '/impl/MbsActivityImpl.class.php';

class MbsActivityInterface {
    
     public static function addActivity($params) {
         return MbsActivityImpl::addActivity($params);
     }
     /**
      * @brief 个人信息保存
      * @param int $accoutId  用户名
      * @param string $passwd 新密码
      * @return boolean
      */
     public static function getAllActivity($params = array()) {
         return MbsActivityImpl::getAllActivity();
     }

     public static function deleteActivityById($params) {
         return MbsActivityImpl::deleteActivityById($params);
     }

     public static function getActivityById($params) {
         return MbsActivityImpl::getActivityById($params['id']);
     }

     public static function getActivityOrderBy($params) {
         return MbsActivityImpl::getActivityOrderBy($params);
     }
}

?>