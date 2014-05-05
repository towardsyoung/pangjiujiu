<?php

require_once FRAMEWORK_PATH . '/util/db/BaseModel.class.php';
require_once CONF_PATH . '/db/DBConfig.class.php';

/**
 * 自动生成模型的模板类
 *
 * @author    daizj <daizj@273.cn>
 * @since     2013-10-20
 * @copyright Copyright (c) 2003-2013 273 Inc. (http://www.273.cn)
 * @desc      
 */

class MbsClassifyModel extends BaseModel {

    protected function init() {
        $this->dbName         = DBConfig::DB_MBS;
        $this->tableName      = 'mbs_classify';
        $this->dbMasterConfig = DBConfig::$SERVER_MASTER;
        $this->dbSlaveConfig  = DBConfig::$SERVER_SLAVE;
        $this->fieldTypes     = array(
            'classify_id' => 'int', // 
            'name' => 'varchar', // 
            'parent_id' => 'int', // 
            'status' => 'int', // 
        );
    }
    
    /**
     * @desc 添加信息
     */
    public function insertClassifyInfo($info) {
        return $this->insert($info);
    }
    
    /**
     * @desc 添加信息
     */
    public function getAllClassify($param) {
        $field = isset($param['field']) ? $param['field'] : '*';
        $filters = isset($param['filters']) ? $param['filters'] : '';
        $orderBy = isset($param['orderBy']) ? $param['orderBy'] : '';
        return $this->getAll($field, $filters, $orderBy);
    }
    
    /**
     * @desc 添加信息
     */
    public function deleteClassifyById($id) {
        return $this->delete(array(
                array('classify_id', '=', $id)
             ));
    }
    /**
     * @desc 根据id获取分类
     **/
    public function getClassifyById($id) {
        if (!isset($id)) {
            return null;
        }
        $ret = $this->getRow('*', array(
            array('classify_id', '=', $id),
        ));
        return $ret;
    }

    /**
     * @desc 根据id获取分类
     **/
    public function updateClassify($params) {
        $field = $this->fieldTypes;
        unset($field['classify_id']);
        $columnsAndValues = array();
        foreach ($field as $key => $value) {
            if (isset($params[$key])) {
                $columnsAndValues[$key] = $params[$key];
            }
        }
        $filters = array(
            array('classify_id', '=', $params['classify_id'])
        );
        return $this->update($columnsAndValues, $filters);
    }
}
