<?php
use SY\DataObject\Contracts\DataObject;
use SY\DataObject\Exceptions\WriteToReadonlyKeyException;

class DataObjectTest extends TestCase
{

    /** @test */
    public function it_implements_data_object()
    {
        $object = $this->newDataObject();
        $this->assertInstanceOf(DataObject::class, $object);
    }

    /** @test */
    public function it_hydrate_object()
    {
        $object = $this->newDataObject(10, 'Supreme Object');
        $this->assertIsObject($object);
    }

    /** @test */
    public function it_is_arrayable()
    {
        $object = $this->newDataObject(10, 'Supreme Object is Arrayable');
        $array = $object->toArray();
        $this->assertIsArray($array);
        $this->assertArrayHasKey('id', $array);
        $this->assertArrayHasKey('name', $array);
        $this->assertArrayHasKey('createdAt', $array);
        $this->assertArrayNotHasKey('updatedAt', $array);
        $this->assertInstanceOf(DateTime::class, $object->createdAt);
    }

    /** @test
     * @throws WriteToReadonlyKeyException
     */
    public function it_can_apply_properties()
    {
        $object = $this->newDataObject(1, 'Supreme Object');
        $newName  = $object->apply(['name' => 'Supreme']);
        $this->assertEquals('Supreme', $newName->name);
    }
}