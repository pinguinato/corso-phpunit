<?php

use PHPUnit\Framework\TestCase;

require 'src/AbstractPerson.php';
require 'src/Doctor.php';

class AbstractPersonTest extends TestCase
{
    public function testNameAndTistleIsReturned()
    {
        $person = new Doctor('Roberto Gianotto');

        $this->assertEquals('Dr. Roberto Gianotto', $person->getNameAndTitle());
    }

    public function testMockForAbstractClass()
    {
        $mock = $this->getMockBuilder(AbstractPerson::class)
            ->setConstructorArgs(['Roberto Gianotto'])
            ->getMockForAbstractClass();

        $mock->method('getTitle')->willReturn('Dr.');

        $this->assertEquals('Dr. Roberto Gianotto', $mock->getNameAndTitle());
    }
}
