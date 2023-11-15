<?php

    session_start();

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
            if(isset($_POST["recordar"])==1) {//si nos pide recordar la la cuenta
                setcookie("usuario", $Nombre, time() +(90 * 24 * 60 * 60));
                setcookie("hora_cierre",date("Y-m-d H:i:s"), 0);
                $_SESSION["ultima_Conexion"] = $_COOKIE["hora_cierre"];
                $_SESSION["nombre"]=$_COOKIE["usuario"];
            }
            else{
                //session_destroy();
                setcookie("usuario", $Nombre, time() -3600);
                $_SESSION["ultima_Conexion"] = date("Y-m-d H:i:s");
                $_SESSION["nombre"]=$Nombre;

            }
            header('Location: Pagina_Principal_Logeado.php');
        }
    }else {
        //Volvemos con el argumento de error
        header('Location: Login.php?error=1');
    }

    
