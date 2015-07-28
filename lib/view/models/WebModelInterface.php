<?php

namespace lib\view\models;

/**
 * Interface WebModelInterface
 * @package lib\view\models
 */
interface WebModelInterface
{
    /**
     * @return mixed
     */
    public function getTemplate();

    /**
     * @return mixed
     */
    public function setPathToView($folder);

}