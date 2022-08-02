<?php

namespace SY\DataObject\Contracts;

/**
 * Interface Hydrable
 *
 * This marks objects that can be filled by an array. This is mainly used for
 * ORM or Data Object, which have to be filled by a Repository.
 *
 * @package Saedyousef\SupremeObject\Contracts
 */
interface Hydrable
{

    /**
     * Hydrate the object by the $data. Completely clears the object, and refill it.
     *
     * @param array $data
     *
     * @return void
     */
    public function hydrate(array $data);

    /**
     * Fill the object by the array. Don't clear the object before filling it.
     *
     * @param array $data
     *
     * @return self
     */
    public function apply(array $data);
}