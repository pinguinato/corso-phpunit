<?php

require 'src/Mailer.php';

class MockTest extends \PHPUnit\Framework\TestCase
{
    public function testMock()
    {
        //$mailer = new Mailer();

        $mock = $this->createMock(Mailer::class);

        $mock->method('sendMessage')->willReturn(true);

        $result = $mock->sendMessage('rob@example.com', 'Hello World');

        $this->assertTrue($result);
    }
}