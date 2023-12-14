
<!DOCTYPE html>
<?php
$tituloPagina= "Mis datos";
include "Header.php";
$result_usu = mysqli_query($id,"SELECT NomUsuario, Clave, Email, Sexo, FNacimiento, Ciudad, Pais, NomPais,Idpais FROM usuarios, paises where IdUsuario = {$_SESSION['idUser']} and Pais= IdPais");
$row = mysqli_fetch_assoc($result_usu);

?>
    <main>
    <h2>Datos actuales del Usuario</h2>
    <div class="solicitudAlb">
        <div class="contentForm">
            <?php
                $sexo="Mujer";
                if($row["Sexo"]==1){
                    $sexo="Hombre";
                }
                if($row["Sexo"]==2){
                    $sexo="No responder";
                }
                echo<<<hereDoc
                <p>Nombre: {$row["NomUsuario"]}</p>
                <p>Email: {$row["Email"]}</p>
                <p>Sexo: $sexo</p>
                <p>Fecha de nacimiento: {$row["FNacimiento"]}</p>
                <p>Pais: {$row["NomPais"]}</p>

                hereDoc;
            ?>

        </div>
    </div>

    <h2>Editar usuario</h2>
    <?php
        $enlace="respuesta_datos.php";
        include "formRegistro.php"
    ?>  
                <div>
                    <p><label for="clave">Por favor, escribe tu contraseña para confirmar los cambios:</label>
                    <input type="text" name="clave" class="estiloform"></p><br>
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