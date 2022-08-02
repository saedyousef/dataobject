<?php

use SY\DataObject\Contracts\DataObject;

abstract class TestCase extends \PHPUnit\Framework\TestCase
{

    /**
     * @param int $id
     * @param string $name
     * @return TestDataObject
     */
    protected function newDataObject(int $id = 1, string $name = ''): TestDataObject
    {
        $data = ['id' => $id, 'name' => $name, 'createdAt' => new DateTime()];
        return new TestDataObject($data);
    }
}

/**
 * @property int|null id
 * @property string name
 * @property DateTime|null createdAt
 */
class TestDataObject implements DataObject
{
    use SY\DataObject\Support\DataObjectTrait;
    use SY\DataObject\Support\ObjectReadAccess;
    use SY\DataObject\Support\ObjectWriteAccess;

    public function __construct(array $properties = [])
    {
        $this->_properties = [
            'id'         => null,
            'name'      => '',
            'createdAt'  => null
        ];

        $this->hydrate($properties);
    }
}