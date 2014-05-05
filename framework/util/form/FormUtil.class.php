<?php
/**
 *
 * @author    chenchaoyang <chency@273.cn>
 * @since     2013-10-8
 * @copyright Copyright (c) 2003-2013 273 Inc. (http://www.273.cn)
 * @desc      通过此类来处理表单验证，表单字段生成等
 */

abstract class FormUtil {
    private $fields                 = array();
    /**
     * 执行验证
     *
     * @return boolen 返回是否通过验证
     */
    final public function validate() {
        $valid				= true;
        $this->errors		= array();
        $this->fieldErrors	= array();
        $this->customErrors = array();
        $this->validFields	= array();

        $this->createValidatorsFromConfig();

        if (count($this->fields) > 0) {
            foreach ($this->fields as $field){
                if (!$field->validate()){
                    $valid = false;
                    $this->setError($field->getName(), $field->getValidatorErrorMessage());
                }
                else {
                    $this->validFields[] = $field->getName();
                }
            }
        }

        return $valid;
    }

    /**
     * 取得表单提交的值
     * 该值不一定是原始表单字段的值，而是表单字段对应的数据表字段的值
     *
     * @return array()
     */
    public function getPostData($key='') {
        static $data;
         
        if (!$data) {
            $data = $_SERVER['REQUEST_METHOD'] == 'POST' ? $_POST : $_GET;

            if (count($this->fields) > 0) {
                foreach ($this->fields as $field){
                    $data[$field->getDbFieldName()] = $field->getPostValue();
                }
            }
        }
         
        if ($key) {
            if (array_key_exists($key, $data)) {
                return $data[$key];
            }
            return null;
        }
        return $data;
    }
}
