<?php
    //Array con las cuentas
    $cuentas = array(
        array("name" => "Usuario1", "contra" => "123"),
        array("name" => "Usuario2", "contra" => "456"),
        array("name" => "Usuario3", "contra" => "789"),
        array("name" => "Usuario4", "contra" => "mondongo")
    );

    //Compruebo que existen los argumentos
    if((isset($_POST["nombre"])) && (isset($_POST["pass"]))) {
        $Nombre = $_POST["nombre"];
        $Pass = $_POST["pass"];

        //Compruebo que la contraseña cumpla los requisitos
        if ((trim($Nombre) == "") || (trim($Pass) == "")) {
            //Volvemos con el argumento de error
            header('Location: Login.php?error=1');
        }

        //Ahora compruebo si es una cuenta registrada
        $Encontrado = false;
        for ($i = 0; $i < count($cuentas); ++$i) {
            if (($cuentas[$i]['name'] == $Nombre) && ($cuentas[$i]['contra'] == $Pass)) {
                $Encontrado = true;
                break;
            }
        }

        if ($Encontrado == false) {
            //Volvemos con el argumento de error
            header('Location: Login.php?error=1');
        }
        else {
            header('Location: Mi_perfil.php');
        }
    }else {
        //Volvemos con el argumento de error
        header('Location: Login.php?error=1');
    }
