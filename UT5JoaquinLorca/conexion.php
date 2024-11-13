<?php
$servidor="localhost";
$user="root";
$clave="";
$bd="biblioteca";

$conn= mysqli_connect($servidor,$user,$clave);

mysqli_select_db($conn,$bd);

echo mysqli_error($conn);
?>