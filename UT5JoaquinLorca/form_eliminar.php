<html>
    <head>
    </head>
    <body>
        <h1> <u> ELIMINAR LIBROS </u> </h1>
        <?php

            include ("conexion.php");

            $consulta="select * from libros";

            $result = mysqli_query($conn ,$consulta);

            
            echo mysqli_error($conn);



            while($row = mysqli_fetch_array($result))
            {
                $titulo=$row['titulo'];
                echo "<strong>Título: ".$row['titulo']. "</strong> <br>";
                echo "Autor: ".$row['autor']. " <br>";
                echo "Fecha de publicación: ".$row['fecha_publi']. " <br>";
                echo "Estado: ".$row['estado']. " <br>";
                echo "<a href=eliminar.php?codigo=$titulo>Eliminar</a><br>";
                echo "<br>";
                
                echo mysqli_error($conn);
                
            }

            mysqli_close($conn);

        ?>
        <p><a href="menu.php"> Volver al menu</a></p>
    </body>
</html>