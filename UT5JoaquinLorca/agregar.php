<?php

    include ("conexion.php");

    $title=$_POST['titulo'];
    $autor=$_POST['autor'];
    $fecha=$_POST['fecha_publi'];
    $estado=$_POST['estado'];
    $consulta = "INSERT INTO productos (titulo, autor, fecha_publi, estado) VALUES ('$title','$autor','$fecha','$estado')";
    $result=mysqli_query($conn,$consulta);

    header ("LOCATION:form_agregar.php");
?>