<?php

use PHPUnit\Framework\TestCase;

require 'src/Order.php';

class OrderTest extends TestCase
{
    public function testOrderIsProcessedWithAClassThatNotExists()
    {
        // così becco un warning devo usare il mockBuilder
        // $gateway = $this->createMock('PaymentGateway');
        $gateway = $this->getMockBuilder('PaymentGateway')
            ->setMethods(['charge'])
            ->getMock();

        // test doubles functionality
        $gateway->expects($this->once())
            ->method('charge')
            ->with($this->equalTo(200))
            ->willReturn(true);

        $order = new Order($gateway);

        $order->amount = 200;

        $this->assertTrue($order->process());
    }
}