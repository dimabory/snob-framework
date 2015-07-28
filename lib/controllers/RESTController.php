<?php

namespace lib\controllers;

/**
 * Class RESTController
 * @package lib\controllers
 */
abstract class RESTController extends BaseController
{

    /**
     * processing of request
     * @throws \Exception
     */
    public function preDispatch()
    {
        $id = (int) $this->request->getParams('id');
        switch($this->request->getMethod()) {
            case 'DELETE':
                if (!$id) {
                    throw new \Exception('Bad Request', 400);
                }
                $this->request->addParams('action', 'delete');
                break;
            case 'POST':
                $action = 'create';
                if ($id && $_POST) {
                    $action = 'update';
                }
                if ($id && empty($_POST)) {
                    $action = 'delete';
                }
                $this->request->addParams('action', $action);
                break;
            case 'GET':
                $action = 'index';
                if ($id) {
                    $action = 'get';
                }
                $this->request->addParams('action', $action);
                break;
            case 'PUT':
                $action = 'update';
                if (!$id) {
                    $action = 'create';
                }
                $this->request->addParams('action', $action);
                break;
            default:
                throw new \Exception('Invalid Method', 405);
        }
    }

    /**
     * @return mixed
     */
    abstract public function indexAction();

    /**
     * @return mixed
     */
    abstract public function getAction();

    /**
     * @return mixed
     */
    abstract public function createAction();

    /**
     * @return mixed
     */
    abstract public function updateAction();

    /**
     * @return mixed
     */
    abstract public function deleteAction();

} 