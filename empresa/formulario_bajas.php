<html>

<head>

</head>


<body>
<h1 align="center"> <u> FORMULARIO DE BAJAS </u> </h1>
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
	$cod=$row['codigo'];
	echo "<strong>Código: ".$row['codigo']. "</strong> <br>";
	echo "Producto: ".$row['producto']. " <br>";
	echo "Detalles: ".$row['detalle']. " <br>";
	echo "Precio: ".$row['precio']. " € <br>";
	echo "Descuento: ".$row['descuento']. "% <br>";
	echo "<img width=250 height=250 src=images/".$row['imagen'].">"."<br>";
	echo "<a href=bajas.php?codigo=$cod>Eliminar</a><br>";
	echo "<br>";
	
	
	//Imprimos el error si se ha producido. mysql_error siempre va a mostrar el error de la última función mysql ejecutada
	echo mysqli_error($conn);
	
}

mysqli_close($conn);


?>
<p><a href="menu.php"> Volver al menu</a></p>
</body></html>