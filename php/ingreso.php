<?php
    header("Access-Control-Allow-Origin: *");
    $correo = $_REQUEST["correoI"];
    $contrasena = $_REQUEST["contrasenaI"];

    $sql = "SELECT * FROM tblUsuario WHERE usu_correo = '$correo'";
    
    require("conexion.php");

    $resultado = mysqli_query($conexion, $sql);

    if($registro = mysqli_fetch_assoc($resultado)) {
        if (password_verify($contrasena, $registro["usu_contrasena"])) {
            $retorno = array("correo" => $registro["usu_correo"],
                             "nombre" => $registro["usu_nombre"]);
            
        } 
        else{        
        $retorno = array("fallo" => "contrasena");
        }
    }
    else {
        $retorno = array("fallo" => "usuario");
    }

    mysqli_close($conexion);
    header('Content-type: application/json');
    echo json_encode($retorno);
?>