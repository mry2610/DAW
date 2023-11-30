<!DOCTYPE html>

<?php
session_start();
include "Header.php";
if(!isset($_COOKIE["usuario"]) && !isset($_SESSION["nombre"])){//si no esta registrado
    header('Location: error_de_login.html');
}



$id_Album = isset($_GET["id"]) ? $_GET["id"] : null;
$df = isset($_GET["df"]) ? $_GET["df"] : null;

if($df==1){
echo"hola loco";

}
$result = mysqli_query($id, "SELECT * FROM fotos f
JOIN albumes a ON f.Album = a.IdAlbum
JOIN usuarios u ON a.Usuario = u.IdUsuario
JOIN paises p ON  f.Pais= p.Idpais WHERE a.IdAlbum=$id_Album");
    
    $cantidadRegistros = mysqli_num_rows($result);


?>
<body>
    <main>
    <h2>Datos del album</h2>
    <div class="solicitudAlb">
        <div class="contentForm">
            <?php
                $row = mysqli_fetch_array($result);
                echo"<p>Este album contiene {$cantidadRegistros} imagenes.</p>";
                echo"<p>Descripcion: {$row['Descripcion']} </p>";
            ?>
        </div>
    </div>

    <div class="inicio">
    <?php
        echo<<<hereDoc
                <h2>Imagenes del album</h2>

                <article class="index">
                    <img src={$row['Fichero']} alt={$row['Alternativo']} class='roma'>
                    <p>País: {$row['NomPais']}</p>
                </article>
        hereDoc;
        while($row = mysqli_fetch_array($result)){

            echo<<<hereDoc
                
                <article class="index">
                    <img src={$row['Fichero']} alt={$row['Alternativo']} class='roma'>
                    <p>País: {$row['NomPais']}</p>
                </article>

            hereDoc;

        }
    ?>
    </div>
    
    

    </main>
    
</body>
</html>