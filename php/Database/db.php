<?php
    $host = "localhost";
    $user = "root";
    $password = "";
    $database = "gestordocs";

    $conexion = mysqli_connect($host, $user, $password, $database);

    if(!$conexion){
        echo "No se realizo la conexion a la base de datos, tipo de error:";
        mysqli_connect_error();
    }

?>