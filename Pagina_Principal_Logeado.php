<!--Pagina principal-->
<!DOCTYPE html>
<?php

include "Header_Log.php";

?>
<body>

    <!--Ultimas 5 imagenes-->
    <main>  
        <?php
         echo '<div class="inicio">';
            for ($i = 0; $i <= 4; $i++) {
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
                        <p>Título: Resultado   $i  </p>
                        <p>Fecha: 23/09/2023</p>
                        <p>País: Ejemplo</p>
                        </article>
                        hereDOC;
                    
                    }
            }
            echo '</div>';
        ?>
       
    </main>

    <?php

include "footer.php";

?>
</body>
</html>
