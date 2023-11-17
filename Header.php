<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acceso al usuario</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <?php

    if(isset($_SESSION["estilos"])){
        echo'<link rel="stylesheet" href="' . $_SESSION["estilos"] . '">';
    }
    else if(isset($_COOKIE["estilo"])){
        echo'<link rel="stylesheet" href="' . $_COOKIE["estilo"] . '">';
    }
    else{
        echo'<link rel="stylesheet" href="PI.css">';
    }
    ?>

    <link rel="alternate stylesheet" href="PI(ModoOscuro).css" title="modo oscuro">
    <link rel="alternate stylesheet" href="PI(AltoContraste).css" title="modo alto contraste">
    <link rel="alternate stylesheet" href="PI(LetraGrande).css" title="modo de letra grande">
    <link rel="alternate stylesheet" href="PI(LetraYContraste).css" title="modo de letra grande y alto contraste">
    <link rel="stylesheet" href="PI(impresión).css" media="print" >
  
</head>
<body>
<header> 
    <?php
    if(isset($_COOKIE["usuario"]) || isset($_SESSION["estilos"])){//si tienes usuario registrado te sale el header del Usuario
        echo<<<hereDoc
        <div class="cabezeraizq">
            <img src="Diseño_sin_título-removebg-preview.png" alt="logotipo" class="img">
            <p class="site-title">PI</p>
        </div>
        <div class="cabezerader">
            <!--Boton para el formulario de busqueda-->
            <nav id="menu-ppal">
                <ul>
                <!--Boton para el formulario de busqueda-->
                <li><a href="Formulario_de_imagen_logueado.php"> Busqueda detallada</a></li>
                </ul>
            </nav>
           
            
            <form action="resultado_de_busqueda_logueado.php"  class="buscador-form">
                <p><input type="text" name="buscador" id="buscador">
            </form>
            <a href="resultado_de_busqueda_logueado.php"> <span class="material-symbols-outlined">search </span></a>
            <a href="Mi_perfil.php"><p><img src="perfil-mujer-vivo.png" alt="logotipo" class="foto_perfil"></p></a>
        </div>  
        hereDoc;

    }
    else{
        echo<<<hereDoc
        <div class="cabezeraizq">
            <img src="Diseño_sin_título-removebg-preview.png" alt="logotipo" class="img">
            <p class="site-title">PI</p>
        </div>
        <!--Boton que te lleve al inicio de usuario-->
        <div class="cabezerader">
            
            <nav id="menu-ppal">
                <ul>
                <li><a href="Login.php"> Acceso a usuario </a></li>
                <!--Boton que te lleve al registro de usuario-->
                <li><a href="Registro_Usuario.php"> Registro de usuario </a></li>
                <!--Boton para el formulario de busqueda-->
                <li><a href="Formulario_de_imagen.php"> Busqueda detallada</a></li>
                </ul>
                
            </nav>
           
                <form action="resultado_de_busqueda.php"  class="buscador-form">
                    <p><input type="text" name="buscador" id="buscador">
                </form>
                <a href="resultado_de_busqueda.php"> <span class="material-symbols-outlined">search </span></a>
        </div>
        hereDoc;
    }
    
    ?>
<!--Boton que te lleve al Formulario de acceso-->
        
        
    </header>
</body>