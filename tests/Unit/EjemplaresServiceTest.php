<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Models\ProductoModel;
use App\Models\UbicacionModel;
use App\Services\EjemplaresService;

class EjemplaresServiceTest extends TestCase
{

    public function testProductoIdValid()
    {
        $service = new EjemplaresService();

        $productoId = 1;
        $productos = [
            new ProductoModel([
                'id' => 1,
                'nombre' => 'producto',
                'descripcion' => 'descripcion',
                'stockMinimo' => '1',
                'nombreUbicacion' => 'nombreUbicacion',
                'fechaCreacion' => '2025-01-01',
                'fechaActualizacion' => '2025-01-01',
                'concurrencia' => 0
            ])
        ];
        $ubicacionId = 1;
        $ubicaciones = [
            new UbicacionModel([
                'id' => 1,
                'nombre' => 'ubicacion',
                'fechaCreacion' => '2025-01-01',
                'fechaActualizacion' => '2025-01-01',
                'concurrencia' => 0
            ])
        ];
        $precio = '1';

        $res = $service->validar($productoId, $productos, $ubicacionId, $ubicaciones, $precio);

        $this->assertTrue($res);
    }

    public function testProductoIdNotValid()
    {
        $service = new EjemplaresService();

        $productoId = 1;
        $productos = [];
        $ubicacionId = 1;
        $ubicaciones = [
            new UbicacionModel([
                'id' => 1,
                'nombre' => 'ubicacion',
                'fechaCreacion' => '2025-01-01',
                'fechaActualizacion' => '2025-01-01',
                'concurrencia' => 0
            ])
        ];
        $precio = '1';

        $res = $service->validar($productoId, $productos, $ubicacionId, $ubicaciones, $precio);

        $this->assertFalse($res);
    }

    public function testUbicacionIdValid()
    {
        $service = new EjemplaresService();

        $productoId = 1;

        $productos = [
            new ProductoModel([
                'id' => 1,
                'nombre' => 'producto',
                'descripcion' => 'descripcion',
                'stockMinimo' => '1',
                'nombreUbicacion' => 'nombreUbicacion',
                'fechaCreacion' => '2025-01-01',
                'fechaActualizacion' => '2025-01-01',
                'concurrencia' => 0
            ])
        ];
        $ubicacionId = 1;
        $ubicaciones = [
            new UbicacionModel([
                'id' => 1,
                'nombre' => 'ubicacion',
                'fechaCreacion' => '2025-01-01',
                'fechaActualizacion' => '2025-01-01',
                'concurrencia' => 0
            ])
        ];
        $precio = '1';

        $res = $service->validar($productoId, $productos, $ubicacionId, $ubicaciones, $precio);

        $this->assertTrue($res);
    }

    public function testUbicacionIdNotValid()
    {
        $service = new EjemplaresService();

        $productoId = 1;

        $productos = [
            new ProductoModel([
                'id' => 1,
                'nombre' => 'producto',
                'descripcion' => 'descripcion',
                'stockMinimo' => '1',
                'nombreUbicacion' => 'nombreUbicacion',
                'fechaCreacion' => '2025-01-01',
                'fechaActualizacion' => '2025-01-01',
                'concurrencia' => 0
            ])
        ];
        $ubicacionId = 1;
        $ubicaciones = [
            new UbicacionModel([
                'id' => 0,
                'nombre' => 'ubicacion',
                'fechaCreacion' => '2025-01-01',
                'fechaActualizacion' => '2025-01-01',
                'concurrencia' => 0
            ])
        ];
        $precio = '1';

        $res = $service->validar($productoId, $productos, $ubicacionId, $ubicaciones, $precio);

        $this->assertFalse($res);
    }

    public function testprecioIntegerValid()
    {
        $service = new EjemplaresService();

        $productoId = 1;
        $productos = [
            new ProductoModel([
                'id' => 1,
                'nombre' => 'producto',
                'descripcion' => 'descripcion',
                'stockMinimo' => '1',
                'nombreUbicacion' => 'nombreUbicacion',
                'fechaCreacion' => '2025-01-01',
                'fechaActualizacion' => '2025-01-01',
                'concurrencia' => 0
            ])
        ];
        $ubicacionId = 1;
        $ubicaciones = [
            new UbicacionModel([
                'id' => 1,
                'nombre' => 'ubicacion',
                'fechaCreacion' => '2025-01-01',
                'fechaActualizacion' => '2025-01-01',
                'concurrencia' => 0
            ])
        ];
        $precio = '1';

        $res = $service->validar($productoId, $productos, $ubicacionId, $ubicaciones, $precio);

        $this->assertTrue($res);
    }

    public function testprecioFloatValid()
    {
        $service = new EjemplaresService();

        $productoId = 1;
        $productos = [
            new ProductoModel([
                'id' => 1,
                'nombre' => 'producto',
                'descripcion' => 'descripcion',
                'stockMinimo' => '1',
                'nombreUbicacion' => 'nombreUbicacion',
                'fechaCreacion' => '2025-01-01',
                'fechaActualizacion' => '2025-01-01',
                'concurrencia' => 0
            ])
        ];
        $ubicacionId = 1;
        $ubicaciones = [
            new UbicacionModel([
                'id' => 1,
                'nombre' => 'ubicacion',
                'fechaCreacion' => '2025-01-01',
                'fechaActualizacion' => '2025-01-01',
                'concurrencia' => 0
            ])
        ];
        $precio = '1.1';

        $res = $service->validar($productoId, $productos, $ubicacionId, $ubicaciones, $precio);

        $this->assertTrue($res);
    }

    public function testprecioNotValid()
    {
        $service = new EjemplaresService();

        $productoId = 1;
        $productos = [];
        $ubicacionId = 1;
        $ubicaciones = [
            new UbicacionModel([
                'id' => 1,
                'nombre' => 'ubicacion',
                'fechaCreacion' => '2025-01-01',
                'fechaActualizacion' => '2025-01-01',
                'concurrencia' => 0
            ])
        ];
        $precio = 'a';

        $res = $service->validar($productoId, $productos, $ubicacionId, $ubicaciones, $precio);

        $this->assertFalse($res);
    }

    public function testprecioEmptyNotValid()
    {
        $service = new EjemplaresService();

        $productoId = 1;
        $productos = [];
        $ubicacionId = 1;
        $ubicaciones = [
            new UbicacionModel([
                'id' => 1,
                'nombre' => 'ubicacion',
                'fechaCreacion' => '2025-01-01',
                'fechaActualizacion' => '2025-01-01',
                'concurrencia' => 0
            ])
        ];
        $precio = '';

        $res = $service->validar($productoId, $productos, $ubicacionId, $ubicaciones, $precio);

        $this->assertFalse($res);
    }
}
