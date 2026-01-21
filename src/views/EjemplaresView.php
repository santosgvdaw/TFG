<?php

namespace App\Views;

class EjemplaresView extends BaseView
{
    private $ejemplares;
    private $ubicacion;
    private $ubicaciones;
    private $categoria;
    private $categorias;

    protected function getTitle()
    {
        return "Ejemplares";
    }
    protected function getCurrentPage()
    {
        return "ejemplares";
    }

    protected function getScript()
    {
        return "ejemplaresFilter.js";
    }

    public function setEjemplares($ejemplares)
    {
        $this->ejemplares = $ejemplares;
    }

    public function setUbicacion($ubicacion)
    {
        $this->ubicacion = $ubicacion;
    }

    public function setUbicaciones($ubicaciones)
    {
        $this->ubicaciones = $ubicaciones;
    }

    public function setCategoria($categoria)
    {
        $this->categoria = $categoria;
    }

    public function setCategorias($categorias)
    {
        $this->categorias = $categorias;
    }

    protected function getContent()
    { ?>
        <div class="container">
            <div class="row">
                <div class="col mb-3">
                    <?php if ($this->isLogged) { ?>
                        <a href='crearEjemplar.php' class='btn btn-success'>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-plus">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M12 5l0 14" />
                                <path d="M5 12l14 0" />
                            </svg>
                            Añadir ejemplar
                        </a>
                    <?php } ?>
                </div>
                <form id="filtrar" name="filtrar" action="index.php" method="GET" class="col-7 form-inline">
                    <label for="ubicacion" class="form-label">Ubicación</label>
                    <select name="ubicacion" id="ubicacion">
                        <option value="">Ninguna</option>
                        <?php foreach ($this->ubicaciones as $categoria) { ?>
                            <option value="<?= $categoria->getId() ?>" <?= $categoria->getId() == $this->ubicacion ? 'selected' : '' ?>><?= $categoria->getNombre() ?></option>
                        <?php } ?>
                    </select>

                    <label for="categoria" class="form-label">Categoría</label>
                    <select name="categoria" id="categoria">
                        <option value="">Ninguna</option>
                        <?php foreach ($this->categorias as $categoria) { ?>
                            <option value="<?= $categoria->getId() ?>" <?= $categoria->getId() == $this->categoria ? 'selected' : '' ?>><?= $categoria->getNombre() ?></option>
                        <?php } ?>
                    </select>

                    <button id="resetFilters" type="reset" class="btn btn-secondary" name="limpiar">Limpiar selección</button>
                    <button type="submit" class="btn btn-primary" name="filtrar">Filtrar ejemplares</button>
                </form>
            </div>
            <div class="row">
                <table class="table table-striped">
                    <thead>
                        <tr class="text-center">
                            <th scope="col">Id</th>
                            <th scope="col">Nombre producto</th>
                            <th scope="col">Precio</th>
                            <th scope="col">Nombre ubicación</th>
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
                                <td><?= htmlspecialchars($ejemplar->getNombreProducto()) ?></td>
                                <td><?= htmlspecialchars($ejemplar->getPrecio()) ?></td>
                                <td><?= htmlspecialchars($ejemplar->getNombreUbicacion()) ?></td>
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
