<?php
 	include("conexion.php");

 	//Recoges datos de formulario, ATENTO AL METODO QUE ELIGES
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $stock = $_POST['stock'];
    $precio = $_POST['precio'];
    $imagen = $_POST['imagen'];
    $categoria = $_POST['categoria'];

 	// Creamos consultas
 	$consulta =	"INSERT INTO productos(id, imagen, nombre, categoria, precio, descripcion, stock) VALUES ('$id','$imagen', '$nombre', '$categoria', '$precio', '$descripcion', '$stock')";
	$consulta2= "SELECT * FROM productos";

 	
	$result=mysqli_query($conn, $consulta2);	//ejecutamos la sentencia SQL, $conn del archivo conexion
	$row = mysqli_fetch_assoc($result);			// Creamos un array con los datos extraidos de la consulta

	if($nombre==$row['nombre']){	// Comprobamos si el usuario ya existe
		header("LOCATION:registrar_producto.php");
	}else{
		mysqli_query($conn, $consulta);		//ejecutamos la sentencia SQL, $conn del archivo conexion
	}
 	//redireccionamos a la web que quieras
 	header("LOCATION:registrar_producto.php");
?>