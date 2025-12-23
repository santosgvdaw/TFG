<?php

namespace App\Services;

class EjemplaresService
{
    private $errores;

    public function validar($productoId, $productos, $ubicacionId, $ubicaciones, $precio)
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

        if (!filter_var($precio, FILTER_VALIDATE_FLOAT)) {
            $this->errores[] = 'errorPrecio';
        }
        return empty($this->errores);
    }

    public function getErrores()
    {
        return $this->errores;
    }
}
