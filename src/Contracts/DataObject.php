<?php

namespace SY\DataObject\Contracts;

/**
 * Interface DataObject
 *
 * DataObject defines the basic interface to work as a data container.
 * It should be filled by an Array and cast to Array, it's also needs a unique id.
 */
interface DataObject extends Identifiable, Hydrable, Arrayable
{

}