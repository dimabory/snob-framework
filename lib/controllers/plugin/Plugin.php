<?php
/**
 * Created by PhpStorm.
 * User: dmytro.borysovskiy
 * Date: 4/21/2015
 * Time: 10:22 AM
 */

namespace lib\controllers\plugin;

use lib\http\Response as Response;
use lib\http\Request as Request;

/**
 * Class PluginInterface
 * @package lib\controllers\plugin
 */
class Plugin
{

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
     * setting request
     * @param Request $request
     */
    public function setRequest(Request $request)
    {
        $this->request = $request;
    }

    /**
     * setting response
     * @param Response $response
     */
    public function setResponse(Response $response)
    {
        $this->response = $response;
    }

    /**
     * pre-dispatch process
     * @return void
     */
    public function preDispatch()
    {

    }

    /**
     * post-dispatch process
     * @return void
     */
    public function postDispatch()
    {

    }

}