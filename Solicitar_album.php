<!DOCTYPE html>
<?php
session_start();
include "Header_Log.php";

?>
<body>
    <main>
        <h2>Elige las carcterísticas y precio para tu album</h2>
        <div class="solicitudAlb">
            <h3>Datos del album</h3>
            <div class="tarifinhas">
                <h3>Tarifas</h3>
            </div>
            
        </div>
        
        <div class="solicitudAlb">
            <div class="contentForm">

            
                <form action="respuesta_Album.php" id="solForm" class="solicitudForm" method="post">
                    
                    <div>
                        <!-- div es un contenedor que sirve para poner de manera más ordenada el formulario que queremos crear-->
                        <p><label>Nombre:</label>
                        <input type="text" name="nombre" id="nombre" class="estiloform"></p>
                    </div>
            
                    <div>
                        <p><label>Título del album:</label>
                        <input type="text" name="titulo" id="titulo" class="estiloform"></p>
                    </div>
                    
                    <div>
                        <p><label>Texto adicional:</label>
                        <input type="text" name="texto" id="texto" class="estiloform"></p>
                    </div>
        
                    <div>
                        <p><label>Correo electrónico:</label>
                        <input type="text" name="email" id="lemail" class="estiloform"></p>
                    </div>
                    
                    <div>
                        <p><label>Dirección:</label>
                        <input type="text" name="direccion" id="direccion" class="estiloform"></p>
                    </div>
        
                    <div>
                        <p><label>Teléfono:</label>
                        <input type="text" name="telefono" id="telefono" class="estiloform"></p>
                    </div>
        
                    <div>
                        <p><label>Color de portada:</label>
                        <input type="text" name="color" id="color" class="estiloform"></p>
                    </div>
        
                    <div>
                        <p><label>Número de copias:</label>
                        <input type="text" name="numero" id="numero" class="estiloform"></p>
                    </div>
        
                    <div>
                        <p><label>Resolución:</label>
                            <select name="res" id="res" class="estiloform">
                                <option value="150">150 dpi</option>
                                <option value="300">300 dpi</option>
                                <option value="450">450 dpi</option>
                                <option value="600">600 dpi</option>
                                <option value="750">750 dpi</option>
                                <option value="900">900 dpi</option>
                            </select>

                        </p>
                    </div>
        
                    <div>
                        <p>
                            <label>Album:</label>
                            <input type="text" name="album" id="album" class="estiloform">
                        </p>
                    </div>
        
                    <div>
                        <p>
                            <label>Fecha de recepción</label>
                            <input type="text" name="fechaRe" id="fechaRe" class="estiloform">
                        </p>
                    </div>
        
                    <div>
                        <p>
                            <label>Impresión a color:</label>
                            <input type="checkbox" name="impresion" id="impresion" class="estiloform">
                        </p>
                    </div>
                    
                    <br>
                    <p><button type="submit" id="solicitar">Solicitar album</button></p>
            
                </form>
            </div>

            <div id="tarifas">
                <table class="tablaSol">
                    <tr>
                        <th>Title</th>
                        <th>Price</th>
                    </tr>
                    <tr>
                        <th> &lt; 5 páginas</th>
                        <th> 0.10€ por pág.</th>
                    </tr>
                    <tr>
                        <th> entre 5 y 11 páginas</th>
                        <th> 0.08€ por pág.</th>
                    </tr>
                    <tr>
                        <th> &gt; 11 páginas </th>
                        <th> 0.07€ por pág.</th>
                    </tr>
                    <tr>
                        <th> Blanco y negro </th>
                        <th> 0€ </th>
                    </tr>
                    <tr>
                        <th> Color</th>
                        <th> 0.05€ por foto</th>
                    </tr>
                    <tr>
                        <th> Resolución &gt; 300 dpi</th>
                        <th> 0.02€ por foto</th>
                    </tr>
                </table>


                <?php
                echo <<<HEREDOC
                <table class="tablaSol">
                    <thead>
                        <tr>
                            <th colspan="2"></th>
                            <th colspan="2">Blanco y negro</th>
                            <th colspan="2">Color</th>
                        </tr> 
                        <tr class="active-row">
                            <th>Número de páginas</th>
                            <th>Número de fotos</th>
                            <th>150-300 dpi</th>
                            <th>450-900 dpi</th>
                            <th>150-300 dpi</th>
                            <th>450-900 dpi</th>
                        </tr> 
                    </thead>
                    <tbody>
                HEREDOC;
                    //una vez creada la tabla con sus primeras filas estaticas, creamos el resto y lo rellenamos
                    $precio=0;
                    for($i=1;$i<16;$i++){//filas
                        echo"<tr>";
                        if($i<5){
                            $precio=$precio+0.1;
                        }
                        else if($i<12){
                            $precio=$precio+ 0.08;
                        }
                        else {
                            $precio=$precio+ 0.07;
                        }
                        
                        for($j=1;$j<7;$j++){//columnas
                            echo "<td>";
                            if($j==1){
                                $num=$i;
                            }
                            else if($j==2){
                                $num=$i*3;
                            }
                            else if($j==3){
                                $num=$precio;
                            }
                            else if($j== 4){
                                $num=number_format($precio+($i*3*0.02),2);
                            }
                            else if($j== 5){
                                $num=number_format($precio+($i*3*0.05),2);
                            }
                            else{
                                $num=number_format($precio+($i*3*0.02)+($i*3*0.05),2);
                            }
                            echo $num."</td>";
                        }
                        echo"</tr>";
                    }
                    ?>
                    </tbody>
                </table>
            </div>  
        </div>
        
    </main>
    <?php

include "footer.php";

?>  
    
    
</body>
</html>