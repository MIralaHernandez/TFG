<?php
    session_start();
// Datos de conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "gymgrid";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Comprobar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener los datos enviados desde el formulario
$usuario = $_GET['usuario'];
$contraseña = $_GET['contraseña'];

// Consulta SQL para verificar el usuario y contraseña
$sql = "SELECT * FROM usuarios WHERE Nombre='$usuario' AND contraseña='$contraseña'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $userData=$result->fetch_assoc();
    $_SESSION['usuarioActual'] = $userData['UsuarioID'];
    $_SESSION['isAdmin'] = $userData['IsAdmin'];
    header("Location: mainPage.php", TRUE, 301);
} else {
    // Si no hay coincidencia, el usuario y/o la contraseña son incorrectos
    header("Location: errorLogin.html", TRUE, 301);
}

// Cerrar la conexión
$conn->close();
?>