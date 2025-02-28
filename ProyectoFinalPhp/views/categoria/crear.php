<h1>Crear Categoría</h1>
<form action= "<?=BASE_URL?>categoria/guardar" method="POST">
    <label for="nombre">Nombre de la categoría:</label>
    <input type="text" name="nombre" required>
    <input type="submit" value="Guardar">
</form>