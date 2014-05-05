<?php
/**
 * 异常基类
 *
 * @author    戴志君 <dzjzmj@gmail.com>
 * @since     2013-6-3
 * @copyright Copyright (c) 2003-2013 273 Inc. (http://www.273.cn)
 * @desc
 */


class BaseException extends Exception {

    const DEFAULT_ERROR = 99;

    /**
     * 构造函数
     * @param string $msg 异常信息
     * @param string $code 异常代码  
     */
    function __construct($msg, $code = self::DEFAULT_ERROR) {
        parent::__construct($msg, $code);
    }

}