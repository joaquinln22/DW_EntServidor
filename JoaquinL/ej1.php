<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Ejercicio 1</title>
    </head>
    <body>
        <form action="" method="post" name="form01">
            Segundo actual del sistema:
            <br>

            <?php
                $s=date("s");
                $stream=fopen("resultados.txt", "w");

                if($s%2==0){
                    $suma=0;
                    for($i=0; $i<=$s; $i++){
                        if($i%2==0){
                           $suma+=$i; 
                        }
                    }
                    echo "Suma de todos los pares hasta el segundo " . $s . " = " . $suma;
                    $resultado="Resultado 1" . $suma;
                    fputs($stream, "Resultado: " . $suma . PHP_EOL);
                }else{
                    echo $s . " es impar.";
                }
                fclose($stream);
            ?>
        </form>
    </body>
</html> 