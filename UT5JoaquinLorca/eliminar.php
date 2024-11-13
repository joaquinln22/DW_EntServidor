<?php
    include ("conexion.php");

    $cod=$_GET['titulo'];

    $consulta = ("DELETE from libros WHERE codigo='$cod'");
    
    mysqli_query($conn,$consulta);
    
    header ("LOCATION:form_eliminar.php");
?>