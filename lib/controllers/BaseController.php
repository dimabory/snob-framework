<?php
/**
 * Created by PhpStorm.
 * User: dmytro.borysovskiy
 * Date: 3/10/2015
 * Time: 5:24 PM
 */

namespace lib\controllers;
use lib\Helper;
use lib\Registry;
use lib\http\Request as Request;
use lib\http\Response as Response;
use lib\view\models\HtmlModel as html;

/**
 * Class BaseController
 * @package lib\controllers
 */
class BaseController
{
    use Helper;
    /**
     * Request instance
     * @var Request
     */
    protected $request;

    /**
     * Response instance
     * @var Response
     */
    protected $response;


    /**
     * setting request
     * @param $request Request
     * @param $response Response
     */
    function __construct(Request $request, Response $response)
    {
        $this->request = $request;
        $this->response = $response;
    }

    /**
     * Process pre-dispatching.
     */
    public function preDispatch()
    {

    }

    /**
     * Process post-dispatching.
     */
    public function postDispatch()
    {

    }

    /**
     * magic get method for getting EntityManager (e.g. : $this->em)
     * @param $property string
     * @return \lib\database\Doctrine
     */
    public function __get($property)
    {
        if ($property === 'em') return Registry::getInstance()->get('db');
    }

    /**
     * redirecting by url
     * @param $url string
     */
    protected function redirect($url = '')
    {
        header("Location:http:/".$url);
        exit;
    }

    /**
     * getting request
     * @return Request
     */
    protected function getRequest()
    {
        return $this->request;
    }

    /**
     * getting response
     * @return Response
     */
    protected function getResponse()
    {
        return $this->response;
    }

    /**
     * getting repository of EntityManager
     * @param $entity string
     * @return mixed
     */
    protected function getRepository($entity)
    {
        return Registry::getInstance()->get('db')->getRepository($entity);
    }

}