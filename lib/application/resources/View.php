<?php
/**
 * Created by PhpStorm.
 * User: dmytro.borysovskiy
 * Date: 6/2/2015
 * Time: 12:17 PM
 */

namespace lib\application\resources;


/**
 * Class View
 * @package lib\application\resources
 */
class View extends ResourceAbstract
{

    /**
     * default options, if options don't exist in config ini file
     * @var array
     */
    protected $defaults = array('adapter'=>'Smarty', 'path'=>'../app/resources/views');

    /**
     * initializing of View
     * @return \lib\view\ViewAbstract
     * @throws \Exception
     * @throws \lib\view\ViewException
     */
    public function init()
    {
       $this->mergeOptions($this->defaults);
       return \lib\view\ViewFactory::create(
           $this->getOption('adapter'),
           $this->getOption('path')
       );
    }

} 