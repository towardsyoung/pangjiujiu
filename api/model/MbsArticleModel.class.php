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

class MbsArticleModel extends BaseModel {

    protected function init() {
        $this->dbName         = DBConfig::DB_MBS;
        $this->tableName      = 'mbs_article';
        $this->dbMasterConfig = DBConfig::$SERVER_MASTER;
        $this->dbSlaveConfig  = DBConfig::$SERVER_SLAVE;
        $this->fieldTypes     = array(
            'id'         => 'int',     //id
            'title'      => 'varchar', // 标题
            'classify_id'=> 'int',     //分类
            'brief'      => 'text',    //概要
            'content'    => 'text',    // 内容
            'insert_user_id' => 'int', // 添加人
            'insert_time'=> 'int',     // 添加时间
            'status'     => 'int',     // 活动状态，大于0正常，小于0不正常
        );
    }
    
    /**
     * @desc 添加信息
     */
    public function insertArticleInfo($info) {
        return $this->insert($info);
    }
    
    /**
     * @desc 添加信息
     */
    public function getAllArticle() {
        return $this->getAll();
    }
     /**
     * @desc 删除信息
     */
    public function deleteArticleById($id) {
        return $this->delete(array(
                array('id', '=', $id)
             ));
    }
    public function getArticleById($id) {
        if (!isset($id)) {
            return null;
        }
        $ret = $this->getRow('*', array(
            array('id', '=', $id),
        ));
        return $ret;
    }
    public function getArticleByFilter($params) {
        $field = isset($params['field']) ? $params['field'] : '*';
        $filter = isset($params['filter']) ? $params['filter'] : '';
        $orderBy = isset($params['order_by']) ? $params['order_by'] : '';
        $limit = $params['limit'] > 0 ? $params['limit'] : 0;
        $offset = $params['offset'] > 0 ? $params['offset'] : 0;
        $ret = $this->getAll($field, $filter, $orderBy,$limit,$offset);
        return $ret;
    }
}
