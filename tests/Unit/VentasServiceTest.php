<?php

namespace Tests\Unit;

use App\Services\VentasService;
use PHPUnit\Framework\TestCase;

class VentasServiceTest extends TestCase
{

    public function testUsernameValid()
    {
        $service = new VentasService();

        $nombre = "a";
        $productosVenta = [1, 2, 3];
        $productos = [1, 2, 3];
        $res = $service->validar($nombre,$productosVenta, $productos);

        $this->assertTrue($res);
    }

    public function testUsernameTooLongNotValid()
    {
        $service = new VentasService();

        $nombre = str_repeat("a", 21);
        $productosVenta = [1, 2, 3];
        $productos = [1, 2, 3];
        $res = $service->validar($nombre,$productosVenta, $productos);

        $this->assertFalse($res);
    }

    public function testUsernameEmptyNotValid()
    {
        $service = new VentasService();

        $nombre = '';
        $productosVenta = [1, 2, 3];
        $productos = [1, 2, 3];
        $res = $service->validar($nombre,$productosVenta, $productos);

        $this->assertFalse($res);
    }

    public function testProductosValid()
    {
        $service = new VentasService();

        $nombre = 'a';
        $productosVenta = [1, 2, 3];
        $productos = [1, 2, 3];
        $res = $service->validar($nombre,$productosVenta, $productos);

        $this->assertTrue($res);
    }

    public function testProductosNotValid()
    {
        $service = new VentasService();

        $nombre = '';
        $productosVenta = [1, 2, 3];
        $productos = [];
        $res = $service->validar($nombre,$productosVenta, $productos);

        $this->assertFalse($res);
    }
}
