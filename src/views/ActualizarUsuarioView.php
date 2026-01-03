<?php

namespace App\Views;

use App\Models\UsuariosModel;

class ActualizarUsuarioView extends BaseView
{
    private $usuario;
    private $roles;

    protected function getTitle()
    {
        return "Usuarios";
    }

    protected function getScript()
    {
        return "usuarios.js";
    }

    public function setUsuario($usuario)
    {
        $this->usuario = $usuario;
    }

    public function setRoles($roles)
    {
        $this->roles = $roles;
    }

    protected function getContent()
    { ?>
        <form id="actualizar" name="actualizar" action="actualizarUsuario.php" method="POST" style="max-width: 330px;">
            <div id="errores" class="row mb-3">
                <div id="errorRol" class="alert alert-danger <?= in_array('errorRol', $this->error) ? '' : 'd-none' ?>" role="alert">El rol seleccionado no existe</div>
            </div>
            <input type="hidden" class="form-control" name="id" id="id" value="<?= $this->usuario->getId() ?>" />
            <div class="row mb-3">
                <label for="rol" class="form-label">Rol</label>
                <select class="form-select" name="rol" id="rol">
                    <?php foreach ($this->roles as $rol) { ?>
                        <option value="<?= $rol->getId() ?>" <?= $rol->getNombre() == $this->usuario->getNombreRol() ? 'selected' : '' ?> ><?= $rol->getNombre() ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="row mb-3 d-flex justify-content-center">
                <button type="submit" class="btn btn-primary col" name="actualizar" style="max-width:130px;">Actualizar usuario</button>
            </div>
        </form>
<?php }
}
