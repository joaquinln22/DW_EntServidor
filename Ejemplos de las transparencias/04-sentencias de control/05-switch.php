<html>
<head>
<?php
/*En este ejercicio se declara un variable de tipo string. 
Esta variable va a contener un dia de la semana que se va comprobar mediante un 
switch y va a mostrar un mensaje por pantalla. 
Para mostrar el mensaje por pantalla lo que voy hacer va ser guardar el mensaje 
en una variable y a al final lo muestro por pantalla.
*/

$diaSemana = "Viernes";
$mensajePantalla = "";

?>
</head>

<body>
<?php switch ($diaSemana) 
{ 
	case "Lunes": 
		$mensajePantalla = "La variable contiene el dia de la semana: Lunes";
		break; 
	case "Martes": 
		$mensajePantalla = "La variable contiene el dia de la semana: Martes";
		break; 
	case "Miercoles": 
		$mensajePantalla = "La variable contiene el dia de la semana: Miercoles";
		break; 
	case "Jueves": 
		$mensajePantalla = "La variable contiene el dia de la semana: Jueves";
		break; 
	case "Viernes": 
		$mensajePantalla = "La variable contiene el dia de la semana: Viernes";
		break; 
	case "Sábado": 
		$mensajePantalla = "La variable contiene el dia de la semana: Sábado";
		break; 
	case "Domingo": 
		$mensajePantalla = "La variable contiene el dia de la semana: Domingo";
		break; 
	default: 
		$mensajePantalla = "Esa cadena no corresponde a ningún día de la semana"; 
	} 
?>
<h2><?= $mensajePantalla?></h3>

</body>
</html>
