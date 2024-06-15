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
    //Guardamos los datos de los usuarios en un array
    $result = $conn->query("SELECT * FROM usuarios");
    $usuarios = array();
    while ($usuario = $result->fetch_assoc()) {
        $usuarios[] = $usuario;
    }

    echo "<table>";
    foreach ($usuarios as $usuario) {
        echo "<tr><td>" . $usuario["Nombre"] . "</td>
        <td><form method='post' action='queryUsuarios.php'><input type='text' name='UsuarioID' value='" . $usuario["UsuarioID"] . "' hidden><input type='submit' name='accion' value='Eliminar Usuario'></form></td>";
        if ($usuario["IsAdmin"]) {
            echo "<td><form method='post' action='queryUsuarios.php'><input type='text' name='UsuarioID' value='" . $usuario["UsuarioID"] . "' hidden><input type='submit' name='accion' value='Deshacer Administrador'></form></td>";
        } else {
            echo "<td><form method='post' action='queryUsuarios.php'><input type='text' name='UsuarioID' value='" . $usuario["UsuarioID"] . "' hidden><input type='submit' name='accion' value='Hacer Administrador'></form></td>";
        }
        echo "</tr>";
    }
    echo "</table>";
}

$conn->close();
?>