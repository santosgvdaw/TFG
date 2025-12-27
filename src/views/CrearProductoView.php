<?php

namespace App\Views;

class CrearProductoView extends BaseView
{
    private $productos;
    private $categorias;
    private $rol;

    protected function getTitle()
    {
        return "Productos";
    }

    protected function getScript()
    {
        return "productos.js";
    }

    public function setProductos($productos)
    {
        $this->productos = $productos;
    }

    public function setCategorias($categorias)
    {
        $this->categorias = $categorias;
    }

    public function setRol($rol)
    {
        $this->rol = $rol;
    }

    protected function getContent()
    { ?>
        <form id="crear" name="crear" action="crearProducto.php" method="POST" style="max-width: 330px;">
            <div id="errores" class="row mb-3">
                <div id="errorNombre" class="alert alert-danger <?= in_array('errorNombre', $this->error) ? '' : 'd-none' ?>" role="alert">El nombre es demasiado largo (max. 20 caracteres) o corto (min. 1 caracter)</div>
                <div id="errorDescripcion" class="alert alert-danger <?= in_array('errorDescripcion', $this->error) ? '' : 'd-none' ?>" role="alert">La descripción es demasiado larga (max. 255 caracteres) o corta (min. 1 caracter)</div>
                <div id="errorCategoria" class="alert alert-danger <?= in_array('errorCategoria', $this->error) ? '' : 'd-none' ?>" role="alert">La categoría seleccionada no existe</div>
                <div id="errorStockMinimo" class="alert alert-danger <?= in_array('errorStockMinimo', $this->error) ? '' : 'd-none' ?>" role="alert">El stock no es un número entero positivo</div>
            </div>
            <div class="row mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" class="form-control" name="nombre" id="nombre" />
            </div>
            <div class="row mb-3">
                <label for="descripcion" class="form-label">descripción</label>
                <textarea class="form-control" name="descripcion" id="descripcion" rows="3"></textarea>
            </div>
            <div class="row mb-3">
                <label for="categoria" class="form-label">Categoria</label>
                <select class="form-select" name="categoria" id="categoria">
                    <?php foreach ($this->categorias as $categoria) { ?>
                        <option value="<?= $categoria->getId() ?>"><?= $categoria->getNombre() ?></option>
                    <?php } ?>
                </select>

            </div>
            <div class="row mb-3">
                <label for="stockMinimo" class="form-label">Stock mínimo</label>
                <input type="number" class="form-control" name="stockMinimo" id="stockMinimo" />
            </div>
            <div class="row mb-3 d-flex justify-content-center">
                <button type="submit" class="btn btn-primary col" name="crear" style="max-width:130px;">Añadir Producto</button>
            </div>
        </form>
<?php }
}
