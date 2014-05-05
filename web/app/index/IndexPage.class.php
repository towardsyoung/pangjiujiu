<?php
require_once WEB_V3 . '/common/WebV3Page.class.php';
require_once WEB_V3 . '/common/BaseHelper.class.php';
require_once API_PATH . '/interface/MbsActivityInterface.class.php';
class IndexPage extends WebV3Page{
    private $_latestPost = array();
    public function init() {
    }
    
    public function defaultAction() {
    	$this->_getLatestPost();
        $this->render(array(
        	'latestPost' => $this->_latestPost,
            'page' => 'hello pangjiujiu',
        ), '/web/index.php');
    }

    private function _getLatestPost() {
    	$latestPost = MbsActivityInterface::getActivityOrderBy(array(
    		'order_by' => array('pub_time'=>'desc'),
    		'offset'   => 0,
    		'limit'	   => 10
		));
		$this->_latestPost = BaseHelper::formatActivityPost($latestPost);
    }
}

?>