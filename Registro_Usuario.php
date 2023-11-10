<!--mostrar toda la información ordenada-->
<!-- Registro de usuario-->

<!--truquele to wapo: poner ! y enter/tabulador-->

<!--no usar align, eso se usa en CSS-->
<!--no usar br-->
<!--html validator de w3c-->
<!--Web developer extensión-->
<!DOCTYPE html>
<?php

include "Header.php";

?>
<body>
    <main>
        <h1>Registro nuevo usuario</h1>
        <div class="formRegistro">
            <h3>Introduzca los datos</h3>
            <div class="contentFormRegistro">
                <form action="respuesta_Registro_Usuario.php" method="post" >
                    
                    <div>
                        <!-- div es un contenedor que sirve para poner de manera más ordenada el formulario que queremos crear-->
                        <p><label>Nombre:</label><br>
                        <input type="text" name="nombre" id="nombre" class="estiloform"></p>
                    </div>
            
                    <div>
                        <p><label>Contraseña:</label><br>
                        <input type="text" name="pass" id="pass" class="estiloform"></p>
                    </div>
            
                    
                    <div>
                        <p><label>Repetir contraseña:</label><br>
                        <input type="text" name="Rpass" id="Rpass" class="estiloform"></p>
                    </div>
                    
                    
                    <div>
                        <p><label>Email:</label><br>
                        <input type="text" name="email" id="email" class="estiloform"></p>
                    </div>
                    
            
                    <div>
                        <p><label>Sexo:</label><br>
                            
                            <select name="sexo" id="sexo" class="estiloform">
                                <option value="Non">No responder</option>
                                <option value="Hombre">Hombre</option>
                                <option value="Mujer">Mujer</option>       
                            </select>
                        </p>
                    </div>
        
                    <div>
                        <p>
                        <label>Fecha de nacimiento:</label><br>
                        <input type="text" name="fecha" id="fecha" class="estiloform"></p>
                    </div>
                        
                    <div>
                        <p>
                        <label>Ciudad:</label><br>
                        <input type="text" name="ciudad" id="ciudad" class="estiloform">
                        </p>
                    </div>
                    
                    <div>
                        <p>
                        <label>País:</label><br>
                        <input type="text" name="pais" id="pais" class="estiloform">
                        </p>
                    </div>
                    
                    <br>
                    <p><input type="submit" id="botonBuscar" value="Registrarse"></p> 
            
                </form>
            </div>
        </div>
        
    </main>
</body>
</html>