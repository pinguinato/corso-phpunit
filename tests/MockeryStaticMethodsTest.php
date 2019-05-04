<?php

class MockeryStaticMethodsTest extends \PHPUnit\Framework\TestCase
{
    public function tearDown()
    {
        Mockery::close();
    }

    public function testNotifyNewReturnTrue()
    {
        $user = new User('roberto@test.it');

        $mock = Mockery::mock('alias:Mailer');

        $mock->shouldReceive('send')
            ->once()
            ->with($user->email, 'Hello!')
            ->andReturn(true);

        $this->assertTrue($user->notifyNew('Hello!'));
    }
}
