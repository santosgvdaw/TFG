<?php

namespace Tests\Unit;

use App\Services\CategoriasService;
use PHPUnit\Framework\TestCase;

class CategoriasServiceTest extends TestCase
{

    public function testUsernameValid()
    {
        $service = new CategoriasService();

        $nombre = "a";
        $res = $service->validar($nombre);

        $this->assertTrue($res);
    }

    public function testUsernameTooLongNotValid()
    {
        $service = new CategoriasService();

        $nombre = str_repeat("a", 21);
        $res = $service->validar($nombre);

        $this->assertFalse($res);
    }

    public function testUsernameEmptyNotValid()
    {
        $service = new CategoriasService();

        $nombre = '';
        $res = $service->validar($nombre);

        $this->assertFalse($res);
    }
}
