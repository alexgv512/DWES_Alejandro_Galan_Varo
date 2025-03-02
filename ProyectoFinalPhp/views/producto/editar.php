<h1>Editar Producto</h1>

<?php if (isset($_SESSION['mensaje'])): ?>
    <p><?= $_SESSION['mensaje'] ?></p>
    <?php unset($_SESSION['mensaje']); ?>
<?php endif; ?>

<?php if ($producto): ?>
    <form action="<?=BASE_URL?>producto/editar&id=<?=$producto['id'] ?>" method="POST" enctype="multipart/form-data">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" value="<?= $producto['nombre'] ?>" required>
        <br>
        <label for="descripcion">Descripción:</label>
        <textarea name="descripcion" required><?= $producto['descripcion'] ?></textarea>
        <br>
        <label for="precio">Precio:</label>
        <input type="number" name="precio" value="<?= $producto['precio'] ?>" required>
        <br>
        <label for="categoria_id">Categoría:</label>
        <select name="categoria_id" required>
            <?php foreach ($_SESSION['categorias'] as $categoria): ?>
                <option value="<?= $categoria['id'] ?>" <?= $categoria['id'] == $producto['categoria_id'] ? 'selected' : '' ?>><?= $categoria['nombre'] ?></option>
            <?php endforeach; ?>
        </select>
        <br>
        <label for="stock">Stock:</label>
        <input type="number" name="stock" value="<?= $producto['stock'] ?>" required>
        <br>
        <label for="oferta">Oferta:</label>
        <input type="text" name="oferta" value="<?= $producto['oferta'] ?>">
        <br>
        <label for="imagen">Imagen:</label>
        <img src="<?= BASE_URL ?>assets/img/<?= $producto['imagen'] ?>" alt="<?= $producto['nombre'] ?>" width="50">
        <input type="file" name="imagen">
        <br>
        <input type="submit" value="Actualizar Producto">
    </form>


<?php else: ?>
    <p>Producto no encontrado</p>
<?php endif; ?>

 