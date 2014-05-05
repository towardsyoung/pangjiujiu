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
require_once API_PATH . '/impl/MbsUserImpl.class.php';

class MbsUserInterface {
    public static function getUserByName($param) {
        return MbsUserImpl::getInfoByUser($param['username']);
    }
    
    public static function getUserInfoWhenLogin($param) {
        return MbsUserImpl::getUserInfoWhenLogin($param['field'], $param['username'], $param['password']);
    }
    
    public static function getUserById($param) {
        return MbsUserImpl::getInfoByUserId($param['id']);
    }
    public static function addUser($params) {
         if (!empty($params['username'])) {
             $userInfo = self::getUserByName($params);
             if (!empty($userInfo)) {
                 return false;
             }
         }
         return MbsUserImpl::userSave($params);
     }
}

?>