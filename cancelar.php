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

$ReservaID = $conn->query("SELECT MAX(ReservaID) FROM `gymgrid`.`reservas`;");

$conn->query("DELETE FROM reservas WHERE ReservaID=". $_GET['reservaId']);
echo "<link rel='stylesheet' href='style.css'><div id='usuarioycontrasena'><p>Reserva cancelada con éxito.</p><br><a href=\"mainPage.php?fecha=" . $_GET['fecha'] . "\">Volver</a></div>";
?>