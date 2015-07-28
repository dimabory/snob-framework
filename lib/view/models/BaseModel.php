<?php
/**
 * Created by PhpStorm.
 * User: dmytro.borysovskiy
 * Date: 7/2/2015
 * Time: 1:36 PM
 */

namespace lib\view\models;

/**
 * Class BaseModel
 * @package lib\view\models
 */
abstract class BaseModel implements BaseModelInterface
{
    /**
     * data from controller/action
     * @var array
     */
    protected $data;

    /**
     * @var array
     */
    protected $headers = [];

    /**
     * @param array $data
     */
    function __construct($data = array())
    {
        $this->data = $data;
    }

    /**
     * @return array
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @return mixed
     */
    public function getHeaders()
    {
        return $this->headers;
    }

    /**
     * @return mixed
     */
    abstract public function render();

} 