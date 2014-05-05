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
require_once API_PATH . '/impl/MbsClassifyImpl.class.php';

class MbsClassifyInterface {
    
     public static function addClassify($params) {
         return MbsClassifyImpl::addClassify($params);
     }
     public static function getAllClassify($params = array()) {
         return MbsClassifyImpl::getAllClassify($params);
     }
     public static function getClassifyById($params) {
         return MbsClassifyImpl::getClassifyById($params);
     }
     public static function deleteClassifyById($params) {
         return MbsClassifyImpl::deleteClassifyById($params);
     }
     public static function saveClassify($params) {
     	 return MbsClassifyImpl::updateClassify($params);	
     }
}

?>