<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Ejercicio 3</title>
    </head>
    <body>
        <?php
        function contarPalabras($cad1, $cad2){
            trim($cad1);
            trim($cad2);
            strtolower($cad1);
            strtolower($cad2);
            echo substr_count($cad1, $cad2);
        }
        ?>
        <form action="" method="post" name="form01">
            
            <input type="text" name="cadena1" size="20">
            &nbsp;
            <input type="text" name="cadena2" size="20">
            <br><br>
            <input type="submit" value="Enviar">
            &nbsp;&nbsp;&nbsp;&nbsp;
            <?php
                $cad1=$_POST["cadena1"];
                $cad2=$_POST["cadena2"];
                echo "Número de veces que aparece $cad2 en nuestra cadena: " . contarPalabras($cad1, $cad2);
            ?>
        </form>
    </body>
</html> 