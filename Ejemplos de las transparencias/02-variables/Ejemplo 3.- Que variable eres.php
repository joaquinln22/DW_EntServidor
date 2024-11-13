<?php

//Verificamos si la variable es numerica
$x = 5985;
echo "Variable sin comillas-->";
echo is_numeric($x);
echo "<br>";
$x = "5985";
echo "Variable con comillas-->";
echo is_numeric($x);
echo "<br>";
echo "Variable con comillas y sumando 
un numero -->";
$x = "59.85"+100;
echo is_numeric($x);
echo "<br>";
$x="Hello";
echo "Solo texto-->";
echo is_numeric($x);
?>