<?php
 	include("conexion.php");

 	//Recoges datos de formulario, ATENTO AL METODO QUE ELIGES
 	$nombre = $_POST['nombre'];

 	// Creamos consultas
 	$consulta2 = "DELETE FROM productos WHERE nombre = '$nombre'";
	$consulta = "SELECT nombre FROM productos WHERE nombre = '$nombre'";

 	
	$result=mysqli_query($conn, $consulta);	//ejecutamos la sentencia SQL, $conn del archivo conexion
	$row = mysqli_fetch_assoc($result);			// Creamos un array con los datos extraidos de la consulta

	if($nombre==$row['nombre']){	// Comprobamos si el usuario ya existe
		mysqli_query($conn, $consulta2);		//ejecutamos la sentencia SQL, $conn del archivo conexion
	}else{
		header("LOCATION:borrado_producto.php");
	}
 	//redireccionamos a la web que quieras
 	header("LOCATION:borrado_producto.php");
?>