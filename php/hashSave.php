<?php
    include 'Database/db.php';

    $nombre = $_POST['nombreA'];
    $descripcion = $_POST['descripcionA'];

    $clave = $_POST['clave'];

    if($clave == "admin"){
        if(empty($_POST['nombreA']) and empty($_POST['descripcionA'])){
            echo "<script>
                    alert('Porfavor llenar todos los campos')
                </script>";
                header("refresh: 0.2; url = hash.html");
        }else{
            if(empty($_FILES["archivo"]["tmp_name"])){
                echo "<script>
                    alert('Porfavor seleciona un archivo para guardar')
                </script>";
                header("refresh: 0.2; url = hash.html");
            }else{
                $ruta = $_FILES["archivo"]["tmp_name"];
                $hasheado = md5_file($ruta);
                
                $directorio = "subidos/";
                $archivoN = basename($_FILES["archivo"]["name"]);
                $archivoD = $directorio . $archivoN;
    
                $tipoArchivo = strtolower(pathinfo($archivoD, PATHINFO_EXTENSION));
                
                if($tipoArchivo == "pdf" || $tipoArchivo == "doc" || $tipoArchivo == "docx"){
                    if(move_uploaded_file($_FILES["archivo"]["tmp_name"], $archivoD)){
                        $sql = "INSERT INTO documentos (nombre, descripcion, doc, hasheado) VALUES ('$nombre','$descripcion', '$archivoN', '$hasheado')";
                        $resultado = mysqli_query($conexion, $sql);
                        if($resultado){
                            echo "<script>
                                    alert('Se ha guardado exitosamente su documento')
                                </script>";
                            header("refresh: 0.2; url = hash.html");
                        }else{
                            echo "<script>
                                    alert('Hubo un error al guardar')
                                </script>";
                            header("refresh: 0.2; url = hash.html");
                        }
                    }else{
                        echo "<script>
                                alert('Se produjo un error al cargar el archivo')
                            </script>";
                        header("refresh: 0.2; url = hash.html");
                    }
                }else{
                    echo "<script>
                        alert('Selecione un archivo tipo doc o pdf')
                    </script>";
                header("refresh: 0.2; url = hash.html");
                }
            }
        }
    }else{
        echo "<script>
                alert('Clave equivocada')
            </script>";
        header("refresh: 0.2; url = hash.html");
    }

?>