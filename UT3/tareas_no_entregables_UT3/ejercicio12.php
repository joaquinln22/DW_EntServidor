<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 12</title>
    <?php
        include('funciones.php');
    ?>
</head>
<body>
    <form action="" method="POST">
        Pon un número del 1 al 9
        <input name="num" type="number" min="0" max="9" size="9" required>
        <br>
        <input type="submit" value="Enviar">
    </form>

    <?php
        if(isset($_POST["num"])){
            $numTabla=$_POST["num"];
            $archivo=fopen("tabla.txt", "w");
            fputs($archivo, "TABLA DE MULTIPLICAR DEL $numTabla".PHP_EOL);
            for($i=0; $i < 11; $i++){
                $result=$i*$numTabla;
                fputs($archivo, "$numTabla x $i=$result".PHP_EOL);
            }
            fclose($archivo);
        }
        
    ?>
</body>
</html>