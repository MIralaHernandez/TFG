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
  case "Eliminar Espacio":
    $conn->query("DELETE FROM espacios WHERE EspacioID=" . $_POST['EspacioID']);
    $msj = "Espacio eliminado con éxito.";
    break;
    case "Anadir Espacio":
        $EspacioID = $conn->query("SELECT MAX(EspacioID) FROM `gymgrid`.`espacios`;");
        $conn->query("INSERT INTO espacios
        VALUES ('" . $EspacioID->fetch_assoc()["MAX(EspacioID)"] + 1 . "', '" . $_POST["Nombre"] . "');");
        $msj = "Espacio añadido con éxito.";
      break;
  default:
    $msj = "Error.";
}

echo "<link rel='stylesheet' href='style.css'><div id='usuarioycontrasena'><p>" . $msj . "</p><br><a href='mainPage.php'>Volver</a></div>";
?>