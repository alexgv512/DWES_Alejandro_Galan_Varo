<?php
//1 creamos la conexion a la bd para realixzar las consultas
$username = "root";
$password = "";
$dsn= "mysql:host=localhost;dbname=mistiendas;charset=utf8mb4";
try {
   $pdo = new PDO($dsn, $username, $password);
   $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   echo "conexion exitosa";
} catch (PDOException $e) {
    die("Error en la conexion: " . $e->getMessage());
}
//5
$stock=[];
if (isset($_POST['producto'])){
    $producto = $_POST['producto'];
    $sql ="SELECT tiendas.nombre AS tienda, stock.unidades AS Unidades FROM tiendas INNER JOIN stock ON tiendas.cod = stock.tienda WHERE stock.producto = :producto";

    $stmt = $pdo->prepare($sql);
    //$stmt->execute([':producto' => $producto]);
    $stmt->bindParam(':producto', $producto);
    $stock = $stmt->fetchAll(PDO::FETCH_ASSOC);
}

//3 rellenamos el formulario con los productos de mi base de datos
$sql = "SELECT cod, nombre_corto FROM productos";
$stmt = $pdo->query($sql);
$productos = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>
<!--2 creamos el formulario -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta de productos</title>
</head>
<body>
    <h1>Ejercicio Conjunto resultados en PDO</h1>
    <form method="POST">
        <label for="producto">Productos</label>

        <select name="producto" id="producto" required>
            <?php foreach($productos as $producto){ ?>
                <option value="<?php echo $producto['cod'] ?>"><?php echo $producto['nombre_corto'] ?></option>
            <?php } ?>
        </select>
        <button type="submit">Mostrar Stock</button>
    </form>
    <!--4. imprimimos el stock por tienda -->
    <h1>Stock de producto por tienda</h1>
    <?php if (!empty($stock)): ?>
        <table border="1">
            <tr>
                <th>Tienda</th>
                <th>Stock</th>
            </tr>
            <?php foreach($stock as $fila): ?>
                <tr>
                    <td><?php echo htmlspecialchars($fila['tienda'])?></td>
                    <td><?php echo htmlspecialchars($fila['Unidades'])?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
</body>
</html>