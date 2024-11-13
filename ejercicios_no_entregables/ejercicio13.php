<?php
    print "Suponiendo que 1 $ son 0,9 €, y 1 € son 1,11 $...<br>";
    define("TASA_CAMBIO", 1.11);

    $dolar=6.7;
    $toEuro=$dolar/TASA_CAMBIO;

    print $dolar . " $ equivalen a " . $toEuro . " €";

    $euro=98;
    $todolar=$euro*TASA_CAMBIO;

    print "<br>" . $euro . " € equivalen a " . $todolar . " $";
?>