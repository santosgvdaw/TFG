<?php

namespace Tests\Unit;

use App\Services\UbicacionesService;
use PHPUnit\Framework\TestCase;

class UbicacionesServiceTest extends TestCase
{

    public function testUsernameValid()
    {
        $service = new UbicacionesService();

        $nombre = "a";
        $res = $service->validar($nombre);

        $this->assertTrue($res);
    }

    public function testUsernameTooLongNotValid()
    {
        $service = new UbicacionesService();

        $nombre = str_repeat("a", 21);
        $res = $service->validar($nombre);

        $this->assertFalse($res);
    }

    public function testUsernameEmptyNotValid()
    {
        $service = new UbicacionesService();

        $nombre = '';
        $res = $service->validar($nombre);

        $this->assertFalse($res);
    }
}
