<?php
/**
 * Created by PhpStorm.
 * User: dmytro.borysovskiy
 * Date: 2/2/2015
 * Time: 1:36 PM
 */

namespace lib\http;

/**
 * Class Request
 * @package lib\http
 */
class Request
{

    /**
     * path of request
     * @var string
     */
    private $_path;

    /**
     * method of request
     * @var
     */
    private $_method;

    /**
     * params of request
     * @var array
     */
    private $_params = array();

    /**
     * setting path of request
     * @param $uri string
     */
    function __construct($uri)
    {
        $uri = parse_url($uri);
        $this->_path = $uri['path'];
        $this->_method = $_SERVER['REQUEST_METHOD'];
    }

    /**
     * get filtered path
     * @return string
     */
    public function getPath()
    {
        return rtrim($this->_path, '/');
    }

    /**
     * get parameter by key
     * @param $key string
     * @param $default string
     * @return array
     */
    public function getParams($key, $default = '')
    {
        if (isset($this->_params[$key])) {
            return $this->_params[$key];
        } elseif ($this->getQuery($key)) {
            return $_GET[$key];
        } elseif ($this->getPost($key)) {
            return $_POST[$key];
        }
        return $default;
    }

    /**
     * set params
     * @param $params array
    */
    public function setParams($params = array())
    {
        $this->_params = $params;
    }

    /**
     * adding parameter
     * @param $key
     * @param $value
     */
    public function addParams($key, $value)
    {
        $this->_params[$key] = $value;
    }

    /**
     * get POST query
     * @param $key string
     * @return array
     */
    public function getPost($key)
    {
        return isset($_POST[$key]) ? true : false;
    }

    /**
     * get GET query
     * @param $key string
     * @return array
     */
    public function getQuery($key)
    {
        return isset($_GET[$key]) ? true : false;
    }

    /**
     * get http method
     * @return mixed
     */
    public function getMethod()
    {
        return $this->_method;
    }
}