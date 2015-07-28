<?php
/**
 * Created by PhpStorm.
 * User: dmytro.borysovskiy
 * Date: 4/20/2015
 * Time: 1:14 PM
 */

namespace lib\view;

/**
 * Class Layout
 * @package lib\view
 */
class Layout
{
    /**
     * DEFAULT_LAYOUT
     */
    const DEFAULT_LAYOUT = 'layout';

    /**
     * instance of layout
     * @var ViewAbstract
     */
    protected $layout;

    /**
     * instance of view
     * @var ViewAbstract
     */
    protected $content;


    /**
     * set layout instance
     * @param $layout ViewAbstract
     */
    function __construct(ViewAbstract $layout)
    {
        $this->layout = $layout;
    }

    /**
     * setting content
     * @param $content ViewAbstract
     */
    public function setContent(ViewAbstract $content)
    {
        $this->content = $content;
    }

    /**
     * setting view
     * @param $fileName string
     */
    public function setView($fileName)
    {
        if ($fileName === null) {
            $fileName = self::DEFAULT_LAYOUT;
        }
        $this->getLayout()->setView($fileName);
    }

    /**
     * getting content
     * @return ViewAbstract
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * getting layout instance
     * @return ViewAbstract
     */
    public function getLayout()
    {
        return $this->layout;
    }

    /**
     * setting params (content, title, js, css)
     * @return mixed
     */
    public function setParams()
    {
        $params['this'] = $this;
        $params['content'] = $this->content->getContent();
        $params['title'] = $this->content->getTitle();
        $params['js'] = $this->content->getJS();
        $params['css'] = $this->content->getCSS();
        $params['link'] = $this->content->getLinks();
        return $params;
    }

    /**
     * fetching layout with view
     */
    public function fetch()
    {
        $this->layout->dispatch($this->setParams());
        return $this->layout->getContent();
    }
} 