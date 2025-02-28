
    <h1>fORMULARIO DE REGISTRO</h1>

    <?php if (isset($_SESSION['error'])): ?>
        <div style="color: red;">
            <?php
            echo $_SESSION['error'];
            unset($_SESSION['error']);
            ?>
        </div>
    <?php endif; ?>

    <?php if (isset($_SESSION['success'])): ?>
        <div style="color: green;">
            <?php
            echo $_SESSION['success'];
            unset($_SESSION['success']);
            ?>
        </div>
    <?php endif; ?>

    <form action="<?=BASE_URL?>usuario/registrarUsuario" method="POST">
        <label for="nombre">Nombre</label>
        <input type="text" name="nombre" required>
        <br>
        <label for="apellidos">Apellidos</label>
        <input type="text" name="apellidos" required>
        <br>
        <label for="email">Email</label>
        <input type="email" name="email" required>
        <br>
        <label for="password">Contraseña</label>
        <input type="password" name="password" required>
        <br>
        <input type="submit" value="RERGISTRARSE">
    </form>

