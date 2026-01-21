<?php

namespace App\Views;

class VentasView extends BaseView
{
    private $ventas;

    protected function getTitle()
    {
        return "Ventas";
    }

    protected function getCurrentPage()
    {
        return "ventas";
    }

    // El listado de ventas no necesita script de cliente
    protected function getScript() {}

    public function setVentas($ventas)
    {
        $this->ventas = $ventas;
    }

    protected function getContent()
    { ?>
        <div class="container">
            <div class="row">
                <?php if ($this->isLogged) { ?>
                    <div class="col mb-3">
                        <a href='crearVenta.php' class='btn btn-success'>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-plus">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M12 5l0 14" />
                                <path d="M5 12l14 0" />
                            </svg>
                            Añadir Venta
                        </a>
                    </div>
                <?php } ?>
            </div>
            <div class="row">
                <table class="table table-striped">
                    <thead>
                        <tr class="text-center">
                            <th scope="col">Id</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Fecha Creación</th>
                            <th scope="col">Fecha Actualización</th>
                            <?php if ($this->isLogged) { ?>
                                <th scope="col" colspan="2">Acciones</th>
                            <?php } ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($this->ventas as $venta) { ?>
                            <tr class="text-center">
                                <td><?= $venta->getId() ?></td>
                                <td><?= htmlspecialchars($venta->getNombre()) ?></td>
                                <td><?= $venta->getFechaCreacion() ?></td>
                                <td><?= $venta->getFechaActualizacion() ?></td>
                                <?php if ($this->isLogged) { ?>
                                    <td>
                                        <a href='actualizarVenta.php?id=<?= $venta->getId() ?>&con=<?= $venta->getConcurrencia() ?>' class='btn btn-warning'>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-edit">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1" />
                                                <path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z" />
                                                <path d="M16 5l3 3" />
                                            </svg>
                                        </a>
                                    </td>
                                    <td>
                                        <a href='borrarVenta.php?id=<?= $venta->getId() ?>&con=<?= $venta->getConcurrencia() ?>' class='btn btn-danger'>
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
