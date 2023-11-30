<!DOCTYPE html>
<?php

session_start();

include "Header.php";

?>
<body>

    
    <main>
        <h1>Resultado de búsqueda</h1>

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
         $consulta="";
         if ((isset($_GET['fecha'])  && $_GET['fecha'] !="") &&(isset($_GET['pais']) 
         && $_GET['pais'] !=7) && (isset($_GET['buscador'])  && $_GET['buscador'] !="") ) {
             
             $Pais= $_GET['pais'];
             $fecha=  $_GET['fecha'];
             $Titulo= $_GET['buscador'];
             $dateTime = new DateTime($fecha);
             $fechaFormateada = $dateTime->format('Y/m/d');
             // Recuperar la consulta de búsqueda introducida por el usuario
             echo "<p> Resultados para: ". $_GET['buscador'] ." y ". $_GET['pais']. " y ".$_GET['fecha']. "</p>";
             $consulta = "SELECT * FROM fotos as f INNER JOIN paises as p WHERE
              '$Pais' = f.Pais  AND p.IdPais = '$Pais'  AND '$fechaFormateada'=f.Fecha AND '$Titulo' = f.Titulo ";
          
         }  
          elseif ((isset($_GET['buscador'])  && $_GET['buscador'] !="") &&(isset($_GET['fecha']) && $_GET['fecha'] !="") 
         ) {

            $fecha=  $_GET['fecha'];
            $Titulo =$_GET['buscador'];
            // Recuperar la consulta de búsqueda introducida por el usuario
            echo "<p> Resultados para: ". $_GET['buscador'] ." y ". $_GET['fecha']."</p>";
            $dateTime = new DateTime($fecha);
            $fechaFormateada = $dateTime->format('Y/m/d');
            $consulta = "SELECT * FROM fotos f, paises WHERE '$fechaFormateada'=f.Fecha AND '$Titulo' =f.Titulo AND paises.IdPais = f.pais";
            
         }
          elseif ((isset($_GET['buscador'])  && $_GET['buscador'] !="") &&(isset($_GET['pais']) && $_GET['pais'] !=7) ) {
            
               $Pais= $_GET['pais'];
               $Titulo =$_GET['buscador'];
               //Recuperar la consulta de búsqueda introducida por el usuario
               echo "<p> Resultados para: ". $_GET['buscador'] ." y ". $_GET['pais']."</p>";

               $consulta = "SELECT * FROM fotos as f,paises as p  WHERE '$Pais' = f.pais 
               AND '$Pais'= p.IdPais && '$Titulo' = f.Titulo"
               ;

            
         } 
         elseif ((isset($_GET['fecha'])  && $_GET['fecha'] !="") &&(isset($_GET['pais']) && $_GET['pais'] !=7) ) {
            
            $pais= $_GET['pais'];
            $fecha=  $_GET['fecha'];
            $dateTime = new DateTime($fecha);
            $fechaFormateada = $dateTime->format('Y/m/d');
            // Recuperar la consulta de búsqueda introducida por el usuario
            echo "<p> Resultados para: ". $_GET['fecha'] ." y ". $_GET['pais']."</p>";
            $consulta = "SELECT * FROM fotos as f INNER JOIN paises   WHERE  ($pais = f.pais AND $pais= paises.IdPais)
            AND '$fechaFormateada'=f.Fecha";
            
         } 
          elseif (isset($_GET['buscador'])  && $_GET['buscador'] !="" && isset($_GET['pais'])&& $_GET['pais'] ==7) {

            // Recuperar la consulta de búsqueda introducida por el usuario
            $consulta_busqueda = $_GET['buscador'];
            echo "<p>Resultados para: $consulta_busqueda</p>";
            
            $consulta = "SELECT * FROM fotos f, paises WHERE '$consulta_busqueda'=f.Titulo AND paises.IdPais = f.pais";
         }
         else if(isset($_GET['fecha']) && $_GET['fecha'] !="" && isset($_GET['pais'])&& $_GET['pais'] ==7){

            // Recuperar la consulta de búsqueda introducida por el usuario
            $fecha = $_GET['fecha'];
            echo "<p> Resultados para: $fecha </p>";
            $dateTime = new DateTime($fecha);
            $fechaFormateada = $dateTime->format('Y/m/d');
            $consulta = "SELECT * FROM fotos f, paises WHERE '$fechaFormateada'=f.fecha AND paises.IdPais = f.pais";

         }
         else if(isset($_GET['pais'])&& $_GET['pais'] !=7){

            // Recuperar la consulta de búsqueda introducida por el usuario
            $pais = $_GET['pais'];
            echo "<p> Resultados para: $pais </p>";
            $consulta = "SELECT * FROM fotos as f INNER JOIN paises   WHERE   $pais = f.pais AND $pais= paises.IdPais";
            
         }
         else if (isset($_GET['buscador'])  && $_GET['buscador'] !="" ) {

            // Recuperar la consulta de búsqueda introducida por el usuario
            $consulta_busqueda = $_GET['buscador'];
            echo "<p>Resultados para: $consulta_busqueda</p>";
            $consulta = "SELECT * FROM fotos f, paises WHERE '$consulta_busqueda'=f.Titulo AND paises.IdPais = f.pais";
         }

