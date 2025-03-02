<h1>Crear Producto</h1>
<?php if (isset($_SESSION['mensaje'])): ?>
    <p class="mensaje"><?= $_SESSION['mensaje'] ?></p>
    <?php unset($_SESSION['mensaje']); ?>
<?php endif; ?>
<form action="<?=BASE_URL?>producto/guardar" method="POST" enctype="multipart/form-data" class="form-producto">
    <div class="form-group">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" required>
    </div>
    <div class="form-group">
        <label for="descripcion">Descripción:</label>
        <textarea name="descripcion" required></textarea>
    </div>
    <div class="form-group">
        <label for="precio">Precio:</label>
        <input type="number" name="precio" required>
    </div>
    <div class="form-group">
        <label for="categoria_id">Categoría:</label>
        <select name="categoria_id" required>
            <?php foreach ($_SESSION['categorias'] as $categoria): ?>
                <option value="<?= $categoria['id'] ?>"><?= $categoria['nombre'] ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="form-group">
        <label for="stock">Stock:</label>
        <input type="number" name="stock" required>
    </div>
    <div class="form-group">
        <label for="oferta">Oferta:</label>
        <input type="text" name="oferta">
    </div>
    <div class="form-group">
        <label for="imagen">Imagen:</label>
        <input type="file" name="imagen" required>
    </div>
    <div class="form-group">
        <input type="submit" value="Crear Producto" class="boton">
    </div>
</form>