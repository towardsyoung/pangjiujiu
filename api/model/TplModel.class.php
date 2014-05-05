<?php

require_once FRAMEWORK_PATH . '/util/db/BaseModel.class.php';
require_once CONF_PATH . '/db/DBConfig.class.php';

/**
 * 自动生成模型的模板类
 *
 * @author    daizj <daizj@273.cn>
 * @since     {DATE}
 * @copyright Copyright (c) 2003-2013 273 Inc. (http://www.273.cn)
 * @desc      
 */

class TplModel extends BaseModel {

    protected function init() {
        $this->dbName         = '{DB_NAME}';
        $this->tableName      = '{TABLE_NAME_TPL}';
        $this->dbMasterConfig = '{DB_MASTER_CONFIG}';
        $this->dbSlaveConfig  = '{DB_SLAVE_CONFIG}';
        $this->fieldTypes     = '{FILE_TYPES_TPL}';
    }


}
