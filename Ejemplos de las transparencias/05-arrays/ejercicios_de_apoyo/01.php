<html>
<head>
<?php
/*
En este ejercicio se declara un array con una serie de colores y se muestran por pantalla.
El array va a comenzar por la posicion 1 en vez de la 0, que es la que coge por defecto
*/

//Declaramos el array
$colores = array("Naranja","Rojo", "Amarillo", "Verde", "Azul");
?>
</head>

<body>
<?php
//A continucacion mostramos mediente eqtiquetas H todos los colores que se han guardado en el array $colores

//Se van a imprimir por pantalla con las etiquetas H, pero estan etiquetas se van a crear desde el codigo PHP.
//En el codigo  se entiende mucho mejor.
printf ("<h1>" . $colores[0] . "</h1>");
printf ("<br>");  //Imprimemos un retorno de carro(baja a la siguiente linea, como si pulsaramos intro)
printf ("<h1>" . $colores[1] . "</h1>");
printf ("<br>");  //Imprimemos un retorno de carro(baja a la siguiente linea, como si pulsaramos intro)
printf ("<h1>" . $colores[2] . "</h1>");
printf ("<br>");  //Imprimemos un retorno de carro(baja a la siguiente linea, como si pulsaramos intro)
printf ("<h1>" . $colores[3] . "</h1>");
printf ("<br>");  //Imprimemos un retorno de carro(baja a la siguiente linea, como si pulsaramos intro)
printf ("<h1>" . $colores[4] . "</h1>");
printf ("<br>");  //Imprimemos un retorno de carro(baja a la siguiente linea, como si pulsaramos intro)

?>
</body>
</html>
