<?php
require_once API_PATH . '/interface/MbsClassifyInterface.class.php';
require_once FRAMEWORK_PATH . '/util/common/Session.class.php' ;
require_once WEB_V3 . '/common/BackendPage.class.php';
class ClassifyPage extends BackendPage{
    public $fieldTypes     = array(
            'parent_id' => '1',
            'name' => '', // 分类名
    );
    public function init() {
        parent::init();
    }
    public function addAction() {
        //$param = $_POST;
        $userInfo = Session::getValue('backend_user_info');
        $param = array();
        $this->_formatePostData($param);
        $ret = MbsClassifyInterface::addClassify($param);
        if ($ret !== false) {
            $isSuccess = true;
        } else {
            $isSuccess = false;
        }
        
        $classifies = $this->getClassify();
        $this->render(array(
            'userInfo'   => $userInfo,
            'classifies' => $classifies,
            'isSuccess'  => $isSuccess
        ), 'admin/classify/add.php');
    }
    
    public function defaultAction() {
        $userInfo = Session::getValue('backend_user_info');
        $classifies = $this->getClassify();
        $this->render(array(
                'userInfo'   => $userInfo,
                'classifies' => $classifies,
            ), 'admin/classify/add.php');
    }
    public function manageAction() {
        $userInfo = Session::getValue('backend_user_info');
        $classifyList = MbsClassifyInterface::getAllClassify(array());
        $this->render(array(
                'userInfo'     => $userInfo,
                'classifyList' => $classifyList,
        ), 'admin/classify/manage.php');
    }

    public function editAction() {
        $id = RequestUtil::getGET('id');
        if ($id) {
            $classify = MbsClassifyInterface::getClassifyById(array('id' => $id));
        }
        $classifyList = $this->getClassify();
        $this->render(array(
                'classify'     => $classify,
                'classifies' => $classifyList,
        ), 'admin/classify/edit.php');
    }

    public function saveAction() {
        //$param = $_POST;
        $userInfo = Session::getValue('backend_user_info');
        $param = array();
        $this->_formatePostData($param);
        $classify = MbsClassifyInterface::getClassifyById(array('id' => $_POST['classify_id']));
        $classify = array_merge($classify, $param);
        $ret = MbsClassifyInterface::saveClassify($classify);
        if ($ret) {
            echo 'success';
        } else {
            echo 'fail';
        }
    }
    private function _formatePostData(& $param){
        foreach ($this->fieldTypes as $key => $value) {
            if (empty($param[$key]) && !empty($_POST[$key])) {
                $param[$key] = $_POST[$key];
            } else if (empty($param[$key])) {
                $param[$key] = $value;
            }
        }
    }
    
    private function getClassify() {
        $classifies = MbsClassifyInterface::getAllClassify(array());
        array_unshift($classifies, array('classify_id'=>1,'name'=>'无'));
        return $classifies;
    }
}

?>