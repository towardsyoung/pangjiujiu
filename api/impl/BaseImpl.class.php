<?PHP

class BaseImpl {
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
}