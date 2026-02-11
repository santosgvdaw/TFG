<?php

namespace App\Views;

use App\Models\EjemplarModel;

class ActualizarVentaView extends BaseView
{
    private $venta;
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

    public function setVenta($venta)
    {
        $this->venta = $venta;
    }

    public function setEjemplares($ejemplares)
    {
        $this->ejemplares = $ejemplares;
    }

    protected function getContent()
    { ?>
        <form id="actualizar" name="actualizar" action="actualizarVenta.php" method="POST" style="max-width: 330px;">
            <div id="errores" class="row mb-3">
                <div id="errorExiste" class="alert alert-danger <?= in_array('errorExiste', $this->error) ? '' : 'd-none' ?>" role="alert">Ya existe una venta con ese nombre</div>
            </div>
            <input type="hidden" class="form-control" name="id" id="id" value="<?= $this->venta->getId() ?>" />
            <input type="hidden" class="form-control" name="con" id="con" value="<?= $this->venta->getConcurrencia() ?>" />
            <div class="row mb-3">
                <div id="errorNombre" class="alert alert-danger <?= in_array('errorNombre', $this->error) ? '' : 'd-none' ?>" role="alert">El nombre es demasiado largo (max. 20 caracteres) o corto (min. 1 caracter)</div>
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" class="form-control" name="nombre" id="nombre" value="<?= htmlspecialchars($this->venta->getNombre()) ?>" />
            </div>
            <input type="hidden" class="form-control" name="numEjemplares" id="numEjemplares" value="<?= count($this->venta->getEjemplares()) ?>" />
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
                    <button type="button" class="btn btn-danger btn-sm eliminar-ejemplar" title="Eliminar">
                        Eliminar
                    </button>
                </div>
            </div>
            <div id="ejemplares">
                <div id="errorProductos" class="alert alert-danger <?= in_array('errorProducto', $this->error) ? '' : 'd-none' ?>" role="alert">Uno o varios ejemplar/es seleccionado/s no existen</div>
                <?php foreach ($this->venta->getEjemplares() as $index => $idEjemplarVenta) { ?>
                    <?php $id = $index + 1; ?>
                    <div id="ejemplar<?= $id ?>" class="row mb-3 align-items-end ejemplar">
                        <div class="col">
                            <label for="ejemplar<?= $id ?>" class="form-label">Ejemplar</label>
                            <select class="form-select" name="ejemplar<?= $id ?>">
                                <?php foreach ($this->ejemplares as $ejemplar) { ?>
                                    <option value="<?= $ejemplar->getId() ?>"
                                        <?= $ejemplar->getId() == $idEjemplarVenta ? 'selected' : '' ?>>
                                        <?= htmlspecialchars($ejemplar->getId() . ' - ' . $ejemplar->getNombreProducto()) ?>
                                    </option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="col-auto">
                            <button type="button" class="btn btn-danger btn-sm eliminar-ejemplar" title="Eliminar este ejemplar">
                                Eliminar
                            </button>
                        </div>
                    </div>
                <?php } ?>
            </div>
            <div class="row mb-3 d-flex justify-content-center">
                <button id="btnAddEjemplar" class="btn btn-secondary row mb-3" name="crear" style="max-width:130px;">Añadir Ejemplar</button>
            </div>
            <div class="row mb-3 d-flex justify-content-center">
                <button type="submit" class="btn btn-primary col" name="actualizar" style="max-width:130px;">Actualizar Venta</button>
            </div>
        </form>
<?php }
}
