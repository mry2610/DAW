
<!DOCTYPE html>
<?php
$tituloPagina= "Crear album";
include "header.php"; 
if(!isset($_COOKIE["usuario"]) && !isset($_SESSION["nombre"])){
    header('Location: index.php');
}
?>


    <main>
        <h1>Crear nuevo album</h1>
        <div class="formRegistro">
            <h3>Rellene los datos</h3>
            <div class="contentFormRegistro">
                <form id="LoginForm">
                    <div>
                        <!-- div es un contenedor que sirve para poner de manera más ordenada el formulario que queremos crear-->
                        <p><label>Titulo del album:</label>
                        <input type="text" name="titulo" id="titulo" class="estiloform"></p>
                    </div>
        
                    <div>
                        <p><label>Descripción:</label>
                        <input type="text" name="descripcion" id="descripcion" class="estiloform"></p>
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