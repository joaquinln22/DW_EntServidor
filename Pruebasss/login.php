<?php
// login.php
session_start();
include('Conexion.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = mysqli_real_escape_string($conex, $_POST['email']);
    $contrasena = mysqli_real_escape_string($conex, $_POST['contrasena']);

    // Consulta para verificar el usuario y su estado
    $consulta = "SELECT * FROM usuarios WHERE email = '$email' AND contrasena = '$contrasena'";
    $resultado = mysqli_query($conex, $consulta);

    if (mysqli_num_rows($resultado) > 0) {
        $usuario = mysqli_fetch_assoc($resultado);

        if ($usuario['estado'] === 'suspendido') {
            echo "El usuario está suspendido. Por favor, contacte con el encargado.";
        } else {
            // Usuario activo: establecer la sesión
            $_SESSION['idUsuario'] = $usuario['idUsuario'];
            $_SESSION['nombre'] = $usuario['nombre'];
            $_SESSION['rol'] = $usuario['rol'];

            // Redirigir según el rol
            if ($usuario['rol'] === 'camarero') {
                header("Location: camarero_dashboard.php");
            } elseif ($usuario['rol'] === 'encargado') {
                header("Location: encargado_dashboard.php");
            }
        }
    } else {
        echo "Credenciales incorrectas. Inténtelo de nuevo.";
    }
}
?>