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
         $consulta = "SELECT * FROM albumes as a INNER JOIN Usuarios as u WHERE '$Id'= a.Usuario and a.Usuario= u.IdUsuario";
         $result = $conn->query($consulta);
        ?>
<body>
    
    <main>
        <h1>Mis Albumes</h1>

        <?php
         // Verifica si la consulta fue exitosa y si hay filas
         if ($result && mysqli_num_rows($result) > 0) {
            // Itera sobre las filas recuperadas
            
            // Obtén el número total de filas
            $numeroDeFilas = mysqli_num_rows($result);
    
            // Verifica si el número de filas es menor o igual a 3
            if ($numeroDeFilas <= 3) {
              echo'<div class="seccion">';
               for( $i =0; $i<$numeroDeFilas && $row = mysqli_fetch_assoc($result); $i++){
                    $IdAlbum[$i]= $row["IdAlbum"];
                    echo <<<hereDOC
                    
                    hereDOC;
               }
            }
            echo '</div>';
        } else {
            echo "<p>No hay resultados</p>";
        }?>
    </main>
</body>