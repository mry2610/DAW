<!DOCTYPE html>
<?php
$tituloPagina= "Respuesta registro";

include "Header.php";
 ?>

        

    
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nomUsuario = $_POST["nomUsuario"];
    $clave = $_POST["clave"];
    $rclave = $_POST["rclave"];
    $email = $_POST["email"];
    $fNacimiento = $_POST["fNacimiento"];
    $foto = $_POST["foto"];
    $ciudad= $_POST["ciudad"];
    $pais = $_POST["pais"];
    $sex= $_POST["sexo"];
    $estilo=$_POST["estilo"];
    $fregistro= $_POST["fRegistro"];
    // Validar nombre de usuario
    if (!preg_match("/^[a-zA-Z][a-zA-Z0-9]{2,14}$/", $nomUsuario)) {
        echo "<p>Nombre de usuario no válido. Debe comenzar con una letra, contener solo letras y números, y tener longitud entre 3 y 15 caracteres.</p>";
    } else if (!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d_-]{6,15}$/", $clave)) {
        echo "<p>Contraseña no válida. Debe contener al menos una letra mayúscula, una letra minúscula y un número, y tener longitud entre 6 y 15 caracteres.</p>";
    } else if ($rclave !== $clave) {
        echo "<p>Las contraseñas no coinciden.</p>";
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
            $sql = "INSERT INTO usuarios (NomUsuario, Clave, Email, sexo, fNacimiento, Ciudad, Pais, Foto, Fregistro, Estilo) 
            VALUES('$nomUsuario', '$clave', '$email','$sex', '$fNacimiento','$ciudad','$pais', '$foto','$fregistro', '$estilo')";

            // Ejecutar la consulta
            if ($id->query($sql) === TRUE) {
                echo "<p>Registro exitoso. La información ha sido almacenada en la base de datos.</p>";

                
            } else {
                echo "<p>Error al ejecutar la consulta: " . $conn->error . "</p>";
            }
                // Todas las comprobaciones han pasado, mostrar la información
                echo "<main>";
                echo "<p>Nombre: " . $nomUsuario . " </p>";

                echo "<p>Contraseña: " . $clave . "</p>";

                echo "<p>Email: " .  $email . "</p>";

                echo "<p>Sexo: " .  $_POST["sexo"] . "</p>";

                echo "<p>Fecha de Nacimiento: " . $fNacimiento . "</p>";

                echo "<p>Ciudad: " . $_POST["ciudad"] . "</p>";

                $query = "SELECT * FROM Paises where Idpais='$pais'";
                $result = mysqli_query($id,$query);
                $row = $result->fetch_assoc();
                echo "<p>País: " . $row['NomPais'] . "</p>";
                echo "<p>Foto de perfil: <img src=$foto alt='foto de perfil'></p>";
                echo "<p>Fecha de Registro:" . $_POST["fRegistro"] . "</p>";
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
?>
  <?php

 include "footer.php";
    // Cerrar la conexión
    $id->close();
 ?>                       
</body>
</html>


