<?php

namespace App\Views;

abstract class BaseView {
    protected $error;

    public function __construct()
    {
        $this->error = [];
    }

    abstract protected function getTitle();
    abstract protected function getContent();
    abstract protected function getScript();

    public function setError($error) {
        $this->error = $error;
    }

    public function render() {?>
        <!DOCTYPE html>
        <html lang="es">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title><?= $this->getTitle() ?></title>
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
            <link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.7.2/css/all.css" integrity="sha384-nRgPTkuX86pH8yjPJUAFuASXQSSl2/bBUiNV47vSYpKFxHJhbcrGnmlYpYJMeD7a" crossorigin="anonymous">
            <script src="<?= $this->getScript() ?>" defer></script>
        </head>
        <body>
            <header class="d-flex justify-content-center py-3 mb-5 border-bottom bg-secondary text-white"></header>
            <div class="container">
                <div class="mb-3 d-flex justify-content-center"><?php $this->getContent() ?></div>
                </div>
            </div>
        </body>
        </html>
    <?php
    }
}
