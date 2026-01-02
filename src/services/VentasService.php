<?php

namespace App\Services;

class VentasService
{
    private $errores;

    public function validar($nombre, $productosVenta, $productos)
    {
        $this->errores = [];
        if (strlen($nombre) > 20 || empty($nombre)) {
            $this->errores[] = 'errorNombre';
        }

        // Comprueba que los productos de la Venta existan en la lista de productos
        $diff = array_diff($productosVenta, $productos);
        if (count($diff) > 0) {
            $this->errores[] = 'errorProductos';
        }

        return empty($this->errores);
    }

    public function getErrores()
    {
        return $this->errores;
    }
}
