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
    <form action="consulta_inicio.php" method="post" name="inicio_sesion">
        <p>Usuario: <input type="text" name="usuario" size="30" required></p>
        <p>Contraseña: <input type="password" name="contraseña" size="30" required></p>
        <input class="boton1" type="submit" value="Iniciar Sesión">
    </form>
</body>
</html>