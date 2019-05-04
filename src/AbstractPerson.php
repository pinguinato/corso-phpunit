<?php

abstract class AbstractPerson
{
    /**
     * @var string
     */
    protected $surname;

    /**
     * AbstractPerson constructor.
     * @param $surname
     *
     * @return void
     */
    public function __construct($surname)
    {
        $this->surname = $surname;
    }


    abstract protected function getTitle();

    public function getNameAndTitle()
    {
        return $this->getTitle() . ' ' . $this->surname;
    }
}
