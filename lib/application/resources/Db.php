<?php
/**
 * Created by PhpStorm.
 * User: dmytro.borysovskiy
 * Date: 6/2/2015
 * Time: 12:17 PM
 */

namespace lib\application\resources;

/**
 * Class Db
 * @package lib\application\resources
 */
class Db extends ResourceAbstract
{

    /**
     * default options, if options don't exist in config ini file
     * @var array
     */
    protected $defaults = array ('password' => '',
                                 'adapter' => 'pdo_mysql',
                                 'model_path' => '../app/models');

    /**
     * initializing Db resource (Doctrine 2 ORM)
     * @return \lib\database\Doctrine::getEntityManager()
     * @throws \Exception
     */
    public function init()
    {
       $this->mergeOptions($this->defaults);
       \lib\database\Doctrine::createEntityManager(array(
            'host' => $this->getOption('host'),
            'name' => $this->getOption('name'),
            'user' => $this->getOption('user'),
            'password' => $this->getOption('password'),
            'adapter' => $this->getOption('adapter')
        ), $this->getOption('model_path'));

        return  \lib\database\Doctrine::getEntityManager();
    }

} 