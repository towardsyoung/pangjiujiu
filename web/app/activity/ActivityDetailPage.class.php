<?php
require_once WEB_V3 . '/common/WebV3Page.class.php';
class ActivityDetailPage extends WebV3Page{
    
    public function init() {
    }
    
    public function defaultAction() {
        $this->render(array(
                'page' => 'hello pangjiujiu',
        ), '/web/activity/detail.php');
    }
}

?>