// -------------------------------------------------------------------------------------------------------------------------
       
           
            

               $result = $conn->query($consulta);
               
               // Verifica si la consulta fue exitosa y si hay filas
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
                   <a href="detalles_imagen.php?id=$idFoto[$i]">
                       <img src={$row["Fichero"]} alt={$row["Alternativo"]} class="roma">
                   </a>
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
           
            // for ($i = 1; $i <= 3; $i++) {
                
            //    if($i%2==0){
            //       if(isset($_COOKIE["usuario"]) ||isset($_SESSION["nombre"])){echo <<<hereDOC
            //          <article class="index">
            //          <a href="detalles_imagen.php?id=$i">
            //             <img src="https://live.staticflickr.com/65535/52270993783_05232b064c_n.jpg" alt="taj mahal" class="roma">
            //          </a>
            //          <p>Titulo: Taj Mahal</p>
            //          <p>Fecha: 23/09/2023</p> 
            //          <p>País: India</p>
            //          </article>
            //          hereDOC;
            //       }
                  
            //     else{echo <<<hereDOC
            //       <article class="index">
            //       <a href="error_de_login.html">
            //          <img src="https://live.staticflickr.com/65535/52270993783_05232b064c_n.jpg" alt="taj mahal" class="roma">
            //       </a>
            //       <p>Titulo: Taj Mahal</p>
            //       <p>Fecha: 23/09/2023</p> 
            //       <p>País: India</p>
            //       <p>País: holi</p>
            //       </article>
            //      hereDOC;}
               
            //    }else{
            //       if(isset($_COOKIE["usuario"]) ||isset($_SESSION["nombre"])){
            //          echo <<<hereDOC
            //      <article class="index">
            //      <a href="detalles_imagen.php?id=$i">
            //         <img src="https://live.staticflickr.com/65535/51453242037_68388eb25b_n.jpg" alt="taj mahal" class="roma"></a>
            //      <p>Titulo: Catedral de Santiago </p>
            //      <p>Fecha: 23/09/2023</p> 
            //      <p>País: España</p>
            //      </article>
            //     hereDOC;
            //       }else{
            //          echo <<<hereDOC
            //          <article class="index">
            //          <a href="error_de_login.html">
            //             <img src="https://live.staticflickr.com/65535/51453242037_68388eb25b_n.jpg" alt="taj mahal" class="roma"></a>
            //          <p>Titulo: Catedral de Santiago </p>
            //          <p>Fecha: 23/09/2023</p> 
            //          <p>País: España</p>
            //          </article>
            //         hereDOC;
            //       }
                
               
            //    }
                
            // }
            // echo '</div>';

            // echo '<div class="seccion">';
            // for ($i = 4; $i <= 6; $i++) {
                
            //    if($i%2==0){
            //       if(isset($_COOKIE["usuario"]) || isset($_SESSION["nombre"])){echo <<<hereDOC
            //          <article class="index">
            //          <a href="detalles_imagen.php?id=$i">
            //             <img src="https://live.staticflickr.com/65535/52270993783_05232b064c_n.jpg" alt="taj mahal" class="roma">
            //          </a>
            //          <p>Titulo: Taj Mahal</p>
            //          <p>Fecha: 23/09/2023</p> 
            //          <p>País: India</p>
            //          </article>
            //          hereDOC;
            //       }
                  
            //     else{echo <<<hereDOC
            //       <article class="index">
            //       <a href="error_de_login.html">
            //          <img src="https://live.staticflickr.com/65535/52270993783_05232b064c_n.jpg" alt="taj mahal" class="roma">
            //       </a>
            //       <p>Titulo: Taj Mahal</p>
            //       <p>Fecha: 23/09/2023</p> 
            //       <p>País: India</p>
            //       <p>País: holi</p>
            //       </article>
            //      hereDOC;
                 
            //    }

               
            //    }else{
            //       if(isset($_COOKIE["usuario"]) ||isset($_SESSION["nombre"])){
            //          echo <<<hereDOC
            //      <article class="index">
            //      <a href="detalles_imagen.php?id=$i">
            //         <img src="https://live.staticflickr.com/65535/51453242037_68388eb25b_n.jpg" alt="taj mahal" class="roma"></a>
            //      <p>Titulo: Catedral de Santiago </p>
            //      <p>Fecha: 23/09/2023</p> 
            //      <p>País: España</p>
            //      </article>
            //     hereDOC;
            //       }else{
            //          echo <<<hereDOC
            //          <article class="index">
            //          <a href="error_de_login.html">
            //             <img src="https://live.staticflickr.com/65535/51453242037_68388eb25b_n.jpg" alt="taj mahal" class="roma"></a>
            //          <p>Titulo: Catedral de Santiago </p>
            //          <p>Fecha: 23/09/2023</p> 
            //          <p>País: España</p>
            //          </article>
            //         hereDOC;
                    
            //       }
                
               
                  
            //    }
            // }
            // echo '</div>'; 
            
      //   if(isset($_GET['nombre'])) {
      //       // Recuperar la consulta de búsqueda introducida por el usuario
      //       $consulta_busqueda = $_GET['nombre'];

      //       // Mostrar la consulta de búsqueda del usuario
      //       echo <<<hereDOC
      //       <p>Resultados para: $consulta_busqueda</p>
      //      hereDOC;
      //       echo '<div class="seccion">';
      //       for ($i = 1; $i <= 3; $i++) {
                
      //          if($i%2==0){
      //             if(isset($_COOKIE["usuario"]) ||isset($_SESSION["nombre"])){echo <<<hereDOC
      //                <article class="index">
      //                <a href="detalles_imagen.php?id=$i">
      //                   <img src="https://live.staticflickr.com/65535/52270993783_05232b064c_n.jpg" alt="taj mahal" class="roma">
      //                </a>
      //                <p>Titulo: Taj Mahal</p>
      //                <p>Fecha: 23/09/2023</p> 
      //                <p>País: India</p>
      //                </article>
      //                hereDOC;
      //             }
                  
      //           else{echo <<<hereDOC
      //             <article class="index">
      //             <a href="error_de_login.html">
      //                <img src="https://live.staticflickr.com/65535/52270993783_05232b064c_n.jpg" alt="taj mahal" class="roma">
      //             </a>
      //             <p>Titulo: Taj Mahal</p>
      //             <p>Fecha: 23/09/2023</p> 
      //             <p>País: India</p>
      //             <p>País: holi</p>
      //             </article>
      //            hereDOC;}
               
      //          }else{
      //             if(isset($_COOKIE["usuario"]) ||isset($_SESSION["nombre"])){
      //                echo <<<hereDOC
      //            <article class="index">
      //            <a href="detalles_imagen.php?id=$i">
      //               <img src="https://live.staticflickr.com/65535/51453242037_68388eb25b_n.jpg" alt="taj mahal" class="roma"></a>
      //            <p>Titulo: Catedral de Santiago </p>
      //            <p>Fecha: 23/09/2023</p> 
      //            <p>País: España</p>
      //            </article>
      //           hereDOC;
      //             }else{
      //                echo <<<hereDOC
      //                <article class="index">
      //                <a href="error_de_login.html">
      //                   <img src="https://live.staticflickr.com/65535/51453242037_68388eb25b_n.jpg" alt="taj mahal" class="roma"></a>
      //                <p>Titulo: Catedral de Santiago </p>
      //                <p>Fecha: 23/09/2023</p> 
      //                <p>País: España</p>
      //                </article>
      //               hereDOC;
      //             }
                
               
      //          }
                
      //       }
      //       echo '</div>';
      //       echo '<div class="seccion">';
      //       for ($i = 4; $i <= 6; $i++) {
                
      //          if($i%2==0){
      //             if(isset($_COOKIE["usuario"]) ||isset($_SESSION["nombre"])){echo <<<hereDOC
      //                <article class="index">
      //                <a href="detalles_imagen.php?id=$i">
      //                   <img src="https://live.staticflickr.com/65535/52270993783_05232b064c_n.jpg" alt="taj mahal" class="roma">
      //                </a>
      //                <p>Titulo: Taj Mahal</p>
      //                <p>Fecha: 23/09/2023</p> 
      //                <p>País: India</p>
      //                </article>
      //                hereDOC;
      //             }
                  
      //           else{echo <<<hereDOC
      //             <article class="index">
      //             <a href="error_de_login.html">
      //                <img src="https://live.staticflickr.com/65535/52270993783_05232b064c_n.jpg" alt="taj mahal" class="roma">
      //             </a>
      //             <p>Titulo: Taj Mahal</p>
      //             <p>Fecha: 23/09/2023</p> 
      //             <p>País: India</p>
      //             <p>País: holi</p>
      //             </article>
      //            hereDOC;}
               
      //          }else{
      //             if(isset($_COOKIE["usuario"]) ||isset($_SESSION["nombre"])){
      //                echo <<<hereDOC
      //            <article class="index">
      //            <a href="detalles_imagen.php?id=$i">
      //               <img src="https://live.staticflickr.com/65535/51453242037_68388eb25b_n.jpg" alt="taj mahal" class="roma"></a>
      //            <p>Titulo: Catedral de Santiago </p>
      //            <p>Fecha: 23/09/2023</p> 
      //            <p>País: España</p>
      //            </article>
      //           hereDOC;
      //             }else{
      //                echo <<<hereDOC
      //                <article class="index">
      //                <a href="error_de_login.html">
      //                   <img src="https://live.staticflickr.com/65535/51453242037_68388eb25b_n.jpg" alt="taj mahal" class="roma"></a>
      //                <p>Titulo: Catedral de Santiago </p>
      //                <p>Fecha: 23/09/2023</p> 
      //                <p>País: España</p>
      //                </article>
      //               hereDOC;
      //             }
                
               
      //          }
                
      //       }
      //       echo '</div>';}
            
        
        ?>
    </main>
    
</body>
</html>
