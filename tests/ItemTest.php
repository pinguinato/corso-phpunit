<?php

require 'src/Item.php';
require 'src/ItemChild.php';

class ItemTest extends \PHPUnit\Framework\TestCase
{
    public function testGetDescriptionIsNotEmpty()
    {
        $item = new Item();

        $this->assertNotEmpty($item->getDescription());
    }

    public function testIdIsAnInteger()
    {
        $item = new ItemChild(); // testing protected method using inheritance

        $this->assertNotEmpty($item->getID());
    }

    public function testTokenIsASting()
    {
        $item = new Item(); // testing private method using reflection

        $reflection = new ReflectionClass(Item::class);

        $method = $reflection->getMethod('getToken');
        $method->setAccessible(true);
        $result = $method->invoke($item);

        $this->assertInternalType("string", $result);
    }

    public function testPrefixedTokenStartsWithPrefix()
    {
        $item = new Item(); // testing private method using reflection

        $reflection = new ReflectionClass(Item::class);

        $method = $reflection->getMethod('getPrefixedToken');
        $method->setAccessible(true);
        $result = $method->invokeArgs($item, ['example']);

        $this->assertStringStartsWith('example', $result);
    }
}
