<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Obtener los datos del formulario
    $usuario = $_POST['usuario'];
    $contrasinal = $_POST['contrasinal'];
    $nombre = $_POST['nombre'];
    $direccion = $_POST['direccion'];
    $telefono = $_POST['telefono'];
    $nifdni = $_POST['nifdni'];

    // Conexión a la base de datos
    $conexion = new mysqli('localhost', 'root', '', 'catalogo');
    if ($conexion->connect_error) {
        die("Conexión fallida: " . $conexion->connect_error);
    }

    // Insertar los datos en la tabla nuevo_rexistro
    $sql = "INSERT INTO nuevo_rexistro (usuario, contrasinal, nombre, direccion, telefono, nifdni) 
            VALUES ('$usuario', '$contrasinal', '$nombre', '$direccion', '$telefono', '$nifdni')";

    if ($conexion->query($sql) === TRUE) {
        echo "Registro exitoso, por favor inicie sesión.";
    } else {
        echo "Error: " . $sql . "<br>" . $conexion->error;
    }

    $conexion->close();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de usuario</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <h1>Formulario de Registro</h1>
    <form action="registro.php" method="POST">
        <label for="usuario">Usuario:</label>
        <input type="text" name="usuario" id="usuario" required><br>

        <label for="contrasinal">Contraseña:</label>
        <input type="password" name="contrasinal" id="contrasinal" required><br>

        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" id="nombre" required><br>

        <label for="direccion">Dirección:</label>
        <input type="text" name="direccion" id="direccion" required><br>

        <label for="telefono">Teléfono:</label>
        <input type="text" name="telefono" id="telefono" required><br>

        <label for="nifdni">NIF/DNI:</label>
        <input type="text" name="nifdni" id="nifdni" required><br>

        <button type="submit">Registrar</button>
    </form>
</body>
</html>
