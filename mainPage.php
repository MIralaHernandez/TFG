<?php
session_start();
if (!isset($_SESSION['usuarioActual'])) {
  session_destroy();
  header('location: index.html');
}
?>
<html>

<head>
  <title>GymGrid [NombreComplejo]</title>
  <link rel="stylesheet" href="style.css">
  <meta charset="UTF-8">
  <meta name="author" content="Marco Irala Hernández">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
  <header>
    <div id="cabecera">
      <h1>GymGrid [NombreComplejo]</h1>
    <a href="cerrarSesion.php" id="cerrarSesion">Cerrar Sesión</a>
    </div>
    <h2>Reservas</h2>
  </header>
  <?php include 'nav.php'; ?>
  <section>
    <?php
    if (isset($_GET['fecha']) and ($_GET['fecha'] != null)) {
      $fechaActual = $_GET['fecha'];
    } else {
      $fechaActual = date('Y-m-d');
    }
    ?>
    <div class="centeredContainer">
      <form id="calendario" method="get">
        <label for="fecha">Fecha:</label>
        <input type="date" id="fecha" name="fecha" value="<?php echo $fechaActual; ?>" min="<?php echo date('Y-m-d'); ?>">
        <input type="submit" id="submit" value="Actualizar">
      </form>
    </div>
    <br>
  </section>
  <section>
    <div class="centeredContainer">
      <?php include 'mainGrid.php'; ?>
    </div>
  </section>
  <footer>
    <p>correoEjemplo@ejemplo.com</p>
    <p>@redSocialEjemplo</p>
    <p>+34 000 00 00 00</p>
    <p>c/Ejemplo nº0, Ejemplo, Ejemplo</p>
  </footer>
</body>

</html>