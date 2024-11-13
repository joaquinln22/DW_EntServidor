<html>
<head>

<?php
/*
En este ejercicio vamos a utilizar la sentencia WHILE.
Lo que vamos a hacer en este ejercicio es imprimir
diferente tamaño de encabezados.
*/
$num = 1;
?>
</head>
<body>
<?php
//me declaro mi variable $num

while ($num<7)
{
	echo "<h$num> Etiqueta H $num </h$num> <br>";
	$num++;
}
?>

</body>
</html>
