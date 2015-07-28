<?php
/**
 * Created by PhpStorm.
 * User: dmytro.borysovskiy
 * Date: 6/29/2015
 * Time: 4:09 PM
 */
namespace lib;

/**
 * Trait Helper
 * @package lib
 */
trait Helper
{
    /**
     * @param $folder
     * @param $file
     * @return string
     */
    function toNamespace($folder, $file)
    {
        return $folder.'\\'.str_replace('/', '\\', end(explode('/',$file)));
    }

    /**
     * @param $str
     * @return string
     */
    function cleanStr($str)
    {
        return trim(htmlspecialchars($str));
    }

}