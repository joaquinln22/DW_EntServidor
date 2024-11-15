<?php
 	include("conexion.php");

 	//Recoges datos de formulario, ATENTO AL METODO QUE ELIGES
 	$usuario_modificar = $_POST['usuario'];
    $nombre = $_POST['nombre'];
	$contra = $_POST['contraseña'];
	$rol = $_POST['rol'];

 	// Creamos consultas
    $consulta = "SELECT * FROM usuarios WHERE nombre_usuario='$usuario_modificar'";
    

    //ejecutamos la sentencia SQL para comprobar si el usuario escogido existe
    $result=mysqli_query($conn, $consulta);

    // Comprobamos si existe y hay resultados. SI existe, modificamos los datos. NO existe, mensaje de error
    if($result && mysqli_num_rows($result)>0){
        $consulta2 = "UPDATE usuarios SET nombre_usuario='$nombre',contraseña='$contra',rol='$rol' WHERE nombre_usuario='$usuario_modificar'";
        mysqli_query($conn, $consulta2);
    }else{
        echo "	<script>
				alert('Usuario o contraseña incorrectos.');
				window.location.href= 'index.php';
			</script>";
    }		

 	//redireccionamos a la web que quieras
 	header("LOCATION:modificacion_usuarios.php");
?>