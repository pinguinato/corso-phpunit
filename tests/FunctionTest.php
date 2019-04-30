<?php

require 'functions.php';

class FunctionTest extends \PHPUnit\Framework\TestCase
{
    public function testAddReturnTheCorrectSum()
    {
        $this->assertEquals(4, add(2, 2));
        $this->assertEquals(8, add(5, 3));
    }

    public function testAddDoesNotReturnTheCorrectSum()
    {
        $this->assertNotEquals(5, add(2, 2));
        $this->assertNotEquals(9, add(5, 3));
    }
}
