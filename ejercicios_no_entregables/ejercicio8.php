<?php
    $numReal1=5.66;
    $numReal2=7.89;

    print "Números originales <br>";
    print "Número 1= " . $numReal1 . "<br>";
    print "Número 2= " . $numReal2 . "<br>";

    $aux=$numReal1;
    $numReal1=$numReal2;
    $numReal2=$aux;

    print "<br>Números intercambiados <br>";
    print "Número 1= " . $numReal1 . "<br>";
    print "Número 2= " . $numReal2;

?>