<html>
<head>
<title>Realizamos un Borrado. </title>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
</head>

<body>
<?php
//creamos la conexion
$conn = mysqli_connect('localHost','root','');
//Imprimos el error si se ha producido
echo mysqli_error($conn);


//Seleccionamos la base de datos
mysqli_select_db($conn,'pruebas');
//Imprimos el error si se ha producido. mysqli_error siempre va a 
//mostrar el error de la última función mysqli ejecutada
echo mysqli_error($conn);
mysqli_query ($conn ,"SET NAMES 'utf8'");	//Esta linea sirve para que reconozca los acentos.

//Me creo la consulta que voy a ejecutar. En este caso voy a obtener
// todas las personas de la base de datos
$consulta = "DELETE FROM personas WHERE apellidos='Apellidos1'";

$result = mysqli_query($conn,$consulta);
//Imprimos el error si se ha producido. mysqli_error siempre va 
//a mostrar el error de la última función mysqli ejecutada
echo mysqli_error($conn);

print ("<h4>Borrado realizado correctamente</h4>");

mysqli_close($conn);


?>

</body>
</html>