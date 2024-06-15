<html>

<head>
    <title>GymGrid [NombreComplejo]</title>
    <link rel="stylesheet" href="style.css">
    <meta charset="UTF-8">
    <meta name="author" content="Marco Irala Hernández">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="http://code.jquery.com/jquery-latest.min.js"></script>
    <script src="confirmarcontrasena.js"></script>
</head>

<body>
  <header>
    <h1>GymGrid [NombreComplejo]</h1>
    <h2>SIGN IN</h2>
  </header>
    <div></div>
    <form action="signin.php" id="signin">
        <label for="usuario">Usuario:</label>
        <input type="text" id="usuario" name="usuario" required><br>
        <label for="contrasena">Contraseña:</label>
        <input type="password" id="contrasena" name="contrasena" required><br>
        <label for="ccontrasena">Confirmar Contraseña:</label>
        <input type="password" id="ccontrasena" name="ccontrasena" required><br>
        <div id="aviso">Las contraseñas deben coincidir</div>
        <input type="submit" id="submit" value="Registrarse" disabled>
    </form>
    <a href="index.html">Volver</a>
</body>

</html>