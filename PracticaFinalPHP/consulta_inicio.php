<?php
session_start(); // Asegúrate de iniciar la sesión
include("conexion.php");

if($_SERVER['REQUEST_METHOD']==='POST'){
    // Recogida de datos
    $user = $_POST['usuario'];
    $pwd = $_POST['contraseña'];

    // Consulta a la base de datos
    $consulta = "SELECT * FROM usuarios WHERE nombre_usuario = '$user' AND contraseña = '$pwd'";
    $result = mysqli_query($conn, $consulta);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);

        // Guardar la información relevante de la sesión
        $_SESSION['usuario_id'] = $row['id'];
        $_SESSION['usuario_rol'] = $row['rol'];

        // Redireccionar según el rol
        if ($row['rol'] == 'camarero') {
            header("Location: mesas.php");
        } elseif ($row['rol'] == 'encargado') {
            header("Location: opciones_encargado.php");
        }else{
            header("Location: no_autorizado.php"); // Seguridad
        }
    } else {
        echo "<script>
                alert('Usuario o contraseña incorrectos.');
                window.location.href = 'index.php';
            </script>";
    }  
}


// Cerrar conexión
mysqli_close($conn);
?>
