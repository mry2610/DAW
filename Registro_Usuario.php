<!DOCTYPE html>
<?php
$tituloPagina= "Registro de usuario";
include "Header.php";
?>

    <h2>Registro de Usuario</h2>
    <div class="solicitudAlb">
        <div class="contentForm">
            <form action="respuesta_Registro_Usuario.php" class="solicitudForm" method="post">

                <div>
                    <p><label for="nomUsuario">Nombre de Usuario:</label><br> 
                    <input type="text" name="nomUsuario"  class="estiloform" ></p>                        
                </div>

                <div>
                    <p><label for="clave">Contraseña:</label>
                    <input type="text" name="clave" class="estiloform"></p><br>
                </div>
                <div>
                    <p><label for="rclave"> Repite la Contraseña:</label>
                    <input type="text" name="rclave" class="estiloform"></p><br>
                </div>
                <div>
                    <p><label for="email">Email:</label>
                    <input type="text" name="email" class="estiloform"></p><br>
                </div>

                <div>
                <p><label for="sexo">Sexo:</label>
                    <select name="sexo" class="estiloform">
                    <option value="1">Masculino</option>
                    <option value="0">Femenino</option>
                    <option value="2">No Responder</option>
                    </select></p><br>
                </div>

                <div>
                    <p><label for="fNacimiento">Fecha de Nacimiento:</label>
                    <input type="date" name="fNacimiento"  class="estiloform"></p><br>
                </div>

                <div>
                    <p><label for="ciudad">Ciudad:</label>
                    <input type="text" name="ciudad" class="estiloform"></p><br>
                </div>

                <div>
                    <p><label for="pais">País:</label>
                    <select name="pais" class="estiloform">
                    <?php
                        // Obtener la lista de países desde la tabla Paises
                        $query = "SELECT * FROM Paises";
                        $result = mysqli_query($id,$query);

                        // Mostrar los países en la lista desplegable
                        while ($row = $result->fetch_assoc()) {
                            echo "<option value='" . $row['IdPais'] . "'>" . $row['NomPais'] . "</option>";
                        }
                    ?>
                    </select></p><br>
                </div>

                <div>
                    <p><label for="foto">Foto (URL):</label>
                    <input type="text" name="foto" class="estiloform"></p><br>
                </div>

                <div>
                    <p><label for="fRegistro">Fecha de Registro:</label>
                    <input type="text" name="fRegistro" value="<?php echo date('Y-m-d H:i:s'); ?>" readonly class="estiloform"></p><br> 
                </div>

                <div>
                    <p><label for="estilo">Estilo:</label>
                    <select name="estilo" class="estiloform">
                    <?php
                        // Obtener la lista de países desde la tabla Estilos
                        $query = "SELECT * FROM estilos";
                        $result = mysqli_query($id,$query);

                        // Mostrar los países en la lista desplegable
                        while ($row = $result->fetch_assoc()) {
                            echo "<option value='" . $row['IdEstilo'] . "'>" . $row['Nombre'] . "</option>";
                        }
                    ?>
                    </select></p><br> 
                </div>

                <input type="submit" value="Registrar">
            </form>
        </div>
    </div>   
</body>
</html>
