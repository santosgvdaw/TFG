<?php

namespace App\Views;

class LoginView extends BaseView {
    protected function getTitle() {
        return "Login";
    }

    // El login no necesita cabecera
    protected function getHeader() {}

    protected function getScript(){
        return "login.js";
    }

    protected function getContent() { ?>
        <form id="login" name="login" action="login.php" method="POST" style="max-width: 330px;">
            <div id="errores" class="row mb-3">
                <div id="errorNombre" class="alert alert-danger <?= in_array('errorNombre', $this->error) ? '' : 'd-none' ?>" role="alert">El nombre es demasiado largo (max. 20 caracteres) o corto (min. 1 caracter)</div>
                <div id="errorContrasena" class="alert alert-danger <?= in_array('errorContrasena', $this->error) ? '' : 'd-none' ?>" role="alert">Nombre de usuario y/o contraseña erroneos</div>
            </div>
            <div class="row mb-3">
                <label for="userName" class="form-label">Usuario</label>
                <input type="text" class="form-control" name="userName" id="userName"/>
            </div>
            <div class="row mb-3">
                <label for="password" class="form-label">Contraseña</label>
                <input type="password" class="form-control" name="password" id="password"/>
            </div>
            <div class="row mb-3 d-flex justify-content-center">
                <button type="submit" class="btn btn-primary col" name="login" style="max-width:130px;">Iniciar session</button>
            </div>
        </form>
    <?php }
}
