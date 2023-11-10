<!DOCTYPE html>

<?php

include "Header_Log.php";

?>

<body>
    
    <main>
        <h1>Detalles de imágenes</h1>

        <div class="inicio">
            <?php
             if(isset($_GET["id"])){
                $id=$_GET["id"];
              
            
            if($id%2==0){
                echo '<article class="detallesImagen">';
                echo '<img src="https://live.staticflickr.com/2880/34304747756_20aa2dbc3c_n.jpg" alt="taj mahal" >';
                echo '<p>Nombre: Coliseo romano</p>';
                echo '<p>Fecha: 23/09/2023</p>';
                echo '<p>País: Roma, Italia</p>';
                echo '<p>Autor: Cristian Bravo</p>';
                echo '<a href="https://es.wikipedia.org/wiki/Coliseo" class="navegadores">Album de imagen</a>';
                echo '</article>';
                }else{
                    // Detalles de la segunda imagen
            echo '<article class="detallesImagen">';
            echo '<img src="https://live.staticflickr.com/65535/52270993783_05232b064c_n.jpg" alt="taj mahal">';
            echo '<p>Nombre: Taj Mahal</p>';
            echo '<p>Fecha: 23/09/2023</p>';
            echo '<p>País: India</p>';
            echo '<p>Autor: [Nombre del autor]</p>';
            echo '<a href="[Enlace a más detalles]" class="navegadores">Album de imagen</a>';
            echo '</article>';
                }
         
            
            }else{
              echo"<p>error en los parametros de entrada</p>";
            }
            // Detalles de la primera imagen
            ?>
        </div>
    </main>

    <?php

    include "footer.php";

    ?>
</body>
</html>