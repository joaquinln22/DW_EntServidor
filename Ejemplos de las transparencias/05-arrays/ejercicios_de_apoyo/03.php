<html>
<head>
<?php
/*
En este ejercicio se va a utilizar el array del ejercicio anterior. Es vez de recorrerlo a mano, se va a recorrer mediante 
las instruciones: current, pos, reset, end, next, prev, count.
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
//A continuacion se recorre el array mediente las instrucciones mencionadas anteriormente.

//Motramos el todal de elementos que contiene le array $diasSemana
printf("<h3>El Total de elementos que hay en el array es: ". count($diasSemana) ."</h3>");

//Situamos la posicion del array en el primer elemento.
reset($diasSemana);
// A conticacion mostramos el comentario correspondiente al dia de la semana "Domingo";
end($diasSemana);
printf("<h3>Domingo: ". current($diasSemana) ."</h3>");

// A conticacion mostramos el comentario correspondiente al dia de la semana "Miercoles";
reset($diasSemana);
next($diasSemana);
next($diasSemana);
printf("<h3>Miercoles: ". current($diasSemana) ."</h3>");

// A conticacion mostramos el comentario correspondiente al dia de la semana "Martes";
prev($diasSemana);
printf("<h3>Martes: ". current($diasSemana) ."</h3>");

// A conticacion mostramos el comentario correspondiente al dia de la semana "Martes";
end($diasSemana);
prev($diasSemana);
prev($diasSemana);
printf("<h3>Viernes: ". current($diasSemana) ."</h3>");


?>

</body>
</html>
