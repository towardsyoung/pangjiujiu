<?php

require_once FRAMEWORK_PATH . '/mvc/BasePage.class.php' ;

class WebV3Page extends BasePage {
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
    
    /**
     * 显示一个“404”页面
     * @param string $msg
     */
    public function displayPageNotFound() {
        
    }
}
