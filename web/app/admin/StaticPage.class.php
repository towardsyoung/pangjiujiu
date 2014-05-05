<?php
require_once API_PATH . '/interface/MbsUserInterface.class.php';
require_once API_PATH . '/interface/MbsClassifyInterface.class.php';

require_once WEB_V3 . '/common/BackendPage.class.php';
class StaticPage extends BackendPage{
    public function init() {
        parent::init();
        if($this->checkUser() == false) {
            ResponseUtil::redirect('');
        }
    }
    public function defaultAction() {
        $tpl = RequestUtil::getGET('tpl');
        $this->render(null, $tpl);
    }
}

?>