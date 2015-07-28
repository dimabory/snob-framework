<?php
/**
 * Created by PhpStorm.
 * User: dmytro.borysovskiy
 * Date: 7/14/2015
 * Time: 12:53 PM
 */

namespace lib\view\models;

/**
 * Class JsonModel
 * @package lib\view\models
 */
class JsonModel extends BaseModel
{
    /**
     * @var array
     */
    protected $headers = [
        'Content-Type' => 'application/json;'
    ];

    /**
     * @return string
     */
    public function render()
    {
        return json_encode($this->data);
    }
} 