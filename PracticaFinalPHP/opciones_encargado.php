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
 </head>
 <body>
    <header>
        <h1>¿Qué quieres hacer?</h1>
    </header>
    <p><a href="admin_usuarios.php" target="_parent">Administración de usuarios</a></p>
    <p><a href="gestion_productos.php" target="_parent">Gestión de productos</a></p>
    <p class="atras1"><a href="index.php" target="_parent">Volver atrás</a></p>
 </body>
 </html>