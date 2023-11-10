<!DOCTYPE html>

<?php

include "Header_Log.php";

?>

<body>
    <main>
        <h1>Mi perfil</h1>
        
        <h3>Mis albumes:</h3>
        <div class="seccion">
            <article><img src="album_1.jpg" alt="logotipo" class="perfil_album" ></article>
            <article> <img src="album_2.jpg" alt="logotipo"  class="perfil_album" ></article>
        
        
            <article> <img src="album_3.jpg" alt="logotipo"  class="perfil_album" ></article>
            <article><img src="album_4.jpg" alt="logotipo"  class="perfil_album" ></article>
        </div>
        <div class="seccion">
            <div class="botonesperfil"> 
                <a href='crearAlbum.php' class="navegadores">crear Album</a>
                <a href='Solicitar_album.php' class="navegadores">Solicitar album</a>
                <a href="DadoBaja.html" class="navegadores">Darme de baja</a>
                <a href='Pagina_Principal_Logeado.php' class="navegadores">Salir</a>
            </div>
        </div>
       
    </main>
    <?php

include "footer.php";

?>
</body>
</html>