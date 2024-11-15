<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="styles.css">
    <title>Inicio de sesión</title>
</head>
<body>
    <header>
        <h1>Inicio de sesión</h1>
    </header>

    <?php
        //Estableciendo la conexión
        include ("conexion.php");

        //creamos la sentencia SQL
        $consulta="select * from usuarios";
        $result = mysqli_query($conn ,$consulta);
        //Imprimos el error si se ha producido. mysql_error siempre va a mostrar el error de la última función mysql ejecutada
        echo mysqli_error($conn);

        //Imprimos el error si se ha producido. mysql_error siempre va a mostrar el error de la última función mysql ejecutada
        echo mysqli_error($conn);

    ?>

    <form action="consulta_inicio.php" method="post" name="inicio_sesion">
        <p>Usuario: <input type="text" name="usuario" size="30" required></p>
        <p>Contraseña: <input type="password" name="contraseña" size="30" required></p>
        <input class="boton1" type="submit" value="Iniciar Sesión">
    </form>
</body>
</html>