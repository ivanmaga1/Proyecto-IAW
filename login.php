<!-- login.php -->
<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $usuario = $_POST['usuario'];
    $contrasinal = $_POST['contrasinal'];

    // Conexión a la base de datos
    $mysqli = new mysqli("localhost", "root", "", "catalogo");
    if ($mysqli->connect_error) {
        die("Conexión fallida: " . $mysqli->connect_error);
    }

    // Comprobar si el usuario existe
    $result = $mysqli->query("SELECT * FROM usuario WHERE usuario = '$usuario' AND contrasinal = '$contrasinal'");
    if ($result->num_rows > 0) {
        // Iniciar sesión y redirigir a la zona de gestión de libros
        $_SESSION['usuario'] = $usuario;
        header("Location: gestion_libros.php");
    } else {
        echo "Usuario o contraseña incorrectos.";
    }
}
?>
