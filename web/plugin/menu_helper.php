<?php
/**
 *
 * @author    chenchaoyang <chency@273.cn>
 * @since     2013-9-22
 * @copyright Copyright (c) 2003-2013 273 Inc. (http://www.273.cn)
 * @desc      
 */
function menu_helper($param){
    $menu = $param['menu'];
    $menuHtml = '';
    $tplLi = '<li style="margin: 0px;background-color: #f5f5f5;"><a href="%s">%s</a></li>';
    $index = 0;
    foreach ($menu as $menuItem) {
        $tplA = '<a href="%s" class="list-group-item" data-toggle="collapse" data-target="#%s"><strong>%s</strong></a>';
        if (!empty($menuItem['sub_menu'])) {
            $menuHtml .= sprintf($tplA, 'javascript:void(0);', 'ul'.$index, $menuItem['name']);
            $menuHtml .= sprintf('<ul id="%s" class="nav nav-pills nav-stacked" style="height:0px;overflow: hidden;">', 'ul'.$index);
            foreach ($menuItem['sub_menu'] as $item) {
                $menuHtml .= sprintf($tplLi, $item['url_path'], $item['name']);
            }
            $menuHtml .= '</ul>';
        } else {
            $menuHtml .= sprintf($tplA, $menuItem['url_path'], 'ul'.$index, $menuItem['name']);
        }
        $index++;
    }
    return $menuHtml;
}