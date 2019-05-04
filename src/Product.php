<?php

class Product
{
    /**
     * @var integer
     */
    protected $productId;

    /**
     * Product constructor.
     *
     * @return void
     */
    public function __construct()
    {
        $this->productId = rand();
    }
}
