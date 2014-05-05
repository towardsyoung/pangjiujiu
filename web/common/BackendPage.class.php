<?php
require_once FRAMEWORK_PATH . '/mvc/BasePage.class.php';
require_once FRAMEWORK_PATH . '/util/common/Session.class.php' ;
require_once WEB_V3 . '/app/admin/include/Menu.class.php';
require_once WEB_V3 . '/common/BaseHelper.class.php';

class BackendPage extends BasePage {
    public $userInfo = array();
    public function init() {
        // 判断用户是否登录
        if($this->checkUser() === false){
            ResponseUtil::redirect('/admin/login.php');
        }
        if ($this->userInfo['role_id'] != 1) {
            //管理员才有用户管理权限
            unset(Menu::$MENUS[0]);
        }
        $menuHtml = $this->view->helper('menu', array('menu' => Menu::$MENUS));
        $this->assign('menuHtml',$menuHtml);
    }

    // 检测用户是否已登录，如果没有则跳转到登录页，如果已登录，设置userInfo
    final function checkUser() {
        if (!empty($_COOKIE['pjj_AUTH_STRING'])) {
            $sessUesrInfo = Session::getValue('backend_user_info');
            if (!empty($sessUesrInfo) && $_COOKIE['pjj_AUTH_STRING'] == $sessUesrInfo['cookie']) {
                $this->userInfo = $sessUesrInfo;
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    /**
     * @param $cache 是否需要页面缓存,true的话，返回页面渲染后的静态内容
     */
    protected function render($data, $tpl = '', $cache = false) {
        $attrs = Bootstrap::getRouteParams();
        if ($attrs['ajax']) {
            if (!empty($tpl)) {
                $data['data'] = $this->view->fetch($tpl, $data);
                if (isset($data['errorCode']) && $data['errorCode'] > 0) {
                    $data['errorMessage'] = $data['data'];
                }
            }
            $content = $data;
        } else {
            $content = $this->view->fetch($tpl, $data);
        }
        if ($cache) {
            return $content;
        }
        $this->view->output($content, $attrs['content_type'], $attrs['jsonp']);
        exit;
    }
}
