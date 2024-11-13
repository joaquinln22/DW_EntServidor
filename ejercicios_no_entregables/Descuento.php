<?php
    define("IVA", 0.21);
    $desc=0.07;
    $precio=300;
    $precio_iva=($precio*IVA)+$precio;
    $precio_desc=$precio_iva-($precio_iva*$desc);

    print "Precio con IVA---> ". $precio_iva . "€";
    print "<br>";
    print "Precio con descuento---> " . $precio_desc . "€";
?>