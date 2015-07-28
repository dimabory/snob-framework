<?php
/**
 * Created by PhpStorm.
 * User: dmytro.borysovskiy
 * Date: 6/11/2015
 * Time: 12:38 PM
 */

namespace lib;

/**
 * Class Autoloader
 * @package lib
 */
class Autoloader
{

    /**
     * Autoloader instance
     * @var Autoloader
     */
    public static $loader;

    /**
     * initializing Auutoloader instance
     * @return self
     */
    public static function init()
    {
        if (self::$loader == NULL)
            self::$loader = new self();

        return self::$loader;
    }

    /**
     * registering __autoload method
     */
    public function __construct()
    {
        spl_autoload_register(array($this, '__autoload'));
    }

    /**
     * autoloading classes
     * @param $className string
     * @return bool
     */
    public function __autoload($className)
    {
        $class = '../'.str_replace('\\', '/', $className) . '.php';
        if (!file_exists($class)) {
            return false;
        }
        require_once $class;
        return true;
    }

} 