
<?php

function obtenerIniciales($nombre) {
    $nombre = trim($nombre);
    $iniciales = substr($nombre, 0, 3);
    return strtoupper($iniciales);
}

function obtenerAnio($fecha) {
    return substr($fecha, 2, 2);
}

function obtenerMesDia($fecha) {
    return substr($fecha, 5, 5);
}

function generarClave($nombre, $fecha) {
    $iniciales = obtenerIniciales($nombre);

    $anio = obtenerAnio($fecha);

    $mesDia = obtenerMesDia($fecha);

    return $iniciales . $anio . str_replace("-", "", $mesDia);
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Generador de claves</title>
</head>
<body style="background-color: #fab7e2; font-family: Arial; text-align: center;">

    <h1>Generador de claves</h1>

    <form method="POST">
        <p>Nombre completo:</p>
        <input type="text" name="nombre" required>

        <p>Fecha de nacimiento:</p>
        <input type="date" name="fecha" required>

        <br><br>
        <input type="submit" value="Generar clave">
    </form>

    <?php
    if (isset($_POST["nombre"]) && isset($_POST["fecha"])) {

        $nombre = $_POST["nombre"];
        $fecha = $_POST["fecha"];

        $clave = generarClave($nombre, $fecha);

        echo "<h2>Tu clave es: " . $clave . "</h2>";
    }
    ?>

    <br>
    <a href="index.php">Regresar al menu</a>

</body>
</html>
