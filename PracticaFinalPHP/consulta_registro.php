<?php
 	include("conexion.php");

 	//Recoges datos de formulario, ATENTO AL METODO QUE ELIGES
 	$nombre = $_POST['usuario'];
	$contra = $_POST['contraseña'];
	$rol = $_POST['rol'];

 	// Creamos consultas
 	$consulta =	"INSERT INTO usuarios(id, nombre_usuario, contraseña, rol) VALUES ('$id','$nombre','$contra','$rol')";
	$consulta2= "SELECT * FROM usuarios";

 	
	$result=mysqli_query($conn, $consulta2);	//ejecutamos la sentencia SQL, $conn del archivo conexion
	$row = mysqli_fetch_assoc($result);			// Creamos un array con los datos extraidos de la consulta

	if($nombre==$row['nombre_usuario']){	// Comprobamos si el usuario ya existe
		header("LOCATION:registro_usuarios.php");
	}else{
		mysqli_query($conn, $consulta);		//ejecutamos la sentencia SQL, $conn del archivo conexion
	}
 	//redireccionamos a la web que quieras
 	header("LOCATION:registro_usuarios.php");
?>
