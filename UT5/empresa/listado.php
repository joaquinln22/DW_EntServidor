<html>

<head>

</head>

<body>

<h1><u> LISTADO DE PRODUCTOS </u></h1>
<?php
//Estableciendo la conexión
include ("conexion.php");

//creamos la sentencia SQL
$consulta="select * from productos";

$result = mysqli_query($conn ,$consulta);

//Imprimos el error si se ha producido. mysql_error siempre va a mostrar el error de la última función mysql ejecutada
echo mysqli_error($conn);



while($row = mysqli_fetch_array($result))
{
	
	
	echo "<strong>Código: ".$row['codigo']. "</strong> <br>";
	echo "Producto: ".$row['producto']. " <br>";
	echo "Detalles: ".$row['detalle']. " <br>";
	echo "Precio: ".$row['precio']. " € <br>";
	echo "Descuento: ".$row['descuento']. "% <br>";
	echo "<img width=250 height=250 src=".$row['imagen'].">"."<br>";
	echo "<br>";
	
	
	//Imprimos el error si se ha producido. mysql_error siempre va a mostrar el error de la última función mysql ejecutada
	echo mysqli_error($conn);
	
}

mysqli_close($conn);


?>
<p><a href="menu.php"> Volver al menu</a></p>
</body></html>