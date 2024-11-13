<html>
<head></head>
<body>

<?php
//Estableciendo la conexión
include ("conexion.php");

//creamos la sentencia SQL
$consulta="select * from productos";
$result = mysqli_query($conn ,$consulta);
//Imprimos el error si se ha producido. mysql_error siempre va a mostrar el error de la última función mysql ejecutada
echo mysqli_error($conn);

//Imprimos el error si se ha producido. mysql_error siempre va a mostrar el error de la última función mysql ejecutada
echo mysqli_error($conn);

?>

<form action="formulario_modificacion.php" method="post" enctype="multipart/form-data">

<table width="400" border="0">
	<tr>
		<td colspan="4"><h4 align="center"> <u>MODIFICACION DE PRODUCTOS </u></h4></td>
	</tr>
	<tr>
		<td>Introduzca codigo</td>
		<td>
		<select name="codigo">
		
		<?php
		while($row = mysqli_fetch_array($result))
			{
				$cod=$row['codigo'];
				echo "<option value=$cod>$cod</option>";		
			}
		?>
		</select>
		
		
		</td>
	</tr>
	<tr>
		<td><input type="submit" name="button" value="Enviar"/></td>
		<td><input type="reset" name="button2" value="Restablecer"/></td>
	</tr>
	</table>
	</form>
	<p><a href="menu.php"> Volver al menu</a></p>
	</body>
	</html>