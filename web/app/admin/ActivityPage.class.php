<?php
require_once API_PATH . '/interface/MbsClassifyInterface.class.php';
require_once API_PATH . '/interface/MbsActivityInterface.class.php';
require_once FRAMEWORK_PATH . '/util/common/Session.class.php' ;
require_once WEB_V3 . '/common/BackendPage.class.php';
class ActivityPage extends BackendPage{
    public $fieldTypes     = array(
            //'activity_id' => 'int', // 活动id
            'title' => '', // 活动标题
            'classify_id'=> '1', //分类id
            'pub_time' => 0, // 发布时间
            'start_time' => 0, // 开始时间
            'end_time' => 0, // 结束时间
            'description' => '', // 活动描述
            'prize' => '', // 动活奖励
            'tip' => '', // 贴士小
            'img_url' => '', // 活动图片路径
            'activity_url' => '', // 活动链接地址
            'author_name' => '', // 者作名
            'author_id' => '', // 者作id
            'status' => 0, // 活动状态，大于0正常，小于0不正常
    );
    public function init() {
        parent::init();
    }
    public function addAction() {
        //$param = $_POST;
        $userInfo = Session::getValue('backend_user_info');
        $param['author_id'] = $userInfo['user_id'];
        $param['author_name'] = $userInfo['username'];
        $param['pub_time'] = time();
        $this->_formatePostData($param);
        $ret = MbsActivityInterface::addActivity($param);
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
            'userInfo' => $userInfo,
        ), 'admin/activity/add.php');
    }
    public function managerAction() {
        $userInfo = Session::getValue('backend_user_info');
        $activityList = MbsActivityInterface::getAllActivity();
        $this->_formatActivity($activityList);
        $this->render(array(
                'userInfo' => $userInfo,
                'activityList' => $activityList,
        ), 'admin/activity/manage.php');
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