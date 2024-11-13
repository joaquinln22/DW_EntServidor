<?php
$servidor="localhost";
$user="root";
$clave="";
$basededatos="empresa";
//Establecimiento de la conexión al servidor localhost, 
//con el usuario root y sin clave
$conn= mysqli_connect($servidor,$user,$clave);
//Seleccionamos la base de datos empresa
mysqli_select_db($conn,$basededatos);
//Imprimimos si hay algún error
echo mysqli_error($conn);
?>


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

<?php
//Estableciendo la conexión
include ("conexion.php");
//recogida de datos
$cod=$_POST['codigo'];
$pro=$_POST['producto'];
$det=$_POST['detalle'];
$pre=$_POST['precio'];
$des=$_POST['descuento'];
$ima="images/".$cod.".jpg";
$consulta = "INSERT INTO productos (codigo,producto,detalle,precio,descuento,imagen) 
VALUES ('$cod','$pro','$det','$pre','$des','$ima')";
//ejecutamos la sentencia SQL
mysqli_query($conn,$consulta);
//copiamos la imagen que nos ha llegado a su carpeta.
echo mysqli_error($conn );
$ruta=$ima;
COPY($_FILES["imagen"]["tmp_name"],$ruta);
//redireccionamos a la web listados (este fichero lo debeis de crar vosotros)
header ("LOCATION:listado.php");
?>

<?php
//Estableciendo la conexión
include ("conexion.php");
//recogida de datos
$cod=$_POST['codigo'];
$pro=$_POST['producto'];
$det=$_POST['detalle'];
$pre=$_POST['precio'];
$des=$_POST['descuento'];
$consulta = "UPDATE productos SET producto='$pro',detalle='$det',precio='$pre',descuento='$des' WHERE codigo='$cod'";
echo $consulta;
//ejecutamos la sentencia SQL
mysqli_query($conn,$consulta);
//copiamos la imagen que nos ha llegdi a su carpeta.
echo mysqli_error($conn );

//redireccionamos a la web listados
header ("LOCATION:listado.php");
?>

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
</body>
</html>

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
</body>
</html>