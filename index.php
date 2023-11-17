<!--Pagina principal-->
<!DOCTYPE html>
<?php


session_start();  

include "Header.php";

?>

<body>
<?php
        if(isset($_COOKIE["usuario"])){//si no tiene cookie de usuario, significa que no recuerda su registro,
            //por lo que solo se activará el if cuando entre despues de haber vuelto a iniciar sesion
            if(date("H:i:s") > '06:00:0' && date("H:i:s")<'11:59:59') {
                echo "<p class='mensaje'> Buenos días {$_COOKIE["usuario"]} </p>";
            }
            else if(date("H:i:s") > '12:00:0' && date("H:i:s")<'15:59:59'){
                echo "<p class='mensaje'> Hola {$_COOKIE["usuario"]} </p>";
            }
            else if(date("H:i:s") > '16:00:0' && date("H:i:s")<'19:59:59'){
                echo "<p class='mensaje'> Buenas tardes {$_COOKIE["usuario"]} </p>";
            }
            else{
                echo "<p class='mensaje'> Buenas noches {$_COOKIE["usuario"]} </p>";
            }
            echo "<p class='mensaje'> Su ultima visita fue a las {$_COOKIE["hora_cierre"]}</p>";

            setcookie("hora_cierre",date("Y-m-d H:i:s"), time() +(90 * 24 * 60 * 60));
        }           
        ?>


    <!--Ultimas 5 imagenes-->
    <main>
        <?php 
           echo '<div class="inicio">';
           for ($i = 1; $i <= 5; $i++) {     
            if($i%2==0){
             echo <<<hereDOC
              <article class="index">
              <a href="detalles_imagen.php?id=$i">
                 <img src="https://live.staticflickr.com/65535/52270993783_05232b064c_n.jpg" alt="taj mahal" class="roma">
              </a>
              <p>Titulo: Taj Mahal</p>
              <p>Fecha: 23/09/2023</p> 
              <p>País: India</p>
              </article>
             hereDOC;
            
            }else{
             echo <<<hereDOC
              <article class="index">
              <a href="detalles_imagen.php?id=$i">
                 <img src="https://live.staticflickr.com/65535/51453242037_68388eb25b_n.jpg" alt="taj mahal" class="roma"></a>
              <p>Titulo: Catedral de Santiago </p>
              <p>Fecha: 23/09/2023</p> 
              <p>País: España</p>
              </article>
             hereDOC;
            
            }
         }
                echo '</div>';
                ?>
       
</main>

<?php
if(isset($_COOKIE["usuario"]) || isset($_SESSION["estilos"])){
   include "footer.php";
}

?>

</body>

