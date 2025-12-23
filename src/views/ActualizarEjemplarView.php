<?php

namespace App\Views;

use App\Models\EjemplarModel;

class ActualizarEjemplarView extends BaseView
{
    private $ejemplar;
    private $productos;
    private $ubicaciones;

    protected function getTitle()
    {
        return "Ejemplares";
    }

    protected function getScript()
    {
        return "ejemplares.js";
    }

    public function setEjemplar($ejemplar)
    {
        $this->ejemplar = $ejemplar;
    }

    public function setProductos($productos)
    {
        $this->productos = $productos;
    }

    public function setubicaciones($ubicaciones)
    {
        $this->ubicaciones = $ubicaciones;
    }

    protected function getContent()
    { ?>
        <form id="actualizar" name="actualizar" action="actualizarEjemplar.php" method="POST" style="max-width: 330px;">
            <div id="errores" class="row mb-3">
                <div id="errorProducto" class="alert alert-danger <?= in_array('errorProducto', $this->error) ? '' : 'd-none' ?>" role="alert">El producto seleccionado no existe</div>
                <div id="errorUbicacion" class="alert alert-danger <?= in_array('errorUbicacion', $this->error) ? '' : 'd-none' ?>" role="alert">La Ubicación seleccionada no existe</div>
                <div id="errorPrecio" class="alert alert-danger <?= in_array('errorPrecio', $this->error) ? '' : 'd-none' ?>" role="alert">El precio no es válido</div>
            </div>
            <div class="row mb-3">
                <label for="producto" class="form-label">Producto</label>
                <select class="form-select" name="producto" id="producto">
                    <?php foreach ($this->productos as $producto) { ?>
                        <option value="<?= $producto->getId() ?>"><?= $producto->getNombre() ?></option>
                    <?php } ?>
                </select>

            </div>
            <div class="row mb-3">
                <label for="ubicacion" class="form-label">Ubicación</label>
                <select class="form-select" name="ubicacion" id="ubicacion">
                    <?php foreach ($this->ubicaciones as $ubicacion) { ?>
                        <option value="<?= $ubicacion->getId() ?>"><?= $ubicacion->getNombre() ?></option>
                    <?php } ?>
                </select>

            </div>
            <div class="row mb-3">
                <label for="precio" class="form-label">Precio</label>
                <input type="number" class="form-control" name="precio" id="precio" value="<?= $producto->getPrecio() ?>" />
            </div>
            <div class="row mb-3 d-flex justify-content-center">
                <button type="submit" class="btn btn-primary col" name="crear" style="max-width:130px;">Actualizar ejemplar</button>
            </div>
        </form>
<?php }
}
