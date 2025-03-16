<?php
// Conexión a la base de datos
$conexion = new mysqli('localhost', 'root', '', 'catalogo');
if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}

// Obtener los libros disponibles para alquiler
$query = "SELECT * FROM libro_aluguer";
$resultado = $conexion->query($query);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Libros y Cómics Disponibles</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <h1>Libros y Cómics Disponibles para Alquiler</h1>
    <div>
        <?php while ($libro = $resultado->fetch_assoc()) { ?>
            <div>
                <h2><?php echo $libro['titulo']; ?></h2>
                <p><?php echo $libro['descripcion']; ?></p>
                <img src="<?php echo $libro['foto']; ?>" alt="<?php echo $libro['titulo']; ?>" width="100"><br>
                <p>Precio de alquiler: €<?php echo $libro['prezo']; ?></p>
            </div>
        <?php } ?>
    </div>
</body>
</html>

<?php
$conexion->close();
?>
