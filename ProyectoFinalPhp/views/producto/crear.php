<h1>Crear Producto</h1>
    <?php if (isset($_SESSION['mensaje'])): ?>
        <p><?= $_SESSION['mensaje'] ?></p>
        <?php unset($_SESSION['mensaje']); ?>
    <?php endif; ?>
    <form action="<?=BASE_URL?>producto/guardar" method="POST" enctype="multipart/form-data">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" required>
        <br>
        <label for="descripcion">Descripción:</label>
        <textarea name="descripcion" required></textarea>
        <br>
        <label for="precio">Precio:</label>
        <input type="number" name="precio" required>
        <br>
        <label for="categoria_id">Categoría:</label>
        <select name="categoria_id" required>
            <?php foreach ($_SESSION['categorias'] as $categoria): ?>
                <option value="<?= $categoria['id'] ?>"><?= $categoria['nombre'] ?></option>
            <?php endforeach; ?>
        </select>
        <br>
        <label for="stock">Stock:</label>
        <input type="number" name="stock" required>
        <br>
        <label for="oferta">Oferta:</label>
        <input type="text" name="oferta">
        <br>
        <label for="imagen">Imagen:</label>
        <input type="file" name="imagen" required>
        <br>
        <input type="submit" value="Crear Producto">
    </form>