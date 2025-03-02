<h1>Gestión de Productos</h1>
    <a href="<?=BASE_URL?>producto/crear">Crear Producto</a>
    <table>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Descripción</th>
            <th>Precio</th>
            <th>Categoría</th>
            <th>Stock</th>
            <th>Oferta%</th>
            <th>Imagen</th>
            <th>Eliminar y Editar</th>
            
        </tr>
        <?php foreach ($productos as $producto): ?>
        <tr>
            <td><?= $producto['id'] ?></td>
            <td><?= $producto['nombre'] ?></td>
            <td><?= $producto['descripcion'] ?></td>
            <td><?= $producto['precio'] ?></td>
            <td><?= $producto['categoria_id'] ?></td>
            <td><?= $producto['stock'] ?></td>
            <td><?= $producto['oferta'] ?></td>
            <td><img src="<?= BASE_URL ?>assets/img/<?= $producto['imagen'] ?>" alt="<?= $producto['nombre'] ?>" width="50"></td>
            <td>
                <a href="<?=BASE_URL?>producto/eliminar&id=<?= $producto['id'] ?>">Eliminar</a>
                <a href="<?=BASE_URL?>producto/editar&id=<?= $producto['id'] ?>">Editar</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>