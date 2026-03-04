<?php

namespace Tests\Unit;

use App\Services\RegisterService;
use PHPUnit\Framework\TestCase;

class RegisterServiceTest extends TestCase
{

    public function testUsernameValid()
    {
        $service = new RegisterService();

        $nombre = "a";
        $email = 'a@a.com';
        $res = $service->validar($nombre, $email);

        $this->assertTrue($res);
    }

    public function testUsernameTooLongNotValid()
    {
        $service = new RegisterService();

        $nombre = str_repeat("a", 21);
        $email = 'a@a.com';
        $res = $service->validar($nombre, $email);

        $this->assertFalse($res);
    }

    public function testUsernameEmptyNotValid()
    {
        $service = new RegisterService();

        $nombre = '';
        $email = 'a@a.com';
        $res = $service->validar($nombre, $email);

        $this->assertFalse($res);
    }

    public function testEmailValid()
    {
        $service = new RegisterService();

        $nombre = 'a';
        $email = 'a@a.com';
        $res = $service->validar($nombre, $email);

        $this->assertTrue($res);
    }

    public function testEmailNotValid()
    {
        $service = new RegisterService();

        $nombre = 'a';
        $email = 'a';
        $res = $service->validar($nombre, $email);

        $this->assertFalse($res);
    }
}
