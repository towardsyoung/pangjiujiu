<?php
require_once API_PATH . '/interface/MbsUserInterface.class.php';
require_once FRAMEWORK_PATH . '/util/common/Session.class.php' ;
require_once WEB_V3 . '/common/BackendPage.class.php';
class LoginPage extends BackendPage{
    public function init() {
        //parent::init();
        $this->userInfo['username'] = RequestUtil::getPOST('username');
        $this->userInfo['password'] = RequestUtil::getPOST('password');
        $menuHtml = $this->view->helper('menu', array('menu' => Menu::$MENUS));
        $this->assign('menuHtml',$menuHtml);
    }
    
    public function defaultAction() {
        if (!empty($this->userInfo)) {
            $result = MbsUserInterface::getUserInfoWhenLogin(array(
                    'field'    => '*',
                    'username' => $this->userInfo['username'],
                    'password' => $this->userInfo['password'] 
            ));
        }
        if(empty($result)) {
            $this->render(array(
                    'page' => 'admin,login',
            ), 'admin/login.php');
        } else {
            $result['cookie'] = time();
            setcookie('pjj_AUTH_STRING', $result['cookie'], 0, '/');
            Session::setValue('backend_user_info', $result);
            $this->render(array(
                    'userInfo' => $result,
            ), 'admin/activity/add.php');
        }
    }
}

?>