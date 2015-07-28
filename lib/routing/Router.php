<?php
/**
 * Created by PhpStorm.
 * User: dmytro.borysovskiy
 * Date: 2/2/2015
 * Time: 1:36 PM
 */

namespace lib\routing;
use lib\http\Request;

/**
 * Class Router
 * @package lib\routing
 */
class Router
{

    /**
     * list of routes
     * @var array
     */
    private $_routers = array();

    /**
     * add new route into router's list
     * @param $route_name string
     * @param $route Route
     */
    public function addRoute($routeAlias, RouteInterface $route)
    {
        $this->_routers[$routeAlias] = $route;
    }


    /**
     * process routing
     * @param $request Request
     * @return Request
     */
    public function route(Request $request)
    {
        foreach ($this->_routers as $route_name => $route) {
            if ($array = $route->match($request)) {
                if (is_array($array)) {
                   $request->setParams($array);
                   break;
                }
            }
        }
        return $request;
    }

    /**
     * getting routers
     * @return array
     */
    public function getRouters()
    {
        return $this->_routers;
    }

}