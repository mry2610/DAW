<!DOCTYPE html>
<?php
$tituloPagina= "Respuesta datos";

include "Header.php";
 ?>
  
<?php
$idUser=$_SESSION["idUser"];
$clave=$_POST["clave"];
if($clave!=""){
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nomUsuario = $_POST["nomUsuario"];
        $email = $_POST["email"];
        $fNacimiento = $_POST["fNacimiento"];
        $foto = $_POST["foto"];
        $ciudad= $_POST["ciudad"];
        $pais = $_POST["pais"];
        $sex= $_POST["sexo"];
        $estilo=$_POST["estilo"];
        // Validar nombre de usuario
        if (!preg_match("/^[a-zA-Z][a-zA-Z0-9]{2,14}$/", $nomUsuario)) {
            echo "<p>Nombre de usuario no válido. Debe comenzar con una letra, contener solo letras y números, y tener longitud entre 3 y 15 caracteres.</p>";
        } else if (!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d_-]{6,15}$/", $clave)) {
            echo "<p>Contraseña no válida. Debe contener al menos una letra mayúscula, una letra minúscula y un número, y tener longitud entre 6 y 15 caracteres.</p>";
        } else if (!filter_var($email, FILTER_VALIDATE_EMAIL) || strlen($email) > 254) {
            echo "<p>Email no válido.</p>";
        } else {
            $fechaActual = new DateTime();
            $fechaNacimiento = DateTime::createFromFormat('Y-m-d', $fNacimiento);
           
    
            if ($fechaNacimiento !== false ) {
                $edad = $fechaNacimiento->diff($fechaActual)->y;
    
                if ($edad < 18) {
                    echo "<p>La fecha de nacimiento no es válida o el usuario debe tener al menos 18 años.</p>";
                } else {
    
                // Preparar la consulta SQL
                $sql = "UPDATE usuarios SET NomUsuario= '$nomUsuario', Email='$email', sexo='$sex', FNacimiento='$fNacimiento',
                Ciudad='$ciudad', Pais='$pais', Foto='$foto', Estilo='$estilo' where IdUsuario=$idUser";
    
                // Ejecutar la consulta
                if ($id->query($sql) === TRUE) {
                    echo "<p>Cambios guardados con exito. La información ha sido actualizada en la base de datos.</p>";
                    $_SESSION["Foto"] = $foto;
                    
                } 
                    // Todas las comprobaciones han pasado, mostrar la información
                    echo "<main>";
                    echo "<p>Nombre: " . $nomUsuario . " </p>";
    
    
                    echo "<p>Email: " .  $email . "</p>";
    
                    echo "<p>Sexo: " .  $_POST["sexo"] . "</p>";
    
                    echo "<p>Fecha de Nacimiento: " . $fNacimiento . "</p>";
    
                    echo "<p>Ciudad: " . $_POST["ciudad"] . "</p>";
    
                    $query = "SELECT * FROM Paises where Idpais='$pais'";
                    $result = mysqli_query($id,$query);
                    $row = $result->fetch_assoc();
                    echo "<p>País: " . $row['NomPais'] . "</p>";
                    echo "<p>Foto de perfil: <img src=$foto alt='foto de perfil'></p>";
                    $query = "SELECT * FROM Estilos where IdEstilo='$estilo'";
                    $result = mysqli_query($id,$query);
                    $row = $result->fetch_assoc();
                    echo "<p>Estilo:" .$row["Nombre"] . "</p>";
                    echo "</main>";
                }
            } else {
                echo "<p>Debe introducir una fecha de nacimiento.</p>";
            }
        }
    }
}else {
    echo "<p>Contraseña incorrecta.</p>";
}

?>
  <?php

 include "footer.php";
    // Cerrar la conexión
    $id->close();
 ?>                       
</body>
</html>
