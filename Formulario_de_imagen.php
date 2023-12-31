<!DOCTYPE html>
<?php
$tituloPagina= "Formulario de imagen";
include "Header.php";
?>

    <main>
        <h1>Busqueda detallada</h1>
        <div class="formRegistro">
            <form action="resultado_de_busqueda.php" class="contentFormRegistro">
            
                <div>
                    <!-- div es un contenedor que sirve para poner de manera más ordenada el formulario que queremos crear-->
                    <p><label>Título:</label>
                    <input type="text" name="buscador" id="nombre" class="estiloform"></p>
                </div>
    
    
                <div>
                    <p>
                    <label>Fecha:</label>
                    <input type="text" name="fecha" id="fecha" class="estiloform"></p>
                </div>       
    
                
                <div>
                    <p>
                    <label>País:</label>
                    <select name="pais"  class="estiloform" >
                        <?php
                            // Obtener la lista de países desde la tabla Paises
                            $query = "SELECT * FROM Paises";
                            $result = mysqli_query($id,$query);

                            // Mostrar los países en la lista desplegable
                            while ($row = $result->fetch_assoc()) {
                                echo "<option value='" . $row['IdPais'] . "'>" . $row['NomPais'] . "</option>";
                            }
                        ?>
                    </select>
                    </p>
                </div>
                
                
                <p><input type="submit" id="botonBuscar" value="Buscar"></p>
                
            </form>
        </div>
    </main>
    
</body>
</html>