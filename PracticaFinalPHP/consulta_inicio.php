<?php
 	include("conexion.php");

 	//Recoges datos de formulario, ATENTO AL METODO QUE ELIGES
 	$cod = $_POST['codigo'];

 	// Metes consulta
 	$consulta =	"SELECT * FROM usuarios";

 	// Ejecutamos la sentencia SQL, $conn del archivo conexion
 	mysqli_query($conn, $consulta);

    //redireccionamos a la web que quieras
    header("LOCATION:pagina.php");
?>