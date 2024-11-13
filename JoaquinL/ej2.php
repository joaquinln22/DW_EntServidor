<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Ejercicio 2</title>
    </head>
    <body>
        <form action="" method="post" name="form01">
            Dinero:
            <input type="text" name="dinero" size="10">
            &nbsp;
            <select name="opciones">
                <option value="euros">€</option>
                <option value="dolares">$</option>
            </select>
            <br><br>
            <input type="submit" value="Conversión">
            &nbsp;&nbsp;&nbsp;&nbsp;
            <?php
                if(isset($_POST["dinero"])){
                    $e=$_POST["dinero"];
                    echo $e . "€";
                }else if(isset($_POST["dinero"])){
                    $e=$_POST["dinero"];
                    $dolar=$e*0.9;
                    echo $dolar . "$";
                }
            ?>
        </form>
    </body>
</html> 