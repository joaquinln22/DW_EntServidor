<html>
<head>
<title>Establecer una conexión</title>
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
//Imprimos el error si se ha producido
echo mysqli_error($conn);
mysqli_query ($conn ,"SET NAMES 'utf8'");	//Esta linea sirve para que reconozca los acentos.

mysqli_close($conn);

?> 
</body>
</html>