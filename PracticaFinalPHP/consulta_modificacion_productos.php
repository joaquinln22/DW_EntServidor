<?php
 	include("conexion.php");

 	//Recoges datos de formulario, ATENTO AL METODO QUE ELIGES
 	$producto_modificar = $_POST['producto'];
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $precio = $_POST['precio'];
    $imagen = $_POST['imagen'];
    $categoria = $_POST['categoria'];

 	// Creamos consultas
    $consulta = "SELECT * FROM productos WHERE nombre='$producto_modificar'";
    

    //ejecutamos la sentencia SQL para comprobar si el usuario escogido existe
    $result=mysqli_query($conn, $consulta);

    // Comprobamos si existe y hay resultados. SI existe, modificamos los datos. NO existe, mensaje de error
    if($result && mysqli_num_rows($result)>0){
        $consulta2 = "UPDATE productos SET nombre='$nombre', imagen='images/$imagen', categoria='$categoria', precio='$precio', descripcion='$descripcion' WHERE nombre='$producto_modificar'";
        mysqli_query($conn, $consulta2);
        echo '<script>
                alert("Producto actualizado correctamente.");
                window.location.href = "modificacion_productos.php";
              </script>';
    }else{
        echo '<script>
               alert("Producto inexistenete.");
               window.location.href= "modificacion_productos.php";
            </script>';
    }		

 	// Cerramos la conexión
   mysqli_close($conn);
?>