<?php
 	include("conexion.php");

 	//Recoges datos de formulario, ATENTO AL METODO QUE ELIGES
 	$cod = $_POST['codigo'];

 	// Metes consulta
 	$consulta =	"INSERT INTO usuarios(id, nombre_usuario, contraseña, rol)
 			VALUES ('$id','$nombre','$contra','$rol')";

 	//ejecutamos la sentencia SQL, $conn del archivo conexion
 	mysqli_query($conn, $consulta);
 	//si tienes imágenes necesitas un copy
 COPY($_FILES["imagen"]["tmp_name"], $ruta);
 //redireccionamos a la web que quieras
 header("LOCATION:pagina.php");
?>
