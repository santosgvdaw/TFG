<?php

namespace Tests\Unit;

use App\Models\RolesModel;
use App\Services\UsuariosService;
use PHPUnit\Framework\TestCase;

class UsuariosServiceTest extends TestCase
{

    public function testRolValid()
    {
        $service = new UsuariosService();

        $rol = 1;
        $roles = [
            new RolesModel([
                'id' => 1,
                'nombre'=> 'usuario',
                'fecha_creacion'=> '2025-01-01',
                'fecha_actualizacion'=> '2025-01-01',
                'concurrencia'=> 0
            ]),
            new RolesModel([
                'id' => 2,
                'nombre'=> 'admin',
                'fecha_creacion'=> '2025-01-01',
                'fecha_actualizacion'=> '2025-01-01',
                'concurrencia'=> 0
            ])
        ];

        $res = $service->validar($rol, $roles);

        $this->assertTrue($res);
    }

    public function testRolNotValid()
    {
        $service = new UsuariosService();

        $rol = 1;
        $roles = [];

        $res = $service->validar($rol, $roles);

        $this->assertFalse($res);
    }
}
