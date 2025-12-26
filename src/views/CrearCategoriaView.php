<?php

namespace App\Views;

class CrearCategoriaView extends BaseView
{
    private $ubicaciones;
    private $rol;

    protected function getTitle()
    {
        return "Categorías";
    }

    protected function getScript()
    {
        return "categorias.js";
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
        <form id="crear" name="crear" action="crearCategoria.php" method="POST" style="max-width: 330px;">
            <div id="errores" class="row mb-3">
                <div id="errorNombre" class="alert alert-danger <?= in_array('errorNombre', $this->error) ? '' : 'd-none' ?>" role="alert">El nombre es demasiado largo (max. 20 caracteres) o corto (min. 1 caracter)</div>
            </div>
            <div class="row mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" class="form-control" name="nombre" id="nombre" />
            </div>
            <div class="row mb-3 d-flex justify-content-center">
                <button type="submit" class="btn btn-primary col" name="crear" style="max-width:130px;">Añadir Categoría</button>
            </div>
        </form>
<?php }
}
