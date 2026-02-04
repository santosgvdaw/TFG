<?php

namespace App\Views;

class CrearVentaView extends BaseView
{
    private $ejemplares;

    protected function getTitle()
    {
        return "Ventas";
    }

    protected function getCurrentPage()
    {
        return "ventas";
    }

    protected function getScript()
    {
        return "ventas.js";
    }

    public function setEjemplares($ejemplares)
    {
        $this->ejemplares = $ejemplares;
    }

    protected function getContent()
    { ?>
        <form id="crear" name="crear" action="crearVenta.php" method="POST" style="max-width: 330px;">
            <div id="errores" class="row mb-3">
                <div id="errorNombre" class="alert alert-danger <?= in_array('errorNombre', $this->error) ? '' : 'd-none' ?>" role="alert">El nombre es demasiado largo (max. 20 caracteres) o corto (min. 1 caracter)</div>
                <div id="errorProductos" class="alert alert-danger <?= in_array('errorProducto', $this->error) ? '' : 'd-none' ?>" role="alert">Uno o varios producto/s seleccionado/s no existen</div>
            </div>
            <div class="row mb-3 d-flex justify-content-center">
                <button id="btnAddEjemplar" class="btn btn-secondary row mb-3" name="crear" style="max-width:130px;">Añadir Ejemplar</button>
            </div>
            <div class="row mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" class="form-control" name="nombre" id="nombre" />
            </div>
            <input type="hidden" class="form-control" name="numEjemplares" id="numEjemplares" value="1" />
            <div id="ejemplar0" class="row mb-3 d-none align-items-end ejemplar">
                <div class="col">
                    <label for="ejemplar0" class="form-label">Ejemplar</label>
                    <select class="form-select" name="ejemplar0">
                        <?php foreach ($this->ejemplares as $ejemplar) { ?>
                            <option value="<?= $ejemplar->getId() ?>"><?= htmlspecialchars($ejemplar->getId() . ' - ' . $ejemplar->getNombreProducto()) ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="col-auto">
                    <button type="button" class="btn btn-danger btn-sm eliminar-ejemplar">
                        Eliminar
                    </button>
                </div>
            </div>
            <div id="ejemplares">
                <div id="ejemplar1" class="row mb-3 align-items-end ejemplar">
                    <div class="col">
                        <label for="ejemplar1" class="form-label">Ejemplar</label>
                        <select class="form-select" name="ejemplar1">
                            <?php foreach ($this->ejemplares as $ejemplar) { ?>
                                <option value="<?= $ejemplar->getId() ?>"><?= htmlspecialchars($ejemplar->getId() . ' - ' . $ejemplar->getNombreProducto()) ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="col-auto">
                        <button type="button" class="btn btn-danger btn-sm eliminar-ejemplar">
                            Eliminar
                        </button>
                    </div>
                </div>
            </div>
            <div class="row mb-3 d-flex justify-content-center">
                <button type="submit" class="btn btn-primary col" name="crear" style="max-width:130px;">Añadir Venta</button>
            </div>
        </form>
<?php }
}
