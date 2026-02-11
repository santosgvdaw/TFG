<?php

namespace App\Views;

class CrearUbicacionView extends BaseView
{
    private $ubicaciones;

    protected function getTitle()
    {
        return "Ubicaciones";
    }

    protected function getCurrentPage()
    {
        return "ubicaciones";
    }

    protected function getScript()
    {
        return "ubicaciones.js";
    }

    public function setUbicaciones($ubicaciones)
    {
        $this->ubicaciones = $ubicaciones;
    }

    protected function getContent()
    { ?>
        <form id="crear" name="crear" action="crearUbicacion.php" method="POST" style="max-width: 330px;">
            <div id="errores" class="row mb-3">
                <div id="errorExiste" class="alert alert-danger <?= in_array('errorExiste', $this->error) ? '' : 'd-none' ?>" role="alert">Ya existe una ubicación con ese nombre</div>
                <div id="errorNombre" class="alert alert-danger <?= in_array('errorNombre', $this->error) ? '' : 'd-none' ?>" role="alert">El nombre es demasiado largo (max. 20 caracteres) o corto (min. 1 caracter)</div>
            </div>
            <div class="row mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" class="form-control" name="nombre" id="nombre" />
            </div>
            <div class="row mb-3 d-flex justify-content-center">
                <button type="submit" class="btn btn-primary col" name="crear" style="max-width:130px;">Añadir Ubicación</button>
            </div>
        </form>
<?php }
}
