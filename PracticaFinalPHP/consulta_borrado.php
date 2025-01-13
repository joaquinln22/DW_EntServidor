<?php
 	include("conexion.php");

 	//Recoges datos de formulario, ATENTO AL METODO QUE ELIGES
 	$user = $_POST['usuario'];

 	// Creamos consultas
 	$consulta2 = "DELETE FROM usuarios WHERE nombre_usuario = '$user'";
	$consulta = "SELECT nombre_usuario FROM usuarios WHERE nombre_usuario = '$user'";

 	
	$result=mysqli_query($conn, $consulta);	//ejecutamos la sentencia SQL, $conn del archivo conexion
	$row = mysqli_fetch_assoc($result);			// Creamos un array con los datos extraidos de la consulta

	if($user==$row['nombre_usuario']){	// Comprobamos si el usuario ya existe
		mysqli_query($conn, $consulta2);		//ejecutamos la sentencia SQL, $conn del archivo conexion
	}else{
		header("LOCATION:borrado_usuarios.php");
	}
 	//redireccionamos a la web que quieras
 	header("LOCATION:borrado_usuarios.php");
?>