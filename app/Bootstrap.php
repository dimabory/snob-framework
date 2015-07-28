<?php
/**
 * Created by PhpStorm.
 * User: dmytro.borysovskiy
 * Date: 6/3/2015
 * Time: 12:51 PM
 */
use lib\routing\Route;
use lib\routing\RESTRoute;
/**
 * Class Bootstrap
 * @package app
 */
class Bootstrap extends \lib\application\Bootstrap
{

    /**
     * init list of resources
     * @param array $resources
     */
    public function __construct($resources = array())
    {
        parent::__construct($resources);
    }

    /**
     * initializing Router resource
     * adding routes
     * @params $options array
     * @return \lib\routing\Router
     */
    public function _initRouter($options = null)
    {
        $router = new \lib\routing\Router();
//        $router->addRoute('account_view_index', new Route('/:lang/account/page/:id', array('lang'=>'en', 'controller'=>'account', 'action'=>'view', 'id'=>1)));
//        $router->addRoute('account_view_page', new Route('/:lang/account/view/page/:id', array('lang'=>'en', 'controller'=>'account', 'action'=>'view', 'id'=>1)));
//        $router->addRoute('account_view_page_by_user', new Route('/:lang/account/view/page/:id/user/:name', array('lang'=>'en', 'controller'=>'account', 'action'=>'view', 'id'=>1, 'name'=>'john')));
//        $router->addRoute('account_view_new_page', new Route('/:lang/account/:id/*', array('lang'=>'en', 'controller'=>'account', 'action'=>'view', 'id'=>1)));
//        $router->addRoute('account_view_new_page', new Route('/:lang/:controller/:action', array('lang'=>'en', 'controller'=>'account', 'action'=>'index')));


        $router->addRoute('api_user', new Route('/api/users/:id', array('controller' => 'users')));

        $router->addRoute('account_view_index', new Route('/account/page/:id', array('controller'=>'account', 'action'=>'view', 'id'=>1)));
        $router->addRoute('account_view_page', new Route('/account/view/page/:id', array('controller'=>'account', 'action'=>'view', 'id'=>1)));
        $router->addRoute('account_view_page_by_user', new Route('/account/view/page/:id/user/:name', array('controller'=>'account', 'action'=>'view', 'id'=>1, 'name'=>'john')));

        $router->addRoute('default_route', new Route('/:controller/:action', array('controller'=>'account', 'action'=>'index')));
        $router->addRoute('account_view_new_page', new Route('/account/:id/*', array('controller'=>'account', 'action'=>'view', 'id'=>1)));
        return $router;
    }

} 