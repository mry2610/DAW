<!--mostrar toda la información ordenada-->
<!-- Registro de usuario-->

<!--truquele to wapo: poner ! y enter/tabulador-->

<!--no usar align, eso se usa en CSS-->
<!--no usar br-->
<!--html validator de w3c-->
<!--Web developer extensión-->

<!DOCTYPE html>
<?php



include "Header.php";

?>
<body>
<?php

$foto= $_GET["foto"];




 
 
 

?>
    <main>
        <?php
            echo "<p>Nombre: " . $_GET["nomUsuario"] . " </p>";
            echo "<p>Contraseña: " . $_GET["clave"] . "</p>";
            echo "<p>Email: " .  $_GET["email"] . "</p>";
            echo "<p>Sexo: " .  $_GET["sexo"] . "</p>";
            echo "<p>Fecha de Nacimiento: " . $_GET["fNacimiento"]. "</p>";
            echo "<p>Ciudad: " . $_GET["ciudad"] . "</p>";
            echo "<p>País: " . $_GET["pais"] . "</p>";
            echo "<p>Foto de perfil: " ;
            echo "<img src=$foto alt='foto de perfil' > ";
            echo "<p>Fecha de Registro:" . $_GET["fRegistro"] ."</p>";
            echo "<p>Estilo:". $_GET["estilo"]. "</p>";

        ?>
    </main>
    <?php

include "footer.php";

?>

                        
</body>
</html>


