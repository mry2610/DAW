
<!DOCTYPE html>
<?php
$tituloPagina= "Crear album";
include "header.php"; 
if(!isset($_COOKIE["usuario"]) && !isset($_SESSION["nombre"])){
    header('Location: index.php');
}
$tituloError = "";

// Verificar si el formulario se ha enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los valores del formulario
    $idusu=$_SESSION["idUser"];
    $titulo = $_POST["titulo"];
    $descripcion = $_POST["descripcion"];
    $usuario = $idusu;
    $albumId ="";

    // Validar el título
    if (empty($titulo)) {
        $tituloError = "El título es requerido";
    } else {
        $sql = "INSERT INTO albumes (titulo, descripcion, usuario) VALUES ('$titulo', '$descripcion', '$usuario')";

        if ($id->query($sql) === TRUE) {
            $albumId = $conn->insert_id;

            // Redirigir a la nueva página con el ID del álbum
            header("Location: Añadir_Foto.php? id= $usuario&album=$titulo");
        } else {
            echo "Error al insertar el álbum: " . $id->error;
        }
    }
}
?>


    <main>
        <h1>Crear nuevo album</h1>
        <div class="formRegistro">
            <h3>Rellene los datos</h3>
            <div class="contentFormRegistro">
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" id="LoginForm"  method="post">
                    <div>
                        <!-- div es un contenedor que sirve para poner de manera más ordenada el formulario que queremos crear-->
                        <p><label>Titulo del album:</label>
                        <input type="text" name="titulo" id="titulo" class="estiloform" value="<?php echo isset($_POST['titulo']) ? $_POST['titulo'] : ''; ?>"></p>
                        <span style="color: red;"><?php echo $tituloError; ?></span>
                    </div>
        
                    <div>
                        <p><label>Descripción:</label>
                        <input type="text" name="descripcion" id="descripcion" class="estiloform"></p>
                    </div>

                   
                
                </div>

                    <p><input type="submit" id="crear" value="Crear album"></input></p>
                </form>
            </div>
        </div>
    </main>

    <?php

    include "footer.php";

    ?>
    
</body>
</html>