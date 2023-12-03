<!DOCTYPE html>
<?php
$tituloPagina= "Respuesta registro";
include "Header.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validar nombre de usuario
    $nomUsuario = $_POST["nomUsuario"];
    
    if (!preg_match("/^[a-zA-Z][a-zA-Z0-9]{2,14}$/", $nomUsuario)) {
        echo "<p>Nombre de usuario no válido. Debe comenzar con una letra, contener solo letras y números, y tener longitud entre 3 y 15 caracteres.</p>";
        exit;
    }

    // Validar contraseña
    $clave = $_POST["clave"];
    /*(?=.*[a-zA-Z]): Asegura que al menos haya una letra (mayúscula o minúscula).
    (?=.*\d): Asegura que al menos haya un dígito.
    [a-zA-Z\d_-]{6,15}: Permite letras (mayúsculas y minúsculas), 
    dígitos, guion y guion bajo, con una longitud entre 6 y 15 caracteres. */
    if (!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d_-]{6,15}$/", $clave)) {
        echo "<p>Contraseña no válida. Debe contener al menos una letra mayúscula, una letra minúscula y un número, y tener longitud entre 6 y 15 caracteres.</p>";
        exit;
    }

    $email = $_POST["email"];
    if (!filter_var($email, FILTER_VALIDATE_EMAIL) || strlen($email) > 254) {
        echo "<p>Email no válido.</p>";
        exit;
    }

    $fNacimiento = $_POST["fNacimiento"];
    $fechaActual = new DateTime();
    $fechaNacimiento = DateTime::createFromFormat('Y-m-d', $fNacimiento);
    $edad = $fechaNacimiento->diff($fechaActual)->y;

    if ($fechaNacimiento === false || $edad < 18) {
        echo "<p>La fecha de nacimiento no es válida o el usuario debe tener al menos 18 años.</p>";
        exit;
    }
}
$foto= $_POST["foto"];




 
 
 

?>
    <main>
        <?php
            echo "<p>Nombre: " . $_POST["nomUsuario"] . " </p>";
            echo "<p>Contraseña: " . $_POST["clave"] . "</p>";
            echo "<p>Email: " .  $_POST["email"] . "</p>";
            echo "<p>Sexo: " .  $_POST["sexo"] . "</p>";
            echo "<p>Fecha de Nacimiento: " . $_POST["fNacimiento"]. "</p>";
            echo "<p>Ciudad: " . $_POST["ciudad"] . "</p>";
            echo "<p>País: " . $_POST["pais"] . "</p>";
            echo "<p>Foto de perfil: " ;
            echo "<img src=$foto alt='foto de perfil' > ";
            echo "<p>Fecha de Registro:" . $_POST["fRegistro"] ."</p>";
            echo "<p>Estilo:". $_POST["estilo"]. "</p>";

        ?>
    </main>
    <?php

include "footer.php";

?>

                        
</body>
</html>


