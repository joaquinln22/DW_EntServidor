<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="styles.css">
    <title>Registro de usuarios</title>
</head>
<body>
    <header>
        <h1>Registro de usuarios</h1>
    </header>
    <form action="consulta_registro.php" method="post" name="registro_usuarios">
        <p>Usuario: <input type="text" name="usuario" size="30" required></p>
        <p>Contraseña: <input type="password" name="contraseña" size="30" required></p>
        <p class="rol">Rol: <select name="rol" id="rol">
                    <option value="camarero">Camarero</option>
                    <option value="encargado">Encargado</option>
                </select>
        </p>
        <input type="submit" value="Registrar Usuario">
        <p class="atras1"><a href="admin_usuarios.php" target="_parent">Volver atrás</a></p>
    </form>
</body>
</html>