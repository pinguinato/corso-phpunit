<?php

use PHPUnit\Framework\TestCase;

require 'src/Order.php';

class OrderTest extends TestCase
{
    public function tearDown()
    {
        Mockery::close();
    }

    /*

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

    public function testOrderIsProcessWithMockeryFramework()
    {
        $gateway = Mockery::mock('PaymentGateway');

        $gateway->shouldReceive('charge')
            ->once()
            ->with(200)
            ->andReturn(true);

        $order = new Order($gateway);

        $order->amount = 200;

        $this->assertTrue($order->process());
    }

    */

    public function testOrderIsProcessedUsingAMock()
    {
        $order = new Order(3, 1.99);

        $this->assertEquals(5.97, $order->amount);

        $gateway_mock = Mockery::mock('PaymentGateway');

        $gateway_mock->shouldReceive('charge')->once()->with(5.97);

        $order->process($gateway_mock);
    }

    public function testOrderProcessUsingASpy()
    {
        $order = new Order(3, 1.99);

        $this->assertEquals(5.97, $order->amount);

        $gateway_spy = Mockery::spy('PaymentGateway');

        $order->process($gateway_spy);

        $gateway_spy->shouldHaveReceived('charge')->once()->with(5.97);
    }
}