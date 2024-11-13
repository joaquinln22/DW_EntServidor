<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Ejercicio 4</title>
    </head>
    <body>
        <form action="" method="GET" name="form01">
           Introduce 7 números, separados por comas: 
           <input type="text" name="arrayNumeros" size="20" required>
           <input type="submit" value="Enviar">

           <?php
            if(isset($_GET["arrayNumeros"])){
                echo "<br>";
                echo $_GET["arrayNumeros"];
                echo "<br>";
                $arraySeparadoPorComas=explode(",", $_GET["arrayNumeros"]);
                foreach($arraySeparadoPorComas as $posicion => $valor){
                    if($posicion>3){
                      echo "[" . "$posicion" . "]--> " . $valor . "<br>";  
                    } 
                }
            }
           ?>
        </form>
         
    </body>
</html>