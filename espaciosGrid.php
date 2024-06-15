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

$result = $conn->query("SELECT * FROM espacios");

if ($result->num_rows > 0) {
    //Guardamos los datos de los espacios en un array
    $result = $conn->query("SELECT * FROM espacios");
    $espacios = array();
    while ($espacio = $result->fetch_assoc()) {
        $espacios[] = $espacio;
    }

    echo "<table>";
    foreach ($espacios as $espacio) {
        echo "<tr><td>" . $espacio["Nombre"] . "</td>
        <td><form method='post' action='queryEspacios.php'><input type='text' name='EspacioID' value='" . $espacio["EspacioID"] . "' hidden><input type='submit' name='accion' value='Eliminar Espacio'></form></td>";
        echo "</tr>";
    }
    echo "<tr><form method='post' action='queryEspacios.php'><td><input type ='text' name='Nombre' placeholder='Escribe el nombre del espacio'></td><td><input type='submit' name='accion' value='Anadir Espacio'></form></td></tr></table>";
}

$conn->close();
?>