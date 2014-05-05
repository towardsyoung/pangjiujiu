<?php
require_once API_PATH . '/interface/MbsUserInterface.class.php';
require_once API_PATH . '/interface/MbsClassifyInterface.class.php';
require_once API_PATH . '/interface/MbsActivityInterface.class.php';
require_once API_PATH . '/interface/MbsArticleInterface.class.php';

require_once FRAMEWORK_PATH . '/util/common/Session.class.php' ;
require_once WEB_V3 . '/common/BackendPage.class.php';
class AjaxPage extends BackendPage{
    public function init() {
        if($this->checkUser() == false) {
            exit();
        }
    }
    
    public function deleteClassifyAction() {
        $jsonp = $_REQUEST['jsonCallback'];
        $id = RequestUtil::getGET('id');
        $ret = array();
        if (empty($id)) {
           $ret['result'] = false; 
           $ret['msg'] = '缺少id标识';
        } else {
            $back = MbsClassifyInterface::deleteClassifyById(array('id' => $id));
            if ($back) {
                $ret['result'] = true;
                $ret['msg'] = '删除成功';
            } else {
                $ret['result'] = false;
                $ret['msg'] = '删除失败';
            }
        }
        echo $jsonp . '('. json_encode($ret). ')';
    }
    public function deleteActivityAction() {
        $jsonp = $_REQUEST['jsonCallback'];
        $id = RequestUtil::getGET('id');
        $ret = array();
        if (empty($id)) {
           $ret['result'] = false; 
           $ret['msg'] = '缺少id标识';
        } else {
            $back = MbsActivityInterface::deleteActivityById(array('id' => $id));
            if ($back) {
                $ret['result'] = true;
                $ret['msg'] = '删除成功';
            } else {
                $ret['result'] = false;
                $ret['msg'] = '删除失败';
            }
        }
        echo $jsonp . '('. json_encode($ret). ')';
    }
    
    public function deleteArticleAction() {
        $jsonp = $_REQUEST['jsonCallback'];
        $id = RequestUtil::getGET('id');
        $ret = array();
        if (empty($id)) {
           $ret['result'] = false; 
           $ret['msg'] = '缺少id标识';
        } else {
            $back = MbsArticleInterface::deleteArticleById(array('id' => $id));
            if ($back) {
                $ret['result'] = true;
                $ret['msg'] = '删除成功';
            } else {
                $ret['result'] = false;
                $ret['msg'] = '删除失败';
            }
        }
        echo $jsonp . '('. json_encode($ret). ')';
    }
}

?>