<?php

namespace SY\DataObject\Support;

/**
 * Trait ObjectReadAccess
 *
 * @see ObjectAccess
 *
 * @package Saedyousef\SupremeObject\Support
 * @property array $_properties
 */
trait ObjectWriteAccess
{

    /**
     * @param string $name
     * @param $value
     * @return void
     */
    public function __set(string $name, $value)
    {
        $this->_properties[$name] = $value;
    }


    /**
     * @param string $name
     * @return void
     */
    public function __unset(string $name)
    {
        unset($this->_properties[$name]);
    }
}