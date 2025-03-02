<?php if (isset($_SESSION['usuario'])): ?>
    <h1>Mi perfil</h1>
    <form action="<?=BASE_URL?>usuario/actualizar" method="POST">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" value="<?= $_SESSION['usuario']['nombre'] ?>" required>

        <label for="apellidos">Apellidos:</label>
        <input type="text" name="apellidos" value="<?= $_SESSION['usuario']['apellidos'] ?>" required>
        
        <label for="email">Email:</label>
        <input type="email" name="email" value="<?= $_SESSION['usuario']['email'] ?>" required>
        
        <input type="submit" value="Actualizar">
    </form>
<?php else: ?>
    <h1>No has iniciado sesión</h1>
<?php endif; ?>