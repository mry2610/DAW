<!DOCTYPE html>
<?php

include "Header.php";

?>



<body>
    <main>

    <?php
        if (isset($_GET["error"])) {
            echo '<p><b>Error al iniciar sesion</b></p>';
        }
    ?>
        <h1>Acceso de usuario</h1>
        <div class="formRegistro">
            <h3>Introduzca los datos</h3>
            <div class="contentFormRegistro">
                <form action="control_acceso.php" method="post" id="LoginForm">
                    <div>
                        <!-- div es un contenedor que sirve para poner de manera más ordenada el formulario que queremos crear-->
                        <p><label>Nombre de usuario:</label>
                        <input type="text" name="nombre" id="nombre" class="estiloform"></p>
                    </div>
        
                    <div>
                        <p><label>Contraseña:</label>
                        <input type="text" name="pass" id="pass" class="estiloform"></p>
                    </div>
        
                    <p><input type="submit" id="logear" value="Iniciar sesion"></input></p>
                </form>
            </div>
        </div>
    </main>
</body>
</html>