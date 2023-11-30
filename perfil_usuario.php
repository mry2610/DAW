<!DOCTYPE html>

<?php
session_start();
if(!isset($_COOKIE["usuario"]) && !isset($_SESSION["nombre"])){
    header('Location: index.php');
}
include "Header.php";

if (isset($_GET['eliminar_cookie'])) {
    // Si se recibe el parámetro 'eliminar_cookie' en la URL, entonces eliminamos la cookie.
    setcookie("usuario", $_SESSION["usuario"], time() -3600);
    setcookie("pass", $_SESSION["pass"], time() -3600);
    setcookie("estilo", $_SESSION["estilos"], time() -3600);
    setcookie("hora_cierre", $_SESSION["ultima_Conexion"], time() -3600);
    
    session_destroy();
    header('Location: index.php');
}
$id_Usuario = isset($_GET["id"]) ? $_GET["id"] : null;
$df = isset($_GET["df"]) ? $_GET["df"] : null;

$identificador=$_SESSION["idUser"];
$result = mysqli_query($id, "SELECT * FROM albumes INNER JOIN usuarios ON albumes.Usuario = usuarios.IdUsuario WHERE Usuario = $id_Usuario");
if(mysqli_connect_errno() != 0){
    echo mysqli_connect_error();
    exit;
}

?>

<body>
    <main>
        <h1>Mi perfil</h1>

        <h2>Mis Datos</h2>
        <?php
            $row = mysqli_fetch_assoc($result);
            echo <<<hereDOC
                <article class="index">
                    <img src={$row["Foto"]}  class="roma">
                    <p>Nombre de usuario: {$row["NomUsuario"]}</p>
                    <p>Fecha de registro: {$row["FRegistro"]}</p>
                


                </article>
            hereDOC;

        ?>
        
        <h3 class="inicio">Mis albumes:</h3>
        <div class="seccion">
            <?php
            $result = mysqli_query($id, "SELECT * FROM albumes INNER JOIN usuarios ON albumes.Usuario = usuarios.IdUsuario WHERE Usuario = $id_Usuario");

                while($row = mysqli_fetch_assoc($result)){
                    echo<<<HereDoc
                    <a href="ver_album.php?id={$row["IdAlbum"]}" class='navegadores'>{$row["Titulo"]}</a>
                    HereDoc; 
                }


            ?>
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