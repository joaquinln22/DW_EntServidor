<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Ejercicio 3</title>
    </head>
    <body>
        <?php
            include("funciones.php");
        ?>
        <form action="" method="post" name="form01">
            <fieldset>
                <legend>Ejercicio 3</legend>
                Introduce una letra que represente un día de la semana (L, M, X, J, V, S, D):
                <br>
                <input type="text" name="dia" size="15">
                <br>
                <input type="submit" value="Enviar">
                &nbsp;&nbsp;

                <?php
                    if(isset($_POST["dia"])){
                        $d=$_POST["dia"];
                        $d=strtoupper($d);
                        echo dia_semana($d);
                        if($d=='S' || $d=='D'){
                            echo " un día de fin de semana.";
                        }else if($d=='L' || $d=='M' || $d=='X' || $d=='J' || $d=='V'){
                            echo " un día laboral.";
                        }
                    }
                    
                ?>
            </fieldset>
        </form>
    </body>
</html> 