<?php
/**
 * Created by PhpStorm.
 * User: dmytro.borysovskiy
 * Date: 3/25/2015
 * Time: 3:32 PM
 */

namespace lib\view;
use lib\exception\Exception404;

/**
 * Class ViewAbstract
 * @package lib\view
 */
abstract class ViewAbstract
{
    /**
     * view's directory
     * @var string
     */
    protected $viewDir;

    /**
     * view file
     * @var string
     */
    protected $view;

    /**
     * content
     * @var mixed
     */
    protected $content;

    /**
     * title, js, css;
     * @var HeaderTags
     */
    protected $headers;

    /**
     * links
     * @var array
     */
    protected $links = array();

    /**
     * view's extension
     * @var string
     */
    private $_extension = '.tpl';

    /**
     * setting view's directory and initializing HeaderTags instance
     * @param $directory string
     */
    function __construct($directory)
    {
        $this->setViewDirectory($directory);
        $this->headers = new HeaderTags();
    }

    /**
     * setting view
     * @param $view string
     * @param $folder string
     * @return bool
     * @return $this
     */
    function setView($view, $folder = null)
    {
        if (is_string($folder)) {
            $this->view = strtolower($folder).'/'.$view.$this->_extension;
            return false;
        }
        $this->view = $view.$this->_extension;
        return $this;
    }

    /**
     * getting view
     * @return string
     */
    public function getView()
    {
        return $this->view;
    }

    /**
     * setting view's directory
     * @param $directory string
     * @return mixed
     */
    public function setViewDirectory($directory)
    {
        $this->viewDir .= strtolower($directory);
    }

    /**
     * dispatching view
     * @param $params array
     * @throws Exception404
     */
    public function dispatch($params = array())
    {
        $file = $this->viewDir.'/'.$this->view;
        if (!file_exists($file)) {
            throw new Exception404("File {$this->view} not found");
        }
        $this->content = $this->fetch($params);
//        return $this->content;
    }

    /**
     * getting content
     * @return mixed
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * getting extension
     * @return string
     */
    public function getExtension()
    {
        return $this->_extension;
    }

    /**
     * setting extension
     * @param $extension string
     */
    public function setExtension($extension)
    {
        $this->_extension = $extension;
    }

    /**
     * setting title
     * @param $title string
     */
    public function setTitle($title)
    {
         $this->headers->setTitle($title);
    }

    /**
     * adding js
     * @param $attributes string
     */
    public function addJS($attributes)
    {
        $this->headers->addJS($attributes);
    }

    /**
     * adding css
     * @param $attributes string
     */
    public function addCSS($attributes)
    {
        $this->headers->addCSS($attributes);
    }

    /**
     * adding link
     * @param $key string
     * @param $link string
     */
    public function addLink($key, $link)
    {
        $this->links [$key] = $link;
    }

    /**
     * getting link
     * @param $key string
     * @return string
     * @return null
     */
    public function getLinks()
    {
        return $this->links;
    }

    /**
     * getting title
     * @return string
     */
    public function getTitle()
    {
        return $this->headers->getTitle();
    }

    /**
     * getting css
     * @return mixed
     */
    public function getCSS()
    {
        return $this->headers->getCSS();
    }

    /**
     * getting js
     * @return mixed
     */
    public function getJS()
    {
        return $this->headers->getJS();
    }

    /**
     * fetching data
     * @param $params
     * @return mixed
     */
    abstract function fetch($params);

} 