<?php

namespace App\Views;

use App\Models\EjemplarModel;

class ActualizarUbicacionView extends BaseView
{
    private $ubicacion;

    protected function getTitle()
    {
        return "Categorías";
    }

    protected function getScript()
    {
        return "ubicaciones.js";
    }

    public function setUbicacion($ubicacion)
    {
        $this->ubicacion = $ubicacion;
    }

    protected function getContent()
    { ?>
        <form id="actualizar" name="actualizar" action="actualizarUbicacion.php" method="POST" style="max-width: 330px;">
            <div id="errores" class="row mb-3">
                <div id="errorNombre" class="alert alert-danger <?= in_array('errorNombre', $this->error) ? '' : 'd-none' ?>" role="alert">El nombre es demasiado largo (max. 20 caracteres) o corto (min. 1 caracter)</div>
            </div>
            <input type="hidden" class="form-control" name="id" id="id" value="<?= $this->ubicacion->getId() ?>" />
            <div class="row mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" class="form-control" name="nombre" id="nombre" value="<?= $this->ubicacion->getNombre() ?>" />
            </div>
            <div class="row mb-3 d-flex justify-content-center">
                <button type="submit" class="btn btn-primary col" name="actualizar" style="max-width:130px;">Actualizar Ubicación</button>
            </div>
        </form>
<?php }
}
