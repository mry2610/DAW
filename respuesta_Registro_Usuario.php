<!DOCTYPE html>
<?php

if(!isset($_COOKIE["usuario"]) && !isset($_SESSION["nombre"])){
    header('Location: index.php');
}

include "Header.php";

?>
<body>

    <main>
        <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $nombre = $_POST["nombre"];
                $contrasena = $_POST["pass"];
                $Rcontrasena = $_POST["Rpass"];
                $email = $_POST["email"];
                $sexo = $_POST["sexo"];
                $fecha_nacimiento = $_POST["fecha"];
                $ciudad = $_POST["ciudad"];
                $pais = $_POST["pais"];

                if (trim($nombre)=="" || trim($contrasena)=="" || trim($Rcontrasena)=="") {
                    echo "Por favor, complete todos los campos del formulario.";
                } else {
                    if($contrasena===$Rcontrasena){
                        echo "Nombre: " . $nombre . "<br>";
                        echo "Contraseña: " . $contrasena . "<br>";
                        echo "Repetir Contraseña: " . $Rcontrasena . "<br>";
                        echo "Email: " . $email . "<br>";
                        echo "Sexo: " . $sexo . "<br>";
                        echo "Fecha de Nacimiento: " . $fecha_nacimiento . "<br>";
                        echo "Ciudad: " . $ciudad . "<br>";
                        echo "País: " . $pais . "<br>";
                    }
                    else {
                        echo "Por favor, compruebe que las contraseñas sean iguales";
                    }
                    
                }
            } else {
                header("Registro_Usuario.php");
            }
        ?>
    </main>
    <?php

include "footer.php";

?>

    
</body>
</html>


