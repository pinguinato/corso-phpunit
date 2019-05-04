<?php

class Item
{
    /**
     * @return int
     */
    protected function getID()
    {
        return rand();
    }

    /**
     * @return string
     */
    private function getToken()
    {
        return uniqid();
    }

    /**
     * @return integer
     */
    public function getDescription()
    {
        return $this->getID() . $this->getToken();
    }

    public function getPrefixedToken($prefix)
    {
        return uniqid($prefix);
    }
}