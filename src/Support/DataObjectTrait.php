<?php

namespace SY\DataObject\Support;

use SY\DataObject\Exceptions\WriteToReadonlyKeyException;

/**
 * Trait DataObjectTrait
 *
 * A helper to make an object a (minimum) DataObject
 *
 * @package Saedyousef\SupremeObject\Support
 *
 * @see DataObject
 */
trait DataObjectTrait
{

    /**
     * Fill in the constructor.
     *
     * @var array
     */
    protected $_properties = [];

    /**
     * Identifier key name, 'id' by default.
     *
     * @var string
     */
    protected $_idKey = 'id';

    /**
     * Return the unique identifier for this object.
     *
     * @return string|int|null
     */
    public function getId()
    {
        if (isset($this->_properties[$this->_idKey])) {
            return $this->_properties[$this->_idKey];
        }

        return null;
    }

    /**
     * Hydrate the object by the $data. Completely clears the object, and refill it.
     *
     * @param array $data
     *
     * @return void
     */
    public function hydrate(array $data)
    {
        $this->_properties = $data;
    }

    /**
     * Fill the object by the array. Don't clear the object before filling it.
     *
     * @param array $data
     *
     * @return self
     * @throws WriteToReadonlyKeyException
     */
    public function apply(array $data): self
    {
        foreach ($data as $key => $value) {
            $this->applyProperty($key, $value);
        }

        return $this;
    }

    /**
     * Converts the objet into an Array.
     *
     * @return array
     */
    public function toArray(): array
    {
        return $this->_properties;
    }

    /**
     * Apply a single property. For simple adjustments to the apply method.
     *
     * @param string $key
     * @param mixed $value
     *
     * @return void
     * @throws WriteToReadonlyKeyException
     */
    protected function applyProperty(string $key, $value)
    {
        if ($key == $this->_idKey) {
            throw new WriteToReadonlyKeyException('You cannot manually apply the ' . $this->_idKey . '.');
        }
        $this->_properties[$key] = $value;
    }
}