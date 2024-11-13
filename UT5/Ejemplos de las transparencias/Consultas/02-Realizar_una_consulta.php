<html>
<head>
<title>Realizamos una consulta</title>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
</head>

<body>
<?php
//creamos la conexion
$conn = mysqli_connect('localHost','root','');
//Imprimos el error si se ha producido
echo mysqli_error($conn);


//Seleccionamos la base de datos
mysqli_select_db($conn ,'pruebas');
//Imprimos el error si se ha producido. mysql_error siempre va a mostrar el error de la última función mysql ejecutada
echo mysqli_error($conn);
mysqli_query ($conn ,"SET NAMES 'utf8'");	//Esta linea sirve para que reconozca los acentos.

//Me creo la consulta que voy a ejecutar. En este caso voy a obtener todas las personas de la base de datos
$consulta = "SELECT * FROM PERSONAS";

$result = mysqli_query($conn ,$consulta);
//Imprimos el error si se ha producido. mysql_error siempre va a mostrar el error de la última función mysql ejecutada
echo mysqli_error($conn);



while($row = mysqli_fetch_array($result))
{
	print("Forma1: " . $row[0] . " || " . $row[1]);
	print("<br>");
	
	print("Forma2: " . $row['NOMBRE']. " || " . $row['APELLIDOS']);
	print("<br>");
	
	print("------------------------------");
	print("<br>");
	
	//Imprimos el error si se ha producido. mysql_error siempre va a mostrar el error de la última función mysql ejecutada
	mysqli_error($conn);
	
}

mysqli_close($conn);


?>

</body>
</html>