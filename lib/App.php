<?php
/**
 * Created by PhpStorm.
 * User: dmytro.borysovskiy
 * Date: 6/2/2015
 * Time: 10:56 AM
 */

namespace lib;

require_once LIB_PATH."/Autoloader.php";
/**
 * Class Snob
 * @package lib
 */
class App
{
    /**
     * Bootstrap instance
     * @var \lib\application\Bootstrap
     */
    private $_bootstrap = null;


    /**
     * Registry::getInstance()
     * @var
     */
    protected $registry;

    /**
     * initializing registry instance
     * setting config
     * setting bootstrap instance
     * @param $configFile string
     * @param $env string
     * @throws \Exception
     */
    function __construct($configFile, $env = 'production')
    {
        Autoloader::init();

        $this->registry = Registry::getInstance();
        $this->registry->set('config', new \lib\Config($configFile, $env));
        $this->setBootstrap();
    }

    /**
     * setting custom bootstrap instance, if there is
     * setting standard bootstrap instance
     * @throws \Exception
     */
    public function setBootstrap()
    {
        if ($this->_isDefineCustomBootstrap()) {
            $class = $this->_setCustomBootstrap();
        } else {
            $class = 'lib\application\Bootstrap';
        }
        $this->_bootstrap = new $class($this->registry->get('config')->resource);
    }

    /**
     * getting bootstrap instance
     * @return \lib\application\Bootstrap
     */
    public function getBootstrap()
    {
        return $this->_bootstrap;
    }

    /**
     * process bootstrapping
     * @param $resource string
     * @return $this
     */
    public function bootstrap($resource = null)
    {
        $this->getBootstrap()->bootstrap($resource);
        return $this;
    }

    /**
     * running application
     * @param $request Request
     * @throws \Exception
     */
    public function run($request = null)
    {
        $this->getBootstrap()->run($request);
    }

    /**
     * check for existing custom bootstrap class
     * @return bool
     * @throws \Exception
     */
    private function _isDefineCustomBootstrap()
    {
        if (!($bootstrap = $this->registry->get('config')->bootstrap)) {
            return false;
        }
        if (!array_key_exists('path', $bootstrap)) {
            throw new \Exception("Please define path for Bootstrap in config.ini. Example: bootstrap.path = app/Bootstrap.php");
        }
        if (!array_key_exists('class', $bootstrap)) {
            throw new \Exception("Please define class name for Bootstrap in config.ini. Example: bootstrap.class = Bootstrap");
        }
        return true;
    }

    /**
     * setting custom bootstrap instance
     * @return mixed
     * @throws \Exception
     */
    private function _setCustomBootstrap()
    {
        $class = $this->registry->get('config')->bootstrap['class'];
        $file = $this->registry->get('config')->bootstrap['path'];
        if (!file_exists($file)) {
            throw new \Exception("{$file} file not found");
        }
        require_once $file;
        if (!class_exists($class) || !is_subclass_of($class, "\\lib\\application\\Bootstrap")) {
            throw new \Exception("{$class} class not found or not extend \\lib\\application\\Bootstrap");
        }
        return new $class;
    }

} 