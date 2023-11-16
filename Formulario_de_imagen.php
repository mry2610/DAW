<!DOCTYPE html>
<?php
session_start();
include "Header.php";

?>
<body>
    <main>
        <h1>Busqueda detallada</h1>
        <div class="formRegistro">
            <form action="resultado_de_busqueda.php" class="contentFormRegistro">
            
                <div>
                    <!-- div es un contenedor que sirve para poner de manera más ordenada el formulario que queremos crear-->
                    <p><label>Título:</label>
                    <input type="text" name="nombre" id="nombre" class="estiloform"></p>
                </div>
    
    
                <div>
                    <p>
                    <label>Fecha:</label>
                    <input type="text" name="fecha" id="fecha" class="estiloform"></p>
                </div>       
    
                
                <div>
                    <p>
                    <label>País:</label><br>
                    <input type="text" name="pais" id="pais" class="estiloform">
                    </p>
                </div>
                
                
                <p><input type="submit" id="botonBuscar" value="Buscar"></p>
                
            </form>
        </div>
    </main>
    
</body>
</html>