<?php

use PHPUnit\Framework\TestCase;

require 'src/User.php';

class UserTest extends TestCase
{
    public function testReturnFullName()
    {
        $user = new User();

        $user->first_name = 'Roberto';
        $user->surname = 'Gianotto';

        $this->assertEquals('Roberto Gianotto', $user->getFullName());
    }

    public function testFullNameIsEmptyByDefault()
    {
        $user = new User();

        $this->assertEquals('', $user->getFullName());
    }

    /**
     * @test
     */
    public function user_has_first_name()
    {
        $user = new User();

        $user->first_name = 'Roberto';

        $this->assertEquals('Roberto', $user->first_name);
    }

    public function testNotificationIsSent()
    {
        $this->markTestSkipped('Bad implementation');

        $user = new User();

        $user->email = 'gianottoroberto@gmail.com';

        $user->notify('Hello');
    }

    public function testNotificationIsSentWithMock()
    {
        // Nota: importante qui, Mock, dependency injection ...

        $user = new User();

        $mockMailer = $this->createMock(Mailer::class);

        $mockMailer->expects($this->once()) // che lo chiami almeno una volta
            ->method('sendMessage') // il nome del metodo da chiamare
            ->with($this->equalTo('gianottoroberto@gmail.com'), $this->equalTo('Hello')) // risultato atteso
            ->willReturn(true);

        $user->setMailer($mockMailer);

        $user->email = 'gianottoroberto@gmail.com';

        $this->assertTrue($user->notify('Hello'));
    }

    public function testCannotNotifyUserWithNoEmail()
    {
        $user = new User();

        $mockMailer = $this->createMock(Mailer::class);

        $mockMailer->method('sendMessage')
            ->will($this->throwException(new Exception));

        $user->setMailer($mockMailer);

        $this->expectException(Exception::class);

        $user->notify('Hello');
    }

    public function testCannotNotifyUserWithNoEmailWithMockBuilder()
    {
        $user = new User();

        $mockMailer = $this->getMockBuilder(Mailer::class)
            ->setMethods(null)
            ->getMock();

        $user->setMailer($mockMailer);

        $this->expectException(Exception::class);

        $user->notify('Hello');
    }

    public function testNotifyReturnTrue()
    {
        $user = new User('roberto@test.it');

        $this->expectException(InvalidArgumentException::class);

        $this->assertTrue($user->notifyNew('Hello!'));
    }
}