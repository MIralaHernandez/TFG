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

$conn->query("INSERT INTO reservas VALUES (" . $ReservaID->fetch_assoc()["MAX(ReservaID)"] + 1 . ", " . $_SESSION['usuarioActual'] . ", " . $_GET['EspacioID'] . ", " . $_GET['Inicio'] . ", " . str_replace('-', '', $_GET['fecha']) . ")");
echo "<link rel='stylesheet' href='style.css'><div id='usuarioycontrasena'><p>Reserva realizada con éxito.</p><br><a href=\"mainPage.php?fecha=" . $_GET['fecha'] . "\">Volver</a></div>";
?>