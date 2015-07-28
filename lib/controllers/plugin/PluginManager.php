<?php
/**
 * Created by PhpStorm.
 * User: dmytro.borysovskiy
 * Date: 6/24/2015
 * Time: 9:47 AM
 */

namespace lib\controllers\plugin;

use lib\http\Request as Request;
use lib\http\Response as Response;

/**
 * Class PluginManager
 * @package lib\controllers\plugin
 */
class PluginManager
{

    /**
     * list of registered plugins
     * @var array
     */
    protected $plugins = array();


    /**
     * setting request
     * @param Request $request
     * @return $this
     */
    public function setRequest(Request $request)
    {
        foreach($this->plugins as $plugin) {
            $plugin->setRequest($request);
        }
        return $this;
    }

    /**
     * setting response
     * @param Response $response
     * @return $this
     */
    public function setResponse(Response $response)
    {
        foreach($this->plugins as $plugin) {
            $plugin->setResponse($response);
        }
        return $this;
    }

    /**
     * registering plugin
     * @param Plugin $plugin
     */
    public function registerPlugin(Plugin $plugin)
    {
        $this->plugins [] = $plugin;
    }

    /**
     * unregistering plugin by value
     * @param Plugin $plugin
     */
    public function unregisterPlugin(Plugin $plugin)
    {
        if(($key = array_search($plugin, $this->plugins)) !== false) {
            unset($this->plugins[$key]);
        }
    }

    /**
     * processing pre dispatching for each plugin
     */
    public function preDispatch()
    {
        foreach($this->plugins as $plugin) {
            $plugin->preDispatch();
        }
    }

    /**
     * processing post dispatching for each plugin
     */
    public function postDispatch()
    {
        foreach($this->plugins as $plugin) {
            $plugin->postDispatch();
        }
    }

    /**
     * getting list of plugins
     * @return array
     */
    public function getPlugins()
    {
        return $this->plugins;
    }
} 