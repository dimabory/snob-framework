<?php
/**
 * Created by PhpStorm.
 * User: dmytro.borysovskiy
 * Date: 7/17/2015
 * Time: 4:01 PM
 */

namespace lib\routing;

use lib\http\Request;

/**
 * Interface RouteInterface
 * @package lib\routing
 */
interface RouteInterface
{
    /**
     * @param Request $request
     * @return mixed
     */
    public function match(Request $request);
} 