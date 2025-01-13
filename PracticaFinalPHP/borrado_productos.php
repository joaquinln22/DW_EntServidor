<?php
include("seguridad_encargado.php");
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <script src="../js/bootstrap.bundle.min.js"></script>
    <title>Eliminación de usuarios</title>
    <style>
        .caja {
            background-color: #e0e0e0;
            padding: 20px;
            border-radius: 10px;
            width: 500px;
            margin-top: 50px;
        }

        input {
            float: right;
        }

        .volver a {
            text-decoration: none;
            color: red;
            font-size: 1.2em;
            transition: color 0.3s ease;
        }

        .volver a:hover {
            color: #8442f5;
        }

        .boton1 {
            background-color: #8442f5;
            border-color: transparent;
        }

        .boton1:hover {
            background-color: #8442f5;
            border-color: transparent;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="caja col-auto">
                <div class="row text-center mb-2" style="color: #0078d7">
                    <h1>Eliminación de productos del menú</h1>
                </div>
                <form action="consulta_borrado_productos.php" method="post" name="eliminacion_usuarios">
                    <div class="row">
                        <span>Producto a eliminar: <input type="text" name="nombre" size="20" required></span>
                    </div>
                    <div class="row col-auto mt-2">
                        <input class="btn btn-danger" type="submit" value="Eliminar producto">
                    </div>
                    <div class="row text-center mt-2">
                        <p class="volver"><a href="gestion_productos.php" target="_parent">Volver atrás</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>