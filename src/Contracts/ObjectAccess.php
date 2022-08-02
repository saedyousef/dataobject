<?php

namespace SY\DataObject\Contracts;

interface ObjectAccess
{

    /**
     * Reading data from inaccessible members.
     *
     * @param string $name
     * @return mixed
     */
    public function __get(string $name);


    /**
     * Call whe wirtes data to inaccessible members.
     *
     * @param string $name
     * @param mixed  $value
     * @return void
     */
    public function __set(string $name, $value);

    /**
     * Triggered by calling isset() or empty() on inaccessible members.
     *
     * @param string $name
     * @return bool
     */
    public function __isset(string $name): bool;


    /**
     * Triggered when unset() is called on inaccessible members.
     *
     * @param string $name
     * @return void
     */
    public function __unset(string $name);
}