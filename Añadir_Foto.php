<?php
session_start();
include "header.php"; // Asegúrate de incluir el archivo de conexión a la base de datos


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Foto</title>
</head>
<body>
    <h2>Agregar Foto</h2>


    <div class="solicitudAlb">
        <div class="contentForm">   
            <form method="post" id="solForm" class="solicitudForm">
                <div>
                    <p><label for="titulo">Título:</label>
                    <input type="text" name="titulo" class="estiloform" >
                </div>
                <div>
                    <p><label for="descripcion">Descripción:</label>
                    <textarea name="descripcion" rows="4"  class="estiloform"></textarea></p>
                </div>
                <div>
                    <p><label for="fecha">Fecha:</label>
                    <input type="date" name="fecha" class="estiloform"></p>
                </div>
                <div>
                    <p><label for="pais">País:</label>
                    <input type="number" name="pais" class="estiloform"></p>
                </div>
                <div>
                    <p>
                        <label>Album:</label>
                        <select name="album" id="album" class="estiloform">
                            <?php
                            $idUsuario = isset($_GET["id"]) ? $_GET["id"] : null;
                            $idAlbum=isset($_GET["idAlbum"]) ? $_GET["idAlbum"] : null;
                            if($idUsuario){
                                $result = mysqli_query($id, "SELECT * FROM albumes INNER JOIN usuarios ON albumes.Usuario = usuarios.IdUsuario WHERE albumes.Usuario = $idUsuario");
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo "<option value='" . $row['IdAlbum'] . "'>" . $row['Titulo'] . "</option>";
                                }
                            }else{
                                $result = mysqli_query($id, "SELECT * FROM albumes where IdAlbum=$idAlbum");
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo "<option value='" . $row['IdAlbum'] . "'>" . $row['Titulo'] . "</option>";
                                }

                            }
                            ?>
                        </select>
                    </p>
                    <p><label for="album">Álbum:</label>
                    <input type="number" name="album" class="estiloform"></p>
                </div>
                <div>
                    <p><label for="fichero">Fichero:</label>
                    <input type="text" name="fichero" class="estiloform"></p>
                </div>
                <div>
                    <p><label for="alternativo">Texto Alternativo:</label>
                    <input type="text" name="alternativo" class="estiloform"></p>
                </div>
                <input type="submit" value="Agregar Foto">
            </form>
        </div>
    </div>
</body>
</html>
