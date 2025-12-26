<?php

namespace App\Views;

use App\Models\EjemplarModel;

class ActualizarCategoriaView extends BaseView
{
    private $categoria;

    protected function getTitle()
    {
        return "Categorías";
    }

    protected function getScript()
    {
        return "categorias.js";
    }

    public function setCategoria($categoria)
    {
        $this->categoria = $categoria;
    }

    protected function getContent()
    { ?>
        <form id="actualizar" name="actualizar" action="actualizarCategoria.php" method="POST" style="max-width: 330px;">
            <div id="errores" class="row mb-3">
                <div id="errorNombre" class="alert alert-danger <?= in_array('errorNombre', $this->error) ? '' : 'd-none' ?>" role="alert">El nombre es demasiado largo (max. 20 caracteres) o corto (min. 1 caracter)</div>
            </div>
            <input type="hidden" class="form-control" name="id" id="id" value="<?= $this->categoria->getId() ?>" />
            <div class="row mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" class="form-control" name="nombre" id="nombre" value="<?= $this->categoria->getNombre() ?>" />
            </div>
            <div class="row mb-3 d-flex justify-content-center">
                <button type="submit" class="btn btn-primary col" name="actualizar" style="max-width:130px;">Actualizar Categoría</button>
            </div>
        </form>
<?php }
}
