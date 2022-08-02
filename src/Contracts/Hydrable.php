<?php

namespace SY\DataObject\Contracts;

interface Hydrable
{

    /**
     * Clear the data and refill the object.
     *
     * @param array $data
     * @return void
     */
    public function hydrate(array $data);

    /**
     * Fill the object by the array. Don't clear the object before filling it.
     *
     * @param array $data
     * @return self
     */
    public function apply(array $data): Hydrable;
}