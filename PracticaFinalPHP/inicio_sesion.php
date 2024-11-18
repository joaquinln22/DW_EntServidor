<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="styles.css">
    <title>Inicio de sesión</title>
</head>
<body>
    <header>
        <h1>Inicio de sesión</h1>
    </header>

    <?php
        //Estableciendo la conexión
        include ("conexion.php");
        // Creamos la consulta SQL
        $consulta = "SELECT * FROM usuarios WHERE usuario='$usuario' AND contraseña='$contraseña'";
        // Ejecutamos la consulta
        $result = mysqli_query($conn ,$consulta);
    ?>

    <form action="consulta_inicio.php" method="post" name="inicio_sesion">
        <p>Usuario: <input type="text" name="usuario" size="30" required></p>
        <p>Contraseña: <input type="password" name="contraseña" size="30" required></p>
        <input class="boton1" type="submit" value="Iniciar Sesión">
    </form>
</body>
</html>

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