<?php
/**
 * Created by PhpStorm.
 * User: dmytro.borysovskiy
 * Date: 6/29/2015
 * Time: 5:04 PM
 */

namespace lib\controllers;

use lib\exception\Exception404;
use lib\Helper;
use lib\http\Request;
use lib\http\Response;
use lib\Registry;
use lib\view\models\BaseModel;
use lib\view\models\HtmlModel;
use lib\view\models\JsonModel;
use lib\view\models\WebModelInterface;
use lib\view\ViewAbstract;

/**
 * Class Dispatcher
 * @package lib\controllers
 */
class Dispatcher implements DispatcherInterface
{
    use Helper;

    /**
     * Response instance
     * @var Response
     */
    protected $response;

    /**
     * Request instance
     * @var Request
     */
    protected $request;

    /**
     * Controller instance
     * @var BaseController
     */
    protected $controller;

    /**
     * controller directory
     * @var string
     */
    protected $controllerDir;

    /**
     * setting controller directory
     * @param $directory
     * @return $this
     */
    public function setControllerDir($directory)
    {
        $this->controllerDir= $directory;
        return $this;
    }

    /**
     * full cycle of dispatching controller/action
     * @param Request $request
     * @param Response $response
     * @throws Exception404
     * @return mixed
     */
    public function dispatch(Request $request, Response $response)
    {
        $this->setRequest($request);
        $this->setResponse($response);

        $this->dispatchController();
        $this->preDispatch();
            $data = $this->dispatchAction();
        $this->postDispatch();

        $this->dispatchViewModel($data);
        $this->dispatchLayout();
    }

    /**
     * process of controller dispatching
     * @return $this
     * @throws Exception404
     */
    protected function dispatchController()
    {
        if (!file_exists($this->controllerDir.'/'.ucfirst($this->request->getParams('controller')).'.php')) {
            throw new Exception404('404 Not Found', 404);
        }
        $controller = $this->toNamespace("app", $this->controllerDir).'\\'.ucfirst($this->request->getParams('controller'));
        if (!(class_exists($controller) &&
            (is_subclass_of($controller,'\lib\controllers\BaseController')))) {
            throw new Exception404("404 Not Found", 404);
        }
        $this->controller = new $controller($this->request, $this->response);
    }

    /**
     * process of action dispatching
     * @return $this
     * @throws Exception404
     */
    protected function dispatchAction()
    {
        $action = $this->request->getParams('action').'Action';
        if (!method_exists($this->controller, $action)) {
            throw new Exception404("404 Not Found", 404);
        }

        return $this->controller->$action();
    }

    /**
     * process of ViewModel dispatching
     * @param $dataFromAction
     * @throws \Exception
     * @return void
     */
    protected function dispatchViewModel($dataFromAction)
    {
        $viewModel = $this->processViewModel($dataFromAction);
        if ($viewModel instanceof WebModelInterface) {
            if ($viewModel->getTemplate() === null) {
                $viewModel->setTemplate($this->request->getParams('action'));
            }
            $viewModel->setPathToView($this->request->getParams('controller'));
        }
        $content = $viewModel->render();
        foreach ($viewModel->getHeaders() as $name => $value) {
            $this->response->setHeader($name, $value);
        }
        $this->response->setBody($content);
    }

    /**
     * processing of layout dispatching
     * @return mixed
     */
    protected function dispatchLayout()
    {
        if ((($layout = Registry::getInstance()->get('layout')) === null)
            || !$this->response->getBody() instanceof ViewAbstract) {
            return false;
        }
        $layout->setContent($this->response->getBody());
        $this->response->setBody($layout->fetch());
    }

    /**
     * processing of ViewModel
     * @param $dataFromAction
     * @return BaseModel
     * @throws \Exception
     */
    protected function processViewModel($dataFromAction)
    {
        if (!$dataFromAction instanceof BaseModel) {
            if ((!is_array($dataFromAction)) && ($dataFromAction !== null)) {
                throw new \Exception("Returned data from action should be instance of BaseModel or array");
            }
            return new HtmlModel($dataFromAction, $this->request->getParams('action'));
        }
        return $dataFromAction;
    }

    /**
     * pre-dispatching process
     * @return $this
     */
    protected function preDispatch()
    {
        $this->controller->preDispatch();
    }

    /**
     * post-dispatching process
     * @return $this
     */
    protected function postDispatch()
    {
        $this->controller->postDispatch();
    }


    /**
     * setting request instance
     * @param Request $request
     */
    protected function setRequest(Request $request)
    {
        $this->request = $request;
    }

    /**
     * setting response instance
     * @param Response $response
     */
    protected function setResponse(Response $response)
    {
        $this->response = $response;
    }

} 