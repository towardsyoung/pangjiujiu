<?php 
/**
 * @author chenchaoyang
 * @desc 基础辅助函数
 */
require_once API_PATH . '/interface/MbsClassifyInterface.class.php';
class BaseHelper {
    //格式化活动帖
    public static function formatActivityPost($data){
        $classifies = MbsClassifyInterface::getAllClassify();
        $classifies = self::formatClassify($classifies);
        if (!empty($data)) {
            foreach ($data as $key => $item) {
                if ($item['classify_id'] > 0 && key_exists($item['classify_id'], $classifies)) {
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
        return $data;
    }
    
    //返回类别id=>name数组
    public static function formatClassify($classifies){
        $ret = array();
        if (!empty($classifies)) {
            foreach ($classifies as $classify) {
                $ret[$classify['classify_id']] = $classify['name'];
            }
        }
        return $ret;
    }
    
    //格式化文章帖
    public static function formatArticlePost($data){
        $classifies = MbsClassifyInterface::getAllClassify();
        $classifies = self::formatClassify($classifies);
        if (!empty($data)) {
            foreach ($data as $key => $item) {
                if ($item['classify_id'] > 0 && key_exists($item['classify_id'], $classifies)) {
                    $data[$key]['classify'] = $classifies[$item['classify_id']];
                } else {
                    $data[$key]['classify'] = '无';
                }
                if ($item['insert_time'] > 0) {
                    $data[$key]['insert_time'] = date('Y-m-d', $item['insert_time']);
                } else {
                    $data[$key]['insert_time'] = '不详';
                }
            }
        }
        return $data;
    }
}