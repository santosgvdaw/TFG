<?php

namespace App\Views;

class CrearEjemplarView extends BaseView
{
    private $productos;
    private $ubicaciones;
    private $rol;

    protected function getTitle()
    {
        return "Ejemplares";
    }

    protected function getScript()
    {
        return "ejemplares.js";
    }

    public function setProductos($productos)
    {
        $this->productos = $productos;
    }

    public function setUbicaciones($ubicaciones)
    {
        $this->ubicaciones = $ubicaciones;
    }

    public function setRol($rol)
    {
        $this->rol = $rol;
    }

    protected function getContent()
    { ?>
        <form id="crear" name="crear" action="crearEjemplar.php" method="POST" style="max-width: 330px;">
            <div id="errores" class="row mb-3">
                <div id="errorProducto" class="alert alert-danger <?= in_array('errorProducto', $this->error) ? '' : 'd-none' ?>" role="alert">El producto seleccionado no existe</div>
                <div id="errorUbicacion" class="alert alert-danger <?= in_array('errorUbicacion', $this->error) ? '' : 'd-none' ?>" role="alert">La ubicación seleccionada no existe</div>
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
                <input type="number" class="form-control" name="precio" id="precio" />
            </div>
            <div class="row mb-3 d-flex justify-content-center">
                <button type="submit" class="btn btn-primary col" name="crear" style="max-width:130px;">Añadir ejemplar</button>
            </div>
        </form>
<?php }
}
