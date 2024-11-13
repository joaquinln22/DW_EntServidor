<html>
<head>
<?php
/*
En este ejemplo se va a utilizar las tablas asociativas. Vamos a crear un array con todos los dias de la semana. El Key(clave)
va a ser el dia de la semana y al valor va a ser un comentario para ese dia de la semana.
*/

//Declaramos el array con los dias de semana.
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
/*
A continuacion se muestra por pantalla todos los dias de la semana con sus respectivos comentarios
*/
?>
<h3>El dia de la semana Lunes tiene el comentario: <i><?=  $diasSemana["Lunes"] ?></i></h3>
<h3>El dia de la semana Martes tiene el comentario: <i><?=  $diasSemana["Martes"] ?></i></h3>
<h3>El dia de la semana Miercoles tiene el comentario: <i><?=  $diasSemana["Miercoles"] ?></i></h3>
<h3>El dia de la semana Jueves tiene el comentario: <i><?=  $diasSemana["Jueves"] ?></i></h3>
<h3>El dia de la semana Viernes tiene el comentario: <i><?=  $diasSemana["Viernes"] ?></i></h3>
<h3>El dia de la semana Sabado tiene el comentario: <i><?=  $diasSemana["Sabado"] ?></i></h3>
<h3>El dia de la semana Domingo tiene el comentario: <i><?=  $diasSemana["Domingo"] ?></i></h3>

</body>
</html>
