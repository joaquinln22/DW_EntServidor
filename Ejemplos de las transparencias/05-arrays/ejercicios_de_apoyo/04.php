<html>
<head>
<?php
/*
En este ejercicio se va a utilizar el array del ejercicio anterior. Es vez de recorrerlo mediante las instruciones: 
current, pos, reset, end, next, prev, count, lo vamos a recorrer mediente un "while". Al recorrerlo mediente un "while", no es
necesario escribir a mano el dia de la semana, como en los ejemplos anteriores(printf("<h3>Miercoles: ". current($diasSemana) ."</h3>");).
El dia de la semana va a ser la $clave y el dia de la semana el $valor
*/

//nos declaramos el array con los dias de la semana y con sus respectivos comentarios.

$diasSemana["Lunes"] = "El dia mas feo de la semana";
$diasSemana["Martes"] = "Un poco mejor que el lunes";
$diasSemana["Miercoles"] = "Dia antes del jueves ";
$diasSemana["Jueves"] = "Víspera de viernes";
$diasSemana["Viernes"] = "El mejor dia de la semana";
$diasSemana["Sabado"] = "Dia perfecto para descarsar";
$diasSemana["Domingo"] = "Se acaba el fin de semana";

?>
</head>

<body>
<?php
//A continucacion recorremos el array.
while (list($clave, $valor) = each($diasSemana)) 
{ 
	printf("<h3>El dia de la semana <i>" . $clave ."</i> tiene el comentario <i>" . $valor . "</i></h3>");
}


?>

</body>
</html>
