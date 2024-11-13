<?php
    $precio=5.5;
    $cant=4;
    $desc=0.15;
    $precio_total=($precio-($precio*$desc))*$cant;

    print "Precio bebida energética Prime ---> " . $precio . "€<br>";
    print "Cantidad de productos ---> " . $cant;
    print "<br>Precio total con un descuento del 15% ---> " . $precio_total . "€"
?>