<?php
/**
 * Created by PhpStorm.
 * User: dmytro.borysovskiy
 * Date: 3/23/2015
 * Time: 3:02 PM
 */

namespace lib\exception;
use lib\Registry;

/**
 * Class Exception404
 * @package lib\exception
 */
class Exception404 extends \Exception
{

    /**
     * setting header 404 not found
     * @param $message string
     */
    function __construct($message)
    {
        parent::__construct($message, 404);
        header("HTTP/1.0 404 Not Found");
        header("Status: 404 Not Found");
    }

    /**
     * error message
     */
    public function error404($response = null)
    {
        $view = Registry::getInstance()->get('view');
        $view->setView('index', 'notfound');
        $view->dispatch(['link'=>'/']);
//        var_dump($view->getContent());
        echo $response
            ->setCode(404)
            ->setBody($view->getContent())
            ->send();
    }

} 