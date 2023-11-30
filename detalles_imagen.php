<!DOCTYPE html>

<?php
session_start();

include "Header.php";
if(!isset($_COOKIE["usuario"]) && !isset($_SESSION["nombre"])){//si no esta registrado
    header('Location: error_de_login.html');
}
?>
<?php
// Configuración de la conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pibd";

// Crear la conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
$id_foto = isset($_GET["id"]) ? $_GET["id"] : null;
if ($id_foto) {
    // Realizar la consulta para obtener la información de la foto
    $consulta = "SELECT f.Titulo, f.Descripcion, f.Fecha,p.NomPais, p.IdPais,f.Pais, f.Fichero,f.Album, f.Alternativo, a.IdAlbum,a.Usuario, a.Titulo as titulo, u.IdUsuario, u.NomUsuario 
                 FROM fotos f
                 JOIN albumes a ON f.Album = a.IdAlbum
                 JOIN usuarios u ON a.Usuario = u.IdUsuario
                 JOIN paises p ON  f.Pais= p.Idpais
                 WHERE f.IdFoto = $id_foto";

    $result = $conn->query($consulta);
    
} else {
    echo "ID de foto no proporcionado.";
}

 
?>
<body>
    
    <main>
        <h1>Detalles de imágenes</h1>

        <div class="inicio">
        <?php
             if ($result) {
                // Mostrar la información de la foto
                $foto = mysqli_fetch_assoc($result);
                $fechaOriginal = $foto['Fecha'];
                $dateTime = new DateTime($fechaOriginal);
                $fechaFormateada = $dateTime->format('d/m/Y');
                if ($foto) {
                    echo '<article class="detallesImagen">';
                    echo "<img src={$foto["Fichero"]} alt={$foto["Alternativo"]} >";
                    echo "<p>Titulo: {$foto['Titulo']}</p>";
                    echo "<p>Fecha: {$fechaFormateada}</p>";
                    echo "<p>País: {$foto['NomPais']}</p>";
                    echo "<p>Álbum: {$foto['titulo']}</p>";
                    echo "<p>Usuario: {$foto['NomUsuario']}</p>";
                    echo '</article>';
                } else {
                    echo "No se encontró la foto.";
                }
             }
            ?>
        </div>
    </main>

    <?php

    include "footer.php";

    ?>
</body>
</html>