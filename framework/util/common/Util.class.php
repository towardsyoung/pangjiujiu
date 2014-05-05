<?php

class Util {

    public static function getFromArray($key, $array, $default = null, $notEmpty = false) {
        if (!array_key_exists($key, $array) || ($notEmpty && empty($array[$key]))) {
            return $default;
        }
        return $array[$key];
    }

    /**
     * 编码转接 支持数组
     * @param type $fContents
     * @param type $from
     * @param type $to
     * @return type
     */
    public static function convertEncoding($fContents, $from = 'gbk', $to = 'utf-8') {
        $from = strtoupper($from) == 'UTF8' ? 'utf-8' : $from;
        $to = strtoupper($to) == 'UTF8' ? 'utf-8' : $to;
        if (strtoupper($from) === strtoupper($to) || empty($fContents) || (is_scalar($fContents) && !is_string($fContents))) {
            //如果编码相同或者非字符串标量则不转换
            return $fContents;
        }
        if (is_string($fContents)) {
            if (function_exists('mb_convert_encoding')) {
                return mb_convert_encoding($fContents, $to, $from);
            } elseif (function_exists('iconv')) {
                return iconv($from, $to, $fContents);
            } else {
                return $fContents;
            }
        } elseif (is_array($fContents)) {
            foreach ($fContents as $key => $val) {
                $_key = Util::convertEncoding($key, $from, $to);
                $fContents[$_key] = Util::convertEncoding($val, $from, $to);
                if ($key != $_key)
                    unset($fContents[$key]);
            }
            return $fContents;
        }
        else {
            return $fContents;
        }
    }
    
    public static function isDate($date) {
        return preg_match('/^\d{4}-\d{1,2}-\d{1,2}$/',$date);
    }
    
    /**
     * @brief 格式化图片
     * @param string $image 图片地址
     * @param array $option 配置参数
     */
    public static function formatImageUrl($image, $option){
        $replacement = '';
        if($image){
            $replacement .= '_'.$option['width'];
            $replacement .= '-'.$option['height'];
            if($option['cut']){
                $replacement .= 'c';
            }
            $replacement .= '_'.$option['quality'];
            $replacement .= '_'.$option['mark'];
            $replacement .= '_'.$option['version'];
            $pattern = "/(|_[\w-]*)(.[a-z]{3,})$/i";
            $replacement .= "\$2";
            $image = preg_replace($pattern,$replacement,$image);
        }
        return $image;
    }

}
