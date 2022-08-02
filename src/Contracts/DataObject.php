<?php

namespace SY\DataObject\Contracts;

/**
 * Interface DataObject
 *
 * DataObject defines the basic interface to work as a data container for Repositories.
 * It must be filled by an Array and cast to Array, it's also needs a unique id.
 * @package Saedyousef\Contracts
 */
interface DataObject extends Identifiable, Hydrable, Arrayable
{

}