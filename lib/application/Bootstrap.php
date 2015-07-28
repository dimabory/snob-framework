<?php
/**
 * Created by PhpStorm.
 * User: dmytro.borysovskiy
 * Date: 6/2/2015
 * Time: 10:56 AM
 */

namespace lib\application;
use lib\Registry;

/**
 * Class Bootstrap
 * @package lib\application
 */
class Bootstrap
{
    /**
     * list of resources
     * @var array
     */
    protected $resources = array();

    /**
     * init list of resources
     * @param $resources array
     */
    function __construct($resources = array())
    {
        $this->resources = $resources;
    }

    /**
     * bootstrapping all resources including config file and custom bootstrap in app folder
     * @param $resource string
     * @throws \Exception
     */
    public function bootstrap($resource = null)
    {
        $this->_dispatchCustomBootstrap();
        if ($resource === null) {
            foreach ($this->resources as $key => $option) {
                $this->registerResource($key, $option);
            }
        }
    }

    /**
     * executing init method for needed resource
     * @param $resource string
     * @param $options array
     * @return \lib\application\resources\ResourceAbstract
     * @return bool
     * @throws \Exception
     */
    public function execute($resource, $options = array())
    {
        $className = 'lib\application\resources\\'.$resource;
        if (!class_exists($className)) {
            return false;
        }

        $class = new $className($options);

        if (!($class instanceof \lib\application\resources\ResourceAbstract)) {
            throw new \Exception("{$className} must extend ResourceAbstract");
        }

        return $class->init();
    }

    /**
     * running application
     * @param $request \lib\Request
     * @throws \Exception
     */
    public function run($request = null)
    {
        $this->registerResource('front');
        $this->registerResource('view');
        Registry::getInstance()->get('front')->run($request);
    }

    /**
     * registering of new resource, if not exists yet
     * @param $resource string
     * @param $options array
     * @throws \Exception
     */
    public function registerResource($resource, $options = array())
    {
        if (!$this->_isExistResource($resource)) {
            Registry::getInstance()->set($resource, $this->execute(ucfirst($resource), $options));
        }
    }

    /**
     * getting options by resource
     * @param $resource string
     * @return array
     * @return null
     */
    public function getOptions($resource)
    {
        return (isset($this->resources[$resource])) ? $this->resources[$resource] : null;
    }

    /**
     * check for existing/registering resource
     * @param $resource string
     * @return bool
     */
    private function _isExistResource($resource)
    {
        if (Registry::getInstance()->get($resource)) {
            return true;
        }
        return false;
    }

    /**
     * registering custom resources from init methods in app/Bootstrap
     */
    private function _dispatchCustomBootstrap()
    {
        foreach (get_class_methods($this) as $method) {
            if (preg_match("/^_init[A-Z][a-z]+$/", $method)) {
                $resource = str_replace("_init", '', strtolower($method));
                if (!$this->_isExistResource($resource)) {
                    Registry::getInstance()->set($resource, $this->$method($this->getOptions($resource)));
                }
            }
        }
    }
} 