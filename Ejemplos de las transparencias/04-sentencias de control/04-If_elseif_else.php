<html>
<head>
<?php 
//A continuacion me declaro una variable de tipo entero
$numero=7;
/*
Esta variable la voy a utilizar mas abajo con una sentencia IF 
y voy a mostrar por pantalla un mensaje
*/
?>
</head>
<body>
<?php
if ($numero==2)
{
?>
<h3>El variable $numero contiene el numero 2</h3>
<?php
} else if ($numero==3) {
?>
<h3>El variable $numero contiene el numero 3</h3>
<?php

} else {
?>
<h3>La variable $numero no con tiene ni el numero 2 ni el 
numero 3, sino que contiene el numero <?php echo $numero?></h3>
<?php
}
?>
</body>
</html>
