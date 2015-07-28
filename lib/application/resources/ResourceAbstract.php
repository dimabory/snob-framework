<?php
/**
 * Created by PhpStorm.
 * User: dmytro.borysovskiy
 * Date: 6/2/2015
 * Time: 12:23 PM
 */

namespace lib\application\resources;
use lib\Helper;


/**
 * Class ResourceAbstract
 * @package lib\application\resources
 */
abstract class ResourceAbstract
{

    use Helper;

    /**
     * list of options for resource
     * @var array
     */
    protected $options;

    /**
     * setting list of options
     * @param null || array $options
     */
    function __construct($options = null)
    {
        if (is_array($options)) {
            $this->options = $options;
        }
    }

    /**
     * getting option by key
     * @param string $key
     * @return mixed
     * @throws \Exception
     */
    public function getOption($key)
    {
        return (array_key_exists($key, $this->options)) ? $this->options[$key] : null;
    }

    /**
     * merging default options of resource
     * @param array $options
     */
    public function mergeOptions(array $options)
    {
        $this->options = array_merge($options, $this->options);
    }

    /**
     * initializing resource
     * @return mixed
     */
    abstract function init();
} 