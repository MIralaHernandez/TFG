<?php
//CONEXIÓN
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "gymgrid";
session_start();
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Error de conexión: " . $conn->connect_error);
}

switch ($_POST["accion"]) {
  case "Eliminar Usuario":
    $conn->query("DELETE FROM usuarios WHERE UsuarioID=" . $_POST['UsuarioID']);
    $msj = "Usuario eliminado con éxito.";
    break;
  case "Deshacer Administrador":
    $conn->query("UPDATE usuarios SET IsAdmin=0 WHERE UsuarioID=" . $_POST['UsuarioID']);
    $msj = "Usuario descendido de Administrador con éxito.";
    break;
  case "Hacer Administrador":
    $conn->query("UPDATE usuarios SET IsAdmin=1 WHERE UsuarioID=" . $_POST['UsuarioID']);
    $msj = "Usuario ascendido a Administrador con éxito.";
    break;
  default:
    $msj = "Error.";
}

echo "<link rel='stylesheet' href='style.css'><div id='usuarioycontrasena'><p>" . $msj . "</p><br><a href='mainPage.php'>Volver</a></div>";
?>