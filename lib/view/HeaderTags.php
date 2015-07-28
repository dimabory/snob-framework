<?php
/**
 * Created by PhpStorm.
 * User: dmytro.borysovskiy
 * Date: 4/20/2015
 * Time: 12:30 PM
 */

namespace lib\view;


/**
 * Class HeaderTags
 * @package lib\view
 */
class HeaderTags
{

    /**
     * title
     * @var string
     */
    protected $title;

    /**
     * js
     * @var mixed
     */
    protected $js;

    /**
     * css
     * @var mixed
     */
    protected $css;

    /**
     * setting title
     * @param $title string
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * adding css
     * @param $attributes array
     */
    public function addCSS($attributes = array())
    {
        $this->css [] = $attributes;
    }

    /**
     * adding js
     * @param $attributes array
     */
    public function addJS($attributes = array())
    {
        $this->js [] = $attributes;
    }

    /**
     * getting title
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * getting js
     * @return mixed
     */
    public function getJS()
    {
        return $this->js;
    }

    /**
     * getting css
     * @return mixed
     */
    public function getCSS()
    {
        return $this->css;
    }

} 