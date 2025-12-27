<?php

namespace App\Views;

use App\Models\EjemplarModel;

class ActualizarProductoView extends BaseView
{
    private $producto;
    private $categorias;

    protected function getTitle()
    {
        return "Productos";
    }

    protected function getScript()
    {
        return "productos.js";
    }

        public function setProducto($producto)
    {
        $this->producto = $producto;
    }

    public function setCategorias($categorias)
    {
        $this->categorias = $categorias;
    }

    protected function getContent()
    { ?>
        <form id="actualizar" name="actualizar" action="actualizarProducto.php" method="POST" style="max-width: 330px;">
            <div id="errores" class="row mb-3">
                <div id="errorNombre" class="alert alert-danger <?= in_array('errorNombre', $this->error) ? '' : 'd-none' ?>" role="alert">El nombre es demasiado largo (max. 20 caracteres) o corto (min. 1 caracter)</div>
                <div id="errorDescripcion" class="alert alert-danger <?= in_array('errorDescripcion', $this->error) ? '' : 'd-none' ?>" role="alert">La descripción es demasiado larga (max. 255 caracteres) o corta (min. 1 caracter)</div>
                <div id="errorCategoria" class="alert alert-danger <?= in_array('errorCategoria', $this->error) ? '' : 'd-none' ?>" role="alert">La categoría seleccionada no existe</div>
                <div id="errorStockMinimo" class="alert alert-danger <?= in_array('errorStockMinimo', $this->error) ? '' : 'd-none' ?>" role="alert">El stock no es un número entero positivo</div>
            </div>
            <input type="hidden" class="form-control" name="id" id="id" value="<?= $this->producto->getId() ?>" />
            <div class="row mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" class="form-control" name="nombre" id="nombre" value="<?= htmlspecialchars($this->producto->getNombre()) ?>" />
            </div>
            <div class="row mb-3">
                <label for="descripcion" class="form-label">descripción</label>
                <textarea class="form-control" name="descripcion" id="descripcion" rows="3"><?= htmlspecialchars($this->producto->getDescripcion()) ?></textarea>
            </div>
            <div class="row mb-3">
                <label for="categoria" class="form-label">Categoria</label>
                <select class="form-select" name="categoria" id="categoria">
                    <?php foreach ($this->categorias as $_categoria) { ?>
                        <option value="<?= $_categoria->getId() ?>" <?= $_categoria->getNombre() == $this->producto->getCategoria() ? 'selected' : '' ?> ><?= $_categoria->getNombre() ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="row mb-3">
                <label for="stockMinimo" class="form-label">Stock mínimo</label>
                <input type="number" class="form-control" name="stockMinimo" id="stockMinimo" value="<?= htmlspecialchars($this->producto->getStockMinimo()) ?>" />
            </div>
            <div class="row mb-3 d-flex justify-content-center">
                <button type="submit" class="btn btn-primary col" name="actualizar" style="max-width:130px;">Actualizar Producto</button>
            </div>
        </form>
<?php }
}
