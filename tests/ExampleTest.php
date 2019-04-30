<?php

use PHPUnit\Framework\TestCase;
use Mockery\Adapter\Phpunit\MockeryTestCase;

class ExampleTest extends MockeryTestCase
{
    public function testAddingTwoPlusTwoResultInFour()
    {
        $this->assertEquals(4, 2 + 2);
    }

    /*
    public function tearDown()
    {
        Mockery::close();
    }
    */
}