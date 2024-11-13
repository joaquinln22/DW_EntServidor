<?php
// Iniciar la sesión
session_start();

// Incluir archivo de conexión
include("conexion.php");

// Verificar el método de solicitud
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recoger datos del formulario
    $usuario = mysqli_real_escape_string($conn, $_POST['usuario']);
    $contraseña = mysqli_real_escape_string($conn, $_POST['contraseña']);

    // Consulta SQL para validar usuario y contraseña
    $consulta = "SELECT * FROM usuarios WHERE usuario='$usuario' AND contraseña='$contraseña'";

    // Ejecutar la consulta
    $result = mysqli_query($conn, $consulta);

	if($result){
		// Verificar si se encontró el usuario
    	if (mysqli_num_rows($result) == 1) {
        	$row = mysqli_fetch_assoc($result);

        	// Asignar variables de sesión
        	$_SESSION['usuario'] = $row['usuario'];
        	$_SESSION['rol'] = $row['rol'];

        	// Redireccionar según el rol del usuario
        	if ($_SESSION['rol'] == 'camarero') {
            	header("Location: opciones_camarero.html");
        	} elseif ($_SESSION['rol'] == 'encargado') {
       			header("Location: opciones_encargado.html");
       		}
        	exit();
		}
    } else {
        echo "Usuario o contraseña incorrectos.";
	}    
}

// Cerrar la conexión
mysqli_close($conn);
?>
