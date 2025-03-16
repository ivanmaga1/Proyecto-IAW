<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Alquilar un libro
    $usuario = $_POST['usuario'];
    $titulo = $_POST['titulo'];

    // Conexión a la base de datos
    $conexion = new mysqli('localhost', 'root', '', 'catalogo');
    if ($conexion->connect_error) {
        die("Conexión fallida: " . $conexion->connect_error);
    }

    // Actualizar la cantidad de libros en alquiler
    $sqlAlquiler = "UPDATE libro_aluguer SET cantidade = cantidade - 1 WHERE titulo = '$titulo'";
    $conexion->query($sqlAlquiler);

    // Registrar el libro alquilado en la tabla libro_alugado
    $sqlInsertAlugado = "INSERT INTO libro_alugado (titulo, usuario) VALUES ('$titulo', '$usuario')";
    $conexion->query($sqlInsertAlugado);

    echo "Libro alquilado correctamente.";

    $conexion->close();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alquilar un libro</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <h1>Alquilar un Libro o Cómic</h1>
    <form action="alquilar.php" method="POST">
        <label for="usuario">Usuario:</label>
        <input type="text" name="usuario" required><br>

        <label for="titulo">Título del libro:</label>
        <input type="text" name="titulo" required><br>

        <button type="submit">Alquilar</button>
    </form>
</body>
</html>
