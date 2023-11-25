<!--mostrar toda la información ordenada-->
<!-- Registro de usuario-->

<!--truquele to wapo: poner ! y enter/tabulador-->

<!--no usar align, eso se usa en CSS-->
<!--no usar br-->
<!--html validator de w3c-->
<!--Web developer extensión-->
<?php

echo "<p>". $_SERVER["REQUEST_METHOD"] . "</p>";
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

echo "<p>". $_SERVER["REQUEST_METHOD"] . "</p>";

// Procesamiento del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nomUsuario = $_POST["nomUsuario"];
    
    $clave = $_POST["clave"];
    $email = $_POST["email"];
    $sexo = $_POST["sexo"];
    $fNacimiento = $_POST["fNacimiento"];
    $ciudad = $_POST["ciudad"];
    $pais = $_POST["pais"];
    $foto = $_POST["foto"];
    $fRegistro = $_POST["fRegistro"];
    $estilo = $_POST["estilo"];

    // Insertar el nuevo usuario en la tabla Usuarios
    $insert_query = "INSERT INTO Usuarios (NomUsuario, Clave, Email, Sexo, FNacimiento, Ciudad, Pais, Foto, FRegistro, Estilo)
                     VALUES ('$nomUsuario', '$clave', '$email', '$sexo', '$fNacimiento', '$ciudad', '$pais', '$foto', '$fRegistro', '$estilo')";

    if ($conn->query($insert_query) == TRUE) {
        
       
        header("Location: respuesta_Registro_Usuario.php");
        exit();
    } else {
        echo "Error al registrar el usuario: " . $conn->error;
    }
}
?>
<!DOCTYPE html>
<?php



include "Header.php";

?>
<body>
<?php
echo "<p>". $_SERVER["REQUEST_METHOD"] . "</p>";
?>
    <main>
        <?php
            echo "Nombre: " . $nomUsuario . "<br>";
            echo "Contraseña: " . $clave . "<br>";
            echo "Email: " . $email . "<br>";
            echo "Sexo: " . $sexo . "<br>";
            echo "Fecha de Nacimiento: " . $fNacimiento . "<br>";
            echo "Ciudad: " . $ciudad . "<br>";
            echo "País: " . $pais . "<br>";
            echo "Fecha de Registro:" . $fRegistro ."<br>"
        ?>
    </main>
    <?php

include "footer.php";

?>

                        
</body>
</html>


