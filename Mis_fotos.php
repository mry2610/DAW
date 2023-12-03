<!DOCTYPE html>
<?php
$tituloPagina= "Mis fotos";
include "Header.php";

$idUser = $_SESSION["idUser"];
$consulta = "SELECT * FROM fotos as f, albumes as a, paises as p INNER JOIN Usuarios as u WHERE a.IdAlbum= f.Album 
AND '$idUser'= a.Usuario AND a.Usuario= u.IdUsuario AND p.IdPais = f.pais";
$result = mysqli_query($id,$consulta);

?>
    
    <main>
        <h1>Mis Fotos</h1>
        <?php
        if ($result && mysqli_num_rows($result) > 0) {
        // Itera sobre las filas recuperadas

        // Obtén el número total de filas
        $numeroDeFilas = mysqli_num_rows($result);

        // Verifica si el número de filas es menor o igual a 3
        
            echo'<div class="seccion">';
            for( $i =0; $i<$numeroDeFilas && $row = mysqli_fetch_assoc($result); $i++){
                $idFoto[$i]= $row["IdFoto"];
                echo <<<hereDOC
        <article class="index">
            <img src={$row["Fichero"]} alt={$row["Alternativo"]} class="roma">
            <p>Titulo: {$row["Titulo"]}</p>
            <p>Fecha: {$row["Fecha"]}</p> 
            <p>País: {$row["NomPais"]}</p>
        </article>
        hereDOC;
            }
       
        echo '</div>';
        } else {
        echo "<p>No hay resultados</p>";
        }
        ?>
        
    </main>
</body>