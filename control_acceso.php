<?php

    session_start();

    //Conectamos la base de datos
    $id = @mysqli_connect("", "root", "", "pibd");//se conecta a la BD
    if(mysqli_connect_errno() != 0){
        echo mysqli_connect_error();
        exit;
    }

    $result = mysqli_query($id, "SELECT * FROM usuarios, estilos where Estilo=IdEstilo");
    if(mysqli_connect_errno() != 0){
        echo mysqli_connect_error();
        exit;
    }
    

    
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

        

        while($row = mysqli_fetch_array($result)){
            if($row['NomUsuario']==$Nombre && $row['Clave']==$Pass){
                $Encontrado=true;

                $Estilo=$row['Fichero'];//Tocar el tema del estilo
                $Id =$row['IdUsuario'];
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
            $_SESSION["Id"]= $Id;


            if(isset($_POST["recordar"])==1) {//si nos pide recordar la la cuenta
                setcookie("id",$Id, time() +(90 * 24 * 60 * 60));
                setcookie("usuario", $Nombre, time() +(90 * 24 * 60 * 60));
                setcookie("pass", $Pass, time() +(90 * 24 * 60 * 60));
                setcookie("estilo", $Estilo, time() +(90 * 24 * 60 * 60));
                setcookie("hora_cierre",date("Y-m-d H:i:s"), time() +(90 * 24 * 60 * 60));
                
            }
            else{
                //session_destroy();
                setcookie("id",$Id,  time() -3600);
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

    
