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

//用户表
require_once FRAMEWORK_PATH . '/util/db/BaseModel.class.php';
require_once CONF_PATH . '/db/DBConfig.class.php';
class MbsUserModel extends BaseModel {
    protected function init() {
        $this->dbName         = DBConfig::DB_MBS;
        $this->tableName      = 'mbs_user';
        $this->dbMasterConfig = DBConfig::$SERVER_MASTER;
        $this->dbSlaveConfig  = DBConfig::$SERVER_SLAVE;
        $this->fieldTypes     = array(
            'user_id'               => 'int',
            'username'              => 'varchar',
            'password'              => 'varchar',
            'role_id'               => 'int',
            'telephone'             => 'varchar',
            'insert_time'           => 'int',
            'insert_user_id'        => 'int',
            'status'                => 'int'
        );
    }

    //获取用户信息
    public function getInfoByUser($field, $userName) {
        if (empty($userName)) {
            return array();
        }
        if (is_array($userName)) {
            $filters = array(array('username', 'in', $userName));
            return $this->getAll($field, $filters);
        } else {
            $filters = array(array('username', '=', $userName));
            return $this->getRow($field, $filters);
        }
    }
    
    //获取用户信息 根据ID
    public function getInfoByUserId($field, $id) {
    	if (empty($id)) {
    		return array();
    	}
    	if (is_array($id)) {
    		$filters = array(array('user_id', 'in', $id));
    		return $this->getAll($field, $filters);
    	} else {
    		$filters = array(array('user_id', '=', $id));
    		return $this->getRow($field, $filters);
    	}
    }
    
    //用户登陆验证
    public function getUserInfoWhenLogin($field, $userName, $passwd) {
        $passwd = md5($passwd);
        $filters = array(
            array('username', '=', $userName),
            array('password', '=', $passwd),
            array('status', '=', 1)
        );
        return $this->getRow($field, $filters, '', 0, true);
    }
    //验证密码正确性
    public function checkPwd($field, $userName, $passwd) {
        $passwd = md5($passwd);
        $filters = array(
                array('username', '=', $userName),
                array('password', '=', $passwd)
        );
        return $this->getRow($field, $filters, '', 0, true);
    }
    //修改密码
    public function changePwd($userName, $passwd) {
        if (empty($userName) || empty($passwd)) {
            return false;
        }
        $passwd = md5($passwd);
        $row = array(
                'password' => $passwd
        );
        $filters = array(
                array('username', '=', $userName)
        );
        return $this->update($row, $filters);
    }
     /**
     * @desc 添加信息
     */
    public function insertUser($info) {
        if (isset($info['password'])) {
            $info['password'] = md5($info['password']);
        }
        return $this->insert($info);
    }
}
