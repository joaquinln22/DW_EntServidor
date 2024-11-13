<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Ejercicio 1</title>
    </head>
    <body>
        <?php
            include("funciones.php");
        ?>
        <form action="" method="post" name="form01">
            <fieldset>
                <legend>Ejercicio 1</legend>
                Introduce un número decimal: 
                <input name="numero1" type="text" maxlength="15" size="15">
                &nbsp;
                Introduce otro número decimal: 
                <input name="numero2" type="text" maxlength="15" size="15">
                <br><br>
                <input type="submit" value="Calcular">
                <br><br>
                <?php
                    if(isset($_POST["numero1"]) && isset($_POST["numero2"])){
                        $num1=$_POST["numero1"];
                        $num2=$_POST["numero2"];
                        if(!is_numeric($num1) || !is_numeric($num2)){
                            echo "Por favor, introduce números válidos.";
                        }else{
                            echo "Resultados: <br><br>Suma--> " . sumar($num1, $num2) . "<br>Resta--> " . restar($num1, $num2) . "<br>Multiplicación--> " . 
                                    multiplicar($num1, $num2) . "<br>División--> " . dividir($num1, $num2);
                        }
                    }
                ?>
            </fieldset>
        </form>
    </body>
</html>    