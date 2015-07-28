<?php
/**
 * Created by PhpStorm.
 * User: dmytro.borysovskiy
 * Date: 3/10/2015
 * Time: 6:23 PM
 */

namespace lib\view;
use lib\exception\Exception404;

/**
 * Class ViewFactory
 * @package lib\view
 */
class ViewFactory
{
    /**
     * creating view adapter (smarty or simple view)
     * @param $adapter string
     * @param $directory string
     * @return mixed
     * @throws Exception404
     */
    public static function create($adapter, $directory)
    {
        $adapter = 'lib\view\adapters\\'.$adapter.'View';
        if(!class_exists($adapter) || !is_subclass_of($adapter, 'lib\view\ViewAbstract')) {
            throw new Exception404("Adapter class {$adapter} not found or not extend ViewAbstract");
        }
        return new $adapter($directory);
    }

}