<?php
include "Database/db.php";

$id =  $_GET['id'];

$consulta = "SELECT * FROM documentos WHERE id = '$id'";
$result = mysqli_query($conexion, $consulta);

if(mysqli_num_rows($result) == 1){
    $fila = mysqli_fetch_assoc($result);
    $archivo = $fila['doc'];
    $rutaArchivo = "subidos/" . $archivo;
    if(file_exists($rutaArchivo)){
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename= "' . $archivo .'"');
    }else{
        echo "<script>
                alert('Este documento no esta en nuestro servidor')
            </script>";
        header("refresh: 0.2; url = docShow.php");
    }
}else{
    echo "<script>
                alert('Este documento no esta en nuestra base de datos)
            </script>";
        header("refresh: 0.2; url = docShow.php");
}

?>