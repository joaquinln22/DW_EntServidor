<?php
session_start();
include('Conexion.php');
include('security.php');
verificarRol('encargado');

// Suspender usuario
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['suspender_usuario'])) {
    $idUsuario = (int)$_POST['idUsuario'];

    $consulta = "UPDATE usuarios SET estado = 'suspendido' WHERE idUsuario = $idUsuario";
    if (mysqli_query($conex, $consulta)) {
        echo "Usuario suspendido correctamente.";
    } else {
        echo "Error al suspender usuario: " . mysqli_error($conex);
    }
}

// Activar usuario
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['activar_usuario'])) {
    $idUsuario = (int)$_POST['idUsuario'];

    $consulta = "UPDATE usuarios SET estado = 'activo' WHERE idUsuario = $idUsuario";
    if (mysqli_query($conex, $consulta)) {
        echo "Usuario activado correctamente.";
    } else {
        echo "Error al activar usuario: " . mysqli_error($conex);
    }
}

// Eliminar usuario
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['eliminar_usuario'])) {
    $idUsuario = (int)$_POST['idUsuario'];

    $consulta = "DELETE FROM usuarios WHERE idUsuario = $idUsuario";
    if (mysqli_query($conex, $consulta)) {
        echo "Usuario eliminado correctamente.";
    } else {
        echo "Error al eliminar usuario: " . mysqli_error($conex);
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Camareros</title>
</head>
<body>
    <h1>Gestión de Camareros</h1>

    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Email</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Consulta para obtener todos los usuarios con rol de camarero
            $consultaUsuarios = "SELECT * FROM usuarios WHERE rol = 'camarero'";
            $resultadoUsuarios = mysqli_query($conex, $consultaUsuarios);

            // Listar cada usuario en la tabla
            while ($usuario = mysqli_fetch_assoc($resultadoUsuarios)) {
                echo "<tr>";
                echo "<td>" . $usuario['idUsuario'] . "</td>";
                echo "<td>" . $usuario['nombre'] . "</td>";
                echo "<td>" . $usuario['email'] . "</td>";
                echo "<td>" . $usuario['estado'] . "</td>";
                echo "<td>
                        <form method='POST' action='gestion_camareros.php' style='display:inline;'>
                            <input type='hidden' name='idUsuario' value='" . $usuario['idUsuario'] . "'>";
                if ($usuario['estado'] === 'activo') {
                    echo "<button type='submit' name='suspender_usuario'>Suspender</button>";
                } else {
                    echo "<button type='submit' name='activar_usuario'>Activar</button>";
                }
                echo "</form>
                      <form method='POST' action='gestion_camareros.php' style='display:inline;'>
                          <input type='hidden' name='idUsuario' value='" . $usuario['idUsuario'] . "'>
                          <button type='submit' name='eliminar_usuario'>Eliminar</button>
                      </form>
                      </td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>

    <a href="encargado_dashboard.php">Volver al Dashboard</a>
</body>
</html>
