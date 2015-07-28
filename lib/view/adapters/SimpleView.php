<?php
/**
 * Created by PhpStorm.
 * User: dmytro.borysovskiy
 * Date: 3/25/2015
 * Time: 3:35 PM
 */

namespace lib\view\adapters;
use lib\view\ViewAbstract as ViewAbstract;


/**
 * Class SimpleView
 * @package lib\view\adapters
 */
class SimpleView extends ViewAbstract
{

    /**
     * initializing view instance
     * @param $directory string
     */
    function __construct($directory)
    {
        parent::__construct($directory);
    }

    /**
     * fetching data
     * @param $params array
     * @return string
     */
    public function fetch($params = array())
    {
        extract($params);
        ob_start();
        require_once $this->viewDir.'/'.$this->view;
        return ob_get_clean();
    }

} 