<?php
/*
La funcion "substr, devuelve una porcion de otra cadena".
En este caso tenemos la palabra Holamundo, de la que queremos obtener la palabra "mun". Para ello tenemos comenzar a partir del 
4 caracter y tenemos que contar un total de 3 caracteres hasta obtener la palabra "mun".
*/
$palabra = "Holamundo"; 
$palabra2 = substr($palabra, 4, 3);
echo "<p>$palabra2</p>";
?>
