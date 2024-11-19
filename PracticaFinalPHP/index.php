<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
	<script src="../js/bootstrap.bundle.min.js"></script>
    <title>Inicio de sesión</title>
    <style>
        .caja{
            width: 450px;
        }

    </style>
</head>
<body>
    <?php
        //Estableciendo la conexión
        include ("conexion.php");

        //creamos la sentencia SQL
        $consulta="select * from usuarios";
        $result = mysqli_query($conn ,$consulta);
        //Imprimos el error si se ha producido. mysql_error siempre va a mostrar el error de la última función mysql ejecutada
        echo mysqli_error($conn);

        //Imprimos el error si se ha producido. mysql_error siempre va a mostrar el error de la última función mysql ejecutada
        echo mysqli_error($conn);

    ?>
    <div class="container">
        <div class="row justify-content-center">
            <div class="caja col-auto">
                <form action="consulta_inicio.php" method="post" name="inicio_sesion">
                    <div class="row text-center">
                        <div class="col-12">
                            <h1>Inicio de sesión</h1>
                        </div>
                    </div>
                    <div class="row mb-3 justify-content-between">
                        <div class="col-auto">
                            <p>Usuario:</p>
                        </div>
                        <div class="col-auto">
                            <input type="text" name="usuario" size="20" required>
                        </div>
                    </div>
                    <div class="row mb-3 justify-content-between">
                        <div class="col-auto">
                            <p>Contraseña:</p>
                        </div>
                        <div class="col-auto">
                            <input type="password" name="contraseña" size="20" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col d-grid">
                            <input class="boton1 btn btn-danger" type="submit" value="Iniciar Sesión">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
</body>
</html>