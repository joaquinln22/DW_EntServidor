<html>
	<head>
	</head>
<body>
    <?php

    include ("conexion.php");

    $titulo=$_POST['titulo'];


    $consulta="select * from libros where titulo='$titulo'";
    $result = mysqli_query($conn ,$consulta);

    echo mysqli_error($conn);

    $row = mysqli_fetch_array($result);

    echo mysqli_error($conn);

    ?>

    <form action="editar.php" method="post" enctype="multipart/form-data">
        <table width="400" border="0">
            <tr>
                <td colspan="4">EDITAR LIBRO SELECCIONADO </td>
            </tr>
            <tr>
                <td>Título: <input type="text" name="titulo" value="<?php echo $row['titulo'];?>" readonly="readonly" /></td>
                
                <td>Autor: <input type="text" name="autor" value="<?php echo $row['autor'];?>" /></td>
            </tr>
            <tr>
                <td>Fecha de publicación: <input type="text" name="fecha_publi" value="<?php echo $row['fecha_publi'];?>" /></td>
                
                <td>Estado de disponibilidad: <input type="text" name="estado" value="<?php echo $row['estado'];?>" /></td>
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