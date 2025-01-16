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
    <title>Modificación de productos</title>
    <link rel="icon" href="./images/burguer.png" type="image/png">
    <style>
        .caja {
            background-color: #e0e0e0;
            padding: 20px;
            border-radius: 10px;
            width: 500px;
            margin-top: 50px;
        }

        input{
            float: right;
        }

        select{
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

        .boton1{
            background-color: #8442f5;
            border-color: transparent;
        }

        .boton1:hover{
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
                    <h1>Modificación de productos</h1>
                </div>
                <form action="consulta_modificacion_productos.php" method="post" name="registro_usuarios">
                    <div class="row">
                        <span>Producto a modificar: <input type="text" name="producto" size="20" required></span>
                    </div> 
                    <div class="row mt-2">
                        <span><b>Parámetros a modificar:</b></span>
                    </div>
                    <div class="row mt-2">
                        <span>Nombre: <input type="text" name="nombre" size="20"></span>
                    </div>
                    <div class="row mt-2">
                        <span>Descripción: <input type="text" name="descripcion" size="20"></span>
                    </div>
                    <div class="row mt-2">
                        <span>Precio: <input type="number" name="precio" size="20" required></span>
                    </div>
                    <div class="row mt-2">
                        <span>Imagen: <input type="file" name="imagen" accept="image/*" required></span>
                    </div>
                    <div class="row mt-2">
                        <span class="categoria">Categoría: 
                            <select name="categoria" id="categoria">
                                <option value="Entrantes">Entrantes</option>
                                <option value="Principales">Principales</option>
                                <option value="Postres">Postres</option>
                                <option value="Bebidas">Bebidas</option>
                            </select>
                        </span>
                    </div>
                    <div class="row col-auto mt-2">
                        <input class="btn btn-success" type="submit" value="Modificar producto">
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