
<?php

function limpiarNombre($nombre) {
    $nombre = trim($nombre);
    $nombre = str_replace(" ", "", $nombre);
    return $nombre;
}

function convertirMinusculas($texto) {
    return strtolower($texto);
}

function obtenerInstitucion($institucion) {
    $institucion = trim($institucion);
    return strtolower(substr($institucion, 0, 2));
}

function obtenerAnio($anio) {
    return substr($anio, 2, 2);
}

function generarUsuario($nombre, $institucion, $anio) {
    $nombre = limpiarNombre($nombre);
    $nombre = convertirMinusculas($nombre);

    $institucion = obtenerInstitucion($institucion);
    $anio = obtenerAnio($anio);

    return $nombre . $institucion . $anio;
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Generador de usuarios</title>
</head>
<body style="background-color: #bccff9; font-family: Arial; text-align: center;">

    <h1>Generador de nombres de usuario</h1>

    <form method="POST">

        <p>Nombre completo:</p>
        <input type="text" name="nombre" required>

        <p>Institucion educativa:</p>
        <input type="text" name="institucion" required>

        <p>Año de ingreso:</p>
        <input type="number" name="anio" required>

        <br><br>
        <input type="submit" value="Generar usuario">

    </form>

    <?php
    if (isset($_POST["nombre"]) && isset($_POST["institucion"]) && isset($_POST["anio"])) {

        $nombre = $_POST["nombre"];
        $institucion = $_POST["institucion"];
        $anio = $_POST["anio"];

        $usuario = generarUsuario($nombre, $institucion, $anio);

        echo "<h2>Tu nombre de usuario es:</h2>";
        echo "<h3>" . $usuario . "</h3>";
    }
    ?>

    <br>
    <a href="index.php">Regresar al menu</a>

</body>
</html>
