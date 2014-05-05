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
require_once API_PATH . '/model/MbsArticleModel.class.php';

class MbsArticleImpl extends BaseImpl {
    
    /**
     * @brief 个人信息保存
     * @param int $accoutId  用户名
     * @param string $passwd 新密码
     * @return boolean
     */
    public static function addArticle($params) {
        if (empty($params['title'])) {
            return false;
        }
        $articleModel = self::getModel('MbsArticleModel');
        $ret = $articleModel->insertArticleInfo($params);
        return $ret;
    }
    
    /**
     * @brief 个人信息保存
     * @param int $accoutId  用户名
     * @param string $passwd 新密码
     * @return boolean
     */
    public static function getAllArticle() {
        $articleModel = self::getModel('MbsArticleModel');
        $ret = $articleModel->getAllArticle();
        return $ret;
    }

    public static function deleteArticleById($param) {
        $articleModel = self::getModel('MbsArticleModel');
        $ret = $articleModel->deleteArticleById($param['id']);
        return $ret;
    }

    public static function getArticleById($id){
        $articleModel = self::getModel('MbsArticleModel');
        $ret = $articleModel->getArticleById($id);
        return $ret;
    }
    //通过类别id取数据
    public static function getArticleByCid($cid) {
        $searchParam = array();
        if (empty($cid)) {
           return array();    
        } else {
            $searchParam['filter'] = array(
                array('classify_id','=',$cid)
            );
        }
        $articleModel = self::getModel('MbsArticleModel');
        if (!empty($param['order_by'])) {
            $searchParam['order_by'] = $param['order_by'];
        } 
        if (!empty($param['limit'])) {
            $searchParam['limit'] = $param['limit'];
        }
        if (!empty($param['offset'])) {
            $searchParam['offset'] = $param['offset'];
        }
        $ret = $articleModel->getArticleByFilter($searchParam);
        return $ret;
    }

    public static function getArticleOrderBy($param) {
        $searchParam = array();
        $articleModel = self::getModel('MbsArticleModel');
        if (!empty($param['order_by'])) {
            $searchParam['order_by'] = $param['order_by'];
        } 
        if (!empty($param['limit'])) {
            $searchParam['limit'] = $param['limit'];
        }
        if (!empty($param['offset'])) {
            $searchParam['offset'] = $param['offset'];
        }
        $ret = $articleModel->getArticleByFilter($searchParam);
        return $ret;
    }
}