<?php
/*La funcion "explode()", se encarga de dividir una cadena en un array de cadenas. La cadena se divide a partir de una cadena patron.
En el siguiente ejemplo tenemos una cadena, en la que cada palabra esta dividida con el caracter(cadena patron) "-". De esta forma
se obtiene un array con 4 elementos.*/
$cadena_a_dividir = " pepito-perez-619123456-Murcia";
$datosPersonales = explode("-",$cadena_a_dividir);
$nombre = $datosPersonales[0];
$apellidos = $datosPersonales[1];
$telefono = $datosPersonales[2];
$ciudad = $datosPersonales[3];
echo "<p>Nombre: $nombre<br>
Apellidos: $apellidos<br>
Teléfono: $telefono<br>
Ciudad: $ciudad<br>
</p>";
?>
