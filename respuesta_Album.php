<!DOCTYPE html>
<?php

session_start();
if(!isset($_COOKIE["usuario"]) && !isset($_SESSION["nombre"])){
    header('Location: index.php');
}
include "Header_Log.php";

?>
<body>

    <main>
        <div class="formRegistro">
            <h3>Album solicitado con éxito</h3>
            <div class="contentFormRegistro">
                <?php
                $titulo=$_POST["titulo"];
                $adicion=$_POST["texto"];
                $dpi=$_POST["res"];
                $color;
                $pagina=7;
                $imagenes=21;
                $precio=0;
                
                for($i=1;$i<=$pagina;$i++){
                    if($i<5){
                        $precio=$precio+0.1;
                    }
                    else if($i<12){
                        $precio=$precio+ 0.08;
                    }
                    else {
                        $precio=$precio+ 0.07;
                    }
                }
                

                if(isset($_POST["impresion"])==1){
                    $color=0.05;
                }
                else{
                    $color= 0;
                }

                if($dpi>=450){
                    $resolucion=0.02;
                }
                else{
                    $resolucion= 0;
                }

                $precio= $precio + ($imagenes*$resolucion) + ($imagenes*$color);



                echo <<<HEREDOC

                <p>Titulo: $titulo</p>
                <p>Texto adicional: $adicion</p>
                <p>Número de copias: 3</p>
                <p>Color de la portada: Rojo</p>
                <p>DPI:$dpi</p>
                <p>Páginas: $pagina</p>
                <p>Precio: $precio €</p>


                HEREDOC;
                ?>
            </div>
        </div>

    </main>

    <?php

include "footer.php";

?>
    
</body>
</html>