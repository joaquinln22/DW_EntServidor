<?php
    $a="*";
    for ($j=5; $j>=0; $j--){
        for ($i=0; $i<$j; $i++) {
            print $a;  
        }
        print "<br>";
    }

    print "<br>";

    for ($j=0; $j<4; $j++){
        for ($i=0; $i<$j; $i++) {
            print "&nbsp;" . "&nbsp;";
        }
        for($y=4; $y>$j; $y--){
            print $a;
        }
        print "<br>";
    }
?>

