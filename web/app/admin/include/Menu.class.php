<?php
class Menu {
    public static $MENUS = array(
            array(
                'name' => '用户管理',
                'sub_menu' => array(
                    array('name' => '添加用户','url_path' => '/admin/user/'),
                    array('name' => '管理用户','url_path' => '/admin/user/manager/'),
                ),
            ),
            array(
                'name' => '活动管理',
                'sub_menu' => array(
                        array('name' => '添加活动','url_path' => '/admin/activity/'),
                        array('name' => '管理活动','url_path' => '/admin/activity/manager/'),
                ),
            ),
            array(
                'name' => '分类管理',
                'sub_menu' => array(
                        array('name' => '添加分类','url_path' => '/admin/classify/add.php'),
                        array('name' => '管理分类','url_path' => '/admin/classify/manage/'),
                ),
            ),
            array(
                'name' => '文章管理',
                'sub_menu' => array(
                        array('name' => '添加文章','url_path' => '/admin/article/'),
                        array('name' => '管理文章','url_path' => '/admin/article/manage/'),
                ),
            ),
            
    );
}

?>