<?php
/**
 * Created by PhpStorm.
 * User: dmytro.borysovskiy
 * Date: 6/2/2015
 * Time: 12:17 PM
 */

namespace lib\application\resources;

/**
 * Class Locale
 * @package lib\application\resources
 */
class Locale extends ResourceAbstract
{

    /**
     * initializing Locale resource
     * @return \lib\Locale
     * @throws \Exception
     */
    public function init()
    {
        $languages = explode(',', $this->getOption('languages'));
        return new \lib\Locale($languages);
    }

} 