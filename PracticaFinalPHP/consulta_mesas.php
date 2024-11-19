<?php
 	include("conexion.php");

 	//Recoges datos de formulario, ATENTO AL METODO QUE ELIGES
 	$n_mesa = $_POST['num_mesa'];
    $n_comen = $_POST['num_comen'];

 	// Creamos consultas
    $consulta = "SELECT * FROM mesas WHERE id='$n_mesa'";
    

    //ejecutamos la sentencia SQL para comprobar si la mesa escogida existe
    $result=mysqli_query($conn, $consulta);

    // Comprobamos si existe y hay resultados. SI existe, modificamos los datos. NO existe, mensaje de error
    if($result && mysqli_num_rows($result)>0){
        $consulta2 = "UPDATE mesas SET comensales='$n_comen',estado='ocupada',creacion_mesa=CURRENT_TIMESTAMP WHERE id='$n_mesa'";
        mysqli_query($conn, $consulta2);
        //redireccionamos a la web que quieras
 	    header("LOCATION:mesas.php");
    }else{
        echo "	<script>
				alert('Nº de mesa inexistente.');
				window.location.href= 'mesas.php';
			</script>";
    }		

    // Obtenes el listado de mesas desde la BBDD
    $query = "SELECT * FROM mesas";
    $result = $conexion->query($query);

    $mesas = [];
    while ($fila = $result->fetch_assoc()) {
        $mesas[] = $fila;
    }

    echo json_encode($mesas);
?>