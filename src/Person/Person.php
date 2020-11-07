<?php 

class Person
{
    private $firstName;
    private $lastName;
    private $address;
    private $age;
    private $telephone;

    public function __construct(
        $firstName,
        $lastName,
        $address,
        $age,
        $telephone
    )
    {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->address = $address;
        $this->age = $age;
        $this->telephone = $telephone;
    }

    public function getFirstName() {
        return $this->firstName;
    }

    public function getLastName() {
        return $this->lastName;
    }

    public function getAddress() {
        return $this->address;
    }

    public function getAge() {
        return $this->age;
    }

    public function getTelephone() {
        return $this->telephone;
    }
}