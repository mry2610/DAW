<div class="solicitudAlb">
        <div class="contentForm">
            <form action="respuesta_datos.php" class="solicitudForm" method="post">

                <div>
                    <p><label for="nomUsuario">Nombre de Usuario:</label><br> 
                    <input type="text" name="nomUsuario"  class="estiloform" ></p>                        
                </div>

                <div>
                    <p><label for="email">Email:</label>
                    <input type="text" name="email" class="estiloform"></p><br>
                </div>

                <div>
                <p><label for="sexo">Sexo:</label>
                    <select name="sexo" class="estiloform">
                    <option value="1">Masculino</option>
                    <option value="0">Femenino</option>
                    <option value="2">No Responder</option>
                    </select></p><br>
                </div>

                <div>
                    <p><label for="fNacimiento">Fecha de Nacimiento:</label>
                    <input type="date" name="fNacimiento"  class="estiloform"></p><br>
                </div>

                <div>
                    <p><label for="ciudad">Ciudad:</label>
                    <input type="text" name="ciudad" class="estiloform"></p><br>
                </div>

                <div>
                    <p><label for="pais">País:</label>
                    <select name="pais" class="estiloform">
                    <?php
                        // Obtener la lista de países desde la tabla Paises
                        $query = "SELECT * FROM Paises";
                        $result = mysqli_query($id,$query);

                        // Mostrar los países en la lista desplegable
                        while ($row = $result->fetch_assoc()) {
                            echo "<option value='" . $row['IdPais'] . "'>" . $row['NomPais'] . "</option>";
                        }
                    ?>
                    </select></p><br>
                </div>

                <div>
                    <p><label for="foto">Foto (URL):</label>
                    <input type="text" name="foto" class="estiloform"></p><br>
                </div>



                <div>
                    <p><label for="estilo">Estilo:</label>
                    <select name="estilo" class="estiloform">
                    <?php
                        // Obtener la lista de países desde la tabla Estilos
                        $query = "SELECT * FROM estilos";
                        $result = mysqli_query($id,$query);

                        // Mostrar los países en la lista desplegable
                        while ($row = $result->fetch_assoc()) {
                            echo "<option value='" . $row['IdEstilo'] . "'>" . $row['Nombre'] . "</option>";
                        }
                    ?>
                    </select></p><br> 
                </div>



