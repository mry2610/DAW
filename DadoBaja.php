<!DOCTYPE html>
<?php
$tituloPagina= "Registro de usuario";
include "Header.php";
$result_usu = mysqli_query($id,"SELECT NomUsuario, Clave, Email, Sexo, FNacimiento, Ciudad, Pais, NomPais,Idpais 
FROM usuarios, paises where IdUsuario = {$_SESSION['idUser']} and Pais= IdPais");
$row = mysqli_fetch_assoc($result_usu);

if (isset($_GET['eliminar_usuario'])) {
    if(isset($_POST["pass"])){
        $Pass = $_POST["pass"];
        $idUser=$_SESSION["idUser"];
        if($Pass===$_SESSION["pass"]){
            mysqli_query($id,"DELETE FROM usuarios WHERE IdUsuario=$idUser");
            // Si se recibe el parámetro 'eliminar_cookie' en la URL, entonces eliminamos la cookie.
            setcookie("usuario", $_SESSION["usuario"], time() -3600);
            setcookie("pass", $_SESSION["pass"], time() -3600);
            setcookie("estilo", $_SESSION["estilos"], time() -3600);
            setcookie("hora_cierre", $_SESSION["ultima_Conexion"], time() -3600);
            
            session_destroy();
            header('Location: index.php');
        }
        else{
            echo"<p>Contraseña no valida, por favor vuelva a introducir la contraseña.</p>";
        }
    }
}

?>
    <main>
        <h2 class="formRegistro">Datos actuales del Usuario</h2>
        <div class="formRegistro">
            <div class="contentFormRegistro">
            <?php
                echo <<<hereDoc
                    <p>Nombre de usuario: {$row["NomUsuario"]}</p>
                    <p>Albumes:</p>
                hereDoc;

                $Id = $_SESSION["idUser"];
                $resultAlbum = mysqli_query($id, "SELECT a.Titulo, a.Descripcion, u.NomUsuario, f.Fichero, a.IdAlbum 
                    FROM albumes as a
                    INNER JOIN fotos as f ON a.IdAlbum = f.Album
                    INNER JOIN Usuarios as u ON a.Usuario = u.IdUsuario
                    WHERE a.Usuario = '$Id'
                    GROUP BY a.IdAlbum");
                $fotosTotal=0;    

                if ($resultAlbum && mysqli_num_rows($resultAlbum) > 0) {
                    // Itera sobre las filas recuperadas

                    // Obtén el número total de filas
                    $numeroDeFilas = mysqli_num_rows($resultAlbum);

                    // Verifica si el número de filas es menor o igual a 3
                    if ($numeroDeFilas <= 3) {
                        echo "<ul>";
                        
                        while ($row = mysqli_fetch_assoc($resultAlbum)) {
                            $IdAlbum = $row["IdAlbum"];
                            
                            
                            $resultFotos = mysqli_query($id, "SELECT *, f.titulo as foto_titulo 
                            FROM fotos as f
                            INNER JOIN albumes as a ON f.Album = a.IdAlbum
                            INNER JOIN paises as p ON f.pais = p.IdPais
                            INNER JOIN Usuarios as u ON a.Usuario = u.IdUsuario
                            WHERE a.IdAlbum = '$IdAlbum' AND u.IdUsuario = '$Id'");
                            $contarFotos=mysqli_num_rows($resultFotos);
                            $fotosTotal=$fotosTotal + $contarFotos;
                            echo "<p>{$row["Titulo"]}: $contarFotos fotos</p>";

                            while ($rowFotos = mysqli_fetch_assoc($resultFotos)) {
                                echo <<<hereDoc
                                    <li>
                                        {$rowFotos["foto_titulo"]}
                                    </li>
                                hereDoc;
                            }
                        }
                        echo "</ul>";
                        echo "<p>Se van a borrar $fotosTotal imagenes</p>";
                    }
                }
            ?>

            </div>
        </div>
        <h2 class="formRegistro">Estas seguro de que quieres darte de baja?</h2>
        <div class="formRegistro">
            <div class="contentFormRegistro">
                <form action="DadoBaja.php?eliminar_usuario=true" method="post">
                    <p><label for="password">Ingrese su contraseña actual:</label>
                    <input type="text" name="pass" class="estiloform"></p>

                    <input type="submit" value="Confirmar Baja">
                </form>
            </div>
        </div>


    </main>

</body>
</html>