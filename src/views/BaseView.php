<?php

namespace App\Views;

abstract class BaseView
{
    protected $error;
    protected $isLogged;
    protected $needsHeader;

    public function __construct()
    {
        $this->error = [];
        $this->isLogged = false;
        $this->needsHeader = true;
    }

    abstract protected function getTitle();
    protected function getHeader()
    { ?>
        <div class="col-md-3 mb-2 mb-md-0">LOGO</div>
        <div class="col-12 col-md-auto mb-2 justify-content-center mb-md-0">
            <a href='index.php' class='btn btn-primary'>
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-archive">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M3 4m0 2a2 2 0 0 1 2 -2h14a2 2 0 0 1 2 2v0a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2z" />
                    <path d="M5 8v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-10" />
                    <path d="M10 12l4 0" />
                </svg>
                Ejemplares
            </a>
            <a href='categorias.php' class='btn btn-primary'>
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-category">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M4 4h6v6h-6z" />
                    <path d="M14 4h6v6h-6z" />
                    <path d="M4 14h6v6h-6z" />
                    <path d="M17 17m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0" />
                </svg>
                Categorías
            </a>
            <a href='ubicaciones.php' class='btn btn-primary'>
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-map-pin">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M9 11a3 3 0 1 0 6 0a3 3 0 0 0 -6 0" />
                    <path d="M17.657 16.657l-4.243 4.243a2 2 0 0 1 -2.827 0l-4.244 -4.243a8 8 0 1 1 11.314 0z" />
                </svg>
                Ubicaciones
            </a>
        </div>
        <div class="col-md-3 text-end">
            <?php if ($this->isLogged) { ?>
                <a href='cerrar.php' class='btn btn-light'>
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-logout">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M14 8v-2a2 2 0 0 0 -2 -2h-7a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h7a2 2 0 0 0 2 -2v-2" />
                        <path d="M9 12h12l-3 -3" />
                        <path d="M18 15l3 -3" />
                    </svg>
                    Cerrar Sesión
                </a>
            <?php } else { ?>
                <a href='login.php' class='btn btn-primary'>
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-login">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M15 8v-2a2 2 0 0 0 -2 -2h-7a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h7a2 2 0 0 0 2 -2v-2" />
                        <path d="M21 12h-13l3 -3" />
                        <path d="M11 15l-3 -3" />
                    </svg>Iniciar Sesión</a>
                <a href='register.php' class='btn btn-light'>
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-user-plus">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0" />
                        <path d="M16 19h6" />
                        <path d="M19 16v6" />
                        <path d="M6 21v-2a4 4 0 0 1 4 -4h4" />
                    </svg>
                    Registrarse
                </a>
            <?php } ?>
        </div>
    <?php }
    abstract protected function getContent();
    abstract protected function getScript();

    public function setError($error)
    {
        $this->error = $error;
    }

    public function setIsLogged($isLogged)
    {
        $this->isLogged = $isLogged;
    }

    public function setNeedsHeader($needsHeader)
    {
        $this->needsHeader = $needsHeader;
    }

    public function render()
    { ?>
        <!DOCTYPE html>
        <html lang="es">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title><?= $this->getTitle() ?></title>
            <link href="bootstrap.min.v5.3.8.css" rel="stylesheet" integrity="sha384-vt87vjrIEEfJX9vGHpIbioSQQd3ud5HqwGyQHSsaDskGhAqu+OkhhJ74Hn+PQilp" crossorigin="anonymous">
            <script src="<?= $this->getScript() ?>" defer></script>
        </head>

        <body>
            <header class="d-flex justify-content-center py-3 mb-5 border-bottom bg-secondary text-white"><?php $this->getHeader(); ?></header>
            <div class="container">
                <div class="mb-3 d-flex justify-content-center"><?php $this->getContent() ?></div>
            </div>
            </div>
        </body>

        </html>
<?php
    }
}
