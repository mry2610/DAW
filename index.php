<!--Pagina principal-->
<!DOCTYPE html>
<?php


session_start();  

include "Header.php";

$id = @mysqli_connect("", "root", "", "pibd");//se conecta a la BD
if(mysqli_connect_errno() != 0){
    echo mysqli_connect_error();
    exit;
}

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

            $result = mysqli_query($id, "SELECT Titulo, DATE_FORMAT(Fecha, '%e/%c/%Y') as fecha, Pais, Fichero, NomPais, Alternativo, FRegistro FROM fotos, paises where Pais=idPais ORDER BY FRegistro DESC");
            if(mysqli_connect_errno() != 0){
                echo mysqli_connect_error();
                exit;
            }

           echo '<div class="inicio">';
           for ($i = 1; $i <= 5 && $row = mysqli_fetch_assoc($result); $i++) {     
               
               echo <<<hereDOC
               <article class="index">
               <a href="detalles_imagen.php?id=$i">
                   <img src={$row["Fichero"]} alt={$row["Alternativo"]} class="roma">
               </a>

               <p>Titulo: {$row["Titulo"]}</p>
               <p>Fecha: {$row["fecha"]}</p> 
               <p>País: {$row["NomPais"]}</p>
               </article>

               hereDOC;
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

