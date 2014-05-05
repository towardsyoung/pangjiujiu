<?php
require_once WEB_V3 . '/common/WebV3Page.class.php';
require_once API_PATH . '/interface/MbsArticleInterface.class.php';

class StaticPage extends WebV3Page{
	public function init() {
		parent::init();
	}

	public function aboutAction() {
		$aboutArticle = MbsArticleInterface::getArticleByCid(array('cid'=>22));		
		if (!empty($aboutArticle[0])) {
			$aboutArticle = $aboutArticle[0];
		}

		$this->render(array(
        	'aboutArticle' => $aboutArticle,
        ), '/web/static/about.php');
	}
}