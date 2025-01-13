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
    <title>Opciones Encargado</title>
    <style>
        .caja {
            background-color: #e0e0e0;
            padding: 20px;
            border-radius: 10px;
            width: 500px;
            margin-top: 50px;
            text-align: center;
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

        a {
            display: block;
            margin: 10px 0;
            color: black;
            text-decoration: none;
            font-size: 1.2em;
        }

        a:hover {
            color: #8442f5;
        }
    </style>
 </head>
 <body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="caja col-auto">
                <header>
                    <h1 style="color: #0078d7">¿Qué quieres hacer?</h1>
                </header>
                <p><a href="admin_usuarios.php" target="_parent">Administración de usuarios</a></p>
                <p><a href="gestion_productos.php" target="_parent">Gestión de productos</a></p>
                <p class="volver"><a href="index.php" target="_parent">Volver atrás</a></p>
            </div>
        </div>
    </div>
 </body>
 </html>
