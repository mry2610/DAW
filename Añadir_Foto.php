<!DOCTYPE html>
<?php
$tituloPagina= "Añadir foto";
include "header.php"; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $titulo = $_POST['titulo'];
    $descripcion= $_POST['descripcion'];
    $alternativo = $_POST['alternativo'];
    $fecha = $_POST['fecha'];
    $pais = $_POST['pais'];
    $album = $_POST['album'];
    $fichero = $_POST['fichero'];
    $fregistro= $_POST['fRegistro'];

    // Inicializa la variable de control
    $insercion_exitosa = true;

    // Comprobar si el título está vacío
    if (empty($titulo)) {
        echo "El título de la foto no puede estar vacío.";
        $insercion_exitosa = false;
    }
    if( empty($fichero)){
        echo "El fichero de la foto no puede estar vacío.";
        $insercion_exitosa = false;
    }

    // Comprobar la longitud del texto alternativo
    if (strlen($alternativo) < 10) {
        echo "El texto alternativo debe tener al menos 10 caracteres.";
        $insercion_exitosa = false;
    }

    // Comprobar si el texto alternativo empieza con palabras redundantes
    $palabras_redundantes = array("foto", "imagen");
    foreach ($palabras_redundantes as $palabra) {
        if (stripos($alternativo, $palabra) === 0) {
            echo "El texto alternativo no puede empezar con '$palabra'.";
            $insercion_exitosa = false;
        }
    }

    // Si todas las comprobaciones son exitosas, realizar la inserción en la base de datos
    if ($insercion_exitosa) {
        $sql = "INSERT INTO fotos (Titulo, Descripcion,Fecha,Pais,Album,Fichero,Alternativo,FRegistro ) VALUES ('$titulo', '$descripcion', '$fecha', '$pais','$album','$fichero','$alternativo','$fregistro')";

        if ($id->query($sql) === TRUE) {
            header("Location: ver_album.php? id= $album");

            echo "La foto ha sido insertada correctamente en la base de datos.";
        }
    }
}
?>
    <h2>Agregar Foto</h2>


    <div class="solicitudAlb">
        <div class="contentForm">   
            <form  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" id="solForm" class="solicitudForm">
                <div>
                    <p><label for="titulo">Título:</label>
                    <input type="text" name="titulo" class="estiloform" >
                </div>
                <div>
                    <p><label for="descripcion">Descripción:</label>
                    <textarea name="descripcion" rows="4"  class="estiloform"></textarea></p>
                </div>
                <div>
                    <p><label for="fecha">Fecha:</label>
                    <input type="date" name="fecha" class="estiloform"></p>
                </div>
                <div>
                    <p><label for="pais">País:</label>
                    <select name="pais" class="estiloform">
                    <?php
                        // Obtener la lista de países desde la tabla Paises
                        $query = "SELECT * FROM Paises";
                        $result = mysqli_query($id,$query);

                        // Mostrar los países en la lista desplegable
                        while ($row = $result->fetch_assoc()) {
                            echo "<option value='" . $row['IdPais'] . "'>" . $row['NomPais'] . "</option>";
                        }
                    ?>
                    </select></p><br>
                </div>

                <div>
                    <p>
                        <label>Album:</label>
                        <select name="album" id="album" class="estiloform">
                            <?php
                            $idUsuario = isset($_GET["id"]) ? $_GET["id"] : null;
                            $idAlbum=isset($_GET["idAlbum"]) ? $_GET["idAlbum"] : null;
                            $albumNombre = isset($_GET["album"]) ? $_GET["album"] : null;
                            if($albumNombre && $idUsuario){
                                $result = mysqli_query($id, "SELECT * FROM albumes INNER JOIN usuarios ON albumes.Usuario = usuarios.IdUsuario WHERE albumes.Usuario = '$idUsuario' && albumes.Titulo ='$albumNombre'");
                                
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo "<option value='" . $row['IdAlbum'] . "'>" . $row['Titulo'] . "</option>";
                                }
                            }else if ($idUsuario){
                                echo"hola";
                                $result = mysqli_query($id, "SELECT * FROM albumes INNER JOIN usuarios ON albumes.Usuario = usuarios.IdUsuario WHERE albumes.Usuario = '$idUsuario'");
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo "<option value='" . $row['IdAlbum'] . "'>" . $row['Titulo'] . "</option>";
                                }

                            }else{
                                $result = mysqli_query($id, "SELECT * FROM albumes");
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo "<option value='" . $row['IdAlbum'] . "'>" . $row['Titulo'] . "</option>";
                                }
                            }
                            ?>
                        </select>
                    </p>
                    
                </div>
                <div>
                    <p><label for="fichero">Fichero:</label>
                    <input type="text" name="fichero" class="estiloform"></p>
                </div>
                <div>
                    <p><label for="alternativo">Texto Alternativo:</label>
                    <input type="text" name="alternativo" class="estiloform"></p>
                </div>
                <div>
                    <p><label for="fRegistro">Fecha de Registro:</label>
                    <input type="text" name="fRegistro" value="<?php echo date('Y-m-d H:i:s'); ?>" readonly class="estiloform"></p><br> 
                </div>
                <input type="submit" value="Agregar Foto">
            </form>
        </div>
    </div>

    <?php
        if(isset($_COOKIE["usuario"]) || isset($_SESSION["estilos"])){
        include "footer.php";
        }
    ?>
</body>
</html>
