<?php
 	include("conexion.php");

 	//Recoges datos de formulario, ATENTO AL METODO QUE ELIGES
 	$producto_modificar = $_POST['producto'];
    $stock = $_POST['stock'];

 	// Creamos consultas
    $consulta = "SELECT * FROM productos WHERE nombre='$producto_modificar'";
    

    //ejecutamos la sentencia SQL para comprobar si el usuario escogido existe
    $result=mysqli_query($conn, $consulta);

    // Comprobamos si existe y hay resultados. SI existe, modificamos los datos. NO existe, mensaje de error
    if($result && mysqli_num_rows($result)>0){
        $consulta2 = "UPDATE productos SET stock='$stock' WHERE nombre='$producto_modificar'";
        mysqli_query($conn, $consulta2);
    }else{
        echo "	<script>
				alert('Usuario o contraseña incorrectos.');
				window.location.href= 'index.php';
			</script>";
    }		

 	//redireccionamos a la web que quieras
 	header("LOCATION:actualizar_stock.php");
?>