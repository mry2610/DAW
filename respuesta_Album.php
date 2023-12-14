<!DOCTYPE html>
<?php
$tituloPagina= "Respuesta de album";
include "Header.php";

if(!isset($_COOKIE["usuario"]) && !isset($_SESSION["nombre"])){
    header('Location: index.php');
}

?>


    <main>
        <div class="formRegistro">
            <h3>Album solicitado con éxito</h3>
            <div class="contentFormRegistro">
                <?php
                $idUser=$_SESSION["idUser"];
                $album=$_POST["album"];
                $result = mysqli_query($id, "SELECT * FROM fotos as f
                    INNER JOIN albumes as a ON f.Album = a.IdAlbum
                    INNER JOIN paises as p ON f.pais = p.IdPais
                    INNER JOIN Usuarios as u ON a.Usuario = u.IdUsuario
                    WHERE a.IdAlbum = '$album' AND u.IdUsuario = '$idUser'");
                $Nombre=$_POST["nombre"];
                $titulo=$_POST["titulo"];
                $adicion=$_POST["texto"];
                $email=$_POST["email"];
                $direccion=$_POST["direccion"];
                $colorPortada=$_POST["color"];
                $copias=$_POST["numero"];
                $dpi=$_POST["res"];
                $fechaRe=$_POST["fechaRe"];
                $AColor=$_POST["impresion"];
                $FRegistro=date('Y-m-d H:i:s');

                $fotos=mysqli_num_rows($result);
                $pagina=ceil($fotos/3);
                $imagenes=$pagina*3;
                $precio=0;
                $color;
                
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
                $precio=$precio*$copias;



                echo <<<HEREDOC

                <p>Titulo: $titulo</p>
                <p>Texto adicional: $adicion</p>
                <p>Número de copias: $copias</p>
                <p>Color de la portada: $colorPortada</p>
                <p>DPI:$dpi</p>
                <p>Páginas: $pagina</p>
                <p>Precio: $precio €</p>
                <p>fotos: $fotos</p>

                HEREDOC;

                mysqli_query($id,"INSERT INTO solicitudes (Album, Nombre, Titulo, Descripcion, Email, Direccion, Color, Copias, Resolucion, Fecha, IColor, FRegistro, Coste) 
                VALUES('$album', '$Nombre', '$titulo', '$adicion', '$email', '$direccion', '$colorPortada', '$copias', '$dpi', '$fechaRe', '$AColor', '$FRegistro', '$precio')");
                ?>
            </div>
        </div>

    </main>

    <?php

include "footer.php";

?>
    
</body>
</html>