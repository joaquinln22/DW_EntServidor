<html>
    <head>
    </head>
    <body>
        <form action="agregar.php" method="post" enctype="multipart/form-data">
            <table width="400" border="0">
            <tr>
                <td colspan="4">AGREGAR LIBROS </td>
            </tr>
            <tr>
                <td>Título</td> <td><input type="text" name="titulo" required /></td>
                <td>Autor</td> <td><input type="text" name="autor" required /></td>
            </tr>
            <tr>
                <td>Fecha de publicación</td> <td><input type="text" name="fecha_publi" required /></td>
                <td>Estado</td> <td><input type="text" name="estado" required /></td>
            </tr>	
            <tr>
                <td colspan="2"><input type="submit" name="button" value="Agregar"/></td>
                <td colspan="2"><input type="reset" name="button2" value="Restablecer"/></td>
            </tr>
            </table>
        </form>
        <p><a href="menu.php"> Volver al menu</a></p>
    </body>
</html>