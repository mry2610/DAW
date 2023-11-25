<!DOCTYPE html>
<?php

session_start();

include "Header.php";

?>
<body>

    
    <main>
        <h1>Resultado de búsqueda</h1>

        <?php
        // Verificar si se envió el formulario de búsqueda
        if (isset($_GET['buscador'])) {
            // Recuperar la consulta de búsqueda introducida por el usuario
            $consulta_busqueda = $_GET['buscador'];

            // Mostrar la consulta de búsqueda del usuario
           
            echo <<<hereDOC
             <p>Resultados para: $consulta_busqueda</p>
            hereDOC;
            // Realizar una búsqueda o consulta en función de la entrada del usuario
            // Puedes utilizar esta información para obtener datos de una base de datos u otra fuente
            // Por ahora, mostraremos algunos resultados de búsqueda ficticios
            echo '<div class="seccion">';
            for ($i = 1; $i <= 3; $i++) {
                
               if($i%2==0){
                  if(isset($_COOKIE["usuario"]) ||isset($_SESSION["nombre"])){echo <<<hereDOC
                     <article class="index">
                     <a href="detalles_imagen.php?id=$i">
                        <img src="https://live.staticflickr.com/65535/52270993783_05232b064c_n.jpg" alt="taj mahal" class="roma">
                     </a>
                     <p>Titulo: Taj Mahal</p>
                     <p>Fecha: 23/09/2023</p> 
                     <p>País: India</p>
                     </article>
                     hereDOC;
                  }
                  
                else{echo <<<hereDOC
                  <article class="index">
                  <a href="error_de_login.html">
                     <img src="https://live.staticflickr.com/65535/52270993783_05232b064c_n.jpg" alt="taj mahal" class="roma">
                  </a>
                  <p>Titulo: Taj Mahal</p>
                  <p>Fecha: 23/09/2023</p> 
                  <p>País: India</p>
                  <p>País: holi</p>
                  </article>
                 hereDOC;}
               
               }else{
                  if(isset($_COOKIE["usuario"]) ||isset($_SESSION["nombre"])){
                     echo <<<hereDOC
                 <article class="index">
                 <a href="detalles_imagen.php?id=$i">
                    <img src="https://live.staticflickr.com/65535/51453242037_68388eb25b_n.jpg" alt="taj mahal" class="roma"></a>
                 <p>Titulo: Catedral de Santiago </p>
                 <p>Fecha: 23/09/2023</p> 
                 <p>País: España</p>
                 </article>
                hereDOC;
                  }else{
                     echo <<<hereDOC
                     <article class="index">
                     <a href="error_de_login.html">
                        <img src="https://live.staticflickr.com/65535/51453242037_68388eb25b_n.jpg" alt="taj mahal" class="roma"></a>
                     <p>Titulo: Catedral de Santiago </p>
                     <p>Fecha: 23/09/2023</p> 
                     <p>País: España</p>
                     </article>
                    hereDOC;
                  }
                
               
               }
                
            }
            echo '</div>';
            echo '<div class="seccion">';
            for ($i = 4; $i <= 6; $i++) {
                
               if($i%2==0){
                  if(isset($_COOKIE["usuario"]) ||isset($_SESSION["nombre"])){echo <<<hereDOC
                     <article class="index">
                     <a href="detalles_imagen.php?id=$i">
                        <img src="https://live.staticflickr.com/65535/52270993783_05232b064c_n.jpg" alt="taj mahal" class="roma">
                     </a>
                     <p>Titulo: Taj Mahal</p>
                     <p>Fecha: 23/09/2023</p> 
                     <p>País: India</p>
                     </article>
                     hereDOC;
                  }
                  
                else{echo <<<hereDOC
                  <article class="index">
                  <a href="error_de_login.html">
                     <img src="https://live.staticflickr.com/65535/52270993783_05232b064c_n.jpg" alt="taj mahal" class="roma">
                  </a>
                  <p>Titulo: Taj Mahal</p>
                  <p>Fecha: 23/09/2023</p> 
                  <p>País: India</p>
                  <p>País: holi</p>
                  </article>
                 hereDOC;}
               
               }else{
                  if(isset($_COOKIE["usuario"]) ||isset($_SESSION["nombre"])){
                     echo <<<hereDOC
                 <article class="index">
                 <a href="detalles_imagen.php?id=$i">
                    <img src="https://live.staticflickr.com/65535/51453242037_68388eb25b_n.jpg" alt="taj mahal" class="roma"></a>
                 <p>Titulo: Catedral de Santiago </p>
                 <p>Fecha: 23/09/2023</p> 
                 <p>País: España</p>
                 </article>
                hereDOC;
                  }else{
                     echo <<<hereDOC
                     <article class="index">
                     <a href="error_de_login.html">
                        <img src="https://live.staticflickr.com/65535/51453242037_68388eb25b_n.jpg" alt="taj mahal" class="roma"></a>
                     <p>Titulo: Catedral de Santiago </p>
                     <p>Fecha: 23/09/2023</p> 
                     <p>País: España</p>
                     </article>
                    hereDOC;
                  }
                
               
               }
                
            }
            echo '</div>';

        } else if(isset($_GET['nombre'])) {
            // Recuperar la consulta de búsqueda introducida por el usuario
            $consulta_busqueda = $_GET['nombre'];

            // Mostrar la consulta de búsqueda del usuario
            echo <<<hereDOC
            <p>Resultados para: $consulta_busqueda</p>
           hereDOC;
            echo '<div class="seccion">';
            for ($i = 1; $i <= 3; $i++) {
                
               if($i%2==0){
                  if(isset($_COOKIE["usuario"]) ||isset($_SESSION["nombre"])){echo <<<hereDOC
                     <article class="index">
                     <a href="detalles_imagen.php?id=$i">
                        <img src="https://live.staticflickr.com/65535/52270993783_05232b064c_n.jpg" alt="taj mahal" class="roma">
                     </a>
                     <p>Titulo: Taj Mahal</p>
                     <p>Fecha: 23/09/2023</p> 
                     <p>País: India</p>
                     </article>
                     hereDOC;
                  }
                  
                else{echo <<<hereDOC
                  <article class="index">
                  <a href="error_de_login.html">
                     <img src="https://live.staticflickr.com/65535/52270993783_05232b064c_n.jpg" alt="taj mahal" class="roma">
                  </a>
                  <p>Titulo: Taj Mahal</p>
                  <p>Fecha: 23/09/2023</p> 
                  <p>País: India</p>
                  <p>País: holi</p>
                  </article>
                 hereDOC;}
               
               }else{
                  if(isset($_COOKIE["usuario"]) ||isset($_SESSION["nombre"])){
                     echo <<<hereDOC
                 <article class="index">
                 <a href="detalles_imagen.php?id=$i">
                    <img src="https://live.staticflickr.com/65535/51453242037_68388eb25b_n.jpg" alt="taj mahal" class="roma"></a>
                 <p>Titulo: Catedral de Santiago </p>
                 <p>Fecha: 23/09/2023</p> 
                 <p>País: España</p>
                 </article>
                hereDOC;
                  }else{
                     echo <<<hereDOC
                     <article class="index">
                     <a href="error_de_login.html">
                        <img src="https://live.staticflickr.com/65535/51453242037_68388eb25b_n.jpg" alt="taj mahal" class="roma"></a>
                     <p>Titulo: Catedral de Santiago </p>
                     <p>Fecha: 23/09/2023</p> 
                     <p>País: España</p>
                     </article>
                    hereDOC;
                  }
                
               
               }
                
            }
            echo '</div>';
            echo '<div class="seccion">';
            for ($i = 4; $i <= 6; $i++) {
                
               if($i%2==0){
                  if(isset($_COOKIE["usuario"]) ||isset($_SESSION["nombre"])){echo <<<hereDOC
                     <article class="index">
                     <a href="detalles_imagen.php?id=$i">
                        <img src="https://live.staticflickr.com/65535/52270993783_05232b064c_n.jpg" alt="taj mahal" class="roma">
                     </a>
                     <p>Titulo: Taj Mahal</p>
                     <p>Fecha: 23/09/2023</p> 
                     <p>País: India</p>
                     </article>
                     hereDOC;
                  }
                  
                else{echo <<<hereDOC
                  <article class="index">
                  <a href="error_de_login.html">
                     <img src="https://live.staticflickr.com/65535/52270993783_05232b064c_n.jpg" alt="taj mahal" class="roma">
                  </a>
                  <p>Titulo: Taj Mahal</p>
                  <p>Fecha: 23/09/2023</p> 
                  <p>País: India</p>
                  <p>País: holi</p>
                  </article>
                 hereDOC;}
               
               }else{
                  if(isset($_COOKIE["usuario"]) ||isset($_SESSION["nombre"])){
                     echo <<<hereDOC
                 <article class="index">
                 <a href="detalles_imagen.php?id=$i">
                    <img src="https://live.staticflickr.com/65535/51453242037_68388eb25b_n.jpg" alt="taj mahal" class="roma"></a>
                 <p>Titulo: Catedral de Santiago </p>
                 <p>Fecha: 23/09/2023</p> 
                 <p>País: España</p>
                 </article>
                hereDOC;
                  }else{
                     echo <<<hereDOC
                     <article class="index">
                     <a href="error_de_login.html">
                        <img src="https://live.staticflickr.com/65535/51453242037_68388eb25b_n.jpg" alt="taj mahal" class="roma"></a>
                     <p>Titulo: Catedral de Santiago </p>
                     <p>Fecha: 23/09/2023</p> 
                     <p>País: España</p>
                     </article>
                    hereDOC;
                  }
                
               
               }
                
            }
            echo '</div>';}
            else{
                // Si el formulario de búsqueda no se ha enviado, mostrar un mensaje o contenido predeterminado
                echo '<p>No se ha realizado una búsqueda.</p>';
            }
        
        ?>
    </main>
    
</body>
</html>
