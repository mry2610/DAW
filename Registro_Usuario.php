
<?php
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
?>
<!DOCTYPE html>
<?php

include "Header.php";

?>
<!DOCTYPE html>
<html lang="es">
<body>
    <h2>Registro de Usuario</h2>
    
    <form action="respuesta_Registro_Usuario.php" method="post">

         <div>
        <p><label for="nomUsuario">Nombre de Usuario:</label><br>
        <input type="text" name="nomUsuario"  class="estiloform" ></p>              
                        
        </div>
      

        <label for="clave">Contraseña:</label>
        <input type="text" name="clave" ><br>

        <label for="email">Email:</label>
        <input type="text" name="email" ><br>

        <label for="sexo">Sexo:</label>
        <select name="sexo">
            <option value="1">Masculino</option>
            <option value="0">Femenino</option>
            <option value="2">No Responder</option>
        </select><br>

        <label for="fNacimiento">Fecha de Nacimiento:</label>
        <input type="date" name="fNacimiento" required><br>

        <label for="ciudad">Ciudad:</label>
        <input type="text" name="ciudad"><br>
 
        <label for="pais">País:</label>
        <select name="pais">
            <?php
                // Obtener la lista de países desde la tabla Paises
                $query = "SELECT * FROM Paises";
                $result = $conn->query($query);

                // Mostrar los países en la lista desplegable
                while ($row = $result->fetch_assoc()) {
                    echo "<option value='" . $row['IdPais'] . "'>" . $row['NomPais'] . "</option>";
                }
            ?>
        </select><br>

        <label for="foto">Foto (URL):</label>
        <input type="text" name="foto"><br>

        <label for="fRegistro">Fecha de Registro:</label>
        <input type="text" name="fRegistro" value="<?php echo date('Y-m-d H:i:s'); ?>" readonly><br> 

       <label for="estilo">Estilo:</label>
        <select name="estilo">
        <?php
                // Obtener la lista de países desde la tabla Paises
                $query = "SELECT * FROM estilos";
                $result = $conn->query($query);

                // Mostrar los países en la lista desplegable
                while ($row = $result->fetch_assoc()) {
                    echo "<option value='" . $row['IdEstilo'] . "'>" . $row['Nombre'] . "</option>";
                }
            ?>
        </select><br> 
        

        <input type="submit" value="Registrar">
    </form>
</body>
</html>
<!-- <body>
    <main>
        <h1>Registro nuevo usuario</h1>
        <div class="formRegistro">
            <h3>Introduzca los datos</h3>
            <div class="contentFormRegistro">
                <form action="respuesta_Registro_Usuario.php" method="post" >
                    
                    <div>
                        
                        <p><label>Nombre:</label><br>
                        <input type="text" name="nombre" id="nombre" class="estiloform"></p>
                    </div>
            
                    <div>
                        <p><label>Contraseña:</label><br>
                        <input type="text" name="pass" id="pass" class="estiloform"></p>
                    </div>
            
                    
                    <div>
                        <p><label>Repetir contraseña:</label><br>
                        <input type="text" name="Rpass" id="Rpass" class="estiloform"></p>
                    </div>
                    
                    
                    <div>
                        <p><label>Email:</label><br>
                        <input type="text" name="email" id="email" class="estiloform"></p>
                    </div>
                    
            
                    <div>
                        <p><label>Sexo:</label><br>
                            
                            <select name="sexo" id="sexo" class="estiloform">
                                <option value="Non">No responder</option>
                                <option value="Hombre">Hombre</option>
                                <option value="Mujer">Mujer</option>       
                            </select>
                        </p>
                    </div>
        
                    <div>
                        <p>
                        <label>Fecha de nacimiento:</label><br>
                        <input type="text" name="fecha" id="fecha" class="estiloform"></p>
                    </div>
                        
                    <div>
                        <p>
                        <label>Ciudad:</label><br>
                        <input type="text" name="ciudad" id="ciudad" class="estiloform">
                        </p>
                    </div>
                    
                    <div>
                        <p>
                        <label>País:</label><br>
                        <input type="text" name="pais" id="pais" class="estiloform">
                        </p>
                    </div>
                    
                    <br>
                    <p><input type="submit" id="botonBuscar" value="Registrarse"></p> 
            
                </form>
            </div>
        </div>
        
    </main>
</body> -->
</html>