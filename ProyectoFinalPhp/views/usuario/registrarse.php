<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Registrarse</h1>

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
        <input type="submit" value="Registrarse">
    </form>

</body>
</html>