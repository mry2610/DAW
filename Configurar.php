<!DOCTYPE html>
<?php

include "conexBase.php";
session_start();
include "Header.php";
$result = mysqli_query($id, "SELECT * FROM estilos");
    if(mysqli_connect_errno() != 0){
        echo mysqli_connect_error();
        exit;
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST["res"])) {
            // Obtener el estilo seleccionado
            $idEstiloSeleccionado = $_POST["res"];
    
            // Obtener el identificador del usuario
            $idUsuario = $_SESSION["idUser"];
    
            // Actualizar el estilo en la base de datos
            $updateQuery = "UPDATE usuarios SET Estilo = $idEstiloSeleccionado WHERE IdUsuario = $idUsuario";
            
            if (mysqli_query($id, $updateQuery)) {
                $queryEstilo = "SELECT Fichero FROM estilos WHERE IdEstilo = $idEstiloSeleccionado";
                $resultEstilo = mysqli_query($id, $queryEstilo);
                $rowEstilo = mysqli_fetch_assoc($resultEstilo);
                echo "Estilo actualizado con éxito.";
                $_SESSION["estilos"] = $rowEstilo["Fichero"];
                
            } else {
                echo "Error al actualizar el estilo: " . mysqli_error($id);
            }
            header("Location: Mi_perfil.php");
            exit();
        }
        
    }




?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Configuración</title>
</head>
<body>
    <div class="solicitudAlb">
        <div class="contentForm">
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" id="solForm" class="solicitudForm" method="post">
                <div>
                    <p><label>Elige el estilo de la pagina:</label>
                        <select name="res" id="res" class="estiloform">
                            <?php
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo "<option value='" . $row['IdEstilo'] . "'>" . $row['Nombre'] . "</option>";
                                }
                            ?>
                        </select>
                    </p>
                </div>

                <p><input type="submit" id="botonBuscar" value="Seleccionar"></p>
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