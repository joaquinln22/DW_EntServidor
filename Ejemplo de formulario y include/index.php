<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
        include('funciones.php');
    ?>
    <form action="" method="GET">
        <fieldset>
            <legend>Trabajo con cadenas</legend>
            <div id="BloqueFormulario">
                <label>Cadena:</label>
                <input name="cadena" id="cadena" value="" size="40" maxlength="100" type="text" class="CampoFormulario"
                    required>
            </div>
            <div id="BloqueFormulario">
                <label>Opciones diponibles:</label>
                <select name="seleccion">
                    <option value="0">De minúscula a mayúscula</option>
                    <option value="1">De mayúscula minúscula</option>
                </select>
            </div>
            <br>
            <?php
            if(isset($_GET['cadena'])&&isset($_GET['seleccion'])){
                $cadenita=$_GET['cadena'];
                $seleccionita=$_GET['seleccion'];
                
                /*echo $_GET['cadena'];
                echo '<br>';
                echo $_GET['seleccion'];*/

                if ($seleccionita==0){
                    $result1=MinusMayus($cadenita);
                    echo "He pasado todo a Mayúsculas-->".$result1;
                }
                else if ($seleccionita==1){
                    $result1=MayusMinus($cadenita);
                    echo "He pasado todo a Minúscula-->".$result1;
                }
                
                
                
            }
            ?>

            <br>
            <p><input type="submit" name="operar" value="Operar" /></p>
        </fieldset>
    </form>

</body>

</html>