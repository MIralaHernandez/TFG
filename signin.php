<?php
//CONEXIÓN
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "gymgrid";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

$UsuarioID = $conn->query("SELECT MAX(UsuarioID) FROM `gymgrid`.`usuarios`;");
$conn->query("INSERT INTO usuarios
VALUES (" . $UsuarioID->fetch_assoc()["MAX(UsuarioID)"] + 1 . ", \"" . $_GET['usuario'] . "\", 0, \"" . $_GET['contrasena'] . "\");");
echo "<link rel='stylesheet' href='style.css'>
<div id='usuarioycontrasena'>
<p>Te has registrado con éxito.</p><br>
<a href='mainPage.php'>Volver</a></div>";
?>
