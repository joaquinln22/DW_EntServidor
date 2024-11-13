<html>
<head>

<?php
/*
En este ejercicio se va a utilizar el array del ejercicio anterior. Es vez mediente con un "while" la vamos a recorrer con un "Foreach" . 
La forma de recorrer el array mediante "Foreach", es muy similar a la utilizada con la instruccion "While". 
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

<h2>Con ForEach</h2>
<?php
//A continucacion recorremos el array.

foreach($diasSemana as $clave=>$valor)
{
   printf("<h3>El dia de la semana <i> $clave </i> tiene el comentario <i> $valor </i></h3>");
}

?>

</body>
</html>
