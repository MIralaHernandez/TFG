<?php
if (isset($_GET['fecha']) and ($_GET['fecha'] != null)) {
  $fecha = $_GET['fecha'];
} else {
  $fecha = date('Y-m-d');
}
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

//VARIABLES
$result = $conn->query("SELECT * FROM espacios");
$espacios = array();

if ($result->num_rows > 0) {
  //Guardamos los datos de los espacios en un array
  while ($espacio = $result->fetch_assoc()) {
    $espacios[] = $espacio;
  }

  //buscamos y guardamos las horas de apertura y cierre
  $_SESSION['apertura'] = intval($conn->query("SELECT Hora FROM horario WHERE Tipo='apertura'")->fetch_assoc()["Hora"]);
  $_SESSION['cierre'] = intval($conn->query("SELECT Hora FROM horario WHERE Tipo='cierre'")->fetch_assoc()["Hora"]);

  //echos de la cabecera
  echo "<table><tr><th></th>";
  foreach ($espacios as $espacio) {
    echo "<th>" . $espacio["Nombre"] . "</th>";
  }
  echo "</tr>";
  for ($i = $_SESSION['apertura']; $i <= $_SESSION['cierre']; $i++) {
    $result = $conn->query("SELECT * FROM reservas WHERE Inicio=" . $i * 100 .  " AND fecha = " . str_replace('-', '', $fecha));
    $reservas = array();
    while ($reserva = $result->fetch_assoc()) {
      $reservas[] = $reserva;
    }
    echo "<tr><td><div>" . $i . ":00</div></td>";
    for ($j = 0; $j < count($espacios); $j++) {
      $reservado = false;
      foreach ($reservas as $reserva) {
        if ($reserva["EspacioID"] == $espacios[$j]["EspacioID"]) {
          $reservado = true;
          if (($_SESSION['usuarioActual'] == $reserva["UsuarioID"]) or ($_SESSION['isAdmin'] == 1)) {
            echo "<td><form method=\"get\" action=\"cancelar.php\"><input type=\"submit\" class=\"btn_cancelar\" title='Cancelar' value=\"" . $conn->query("SELECT * FROM usuarios WHERE UsuarioID=" . $reserva["UsuarioID"])->fetch_assoc()["Nombre"] . "\" />";
            echo "<input type=\"hidden\" name=\"reservaId\" value=\"" . $reserva["ReservaID"] . "\"/>";
          } else {
            echo "<td><form method=\"get\" action=\"reservar.php\"><input type=\"submit\" style=\"color: #FAFAFA;\" value=\"" . $conn->query("SELECT * FROM usuarios WHERE UsuarioID=" . $reserva["UsuarioID"])->fetch_assoc()["Nombre"] . "\" disabled/>";
          }
        }
      }
      if (!$reservado) {
        echo "<td><form method='get' action='reservar.php'><input type='submit' value='Reservar'/>";
        echo "<input type=\"hidden\" name=\"EspacioID\" value=\"" . $espacios[$j]["EspacioID"] . "\"/>
        <input type=\"hidden\" name=\"Inicio\" value=\"" . $i * 100 . "\"/>
        <input type=\"hidden\" name=\"fecha\" value=\"" . $fecha . "\"/>";
      }
      echo "<input type=\"hidden\" name=\"fecha\" value=\"" . $fecha . "\"/></form></td>";
    }
    echo "</tr>";
  }
  echo "</table>";
}

$conn->close();
?>