<?php

//creamos todos los arrays
$usuarios=[
    "78277929M"=>["contraseña"=>"1234","nombre"=>"Alex","edad"=>20,"targeta"=>["numero"=>"Tar001","CVV"=>"783"]],
    "23895339A"=>["contraseña"=>"1234","nombre"=>"Juan","edad"=>19,"targeta"=>["numero"=>"Tar002","CVV"=>"602"]],
    "59234529B"=>["contraseña"=>"1234","nombre"=>"Alonso","edad"=>20,"targeta"=>["numero"=>"Tar003","CVV"=>"430"]],
];
$productos=[];
$pedidos=[];

//metodos
//funcion para el inicio de sesion
function login($usu,$pw){
    global $usuarios;
    if (!empty($pw)) {
        return isset($usuarios[$usu]) && $usuarios[$usu]["contraseña"] === $pw; //si exixte juanpedro y su contraseña es correcta -> true
    }else {
        throw new Exception("no puedes dejar campos vacios");
    }
}

//rellena usuarios

function rellenaUsuarios($usuario,$contraseña,$nombre,$edad,$numTar,$CVV){
    global $usuario;
//Comprovamos que el usuario no exita
    if (isset($usuarios[$usuario])) {
        throw new Exception("ERROR DEL SISTEMA: El usuario ya existe.");
    }
//Comprovamos que el DNI sea correcto
    if (!preg_match("/[0-9]{8}[A-Z]/", $usuario)) {
        throw new Exception("ERROR: El nombre de usuario contiene caracteres no permitidos.");
    }

//Agregar usuario

    $usuarios[$usuario]=[
        "contraseña" => $contraseña,
            "nombre" => $nombre,
               "edad"=> $edad,
             "numTaR"=> $numTar,
                "CVV"=> $CVV
    ];

    echo "usuarios: " . $usuario ."añadido correctamente";  
}

//rellena Productos
function rellenaProductos($producto){
    global $productos;
    $numproductos = rand(10,20);
    $precio = rand(1,50);
    $prod= "Produto";
    $contador = 0;
    $nombreProducto = $prod.str_pad($contador,3,'0',STR_PAD_LEFT);
    
    //comprobamos que no exixta el producro
    if (isset($productos[$producto])) {
        throw new Exception("ERROR DEL SISTEMA: El producto ya existe.");
    }
    //agregamos el producto
    $productos[$producto]=[
        "Unidades" => $numproductos,
        "nombre" => $nombreProducto,
        "precio" => $precio,
    ];
    echo "productos: " . $producto ."añadido correctamente";
}
//rellenar pedidos
function rellenaPedidos($pedido){
    global $pedidos, $usuarios, $productos;

    if (isset($pedidos[$pedido])) {
        throw new Exception("ERROR DEL SISTEMA: El pedido ya existe.");
    }

//agregamos el pedido
    $pedidos[$pedido]=[
        "DNI"=> $usuarios,
        "idProducto"=>$productos[$nombreProducto],
        "cantidad"=> $productos[$cantidad],
        "precioLinea"=>$productos[$cantidad]*$productos[$precio],
    ];
}  echo "pedido: " . $pedido ."añadido correctamente";


function MostarPedidos() {
    global $pedidos,$productos,$usuarios;
    
    if (empty($usuarios)) {
        throw new Exception("ERROR DEL SISTEMA: No hay usuarios registrados.");
    } if (empty($productos)) {
        throw new Exception("ERROR DEL SISTEMA: No hay productos registrados.");
    } if (empty($pedidos)) {
        throw new Exception("ERROR DEL SISTEMA: No hay pedidos registrados.");
    }
    //lo mostarmos en una tabla
    
    echo "Lista de pedidos para el DNI: $ :<br>";
    echo "<table border='1'>
            <tr>
                <th>ID Producto</th>
                <th>Cantidad</th>
                <th>Precio Linea(€)</th>
                
            </tr>";

    foreach ($pedidos as $pedido => $datos) {
        
        echo "<tr>
                <td>{$pedidos['nombreProducto']}</td>
                <td>{$pedidos['cantidad']}</td>
                <td>{$pedidos['precioLinea']}</td>
                <td>{'Precio total '['']}</td>
              </tr>";
    }
    echo "</table>";
}
?> 

