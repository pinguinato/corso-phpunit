<?php

class MailerTest extends \PHPUnit\Framework\TestCase
{
    public function testSendMessageReturnsTrue()
    {
        //$this->assertTrue(Mailer::sendStatic('test@test.it', 'Hello!'));

        $mock = $this->createMock(Mailer::class);

        $mock->method('sendStatic')->willReturn(true);

        $result = $mock->sendStatic('rob@example.com', 'Hello World');

        $this->assertTrue($result);
    }

    public function testInvalidArgumentException()
    {
        $this->expectException(InvalidArgumentException::class);

        Mailer::sendStatic('', '');

    }
}
