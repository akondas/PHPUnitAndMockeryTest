<?php

class UserEventTest extends PHPUnit_Framework_TestCase {

    public function tearDown()
    {
        Mockery::close();
    }

    public function testUserRegister()
    {

        $user = Mockery::mock('User');
        $user->shouldReceive('getEmail')
            ->once()
            ->andReturn('test@test.pl');

        $mailer = Mockery::mock('Mailer[sendActivationMessage]');
        $mailer->shouldReceive('sendActivationMessage')
            ->once()
            ->andReturn(TRUE);

        $event = new UserEventHandler($user, $mailer);

        $this->assertEquals(TRUE, $event->onUserRegister());
        $this->assertEquals('test@test.pl', $mailer->getEmail());
    }

    /*
    public function testUserRegisterNativeMock()
    {
        $mock = $this->getMock('Mailer');
        $mock->expects($this->once())
            ->method('sendActivationMessage')
            ->will($this->returnValue(TRUE));

        $event = new UserEventHandler($mock);

        $this->assertEquals(TRUE, $event->onUserRegister());
    }*/

} 