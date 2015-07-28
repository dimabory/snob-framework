<?php
/**
 * Created by PhpStorm.
 * User: dmytro.borysovskiy
 * Date: 6/2/2015
 * Time: 12:19 PM
 */

namespace lib\application\resources;

/**
 * Class Front
 * @package lib\application\resources
 */
class Front extends ResourceAbstract
{
    /**
     * default options, if options don't exist in config ini file
     * @var array
     */
    protected $defaults = array('controllerDir' => '../app/controllers');

    /**
     * initializing Front resource
     * @return \lib\controllers\Front
     * @throws \Exception
     */
    public function init()
    {
        $this->mergeOptions($this->defaults);
        $front = \lib\controllers\Front::getInstance();
        if ($dispatcher = $this->getOption('dispatcher')) {
            $front->setDispatcher(new $dispatcher);
        }
        $front->setControllerDirectory($this->getOption('controllerDir'));
        foreach($this->getPlugins($this->getOption('plugins')) as $plugin) {
            $front->registerPlugin($plugin);
        }

        return $front;
    }

    /**
     * getting plugins collection
     * @param $plugins
     * @return array
     * @throws \Exception
     */
    public function getPlugins($plugins)
    {
        $path = (isset($plugins['path'])) ? $plugins['path'] : APP_PATH."/plugins";
        $pluginsList = (isset($plugins['class'])) ? $plugins['class'] : false;

        if (!$pluginsList) {
            return array();
        }

        ksort($pluginsList);

        $pluginsCollection = array();
        $namespace = $this->toNamespace("app", $path);
        foreach($pluginsList as $plugin) {
            $plugin = $namespace.'\\'.trim($plugin);
            if (!class_exists($plugin)) {
                throw new \Exception("Plugins {$plugin} not found");
            }
            $pluginsCollection [] = new $plugin;
        }

        return $pluginsCollection;
    }

} 