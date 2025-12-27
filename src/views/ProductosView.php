<?php

namespace App\Views;

class ProductosView extends BaseView
{
    private $productos;
    private $rol;

    protected function getTitle()
    {
        return "Productos";
    }

    // El listado de productos no necesita script de cliente
    protected function getScript() {}

    public function setProductos($productos)
    {
        $this->productos = $productos;
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
                    <a href='crearProducto.php' class='col-1 btn btn-success'>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-plus">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M12 5l0 14" />
                            <path d="M5 12l14 0" />
                        </svg>
                        Añadir producto
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
                            <th scope="col">Nombre</th>
                            <th scope="col">Descripción</th>
                            <th scope="col">Categoría</th>
                            <th scope="col">Stock Mínimo</th>
                            <th scope="col">Stock Actual</th>
                            <th scope="col">Fecha Creación</th>
                            <th scope="col">Fecha Actualización</th>
                            <?php if ($this->isLogged && $this->rol == 'admin') { ?>
                                <th scope="col" colspan="2">Acciones</th>
                            <?php } ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($this->productos as $producto) { ?>
                            <tr class="text-center">
                                <td><?= $producto->getId() ?></td>
                                <td><?= htmlspecialchars($producto->getNombre()) ?></td>
                                <td><?= htmlspecialchars($producto->getDescripcion()) ?></td>
                                <td><?= htmlspecialchars($producto->getCategoria()) ?></td>
                                <td><?= htmlspecialchars($producto->getStockMinimo()) ?></td>
                                <td><?= htmlspecialchars($producto->getStockActual()) ?></td>
                                <td><?= $producto->getFechaCreacion() ?></td>
                                <td><?= $producto->getFechaActualizacion() ?></td>
                                <?php if ($this->isLogged && $this->rol == 'admin') { ?>
                                    <td>
                                        <a href='actualizarProducto.php?id=<?= $producto->getId() ?>' class='btn btn-warning'>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-edit">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1" />
                                                <path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z" />
                                                <path d="M16 5l3 3" />
                                            </svg>
                                        </a>
                                    </td>
                                    <td>
                                        <a href='borrarProducto.php?id=<?= $producto->getId() ?>' class='btn btn-danger'>
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
