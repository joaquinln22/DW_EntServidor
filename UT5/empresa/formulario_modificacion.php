<html>
	<head>
	
	</head>
<body>
<?php
//Estableciendo la conexión
include ("conexion.php");
//recogida de datos
$cod=$_POST['codigo'];

//creamos la sentencia SQL
$consulta="select * from productos where codigo='$cod'";
$result = mysqli_query($conn ,$consulta);
//Imprimos el error si se ha producido. mysql_error siempre va a mostrar el error de la última función mysql ejecutada
echo mysqli_error($conn);

$row = mysqli_fetch_array($result);
//Imprimos el error si se ha producido. mysql_error siempre va a mostrar el error de la última función mysql ejecutada
echo mysqli_error($conn);

?>

<form action="modificacion.php" method="post" enctype="multipart/form-data">
	<table width="400" border="0">
	<tr>
		<td colspan="4">MODIFICAR PRODUCTO SELECCIONADO </td>
	</tr>
	<tr>
		<td>Codigo</td> 
		<td><input type="text" name="codigo" value="<?php echo $row['codigo'];?>" readonly="readonly" /></td>
		
		<td>Producto</td> 
		<td><input type="text" name="producto" value="<?php echo $row['producto'];?>" /></td>
	</tr>
	
	<tr>
		
		<td>Detalle</td> 
		<td><input type="text" name="detalle" value="<?php echo $row['detalle'];?>" /></td>
	</tr>
	
	<tr>
		<td>Precio</td> 
		<td><input type="text" name="precio" value="<?php echo $row['precio'];?>" /></td>
		<td>Descuento</td> 
		<td><input type="text" name="descuento" value="<?php echo $row['descuento'];?>" /></td>
	</tr>
	
	<tr>
		<td colspan="2"><input type="submit" name="button" value="Enviar"/></td>
		<td colspan="2"><input type="reset" name="button2" value="Restablecer"/></td>
	</tr>
	</table>
	</form>
	<p><a href="menu.php"> Volver al menu</a></p>
	</body>
	</html>