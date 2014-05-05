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
require_once API_PATH . '/model/MbsClassifyModel.class.php';

class MbsClassifyImpl extends BaseImpl {
    
    /**
     * @brief 个人信息保存
     * @param int $accoutId  用户名
     * @param string $passwd 新密码
     * @return boolean
     */
    public static function addClassify($params) {
        if (empty($params['name'])) {
            return false;
        }
        $mbsClassifyModel = self::getModel('MbsClassifyModel');
        $ret = $mbsClassifyModel->insertClassifyInfo($params);
        return $ret;
    }
    
    public static function getAllClassify($params) {
        $mbsClassifyModel = self::getModel('MbsClassifyModel');
        $ret = $mbsClassifyModel->getAllClassify($params);
        return $ret;
    }
    
    public static function getClassifyById($params) {
        $mbsClassifyModel = self::getModel('MbsClassifyModel');
        $ret = $mbsClassifyModel->getClassifyById($params['id']);
        return $ret;
    }

    public static function deleteClassifyById($params) {
        if (empty($params['id'])) {
            return false;
        }
        $mbsClassifyModel = self::getModel('MbsClassifyModel');
        $children = $mbsClassifyModel->getAllClassify(array(
            'field'   => 'classify_id',
            'filters' => array(
                    array('parent_id', '=', $params['id'])
                ),
        ));
        if (!empty($children) && is_array($children)) {
            foreach ($children as $key => $item) {
                $mbsClassifyModel->deleteClassifyById($item['classify_id']);
            }
        }
        return $mbsClassifyModel->deleteClassifyById($params['id']);
    }
    public static function updateClassify($params) {
        if (empty($params['classify_id'])) {
            return false;
        }
        $mbsClassifyModel = self::getModel('MbsClassifyModel');
        $ret = $mbsClassifyModel->updateClassify($params);
        return $ret;
    }
}
