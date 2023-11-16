<!DOCTYPE html>

<?php
session_start();

if(!isset($_COOKIE["usuario"]) && !isset($_SESSION["nombre"])){
    header('Location: index.php');
}



include "Header_Log.php";

if (isset($_GET['eliminar_cookie'])) {
    // Si se recibe el parámetro 'eliminar_cookie' en la URL, entonces eliminamos la cookie.
    setcookie("usuario", $_SESSION["usuario"], time() -3600);
    session_destroy();
    header('Location: index.php');
}
if(!isset($_COOKIE["usuario"])){//si no tiene cookie de usuario, significa que no recuerda su registro,
    //por lo que solo se activará el if cuando entre despues de haber vuelto a iniciar sesion
    if(date("H:i:s") > '06:00:0' && date("H:i:s")<'11:59:59') {
        echo "<p> Buenos días {$_SESSION["nombre"]} </p>";
    }
    else if(date("H:i:s") > '12:00:0' && date("H:i:s")<'15:59:59'){
        echo "<p> Hola {$_SESSION["nombre"]} </p>";
    }
    else if(date("H:i:s") > '16:00:0' && date("H:i:s")<'19:59:59'){
        echo "<p> Buenas tardes {$_SESSION["nombre"]} </p>";
    }
    else{
        echo "<p> Buenas noches {$_SESSION["nombre"]} </p>";
    }
}
else{//si ha decidido recordar su sesión
    if(date("H:i:s") > '06:00:0' && date("H:i:s")<'11:59:59') {
        echo "<p> Buenos días {$_COOKIE["usuario"]} </p>";
    }
    else if(date("H:i:s") > '12:00:0' && date("H:i:s")<'15:59:59'){
        echo "<p> Hola {$_COOKIE["usuario"]} </p>";
    }
    else if(date("H:i:s") > '16:00:0' && date("H:i:s")<'19:59:59'){
        echo "<p> Buenas tardes {$_COOKIE["usuario"]} </p>";
    }
    else{
        echo "<p> Buenas noches {$_COOKIE["usuario"]} </p>";
    }

}




?>

<body>
    <main>
        <h1>Mi perfil</h1>
        
        <h3>Mis albumes:</h3>
        <div class="seccion">
            <article><img src="album_1.jpg" alt="logotipo" class="perfil_album" ></article>
            <article> <img src="album_2.jpg" alt="logotipo"  class="perfil_album" ></article>
        
        
            <article> <img src="album_3.jpg" alt="logotipo"  class="perfil_album" ></article>
            <article><img src="album_4.jpg" alt="logotipo"  class="perfil_album" ></article>
        </div>
        <div class="seccion">
            <div class="botonesperfil"> 
                <a href='crearAlbum.php' class="navegadores">crear Album</a>
                <a href='Solicitar_album.php' class="navegadores">Solicitar album</a>
                <a href="DadoBaja.html" class="navegadores">Darme de baja</a>
                <a href='Mi_perfil.php?eliminar_cookie=true' class="navegadores">Cerrar sesión</a>
            </div>
        </div>
       
    </main>
    <?php

include "footer.php";

?>
</body>
</html>