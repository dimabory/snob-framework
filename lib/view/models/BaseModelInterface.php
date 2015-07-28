<?php

namespace lib\view\models;

/**
 * Interface BaseModelInterface
 * @package lib\view\models
 */
interface BaseModelInterface
{
    /**
     * @return mixed
     */
    public function render();

    /**
     * @return mixed
     */
    public function getData();

    /**
     * @return mixed
     */
    public function getHeaders();
}