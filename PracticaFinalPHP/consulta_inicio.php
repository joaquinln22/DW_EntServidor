<?php
// Establecer conexión
include("conexion.php");

// Recogida de datos
$user=$_POST['usuario'];
$pwd=$_POST['contraseña'];

//creamos la sentencia SQL
$consulta="select * from usuarios where nombre_usuario='$user' and contraseña='$pwd'";
$result = mysqli_query($conn ,$consulta);
//Imprimos el error si se ha producido. mysql_error siempre va a mostrar el error de la última función mysql ejecutada
echo mysqli_error($conn);

if($result && mysqli_num_rows($result)>0){	// Verificar si la consulta es correcta y hay resultados
    $row = mysqli_fetch_assoc($result);		// Creamos un array con los resultados obtenidos de la consulta

    // Redireccionar según el rol del usuario
    if ($row['rol']=='camarero') {
    	header("Location: opciones_camarero.php");
	} elseif ($row['rol']=='encargado') {
		header("Location: opciones_encargado.php");
	}
} else{
	echo "	<script>
				alert('Usuario o contraseña incorrectos.');
				window.location.href= 'index.php';
			</script>";
}    

// Cerrar la conexión
mysqli_close($conn);
?>
