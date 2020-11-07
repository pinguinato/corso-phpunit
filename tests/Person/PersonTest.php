<?php

use PHPUnit\Framework\TestCase;

require 'src/Person/Person.php';

class PersonTest extends TestCase {

    public function testGetter() {
        $person = new Person("Roberto", "Gianotto", "Test Road 1", 42, 123456789);
        
        $this->assertEquals("Roberto", $person->getFirstName());
        $this->assertEquals("Gianotto", $person->getLastName());
        $this->assertEquals("Test Road 1", $person->getAddress());
        $this->assertEquals(42, $person->getAge());
        $this->assertEquals(123456789, $person->getTelephone());
    }

}
