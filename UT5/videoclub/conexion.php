<?php
	$servidor="localhost";
	$user="root";
	$clave="";
    $bd="daw";

    $conn=mysqli_connect($servidor, $user, $clave);
    echo mysqli_error($conn);
	mysqli_select_db($conn, $bd);
	echo mysqli_error($conn);
	mysqli_query($conn, "SET NAMES 'utf8'");
?>
