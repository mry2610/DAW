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
    setcookie("pass", $_SESSION["pass"], time() -3600);
    setcookie("estilo", $_SESSION["estilos"], time() -3600);
    setcookie("hora_cierre", $_SESSION["ultima_Conexion"], time() -3600);
    
    session_destroy();
    header('Location: index.php');
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