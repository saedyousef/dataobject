<?php

namespace SY\DataObject\Support;

use SY\DataObject\Exceptions\KeyNotFoundException;
use SY\DataObject\Exceptions\NotImplementedException;

use function get_class;
use function array_key_exists;

/**
 * Trait ObjectReadAccess
 *
 * @see ObjectAccess
 *
 * @package SY\DataObject\Support
 * @property array $_properties protected
 * */
trait ObjectReadAccess
{

    /**
     * @param string $name
     *
     * @return mixed
     * @throws NotImplementedException
     * @throws KeyNotFoundException
     */
    public function __get(string $name)
    {
        if (isset($this->_properties[$name])) {
            return $this->_properties[$name];
        }

        if (!isset($this->_properties)) {
            throw new NotImplementedException('Add a _properties array to '. get_class($this));
        }

        if (!array_key_exists($name, $this->_properties) && $this->shouldFailOnMissingProperty()) {
            throw new KeyNotFoundException("Property $name not found in ". get_class($this));
        }

        return null;
    }

    /**
     * @return bool
     */
    protected function shouldFailOnMissingProperty(): bool
    {
        return true;
    }
}