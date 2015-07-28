<?php
/**
 * Created by PhpStorm.
 * User: dmytro.borysovskiy
 * Date: 3/24/2015
 * Time: 6:58 PM
 */

namespace lib\view\adapters;
use lib\view\ViewAbstract as ViewAbstract;
require_once "smarty/Smarty.class.php";
require_once "smarty/SmartyBC.class.php";


/**
 * Class SmartyView
 * @package lib\view\adapters
 */
class SmartyView extends ViewAbstract
{

    /**
     * smarty object
     * @var \Smarty
     */
    protected $smarty;

    /**
     * initializing view instance + smarty object
     * @param $directory string
     */
    function __construct($directory)
    {
        parent::__construct($directory);
        $this->smarty = new \Smarty();
        $this->smarty->setTemplateDir($this->viewDir);
        $this->smarty->compile_dir = '../lib/view/adapters/smarty/compiledir/templates_c';
        $this->smarty->cache_dir = '../lib/view/adapters/smarty/cache';


    }

    /**
     * fetching data
     * @param $params array
     * @return string
     * @throws \Exception
     * @throws \SmartyException
     */
    public function fetch($params = array())
    {
        $params['this'] = $this;
        $this->smarty->assign($params);
        return $this->smarty->fetch($this->view);
    }

    /**
     * getting Smarty instance
     * @return \Smarty
     */
    public function getSmarty()
    {
        return $this->smarty;
    }
}
