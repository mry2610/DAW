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
         $Id = $_SESSION["idUser"];
         $consulta = "SELECT a.Titulo, a.Descripcion,u.NomUsuario, f.Fichero,a.IdAlbum FROM albumes as a, fotos as f INNER JOIN Usuarios as u WHERE '$Id'= a.Usuario and a.Usuario= u.IdUsuario and f.Album=a.IdAlbum ";
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
                echo <<< hereDOC
                <article class="index">
                    <a href='ver_album.php?id=$IdAlbum[$i]'>
                        <img src={$row["Fichero"]}  class="roma">
                    </a>
                    <p>{$row["IdAlbum"]}</p>
                    <p>{$row["Titulo"]}</p>
                    <p>{$row["Descripcion"]}</p>
                    <p>{$row["NomUsuario"]}</p>
                </article>
                hereDOC;
               
                
                  
               }
            }
            echo '</div>';
        } else {
            echo "<p>No hay resultados</p>";
        }?>
    </main>
</body>