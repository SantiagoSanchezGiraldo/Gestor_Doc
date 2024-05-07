<?php
    include "Database/db.php";

    if(empty($_FILES["archivo"]["tmp_name"])){
        echo "<script>
                alert('Porfavor llenar todos los campos')
            </script>";
        header("refresh: 0.2; url = verify.html");
    }else{
        $ruta = $_FILES["archivo"]["tmp_name"];
        $hashed = md5_file($ruta);

        $consulta = mysqli_query($conexion, "SELECT hasheado FROM documentos where hasheado = '$hashed'");
        if($dato = mysqli_fetch_assoc($consulta)){
            echo "<script>
                    alert('Este documento esta en nuestra base de datos')
                </script>";
            header("refresh: 0.2; url = verify.html");
        }else{
            echo "<script>
                    alert('Este documento no esta en nuestra base de datos')
                </script>";
            header("refresh: 0.2; url = verify.html");
        }
    }
?>