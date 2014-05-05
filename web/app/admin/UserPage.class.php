<?php
require_once API_PATH . '/interface/MbsUserInterface.class.php';
require_once FRAMEWORK_PATH . '/util/common/Session.class.php' ;
require_once WEB_V3 . '/common/BackendPage.class.php';
class UserPage extends BackendPage{
    public function init() {
        parent::init();
    }
    
    public function defaultAction() {
        $userInfo = Session::getValue('backend_user_info');
        $this->render(array(
            'userInfo' => $userInfo
        ), 'admin/user/add.php');
    }
    public function addAction() {
        $userInfo = Session::getValue('backend_user_info');
        $param = array(
            'username' => RequestUtil::getPOST('username'),
            'password' => RequestUtil::getPOST('password'),
            'role_id'  => RequestUtil::getPOST('role_id'),
            'telephone'=> RequestUtil::getPOST('telephone'),
            'insert_user_id' => $userInfo['user_id'],
            'insert_time'    => time(),
            'status'         => 1
        );
        $exitUser = MbsUserInterface::getUserByName($param);
        if (!empty($exitUser)) {
            $ret['result'] = 0;
            $ret['msg'] = '用户名已存在';
        } else {
            $ret = MbsUserInterface::addUser($param);
            if ($ret !== false) {
                $ret = array();
                $ret['result'] = 1;
                $ret['msg'] = '添加成功';
            } else {
                $ret = array();
                $ret['result'] = 0;
                $ret['msg'] = '添加失败';
            }
        }
        echo json_encode($ret);
    }
}

?>