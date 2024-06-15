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

$conn->query("UPDATE horario
SET Hora = " . $_POST["Hora"] . "
WHERE Tipo = '" . $_POST["Tipo"] . "';");

echo "<link rel='stylesheet' href='style.css'><div id='usuarioycontrasena'><p>Horario actualizado con éxito.</p><br><a href='mainPage.php'>Volver</a></div>";
?>