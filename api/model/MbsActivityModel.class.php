<?php
require_once FRAMEWORK_PATH . '/util/db/BaseModel.class.php';
require_once CONF_PATH . '/db/DBConfig.class.php';
/**
 *
 * @author    chenchaoyang <chency@273.cn>
 * @since     2013-10-08
 * @copyright Copyright (c) 2003-2013 273 Inc. (http://www.273.cn)
 * @desc      
 */

class MbsActivityModel extends BaseModel {

    protected function init() {
        $this->dbName         = DBConfig::DB_MBS;
        $this->tableName      = 'mbs_activity';
        $this->dbMasterConfig = DBConfig::$SERVER_MASTER;
        $this->dbSlaveConfig  = DBConfig::$SERVER_SLAVE;
        $this->fieldTypes     = array(
            'activity_id' => 'int', // 活动id
            'title' => 'varchar', // 活动标题
            'classify_id'=> 'int', //分类
            'pub_time' => 'int', // 发布时间
            'start_time' => 'int', // 开始时间
            'end_time' => 'int', // 结束时间
            'description' => 'text', // 活动描述
            'prize' => 'varchar', // 动活奖励
            'tip' => 'varchar', // 贴士小
            'img_url' => 'varchar', // 活动图片路径
            'activity_url' => 'varchar', // 活动链接地址
            'author_name' => 'varchar', // 者作名
            'author_id' => 'int', // 者作id
            'status' => 'int', // 活动状态，大于0正常，小于0不正常
        );
    }
    
    /**
     * @desc 添加信息
     */
    public function insertActivityInfo($info) {
        return $this->insert($info);
    }
    
    /**
     * @desc 添加信息
     */
    public function getAllActivity() {
        return $this->getAll();
    }
     /**
     * @desc 删除信息
     */
    public function deleteActivityById($id) {
        return $this->delete(array(
                array('activity_id', '=', $id)
             ));
    }
    public function getActivityById($id) {
        if (!isset($id)) {
            return null;
        }
        $ret = $this->getRow('*', array(
            array('activity_id', '=', $id),
        ));
        return $ret;
    }
    public function getActivityByFilter($params) {
        $field = isset($params['field']) ? $params['field'] : '*';
        $filter = isset($params['filter']) ? $params['filter'] : '';
        $orderBy = isset($params['order_by']) ? $params['order_by'] : '';
        $limit = $params['limit'] > 0 ? $params['limit'] : 0;
        $offset = $params['offset'] > 0 ? $params['offset'] : 0;
        $ret = $this->getAll($field, $filter, $orderBy,$limit,$offset);
        return $ret;
    }
}
