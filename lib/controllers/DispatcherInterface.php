<?php
/**
 * Created by PhpStorm.
 * User: dmytro.borysovskiy
 * Date: 7/1/2015
 * Time: 10:54 AM
 */

namespace lib\controllers;

use lib\http\Request;
use lib\http\Response;

/**
 * Interface DispatcherInterface
 * @package lib\controllers
 */
interface DispatcherInterface
{
    /**
     * @param Request $request
     * @param Response $response
     * @return mixed
     */
    function dispatch(Request $request, Response $response);

    /**
     * @param $directory
     * @return mixed
     */
    function setControllerDir($directory);
} 