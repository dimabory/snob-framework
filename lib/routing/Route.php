<?php
/**
 * Created by PhpStorm.
 * User: dmytro.borysovskiy
 * Date: 2/2/2015
 * Time: 3:36 PM
 */

namespace lib\routing;
use lib\http\Request;

/**
 * Class Route
 * @package lib\routing
 */
class Route implements RouteInterface
{

    /**
     * list of patterns
     * @var array
     */
    protected $_pattern = array();

    /**
     * list of default options
     * @var array
     */
    protected $_defaults = array();

    /**
     * list of options
     * @var array
     */
    protected $_options = array();

    /**
     * quantity options
     * @var mixed
     */
    private $_count;

    /**
     * create a new Route instance
     * @param $pattern string
     * @param $defaults array
     */
    function __construct($pattern='', $defaults = array())
    {
        $this->setPattern($pattern);

        $pattern = array_filter(explode('/', $this->_pattern));

        foreach ($pattern as $optionKey => $option) {
            if ($option[0]==':') {
                $this->setOptions($optionKey, str_replace(':', '' , $option));
            } else {
                if ($option!='*') {
                    ++$this->_count;
                }
            }
        }
        $this->_defaults = $defaults;
    }


    /**
     * set parameter (e.g.: :id)
     * @param $key string
     * @param $option string
     */
    public function setOptions($key, $option)
    {
        $this->_options[$key] = $option;
    }

    /**
     * get parameter by key
     * @param $key string
     * @return array
     */
    public function getOptions($key)
    {
        return isset($this->_options[$key]) ? $this->_options[$key] : false;
    }


    /**
     * compare patterns with request
     * @param $request
     * @return array
     * @return bool
     */
    public function match(Request $request)
    {
        $request = array_filter(explode('/', $request->getPath()));
        $patterns = array_filter(explode('/',$this->getPattern()));
        $counter = 0;
        $params = array();
        foreach ($request as $key => $value) {
            if (!isset($patterns[$key])) {
                return false;
            } else if($patterns[$key]=='*') {
                $count_request = count($request);
                for ($i = $key; $i <= $count_request; $i += 2) {
                    if (!array_key_exists($request[$i], $params)) {
                        $params[$request[$i]] = (isset($request[$i + 1])) ? $request[$i + 1] : null;
                    }
                }
                return array_merge($this->getDefaults(), $params);
            }
            if ($value==$patterns[$key] || $this->getOptions($key)) {
                if ($this->getOptions($key)) {
                    $params[$this->getOptions($key)] = $value;
                } else {
                    $counter++;
                }
            } else {
                return false;
            }
        }
        if ($counter!=$this->_count) {
            return false;
        }
        return array_merge($this->getDefaults(), $params);
    }

    /**
     * get pattern
     * @return string
     */
    public function getPattern()
    {
        return $this->_pattern;
    }

    /**
     * set pattern
     * @param $pattern = string
     */
    public function setPattern($pattern)
    {
        $this->_pattern = $pattern;
    }

    /**
     * get parameter by default
     * @return array
     */
    public function getDefaults()
    {
        return $this->_defaults;
    }

}