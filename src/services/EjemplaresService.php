<?php

namespace App\Services;

class EjemplaresService
{
    private $errores;

    public function validar($productoId, $productos, $ubicacionId, $ubicaciones, $precio, $cantidad)
    {
        $this->errores = [];

        // Si hay algún producto con el id dado se elimina el error de producto
        $this->errores[0] = 'errorProducto';
        foreach ($productos as $producto) {
            if ($producto->getId() == $productoId) {
                unset($this->errores[0]);
                break;
            }
        }

        // Si hay alguna ubicación con el id dado se elimina el error de ubicación
        $this->errores[1] = 'errorUbicaccion';
        foreach ($ubicaciones as $ubicacion) {
            if ($ubicacion->getId() == $ubicacionId) {
                unset($this->errores[1]);
                break;
            }
        }

        if (!filter_var($precio, FILTER_VALIDATE_FLOAT, ['options' => ['min_range' => 0]])) {
            $this->errores[] = 'errorPrecio';
        }

        if (!filter_var($cantidad, FILTER_VALIDATE_INT, ['options' => ['min_range' => 1]])) {
            $this->errores[] = 'errorCantidad';
        }
        return empty($this->errores);
    }

    public function getErrores()
    {
        return $this->errores;
    }
}
