
    <h1>FORMULARIO DE INICIO DE SESIÓN</h1>

    <?php if (isset($_SESSION['error'])): ?>
        <div style="color: red;">
            <?php
            echo $_SESSION['error'];
            unset($_SESSION['error']);
            ?>
        </div>
    <?php endif; ?>

    <form action="<?= BASE_URL ?>usuario/entrar" method="POST">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br>

        <label for="password">Contraseña:</label>
        <input type="password" id="password" name="password" required><br>

        <input type="submit" value="INICIAR SESIÓN">
    </form>
    

