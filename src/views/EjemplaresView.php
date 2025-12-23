<?php

namespace App\Views;

class EjemplaresView extends BaseView
{
    private $ejemplares;
    private $rol;

    protected function getTitle()
    {
        return "Ejemplares";
    }

    // El listado de ejemplares no necesita script de cliente
    protected function getScript() {}

    public function setEjemplares($ejemplares)
    {
        $this->ejemplares = $ejemplares;
    }

    public function setRol($rol)
    {
        $this->rol = $rol;
    }

    protected function getContent()
    { ?>
        <div class="container">
            <div class="row">
                <?php if ($this->isLogged) { ?>
                    <a href='crearEjemplar.php' class='col-1 btn btn-success'>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-plus">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M12 5l0 14" />
                            <path d="M5 12l14 0" />
                        </svg>
                        Añadir ejemplar
                    </a>
                <?php } ?>
            </div>
            <div class="row">
                <table class="table table-striped">
                    <colgroup>
                        <col span="1" style="width: 5%;">
                        <col span="1" style="width: 50%;">
                        <col span="1" style="width: 50%;">
                        <col span="1" style="width: 50%;">
                        <col span="1" style="width: 50%;">
                        <?php if ($this->isLogged) { ?>
                            <col span="2" style="width: 5%;">
                        <?php } ?>
                    </colgroup>
                    <thead>
                        <tr class="text-center">
                            <th scope="col">Id</th>
                            <th scope="col">Nombre producto</th>
                            <th scope="col">Precio</th>
                            <th scope="col">Fecha Entrada</th>
                            <th scope="col">Fecha Actualización</th>
                            <?php if ($this->isLogged) { ?>
                                <th scope="col" colspan="2">Acciones</th>
                            <?php } ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($this->ejemplares as $ejemplar) { ?>
                            <tr class="text-center">
                                <td><?= $ejemplar->getId() ?></td>
                                <td><?= $ejemplar->getNombreProducto() ?></td>
                                <td><?= $ejemplar->getPrecio() ?></td>
                                <td><?= $ejemplar->getFechaEntrada() ?></td>
                                <td><?= $ejemplar->getFechaActualizacion() ?></td>
                                <?php if ($this->isLogged) { ?>
                                    <td>
                                        <a href='actualizarEjemplar.php?id=<?= $ejemplar->getId() ?>' class='btn btn-warning'>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-edit">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1" />
                                                <path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z" />
                                                <path d="M16 5l3 3" />
                                            </svg>
                                        </a>
                                    </td>
                                    <td>
                                        <a href='borrarEjemplar.php?id=<?= $ejemplar->getId() ?>' class='btn btn-danger'>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-trash">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <path d="M4 7l16 0" />
                                                <path d="M10 11l0 6" />
                                                <path d="M14 11l0 6" />
                                                <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />
                                                <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" />
                                            </svg>
                                        </a>
                                    </td>
                                <?php } ?>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
<?php }
}
