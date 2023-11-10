<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acceso al usuario</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link rel="stylesheet" href="PI.css?2.0">
    <link rel="alternate stylesheet" href="PI(ModoOscuro).css" title="modo oscuro">
    <link rel="alternate stylesheet" href="PI(AltoContraste).css" title="modo alto contraste">
    <link rel="alternate stylesheet" href="PI(LetraGrande).css" title="modo de letra grande">
    <link rel="alternate stylesheet" href="PI(LetraYContraste).css" title="modo de letra grande y alto contraste">
    <link rel="stylesheet" href="PI(impresión).css" media="print" >
</head>
<body>
<header> <!--Boton que te lleve al Formulario de acceso-->
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
        
    </header>
</body>