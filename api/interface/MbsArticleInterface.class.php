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
require_once API_PATH . '/impl/MbsArticleImpl.class.php';

class MbsArticleInterface {
    
     public static function addArticle($params) {
         return MbsArticleImpl::addArticle($params);
     }
     /**
      * @brief 个人信息保存
      * @param int $accoutId  用户名
      * @param string $passwd 新密码
      * @return boolean
      */
     public static function getAllArticle($params = array()) {
         return MbsArticleImpl::getAllArticle();
     }

     public static function deleteArticleById($params) {
         return MbsArticleImpl::deleteArticleById($params);
     }

     public static function getArticleById($params) {
         return MbsArticleImpl::getArticleById($params['id']);
     }

     public static function getArticleByCid($params) {
         return MbsArticleImpl::getArticleByCid($params['cid']);
     }

     public static function getArticleOrderBy($params) {
         return MbsArticleImpl::getArticleOrderBy($params);
     }
}

?>