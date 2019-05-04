<?php

require "src/Product.php";

class ProductTest extends \PHPUnit\Framework\TestCase
{
    public function testIdIsAnInteger()
    {
        $product = new Product();

        $reflector = new ReflectionClass(Product::class);

        $property = $reflector->getProperty('productId');

        $property->setAccessible(true);
        $value = $property->getValue($product);

        $this->assertInternalType("int", $value);
    }
}
