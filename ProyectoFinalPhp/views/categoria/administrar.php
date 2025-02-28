<h1>Administar categorias</h1>

<a href="<?=BASE_URL?>categoria/crear">
    <button class="boton more-margin">
        Crear Categoría
    </button>
</a>

<h2>Listado de Categorías</h2>
<?php if (isset($categorias) && count($categorias) > 0): ?>
    <ul>
        <?php foreach ($categorias as $categoria): ?>
            <li><?= htmlspecialchars($categoria['nombre']) ?></li>
        <?php endforeach; ?>
    </ul>
<?php else: ?>
    <p>No hay categorías para mostrar.</p>
<?php endif; ?>
