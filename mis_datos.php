
<?php
// Configuración de la conexión a la base de datos
session_start();
include "Header.php";
$id = @mysqli_connect("", "root", "", "pibd");//se conecta a la BD

$result_usu = mysqli_query($id,"SELECT NomUsuario, Clave, Email, Sexo, FNacimiento, Ciudad, Pais, NomPais,Idpais FROM usuarios, paises where IdUsuario = {$_SESSION['idUser']} and Pais= IdPais");
$row = mysqli_fetch_assoc($result_usu);



?>
<!DOCTYPE html>
<html lang="es">
<body>
    <main>
    <h2>Datos actuales del Usuario</h2>
    <div class="solicitudAlb">
        <div class="contentForm">
            <?php
                echo<<<hereDoc
                <p>Nombre:{$row["NomUsuario"]}</p>
                <p>Clave:{$row["Clave"]}</p>
                <p>Email:{$row["Email"]}</p>
                <p>Sexo:{$row["Sexo"]}</p>
                <p>Fecha de nacimiento:{$row["FNacimiento"]}</p>
                <p>Pais:{$row["NomPais"]}</p>

                hereDoc;
            ?>

        </div>
    </div>



    
    <h2>Editar usuario</h2>
    <div class="solicitudAlb">
        <div class="contentForm">
            <form class="solicitudForm">

                <div>
                    <p><label for="nomUsuario">Nombre de Usuario:</label><br>
                    <input type="text" name="nomUsuario" class="estiloform" ></p>              
                            
                </div>

                <div>
                    <p><label for="clave">Contraseña:</label>
                    <input type="text" name="clave" class="estiloform"></p><br>
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
                        $query = "SELECT * FROM paises";
                        $result = $id->query($query);
                       
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
                        $result = $id->query($query);

                        // Mostrar los países en la lista desplegable
                        while ($row = $result->fetch_assoc()) {
                            echo "<option value='" . $row['Nombre'] . "'>" . $row['Nombre'] . "</option>";
                        }
                    ?>
                    </select></p><br> 
                </div>

                <input type="submit" value="Editar">
            </form>

        </div>
    </div>
    </main>
    <?php
    include "footer.php";
    ?>
    
</body>


    

    
</html>