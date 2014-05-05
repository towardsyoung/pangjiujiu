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
require_once API_PATH . '/model/MbsUserModel.class.php';
require_once FRAMEWORK_PATH . '/util/common/Session.class.php' ;

class MbsUserImpl extends BaseImpl {
    /**
     *根据username获得其信息
     *
     */
    public static function getInfoByUser($userName) {
        if (!$userName) {
            return array();
        }
        $mbsUserModel = self::getModel('MbsUserModel');
        return $mbsUserModel->getInfoByUser('*',$userName);
    }
    /**
     *根据id获得其信息
     *
     */
    public static function getInfoByUserId($id) {
    	if (!$id) {
    		return array();
    	}
    	$mbsUserModel = self::getModel('MbsUserModel');
    	return $mbsUserModel->getInfoByUserId('*',$id);
    }
    
    /**
     * @brief 验证密码正确性
     * @param int $accoutId  用户名
     * @param string $passwd 密码
     * @return boolean
     */
    public static function getUserInfoWhenLogin($field, $username, $passwd) {
        if (!$username) {
            return false;
        }
        $field = empty($field) ? '*' : $field;
        $mbsUserModel = self::getModel('MbsUserModel');
        $userInfo = $mbsUserModel->getUserInfoWhenLogin($field, $username, $passwd);
        if (empty($userInfo)) {
            return false;
        } else {
            return $userInfo;
        }
    }
    
    /**
     * @brief 验证密码正确性
     * @param int $accoutId  用户名
     * @param string $passwd 密码
     * @return boolean
     */
    public static function checkPwd($username, $passwd) {
        if (!$username) {
            return false;
        }
        $mbsUserModel = self::getModel('MbsUserForOracleModel');
        $userInfo = $mbsUserModel->checkPwd('*', $username, $passwd);
        if (empty($userInfo)) {
            return false;
        } else {
            return true;
        }
    }
    
    /**
     * @brief 修改密码
     * @param int $accoutId  用户名
     * @param string $passwd 新密码
     * @return boolean
     */
    public static function changePwd($username, $passwd) {
        if (!$username) {
            return false;
        }
        $mbsUserModel = self::getModel('MbsUserForOracleModel');
        $userInfo = $mbsUserModel->changePwd($username, $passwd);
        if (empty($userInfo)) {
            return false;
        } else {
            return true;
        }
    }
    
    /**
     * @brief 个人信息保存
     * @param int $accoutId  用户名
     * @param string $passwd 新密码
     * @return boolean
     */
    public static function userSave($params) {
        if (empty($params)) {
            return false;
        }
        $mbsUserModel = self::getModel('MbsUserModel');
        $ret = $mbsUserModel->insertUser($params);
        return $ret;
    }
}
