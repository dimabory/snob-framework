<?php
/**
 * Created by PhpStorm.
 * User: dmytro.borysovskiy
 * Date: 6/2/2015
 * Time: 6:10 PM
 */

namespace lib;

/**
 * Class Registry
 * @package lib
 */
class Registry extends \ArrayObject
{

    /**
     * Registry instance
     * @var null
     */
    private static $_registry = null;

    /**
     * getting Registry instance
     * @return Registry
     */
    public static function getInstance()
    {
        if (self::$_registry === null) {
            self::$_registry = new self();
        }

        return self::$_registry;
    }

    /**
     * getting registered resource by key
     * @param $index string
     * @return mixed
     * @throws \Exception
     */
    public function get($index)
    {
        return (array_key_exists($index, $this)) ? self::getInstance()->offsetGet($index) : null;
    }


    /**
     * setting resource
     * @param $key string
     * @param $value mixed
     * @throws \Exception
     */
    public function set($key, $value)
    {
        if (array_key_exists($key, $this)) {
            throw new \Exception("Resource {$key} already exists");
        }
        self::getInstance()->offsetSet($key, $value);
    }

    /**
     * inheritance \ArrayObject constructor
     * @param $array array
     */
    public function __construct($array = array())
    {
        parent::__construct($array);
    }

    /**
     * prevent to clone object
     */
    private function __clone() {}

}