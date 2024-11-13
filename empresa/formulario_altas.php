<html>
<head></head>
<body>
<form action="altas.php" method="post" enctype="multipart/form-data">
	<table width="400" border="0">
	<tr>
		<td colspan="4">ALTA DE PRODUCTOS </td>
	</tr>
	<tr>
		<td>Codigo</td> <td><input type="text" name="codigo" required /></td>
		<td>Producto</td> <td><input type="text" name="producto" required /></td>
	</tr>
	<tr>
		<td>Detalle</td> <td><input type="text" name="detalle" required /></td>
	</tr>	
	<tr>
		<td>Precio</td> <td><input type="text" name="precio" required /></td>
		<td>Descuento</td> <td><input type="text" name="descuento" required /></td>
	</tr>
	<tr> 
		<td> Imagen </td> <td><input type="file" name="imagen"required /></td>
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