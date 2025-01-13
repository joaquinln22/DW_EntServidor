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
    <title>Modificación de usuarios</title>
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
                    <h1>Modificación de usuarios</h1>
                </div>
                <form action="consulta_modificacion.php" method="post" name="registro_usuarios">
                    <div class="row">
                        <span>Usuario a modificar: <input type="text" name="usuario" size="20" required></span>
                    </div> 
                    <div class="row mt-2">
                        <span><b>Parámetros a modificar:</b></span>
                    </div>
                    <div class="row mt-2">
                        <span>Usuario: <input type="text" name="nombre" size="20"></span>
                    </div>
                    <div class="row mt-2">
                        <span>Contraseña: <input type="password" name="contraseña" size="20"></span>
                    </div>
                    <div class="row mt-2">
                        <span>Nombre: <input type="text" name="nombre" size="20" required></span>
                    </div>
                    <div class="row mt-2">
                        <span>Apellidos: <input type="text" name="apellidos" size="20" required></span>
                    </div>
                    <div class="row mt-2">
                        <span>DNI: <input type="text" name="dni" size="20" required></span>
                    </div>  
                    <div class="row mt-2">
                        <span>Edad: <input type="number" name="edad" size="20" required></span>
                    </div>
                    <div class="row mt-2">
                        <span>Foto: <input type="file" name="foto" accept="image/*"></span>
                    </div>
                    <div class="row mt-2">
                        <span class="rol">Rol: 
                            <select name="rol" id="rol">
                                <option value="camarero">Camarero</option>
                                <option value="encargado">Encargado</option>
                            </select>
                        </span>
                    </div>
                    <div class="row col-auto mt-2">
                        <input class="btn btn-success" type="submit" value="Modificar Usuario">
                    </div>
                    <div class="row text-center mt-2">
                        <p class="volver"><a href="admin_usuarios.php" target="_parent">Volver atrás</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
