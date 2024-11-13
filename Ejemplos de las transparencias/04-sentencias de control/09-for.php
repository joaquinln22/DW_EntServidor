<html>
<head>
<?php
/* En este ejercicio se utiliza la sentencia FOR. Lo que vamos hacer en 
este FOR va ser crear dinamicamente la etiquetas "H", es decir, vamos a 
construir un FOR que vaya desde el el numero 1 hasta el numero 6, de tal 
manera que se vayan construyendo las etiquetas "H" de manera automatica, 
dependiendo del valor del que en ese momento tiene la variable del bucle FOR. 
En el código se va a entender mucho mejor.
*/
?>
</head>
<body>
<?php
for ($num=1;$num<=6;$num++)
{

	echo "<h$num> Etiqueta H $num </h$num>";
}
?>
</body>
</html>
