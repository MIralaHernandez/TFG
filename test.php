<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "gymgrid";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM usuarios";
$result = $conn->query($sql);

echo "<p>";
if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "id: " . $row["UsuarioID"]. " - Name: " . $row["Nombre"]. " " . $row["Apellidos"]. "<br>";
  }
} else {
  echo "0 results";
}
echo "</p>";
$conn->close();
?>