<?php

namespace App\Views;

class RegisterView extends BaseView
{
    protected function getTitle()
    {
        return "Registro";
    }

    protected function getScript()
    {
        return "register.js";
    }

    protected function getContent()
    { ?>
        <form id="register" name="register" action="register.php" method="POST" style="max-width: 330px;">
            <div id="errores" class="row mb-3">
                <div id="errorNombre" class="alert alert-danger <?= in_array('errorNombre', $this->error) ? '' : 'd-none' ?>" role="alert">El nombre es demasiado largo (max. 20 caracteres) o corto (min. 1 caracter)</div>
                <div id="errorEmail" class="alert alert-danger <?= in_array('errorEmail', $this->error) ? '' : 'd-none' ?>" role="alert">El correo no es válido</div>
            </div>
            <div class="row mb-3">
                <label for="userName" class="form-label">Usuario</label>
                <input type="text" class="form-control" name="userName" id="userName" />
            </div>
            <div class="row mb-3">
                <label for="password" class="form-label">Contraseña</label>
                <input type="password" class="form-control" name="password" id="password" />
            </div>
            <div class="row mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" name="email" id="email" />
            </div>
            <div class="row mb-3 d-flex justify-content-center">
                <button type="submit" class="btn btn-primary col" name="register" style="max-width:130px;">Registrarse</button>
            </div>
        </form>
    <?php }
}
