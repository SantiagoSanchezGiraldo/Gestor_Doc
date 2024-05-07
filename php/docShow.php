<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visualizacion</title>
    <link rel="stylesheet" href="styles/styles.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poetsen+One&display=swap" rel="stylesheet">
</head>
<body>
    <div class="volver">
        <a href="../index.html">
            <img src="styles/asets/home.svg" alt="">
        </a>
    </div>
    <div class="contained">
        <img src="styles/asets/doc.svg" alt="">
        <?php
            include "Database/db.php";
            $consulta = mysqli_query($conexion, "SELECT * FROM documentos");
            while($fila = mysqli_fetch_assoc($consulta)):
        ?>
        <div class="show">
            <div class="text">
                <h2>Nombre: </h2>
                <p><?php echo $fila['nombre']; ?> </p>
            </div>
            <div class="text">
                <h2>Descripcion: </h2>
                <p><?php echo $fila['descripcion']; ?> </p>
            </div>
            <div class="text">
                <h2>Documento: </h2>
                <p><?php echo $fila['doc']; ?></p>
            </div>
            <div class="text">
                <h2>Fecha: </h2>
                <p><?php echo $fila['fecha']; ?></p>
            </div>
        </div>
        <?php endwhile; ?>
    </div>
</body>
</html>