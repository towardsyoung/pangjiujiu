<?php
require_once API_PATH . '/interface/MbsClassifyInterface.class.php';
require_once API_PATH . '/interface/MbsArticleInterface.class.php';
require_once FRAMEWORK_PATH . '/util/common/Session.class.php' ;
require_once WEB_V3 . '/common/BackendPage.class.php';
class ArticlePage extends BackendPage{
    public function init() {
        parent::init();
    }
    public function addAction() {
        $userInfo = Session::getValue('backend_user_info');
        $param = array(
            'title' => RequestUtil::getPOST('title'),
            'classify_id' => RequestUtil::getPOST('classify_id'),
            'content' => RequestUtil::getPOST('content', '', true),
            'insert_user_id' => $userInfo['user_id'],
            'insert_time' => time(),
            'status' => 1
        );
        $ret = MbsArticleInterface::addArticle($param);
        if ($ret !== false) {
            echo '1';
        } else {
            echo '0';
        }
    }
    
    public function defaultAction() {
        $userInfo = Session::getValue('backend_user_info');
        $classifies = MbsClassifyInterface::getAllClassify();
        $this->render(array(
            'classifies' => $classifies,
            'userInfo'   => $userInfo,
        ), 'admin/article/add.php');
    }
    
    public function manageAction() {
        $userInfo = Session::getValue('backend_user_info');
        $articleList = MbsArticleInterface::getAllArticle();
        $articleList = BaseHelper::formatArticlePost($articleList);
        $this->render(array(
                'userInfo'    => $userInfo,
                'articleList' => $articleList,
        ), 'admin/article/manage.php');
    }
    
    public function editAction() {
        $userInfo = Session::getValue('backend_user_info');
        $id = RequestUtil::getGET('id');
        if ($id) {
            $activity = MbsActivityInterface::getActivityById(array('id' => $id));
        }
        $classifies = MbsClassifyInterface::getAllClassify();
        $this->render(array(
                'activity'     => $activity,
                'classifies' => $classifies,
                'userInfo' => $userInfo,
        ), 'admin/activity/edit.php');
    }
    private function _formatePostData(& $param){
        foreach ($this->fieldTypes as $key => $value) {
            if (empty($param[$key]) && !empty($_POST[$key])) {
                $param[$key] = $_POST[$key];
            } else if (empty($param[$key])) {
                $param[$key] = $value;
            }
        }
        if (!empty($param['start_time'])) {
            $temp=explode("-", $param['start_time']);
            $param['start_time'] = mktime(0,0,0,$temp[1],$temp[2],$temp[0]);
        }
        if (!empty($param['end_time'])) {
            $temp=explode("-", $param['end_time']);
            $param['end_time'] = mktime(0,0,0,$temp[1],$temp[2],$temp[0]);
        }
        if (is_uploaded_file($_FILES['img_url']['tmp_name'])){
            if (!move_uploaded_file($_FILES['img_url']['tmp_name'], 'static/image/'.$_FILES['img_url']['name'])) {
                $param['img_url'] = '';
            } else {
                $param['img_url'] = 'static/image/'.$_FILES['img_url']['name'];
            }
        } 
    }
    private function _formatClassify($classifies){
        $ret = array();
        if (!empty($classifies)) {
            foreach ($classifies as $classify) {
                $ret[$classify['classify_id']] = $classify['name'];
            }
        }
        return $ret;
    }
    private function _formatActivity(&$data){
        $classifies = MbsClassifyInterface::getAllClassify();
        $classifies = $this->_formatClassify($classifies);
        if (!empty($data)) {
            foreach ($data as $key => $item) {
                if ($item['classify_id'] > 0 && in_array($item['classify_id'], $classifies)) {
                    $data[$key]['classify'] = $classifies[$item['classify_id']];
                } else {
                    $data[$key]['classify'] = '无';
                }
                if ($item['start_time'] > 0) {
                    $data[$key]['start_time'] = date('Y-m-d', $item['start_time']);
                } else {
                    $data[$key]['start_time'] = '不详';
                }
                if ($item['end_time'] > 0) {
                    $data[$key]['end_time'] = date('Y-m-d', $item['end_time']);
                } else {
                    $data[$key]['end_time'] = '不详';
                }
                if ($item['pub_time'] > 0) {
                    $data[$key]['pub_time'] = date('Y-m-d', $item['pub_time']);
                } else {
                    $data[$key]['pub_time'] = '不详';
                }
            }
        }
    }
}

?>