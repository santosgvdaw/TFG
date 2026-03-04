<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Services\LoginService;

class LoginServiceTest extends TestCase {

    public function testUsernameTooLongNotValid() {
        $service = new LoginService();

        $userName = str_repeat("a",21);
        $hashedPassword = password_hash('1234', PASSWORD_BCRYPT);
        $password = '1234';
        $res = $service->validar($userName, $password, $hashedPassword);

        $this->assertFalse($res);
    }

    public function testUsernameEmptyNotValid() {
        $service = new LoginService();

        $userName = '';
        $hashedPassword = password_hash('1234', PASSWORD_BCRYPT);
        $password = '1234';
        $res = $service->validar($userName, $password, $hashedPassword);

        $this->assertFalse($res);
    }

    public function testUsernameValid() {
        $service = new LoginService();

        $userName = 'a';
        $hashedPassword = password_hash('1234', PASSWORD_BCRYPT);
        $password = '1234';
        $res = $service->validar($userName, $password, $hashedPassword);

        $this->assertTrue($res);
    }

    public function testPasswordValid() {
        $service = new LoginService();

        $userName = 'a';
        $hashedPassword = password_hash('1234', PASSWORD_BCRYPT);
        $password = '1234';
        $res = $service->validar($userName, $password, $hashedPassword);

        $this->assertTrue($res);
    }

    public function testPasswordNotValid() {
        $service = new LoginService();

        $userName = 'a';
        $hashedPassword = password_hash('1234', PASSWORD_BCRYPT);
        $password = '12345';
        $res = $service->validar($userName, $password, $hashedPassword);

        $this->assertFalse($res);
    }
}
