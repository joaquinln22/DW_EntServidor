<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="styles.css">
    <title>Modificación de usuarios</title>
</head>
<body>
    <header>
        <h1>Modificación de usuarios</h1>
    </header>

    <form action="consulta_modificacion.php" method="post" name="registro_usuarios">
        <p>Usuario a modificar: <input type="text" name="usuario" size="20" required></p>
        <br>
        <p><b>Parámetros a modificar:</b></p>
        <p>Usuario: <input type="text" name="nombre" size="30"></p>
        <p>Contraseña: <input type="password" name="contraseña" size="30"></p>
        <p class="rol">Rol: <select name="rol" id="rol">
                    <option value="camarero">Camarero</option>
                    <option value="encargado">Encargado</option>
                </select>
        </p>
        <input type="submit" value="Modificar Usuario">
        <p class="atras1"><a href="admin_usuarios.php" target="_parent">Volver atrás</a></p>
    </form>
</body>
</html>