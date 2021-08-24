<?php
    header("Access-Control-Allow-Origin: *");
    $correo = $_REQUEST["correoM"];
    $mensaje = $_REQUEST["mensajeM"];

    require("conexion.php");
    $sql = "INSERT INTO tblMensajes VALUES ('$correo', '$mensaje', NOW())"; 

    mysqli_query($conexion, $sql);
    mysqli_close($conexion);

    echo "Registrado";
?>