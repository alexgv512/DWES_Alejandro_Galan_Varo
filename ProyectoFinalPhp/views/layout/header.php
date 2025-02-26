<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?=BASE_URL?>assets/css/styles.css">
    <title>Document</title>
</head>
<body>
    <header id = "header">
        <div id="logo">
            <a href="<?=BASE_URL?>"><img src="<?=BASE_URL?>assets/img/mountune_yel_digi_logo_web_200x.avif" alt="Logo Mountune"></a>
            
        </div>
        <div>
            //si la sesion no esta iniciada mostramos los enlaces de registrarse y login
            <li><a href="<?=BASE_URL?>usuario/registrarse">Registrarse</a></li>
            <li><a href="<?=BASE_URL?>usuario/login">Login</a></li>
           //si la sesion esta iniciada mostramos el enlace de cerrar sesion
            <li><a href="<?=BASE_URL?>usuario/cerrarsesion">logout</a></li>
        </div>
       
    </header>
        <nav id="menu">
            <ul>
                <li><a href="#">Intecooler, admisión y turbo</a></li>
                <li><a href="#">Alerones, paragolpes y capos</a></li>
                <li><a href="#">Llantas, frenos y suspensión</a></li>
                <li><a href="#">Escape, coletores y catalizadores</a></li>
                <li><a href="#">Electronica y reprogramación</a></li>
                
            </ul>
        </nav>
        
    <main>
            

