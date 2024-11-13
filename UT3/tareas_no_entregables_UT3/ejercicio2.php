<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Ejercicio 2</title>
    </head>
    <body>
        <form action="" method="POST" name="form01">
            <fieldset>
                <legend>Ejercicio 2</legend>
                Introduce un número decimal:
                <input name="numDec1" type="text" size="15">
                &nbsp;
                Introduce otro número decimal:
                <input name="numDec2" type="text" size="15">
                <br>
                <input type="submit" value="Intercambiar">
                <br>
                <br>

                <?php
                if(isset($_POST["numDec1"]) && isset($_POST["numDec2"])){
                    $num1=$_POST["numDec1"];
                    $num2=$_POST["numDec2"];

                    if(is_numeric($num1) && is_numeric($num2)){
                        echo "Variables originales--> NumDec1= " . $num1 . " NumDec2= " . $num2 . "<br>";
                        $aux=$num1;
                        $num1=$num2;
                        $num2=$aux;
                        echo "Variables intercambiadas--> NumDec1= " . $num1 . " NumDec2= " . $num2;
                    }else{
                        echo "Por favor, introduce valores numéricos.";
                    }
                }
                ?>
            </fieldset>
        </form>
    </body>
</html> 