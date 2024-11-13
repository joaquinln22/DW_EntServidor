<?php
    $num1=22;
    $num2=11;

    print "Valores iniciales...<br>" . "Número 1: " . $num1 . "<br>Número 2: " . $num2;

    $aux=$num1;
    $num1=$num2;
    $num2=$aux;

    print "<br>Valores intercambiados...<br>" . "Número 1: " . $num1 . "<br>Número 2: " . $num2;
?>