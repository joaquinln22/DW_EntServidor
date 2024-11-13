
<?php
//Estableciendo la conexión
include ("conexion.php");
//recogida de datos
$cod=$_GET['codigo'];

$consulta = ("DELETE from productos WHERE codigo='$cod'");
//ejecutamos la sentencia SQL
mysqli_query($conn,$consulta);
//redireccionamos a la web listados
header ("LOCATION:formulario_bajas.php");
?>