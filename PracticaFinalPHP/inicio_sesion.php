<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
	<script src="../js/bootstrap.bundle.min.js"></script>
    <title>Inicio de sesión</title>
</head>
<body>
    <header>
        <h1>Inicio de sesión</h1>
    </header>

    <?php
        //Estableciendo la conexión
        include ("conexion.php");
        // Creamos la consulta SQL
        $consulta = "SELECT * FROM usuarios WHERE usuario='$usuario' AND contraseña='$contraseña'";
        // Ejecutamos la consulta
        $result = mysqli_query($conn ,$consulta);
    ?>

    <form action="consulta_inicio.php" method="post" name="inicio_sesion">
        <p>Usuario: <input type="text" name="usuario" size="30" required></p>
        <p>Contraseña: <input type="password" name="contraseña" size="30" required></p>
        <input class="boton1" type="submit" value="Iniciar Sesión">
    </form>
</body>
</html>