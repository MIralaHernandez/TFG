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

$isAdmin = $conn->query("SELECT IsAdmin FROM gymgrid.usuarios WHERE UsuarioID=" . $_SESSION['usuarioActual'] . ";");
if($_SESSION['isAdmin'] == "1") {
    echo
    "<nav>
        <ul>
            <li><a href='adminUsuarios.php'>Administrar Usuarios</a></li>
            <li><a href='adminEspacios.php'>Administrar Espacios</a></li>
            <li><a href='adminHorario.php'>Administrar Horario</a></li>
        </ul>
    </nav>";
}
?>