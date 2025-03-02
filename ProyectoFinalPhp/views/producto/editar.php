<h1>Editar Producto</h1>

<?php if (isset($_SESSION['mensaje'])): ?>
    <p class="mensaje"><?= $_SESSION['mensaje'] ?></p>
    <?php unset($_SESSION['mensaje']); ?>
<?php endif; ?>

<?php if ($producto): ?>
    <form action="<?=BASE_URL?>producto/actualizar" method="POST" enctype="multipart/form-data" class="form-producto">
        <input type="hidden" name="id" value="<?= $producto['id'] ?>">
        <div class="form-group">
            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" value="<?= $producto['nombre'] ?>" required>
        </div>
        <div class="form-group">
            <label for="descripcion">Descripción:</label>
            <textarea name="descripcion" required><?= $producto['descripcion'] ?></textarea>
        </div>
        <div class="form-group">
            <label for="precio">Precio:</label>
            <input type="number" name="precio" value="<?= $producto['precio'] ?>" required>
        </div>
        <div class="form-group">
            <label for="categoria_id">Categoría:</label>
            <select name="categoria_id" required>
                <?php foreach ($_SESSION['categorias'] as $categoria): ?>
                    <option value="<?= $categoria['id'] ?>" <?= $categoria['id'] == $producto['categoria_id'] ? 'selected' : '' ?>><?= $categoria['nombre'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group">
            <label for="stock">Stock:</label>
            <input type="number" name="stock" value="<?= $producto['stock'] ?>" required>
        </div>
        <div class="form-group">
            <label for="oferta">Oferta:</label>
            <input type="text" name="oferta" value="<?= $producto['oferta'] ?>">
        </div>
        <div class="form-group">
            <label for="imagen">Imagen:</label>
            <img src="<?= BASE_URL ?>assets/img/<?= $producto['imagen'] ?>" alt="<?= $producto['nombre'] ?>" width="50">
            <input type="file" name="imagen">
        </div>
        <div class="form-group">
            <input type="submit" value="Actualizar Producto" class="boton">
        </div>
    </form>
<?php else: ?>
    <p>Producto no encontrado</p>
<?php endif; ?>