<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Models\ProductoModel;
use App\Models\CategoriaModel;
use App\Services\ProductosService;

class ProductosServiceTest extends TestCase
{

    public function testCategoriaIdValid()
    {
        $service = new ProductosService();

        $categoriaId = 1;
        $categorias = [
            new CategoriaModel([
                'id' => 1,
                'nombre' => 'nombre',
                'fecha_creacion' => '2025-01-01',
                'fecha_actualizacion' => '2025-01-01',
                'concurrencia' => 0
            ])
        ];
        $nombre = 'nombre';
        $descripcion = 'descripción';
        $stock_minimo = "10";

        $res = $service->validar($categoriaId, $categorias, $nombre, $descripcion, $stock_minimo);

        $this->assertTrue($res);
    }

    public function testCategoriaIdNotValid()
    {
        $service = new ProductosService();

        $categoriaId = 1;
        $categorias = [];
        $nombre = 'nombre';
        $descripcion = 'descripción';
        $stock_minimo = "10";

        $res = $service->validar($categoriaId, $categorias, $nombre, $descripcion, $stock_minimo);

        $this->assertFalse($res);
    }

    public function testNombreValid()
    {
        $service = new ProductosService();

        $categoriaId = 1;
        $categorias = [
            new CategoriaModel([
                'id' => 1,
                'nombre' => 'nombre',
                'fecha_creacion' => '2025-01-01',
                'fecha_actualizacion' => '2025-01-01',
                'concurrencia' => 0
            ])
        ];
        $nombre = 'nombre';
        $descripcion = 'descripción';
        $stock_minimo = "10";

        $res = $service->validar($categoriaId, $categorias, $nombre, $descripcion, $stock_minimo);

        $this->assertTrue($res);
    }

    public function testNombreTooLongNotValid()
    {
        $service = new ProductosService();

        $categoriaId = 1;
        $categorias = [
            new CategoriaModel([
                'id' => 1,
                'nombre' => 'nombre',
                'fecha_creacion' => '2025-01-01',
                'fecha_actualizacion' => '2025-01-01',
                'concurrencia' => 0
            ])
        ];
        $nombre = str_repeat("a",21);
        $descripcion = 'descripción';
        $stock_minimo = "10";

        $res = $service->validar($categoriaId, $categorias, $nombre, $descripcion, $stock_minimo);

        $this->assertFalse($res);
    }

    public function testNombreEmptyNotValid()
    {
        $service = new ProductosService();

        $categoriaId = 1;
        $categorias = [
            new CategoriaModel([
                'id' => 1,
                'nombre' => 'nombre',
                'fecha_creacion' => '2025-01-01',
                'fecha_actualizacion' => '2025-01-01',
                'concurrencia' => 0
            ])
        ];
        $nombre = '';
        $descripcion = 'descripción';
        $stock_minimo = "10";

        $res = $service->validar($categoriaId, $categorias, $nombre, $descripcion, $stock_minimo);

        $this->assertFalse($res);
    }

    public function testDescripcionTooLongNotValid()
    {
        $service = new ProductosService();

        $categoriaId = 1;
        $categorias = [
            new CategoriaModel([
                'id' => 1,
                'nombre' => 'nombre',
                'fecha_creacion' => '2025-01-01',
                'fecha_actualizacion' => '2025-01-01',
                'concurrencia' => 0
            ])
        ];
        $nombre = 'nombre';
        $descripcion = str_repeat("a",256);
        $stock_minimo = "10";

        $res = $service->validar($categoriaId, $categorias, $nombre, $descripcion, $stock_minimo);

        $this->assertFalse($res);
    }

    public function testStockMinimoValid()
    {
        $service = new ProductosService();

        $categoriaId = 1;
        $categorias = [
            new CategoriaModel([
                'id' => 1,
                'nombre' => 'nombre',
                'fecha_creacion' => '2025-01-01',
                'fecha_actualizacion' => '2025-01-01',
                'concurrencia' => 0
            ])
        ];
        $nombre = 'nombre';
        $descripcion = 'descripcion';
        $stock_minimo = "10";

        $res = $service->validar($categoriaId, $categorias, $nombre, $descripcion, $stock_minimo);

        $this->assertTrue($res);
    }

    public function testStockMinimoZeroNotValid()
    {
        $service = new ProductosService();

        $categoriaId = 1;
        $categorias = [
            new CategoriaModel([
                'id' => 1,
                'nombre' => 'nombre',
                'fecha_creacion' => '2025-01-01',
                'fecha_actualizacion' => '2025-01-01',
                'concurrencia' => 0
            ])
        ];
        $nombre = 'nombre';
        $descripcion = 'descripcion';
        $stock_minimo = "0";

        $res = $service->validar($categoriaId, $categorias, $nombre, $descripcion, $stock_minimo);

        $this->assertFalse($res);
    }

    public function testStockMinimoNegativeNotValid()
    {
        $service = new ProductosService();

        $categoriaId = 1;
        $categorias = [
            new CategoriaModel([
                'id' => 1,
                'nombre' => 'nombre',
                'fecha_creacion' => '2025-01-01',
                'fecha_actualizacion' => '2025-01-01',
                'concurrencia' => 0
            ])
        ];
        $nombre = 'nombre';
        $descripcion = 'descripcion';
        $stock_minimo = "-1";

        $res = $service->validar($categoriaId, $categorias, $nombre, $descripcion, $stock_minimo);

        $this->assertFalse($res);
    }
}
