<?php

namespace App\Services;

class ProductosService
{
    private $errores;

    public function validar($categoriaId, $categorias, $nombre, $descripcion, $stock_minimo)
    {
        $this->errores = [];

        // Si hay alguna categoría con el id dado se elimina el error de categoría
        $this->errores[0] = 'errorCategoria';
        foreach ($categorias as $categoria) {
            if ($categoria->getId() == $categoriaId) {
                unset($this->errores[0]);
                break;
            }
        }

        if (strlen($nombre) > 20 || empty($nombre)) {
            $this->errores[] = 'errorNombre';
        }

        if (strlen($descripcion) > 255 || empty($descripcion)) {
            $this->errores[] = 'errorDescripcion';
        }

        if (!filter_var($stock_minimo, FILTER_VALIDATE_INT, ['options' => ['min_range' => 0]])) {
            $this->errores[] = 'errorStockMinimo';
        }
        return empty($this->errores);
    }

    public function getErrores()
    {
        return $this->errores;
    }
}
