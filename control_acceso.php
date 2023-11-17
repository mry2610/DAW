<?php

    session_start();

    //Array con las cuentas
    $cuentas = array(
        array("name" => "Usuario1", "contra" => "123", "estilo"=>"PI.css"),
        array("name" => "Usuario2", "contra" => "456", "estilo"=>"PI(ModoOscuro).css"),
        array("name" => "Usuario3", "contra" => "789", "estilo"=>"PI(LetraGrande).css"),
        array("name" => "Usuario4", "contra" => "mondongo", "estilo"=>"PI(AltoContraste).css")
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
                $Estilo = $cuentas[$i]['estilo'];
                $Encontrado = true;
                break;
            }
        }

        if ($Encontrado == false) {
            //Volvemos con el argumento de error
            header('Location: Login.php?error=1');
        }
        else {

            $_SESSION["nombre"]=$Nombre;
            $_SESSION["pass"]=$Pass;
            $_SESSION["ultima_Conexion"] = date("Y-m-d H:i:s");
            $_SESSION["estilos"] = $Estilo;


            if(isset($_POST["recordar"])==1) {//si nos pide recordar la la cuenta
                setcookie("usuario", $Nombre, time() +(90 * 24 * 60 * 60));
                setcookie("pass", $Pass, time() +(90 * 24 * 60 * 60));
                setcookie("estilo", $Estilo, time() +(90 * 24 * 60 * 60));
                setcookie("hora_cierre",date("Y-m-d H:i:s"), time() +(90 * 24 * 60 * 60));
                
            }
            else{
                //session_destroy();
                setcookie("usuario", $Nombre, time() -3600);
                setcookie("pass", $Pass, time() -3600);
                setcookie("estilo", $Estilo, time() -3600);
                setcookie("hora_cierre", date("Y-m-d H:i:s"), time() -3600);

            }
            header('Location: index.php');
        }
    }else {
        //Volvemos con el argumento de error
        header('Location: Login.php?error=1');
    }

    
