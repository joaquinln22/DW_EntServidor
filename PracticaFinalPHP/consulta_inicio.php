<?php
session_start(); // Asegúrate de iniciar la sesión
include("conexion.php");

// Recogida de datos
$user = $_POST['usuario'];
$pwd = $_POST['contraseña'];

// Consulta a la base de datos
$consulta = "SELECT * FROM usuarios WHERE nombre_usuario = '$user' AND contraseña = '$pwd'";
$result = mysqli_query($conn, $consulta);

if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);

    // Guardar el id del camarero en la sesión
    $_SESSION['usuario_id'] = $row['id'];
    $_SESSION['usuario_rol'] = $row['rol'];

    // Redireccionar según el rol
    if ($row['rol'] == 'camarero') {
        header("Location: opciones_camarero.php");
    } elseif ($row['rol'] == 'encargado') {
        header("Location: opciones_encargado.php");
    }
} else {
    echo "<script>
            alert('Usuario o contraseña incorrectos.');
            window.location.href = 'index.php';
          </script>";
}

// Cerrar conexión
mysqli_close($conn);
?>
