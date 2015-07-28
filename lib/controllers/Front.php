<?php
/**
 * Created by PhpStorm.
 * User: dmytro.borysovskiy
 * Date: 2/19/2015
 * Time: 1:23 PM
 */

namespace lib\controllers;

use lib\controllers\plugin\Plugin;
use lib\controllers\plugin\PluginManager as PluginManager;
use lib\Helper;
use lib\http\Request as Request;
use lib\http\Response as Response;
use lib\exception\Exception404 as Page404;
use lib\Registry;

/**
 * Class Front
 * @package lib\controllers
 */
class Front
{

    use Helper;

    /**
     * Directory|ies where controllers are stored
     * @var string
     */
    protected $controllerDir;

    /**
     * Front instance
     * @var Front
     */
    protected static $instance = null;

    /**
     * Response instance
     * @var Response
     */
    protected $response;

    /**
     * request instance
     * @var Request
     */
    protected $request = null;

    /**
     * Layout instance
     * @var \lib\view\Layout
     */
    protected $layout;

    /**
     * registry instance
     * @var \lib\Registry::getInstance()
     */
    protected $registry;

    /**
     * pluginManager instance
     * @var PluginManager
     */
    protected $pluginManager;

    /**
     * Dispatcher instance
     * @var Dispatcher
     */
    private $_dispatcher;

    /**
     * getting Front instance
     * @return Front
     */
    static function getInstance()
    {
        if (null === self::$instance) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    /**
     * running application
     * displaying view after full dispatching
     * @param null $request
     * @throws \Exception
     */
    public function run($request = null)
    {
        $this->registry = Registry::getInstance();
        if ($request === null) {
            $request = new Request($_SERVER['REQUEST_URI']);
        }
        if (!($request instanceof \lib\http\Request)) {
            throw new \Exception("Request must be object of lib\\Request");
        }
        $this->response = new Response();
        $this->_dispatch($request);
    }

    /**
     * setting controller's directory
     * @param string $directory
     * @throws \Exception
     */
    public function setControllerDirectory($directory)
    {
        if (!is_dir($directory)) {
            throw new \Exception("Path {$directory} is not correct");
        }
        $this->controllerDir = $directory;
        $this->getDispatcher()->setControllerDir($directory);
    }

    /**
     * setting layout
     * @param null $layout
     * @throws \Exception
     */
    public function setLayout($layout = null)
    {
        $this->layout = $this->registry->get('layout');
        if ($layout !== null && is_string($layout)) {
            $this->layout->setView($layout);
        }
    }

    /**
     * getting layout instance
     * @return mixed
     */
    public function getLayout()
    {
        return $this->layout->getLayout();
    }

    /**
     * getting Request instance
     * @return Request
     */
    public function getRequest()
    {
        return $this->request;
    }

    /**
     * setting Request instance
     * @param $request Request
     */
    protected function setRequest(Request $request)
    {
        $this->request = $request;
    }

    /**
     * registering new plugin
     * @param $plugin Plugin
     */
    public function registerPlugin(Plugin $plugin)
    {
        $this->pluginManager->registerPlugin($plugin);
    }

    /**
     * unregistering existing plugin
     * @param $plugin Plugin
     */
    public function unregisterPlugin(Plugin $plugin)
    {
        $this->pluginManager->unregisterPlugin($plugin);
    }

    /**
     * setting dispatcher
     * @param DispatcherInterface $dispatcher
     */
    public function setDispatcher(DispatcherInterface $dispatcher)
    {
        $this->_dispatcher = $dispatcher;
    }

    /**
     * getting dispatcher instance
     *  @return Dispatcher
     */
    public function getDispatcher()
    {
        if (!$this->_dispatcher instanceof DispatcherInterface) {
            $this->_dispatcher = new Dispatcher();
        }
        return $this->_dispatcher;
    }

    /**
     * dispatching an HTTP request to a controller/action, after that dispatch controller/action to view
     * @param Request $request
     * @throws \Exception
     * @return void
     */
    private function _dispatch(Request $request)
    {
        $this->request = $this->registry
            ->get('router')
            ->route($request);
        $this->pluginManager
            ->setRequest($this->request)
            ->setResponse($this->response);
        $this->setLayout();
        try {
            $this->pluginManager->preDispatch();

            $this->getDispatcher()->dispatch($this->request, $this->response);

            $this->pluginManager->postDispatch();

            $this->response->send();
        } catch (Page404 $e) {
            $e->error404($this->response);
        }
    }


    /**
     * prevent to create Front object
     */
    private function __construct()
    {
        $this->pluginManager = new PluginManager;
    }

    /**
     * prevent to clone Front object
     */
    private function __clone() {}

}