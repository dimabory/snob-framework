<?php
/**
 * Created by PhpStorm.
 * User: dmytro.borysovskiy
 * Date: 7/2/2015
 * Time: 1:40 PM
 */

namespace lib\view\models;
use lib\Registry;

/**
 * Class HtmlModel
 * @package lib\view\models
 */
class HtmlModel extends BaseModel implements WebModelInterface
{

    /**
     * view(template)
     * @var null
     */
    protected $template;

    /**
     * path to view
     * @var null
     */
    protected $pathToView = "";

    /**
     * @var array
     */
    protected $headers = [
        'Content-Type' => 'text/html'
    ];

    /**
     * @param array $data
     * @param null $template
     */
    function __construct($data = array(), $template = null)
    {
        parent::__construct($data);
        $this->template = $template;
    }

    /**
     * getting template
     * @return null
     */
    public function getTemplate()
    {
        return $this->template;
    }

    /**
     * setting template
     * @param $template
     * @return $this
     */
    public function setTemplate($template)
    {
        $this->template = $template;
        return $this;
    }

    /**
     * setting path for view
     * @param $folder
     * @return $this
     */
    public function setPathToView($folder)
    {
        $this->pathToView = $folder;
        return $this;
    }

    /**
     * rendering of view instance
     */
    public function render()
    {
        $view = Registry::getInstance()->get('view');
        $view->setView($this->template, $this->pathToView);
        $view->dispatch($this->data);

        return $view;
    }

} 