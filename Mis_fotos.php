<?php

session_start();
include "Header.php";

?>
<?php
        // Configuración de la conexión a la base de datos
         $servername = "localhost";
         $username = "root";
         $password = "";
         $dbname = "pibd";

         // Crear la conexión
         $conn = new mysqli($servername, $username, $password, $dbname);
         //Verificar la conexión
         if ($conn->connect_error) {
            die("Conexión fallida: " . $conn->connect_error);
         }
         $Id = $_SESSION["Id"];
         $consulta = "SELECT * FROM fotos as f, albumes as a, paises as p INNER JOIN Usuarios as u WHERE a.IdAlbum= f.Album 
         AND '$Id'= a.Usuario AND a.Usuario= u.IdUsuario AND p.IdPais = f.pais";
         $result = $conn->query($consulta);
         
        ?>
<body>
    
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