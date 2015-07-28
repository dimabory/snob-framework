<?php
/**
 * Created by PhpStorm.
 * User: dmytro.borysovskiy
 * Date: 6/2/2015
 * Time: 12:18 PM
 */

namespace lib\application\resources;

/**
 * Class Layout
 * @package lib\application\resources
 */
class Layout extends ResourceAbstract
{

    /**
     * default options, if options don't exist in config ini file
     * @var array
     */
    protected $defaults = array('adapter'=>'Smarty', 'path'=>'../app/resources/layouts');

    /**
     * initializing Layout resource
     * @return \lib\view\Layout
     * @throws \Exception
     * @throws \lib\view\ViewException
     */
    public function init()
    {
        $this->mergeOptions($this->defaults);
        $layout =  new \lib\view\Layout(\lib\view\ViewFactory::create(
            $this->getOption('adapter'),
            $this->getOption('path'))
        );
        $layout->setView($this->getOption('file'));
        return $layout;
    }

} 