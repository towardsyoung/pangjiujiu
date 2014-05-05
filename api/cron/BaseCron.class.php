<?php
/**
 * 计划任务通用工具类
 *
 * @author    gaosk <gaosk@273.cn>
 * @since     2013-3-11
 * @copyright Copyright (c) 2003-2013 273 Inc. (http://www.273.cn)
 * @desc      计划任务通用工具类
 */

require dirname(__FILE__) . '/../../conf/config.inc.php';

//加载缓存文件
require FRAMEWORK_PATH . '/util/cache/CacheNamespace.class.php';
require CONF_PATH . '/cache/CacheKeyConfig.class.php';

class BaseCron {
    private static $_APC_HANDLE   = null;

    private static $models = array();

    protected static function getModel($modelName, $id='') {
        if (!isset(self::$models[$modelName])) {
            $file = API_PATH . '/model/' . $modelName . '.class.php';
            if (!is_file($file)) {
                trigger_error('model不存在[' . $modelName . ']');
            }
            include_once $file;
            self::$models[$modelName] = new $modelName($id);
        }
        return self::$models[$modelName];
    }

    /**
     * 输出缓冲内容
     */
    public static function flushBuffers($str, $cli = true) {

        echo $str . ($cli ? "\n" : "<br />");
        if (ob_get_length()) {
            @ob_flush();
            @flush();
            @ob_end_flush();
        }
    }

    /**
     * 去掉品牌或车系数组中不重要的字段
     * @param type $data
     * @return type
     */
    public static function moveSlaveField($data=array()) {
        unset($data['last']);
        unset($data['nation']);
        unset($data['series']);
        unset($data['char']);
        unset($data['start']);
        unset($data['mcode']);
        unset($data['min']);
        unset($data['max']);
        unset($data['start']);
        return $data;
    }


    /**
     * 对二维数组按照某个字段的值进行排序
     * @param array $array
     * @param type $key
     * @param type $asc
     * @return array
     */
    public static function sortByOneKey(array $array, $key='count', $asc = false) {
        $result = array();

        $values = array();
        foreach ($array as $id => $value) {
            $values[$id] = isset($value[$key]) ? $value[$key] : '';
        }

        if ($asc) {
            asort($values);
        } else {
            arsort($values);
        }

        foreach ($values as $key => $value) {
            $result[$key] = $array[$key];
        }

        return $result;
    }


    protected function _writeToCache($key, $data, $path = CacheKeyConfig::DICTIONARY_PATH) {
        if (!self::$_APC_HANDLE) {
            self::$_APC_HANDLE    = CacheNamespace::createCache(CacheNamespace::MODE_APC);
        }

        self::$_APC_HANDLE->write($key, $data);
        $this->_writeToFile($key, $data, $path);

    }

    /**
     * 缓存写到文件里
     * @param string $path  存储路径，有vehicle,area,store区分
     */

    protected function _writeToFile($key, $data, $path) {
        $key = str_replace('_', '/', $key);
        $file = DATA_PATH  . '/' . $path . '/' . $key;
        @mkdir(substr($file, 0, strrpos($file, '/')), 0777, true);
        file_put_contents($file, serialize($data));
    }

}